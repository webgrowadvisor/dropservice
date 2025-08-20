<?php

namespace App\Http\Controllers\Drop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Dropservice;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\DropservicePackage;
use App\Models\DropPackage;
use Carbon\Carbon;
use Razorpay\Api\Api;
use App\Models\Transaction;

class DropController extends Controller
{
    public function index (){
        // dd(Auth::guard('dropservice')->user());
        $dropshipper = auth('dropservice')->user();

        $transactions = Transaction::where('dropservice_id', $dropshipper->id)->count();
        $ordercount = Order::where('dropshiper_id', $dropshipper->id)->count();
        $activePackage = DropservicePackage::where('dropservice_id', $dropshipper->id)
        ->where('valid_until', '>', now())
        ->latest('purchased_at')
        ->first();

        $orders = Order::with(['product', 'variant', 'user'])
            ->where('dropshiper_id', $dropshipper->id)
            ->latest()
            ->paginate('10');

        return view('drop.dashboard', compact('transactions', 'ordercount', 'orders', 'activePackage'));
    }

    public function accountSettings()
    {
        $seller = Auth::guard('dropservice')->user();
        return view('drop.users-edit', compact('seller'));
    }

    public function updateAccountSettings(Request $request)
    {
        $seller = Auth::guard('dropservice')->user();

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:dropservices,email,' . $seller->id,
            'mobile' => 'required|string|unique:dropservices,mobile,' . $seller->id,
            'password' => 'nullable|min:6', // only update if entered
            'status' => 'nullable',
            'gst' => 'required',
            'address' => 'required',
            'logo'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gst_image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]); 

        if ($request->hasFile('logo')) {
            $paths = uploadWebp($request->file('logo'), 'dropservice_logo');
            $seller->logo = $paths['webp'] ?? $paths['image'];
        }
        if ($request->hasFile('gst_image')) {
            $paths = uploadWebp($request->file('gst_image'), 'dropservice_gstfile');
            $seller->gst_image = $paths['webp'] ?? $paths['image'];
        }

        // $seller->status = $request->status;
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->mobile = $request->mobile;
        $seller->gst = $request->gst;
        $seller->address = $request->address;
        if ($request->password) {
            $seller->password = Hash::make($request->password);
        }
        $seller->save();

        return redirect()->back()->with('success_msg', 'Account settings updated successfully.');
    }


    public function productFilter()
    {
        $dropshipper = auth('dropservice')->user();
         $activePackage = DropservicePackage::where('dropservice_id', $dropshipper->id)
        ->where('valid_until', '>', now())
        ->latest('purchased_at')
        ->first();

        $categories = Category::with('children')->where('parent_id', null)->where('status', 1)->get();
        return view('drop.filter', compact('categories', 'activePackage'));
    }

    public function getSellersByCategory($categoryId)
    {
        $dropservice = Auth::guard('dropservice')->user();
        if($dropservice->status == '0'){
            return redirect()->back()->with('error_msg', 'Account deactive.');
        }

        $sellerIds = Product::where('category_id', $categoryId)
            ->pluck('seller_id')
            ->unique();

        $sellers = Seller::whereIn('id', $sellerIds)->get(['id', 'name', 'api_key']);

        return response()->json([
            'status' => true,
            'sellers' => $sellers
        ]);
    }

    public function getProductsBySeller($sellerId)
    {
        $products = Product::with(['variants', 'category', 'seller'])
        ->where('seller_id', $sellerId)
        ->where('status', '1')
        ->latest()
        ->get();

        return response()->json([
            'status' => true,
            'products' => $products
        ]);
    }


    public function package()
    {
        // Example: You could load package plans or user-specific data
        $packages = DropPackage::all();
        // $packages = [
        //     ['name' => 'Basic Plan', 'price' => '₹499', 'duration_days' => 30, 'features' => ['10 products', 'Standard support']],
        //     ['name' => 'Plus Plan', 'price' => '₹999', 'duration_days' => 90, 'features' => ['Unlimited products', 'Priority support']],
        //     ['name' => 'Pro Plan', 'price' => '₹9999', 'duration_days' => 365, 'features' => ['Unlimited products', 'Priority support', 'Api doucments support']],
        // ];

        return view('drop.package', compact('packages'));
    }

    public function buyPackage(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string',
            'price'        => 'required|numeric',
            'features'     => 'required|array',
            'duration_days'  => 'required|integer|min:1',
            'commission'     => 'nullable|numeric',
        ]);

        $user = auth('dropservice')->user();

        // Check if the user already has the same package active
        $existing = DropservicePackage::where('dropservice_id', $user->id)
            // ->where('package_name', $request->package_name)
            ->where('valid_until', '>', now())
            ->latest()
            ->first();

        if ($existing) {
            return redirect()->back()->with('error_msg', 'You already have this '.$existing->package_name.' package active until ' . Carbon::parse($existing->valid_until)->format('d M, Y'));
        }

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $order = $api->order->create([
            'receipt' => uniqid(),
            'amount' => $request->price * 100, // in paise
            'currency' => 'INR',
        ]);

        $transaction = Transaction::create([
            'dropservice_id' => $user->id,
            'amount'         => $request->price,
            'currency'       => 'INR',
            'status'         => 'pending',
            'remark'         => 'Buying Package: ' . $request->package_name,
        ]);

        // Save pending package info to session or DB if needed
        session([
            'pending_package' => [
                'name' => $request->package_name,
                'features' => $request->features,
                'duration_days' => $request->duration_days,
                'commission' => $request->commission,
            ]
        ]);

        return view('drop.payment.razorpay_checkout_package', [
            'order_id' => $order['id'],
            'amount' => $request->price,
            'key' => env('RAZORPAY_KEY'),
            'transaction' => $transaction,
        ]);

        // $now = now();
        // $validUntil = $now->copy()->addDays($request->duration_days);
        // // Auth::guard('dropservice')->user()
        // DropservicePackage::create([
        //     'dropservice_id' => $user->id,
        //     'package_name'   => $request->package_name,
        //     'price'          => $request->price,
        //     'commission'     => $request->commission,
        //     'features'       => $request->features,
        //     'purchased_at'   => now(),
        //     'valid_until'    => $validUntil,
        // ]);

        // return redirect()->back()->with('success_msg', 'Package purchased successfully!');
    }

    public function handlePaymentSuccess(Request $request)
    {
        $data = session('package_data');

        if (!$data || !isset($data['transaction_id'])) {
            return redirect()->route('drop.package')->with('error_msg', 'Session expired. Try again.');
        }

        // Update transaction with Razorpay payment ID
        $transaction = Transaction::findOrFail($data['transaction_id']);
        $transaction->update([
            'payment_id' => $request->input('razorpay_payment_id'),
            'status'     => 'paid',
        ]);

        // Create the package entry
        DropservicePackage::create([
            'dropservice_id' => $transaction->dropservice_id,
            'package_name'   => $data['name'],
            'price'          => $transaction->amount,
            'commission'     => $data['commission'],
            'features'       => $data['features'],
            'purchased_at'   => now(),
            'valid_until'    => now()->addDays($data['duration_days']),
        ]);

        session()->forget('package_data');

        return redirect()->route('drop.dashboard')->with('success_msg', 'Package purchased successfully!');
    }


}

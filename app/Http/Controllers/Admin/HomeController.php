<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Dropservice;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;

class HomeController extends Controller
{
    public function index (){
        // dd(vars: admininfo()->name);
        $data = [
            'total_users'          => User::count(),
            'total_sellers'        => Seller::count(),
            'total_dropservices'   => Dropservice::count(),
            'total_orders'         => Order::count(),
            'total_products'       => Product::count(),
            'total_variants'       => ProductVariant::count(),
            'order_list'       => Order::latest()->paginate('10'),
            'product_list'       => Product::latest()->paginate(10),
        ];

        return view('admin.dashboard', compact('data'));
    }

    public function userlist()
    {
        $users = User::paginate(10);
        return view('admin.user', compact('users'));
    }

    public function sellerlist()
    {
        $sellers = Seller::paginate(10);
        return view('admin.seller', compact('sellers'));
    }

    public function droplist()
    {
        $drops = Dropservice::paginate(10);
        return view('admin.drop', compact('drops'));
    }

    public function drop_edit($id)
    {
        $user = Dropservice::findOrFail($id);
        return view('admin.drop_edit', compact('user'));
    }

    public function drop_update(Request $request, $id)
    {
        $drop = Dropservice::findOrFail($id);

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:dropservices,email,' . $drop->id,
            'mobile' => 'required|string|max:15|unique:dropservices,mobile,' . $drop->id,
            'status' => 'required|in:0,1',
            'password' => 'nullable|min:6',
            'gst' => 'nullable',
            'address' => 'nullable',
        ]);

        $drop->name   = $validated['name'];
        $drop->email  = $validated['email'];
        $drop->mobile = $validated['mobile'];
        $drop->status = $validated['status'];
        $drop->status = $validated['gst'];
        $drop->address = $validated['address'];

        if (!empty($validated['password'])) {
            $drop->password = Hash::make($validated['password']);
        }

        $drop->save();

        return redirect()->route('drop.list')->with('success_msg', 'Dropservice user updated successfully.');
    }

    public function seller_edit($id)
    {
        $user = Seller::findOrFail($id);
        return view('admin.seller_edit', compact('user'));
    }

    public function seller_update(Request $request, $id)
    {
        $seller = Seller::findOrFail($id);

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:sellers,email,' . $seller->id,
            'mobile' => 'required|string|max:15|unique:sellers,mobile,' . $seller->id,
            'status' => 'required|in:0,1',
            'password' => 'nullable|min:6',
            'gst' => 'nullable',
            'address' => 'nullable',
        ]);

        $seller->name = $validated['name'];
        $seller->email = $validated['email'];
        $seller->mobile = $validated['mobile'];
        $seller->status = $validated['status'];
        $seller->gst = $validated['gst'] ?? '';
        $seller->address = $validated['address'] ?? '';

        if (!empty($validated['password'])) {
            $seller->password = Hash::make($validated['password']);
        }

        $seller->save();

        return redirect()->route('seller.list')->with('success_msg', 'Seller updated successfully.');
    }

    public function user_edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.normal-user-edit', compact('user'));
    }

    public function user_update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|string|max:15|unique:users,mobile,' . $user->id,
            'status' => 'required|in:0,1',
            'password' => 'nullable|min:6',
            'address' => 'nullable',
        ]); 

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->mobile = $validated['mobile'];
        $user->status = $validated['status'];
        $user->address = $validated['address'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('user.list')->with('success_msg', 'User updated successfully.');
    }

    public function userupdateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success_msg' => 'Status updated successfully.']);
    }

    public function sellerupdateStatus(Request $request, $id)
    {
        $user = Seller::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success_msg' => 'Status updated successfully.']);
    }

    public function dropupdateStatus(Request $request, $id)
    {
        $user = Dropservice::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success_msg' => 'Status updated successfully.']);
    }

    public function accountSettings()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.users-edit', compact('admin'));
    }

    public function updateAccountSettings(Request $request)
    {
        $seller = Auth::guard('admin')->user();

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:sellers,email,' . $seller->id,
            'mobile' => 'required|string|unique:sellers,mobile,' . $seller->id,
            'password' => 'nullable|min:6', // only update if entered
            'status' => 'nullable',
        ]);

        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->mobile = $request->mobile;

        if ($request->password) {
            $seller->password = Hash::make($request->password);
        }

        $seller->save();

        return redirect()->back()->with('success_msg', 'Account settings updated successfully.');
    }

}

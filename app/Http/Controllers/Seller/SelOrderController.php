<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use App\Models\Seller;
use Illuminate\Support\Str;

class SelOrderController extends Controller
{
    
    public function index()
    {
        $sellerId = sellerinfo()->id;

        $orders = Order::with(['user', 'product', 'variant'])
        ->whereHas('product', function ($query) use ($sellerId) {
            $query->where('seller_id', $sellerId); // Only seller's products
        })
        ->latest()->paginate(10);
        return view('seller.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'product', 'variant'])->findOrFail($id);
        return view('seller.orders.show', compact('order'));
    }


    public function create()
    {
        $sellerId = sellerinfo()->id;

        $users = User::where('status', 1)->get();
        
        $products = Product::with('variants')
            ->where('seller_id', $sellerId)
            ->get();
        return view('seller.orders.create', compact('products', 'users'));
    }

    // public function store(Request $request)
    // {
    //     if (!auth('user')->check()) {
    //         abort(403, 'Only customers can place orders.');
    //     }

    //     $request->validate([
    //         'product_id'     => 'required|exists:products,id',
    //         'variant_id'     => 'nullable|exists:product_variants,id',
    //         'quantity'       => 'required|integer|min:1',
    //         'payment_method' => 'required|in:COD,Paid',
    //     ]);

    //     $variant = ProductVariant::find($request->variant_id);
    //     $price = $variant ? $variant->price : Product::find($request->product_id)->base_price;

    //     Order::create([
    //         'user_id'       => auth('user')->id(),
    //         'product_id'    => $request->product_id,
    //         'variant_id'    => $variant->id ?? null,
    //         'quantity'      => $request->quantity,
    //         'price'         => $price * $request->quantity,
    //         'payment_method'=> $request->payment_method,
    //         'status'        => 'placed',
    //         'ip_address'    => $request->ip(),
    //     ]);

    //     return redirect()->route('user.orders')->with('success_msg', 'Order placed successfully.');
    // }

    public function storeFromAdmin(Request $request)
    {
        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'product_id'     => 'required|exists:products,id',
            'variant_id'     => 'nullable|exists:product_variants,id',
            'quantity'       => 'required|integer|min:1',
            'payment_method' => 'required|in:COD,Paid',
            'mobile'         => 'required|string|max:20',
            'address'        => 'required|string',
            'delivery_type'  => 'required|in:VIP,Normal',
        ]);

        $product = Product::findOrFail($request->product_id);
        $variant = $request->variant_id ? ProductVariant::findOrFail($request->variant_id) : null;
        $price   = $variant ? $variant->price : $product->base_price;
        $quantity = $request->quantity;

        if ($variant) {
            if ($variant->stock < $quantity) {
                return redirect()->back()->with('error_msg', 'Not enough stock for this variant.');
            }
        } else {
            // Optional: Check base product stock if applicable
            // if (!isset($product->stock)) {
            //     return redirect()->back()->with('error_msg', 'Stock field not defined for product.');
            // }
            if ($product->stock < $quantity) {
                return redirect()->back()->with('error_msg', 'Not enough stock for this product.');
            }
        }

        $orderNumber = 'ORD-' . strtoupper(Str::random(10)); 

        Order::create([
            'order_number'   => $orderNumber,
            'user_id'        => $request->user_id,
            'product_id'     => $product->id,
            'variant_id'     => $variant?->id,
            'quantity'       => $request->quantity,
            'price'          => $price * $request->quantity,
            'payment_method' => $request->payment_method,
            'status'         => 'placed',
            'ip_address'     => $request->ip(), // IP of admin
            'mobile'         => $request->mobile,
            'address'        => $request->address,
            'delivery_type'  => $request->delivery_type,
        ]);

        if ($variant) {
            $variant->decrement('stock', $quantity);
        }

        $product->decrement('stock', $quantity);

        return redirect()->route('seller.orders.index')->with('success_msg', 'Order placed successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Cancel';
        $order->save();
        // $order->delete();

        return redirect()->back()->with('success_msg', 'Order cancel successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:placed,processing,shipped,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('seller.orders.show', $id)->with('success_msg', 'Order status updated.');
    }

    public function showBill($orderNumber)
    {
        // Get all orders under the same order number
        $orders = Order::where('order_number', $orderNumber)->get();

        if ($orders->isEmpty()) {
            abort(404, 'Order not found.');
        }

        // Common user (same for all orders)
        $user = User::find($orders->first()->user_id);

        // Collect product, variant, and seller info for each order item
        $orderDetails = $orders->map(function ($order) {
            $product = Product::find($order->product_id);
            $variant = ProductVariant::find($order->variant_id);
            $seller  = Seller::find($product->seller_id ?? null);

            return [
                'order'   => $order,
                'product' => $product,
                'variant' => $variant,
                'seller'  => $seller,
            ];
        });

        return view('seller.gst-invoice', compact('orderDetails', 'user', 'orderNumber'));
    }

}

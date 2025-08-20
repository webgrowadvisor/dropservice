<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Dropservice; // assuming dropshipper model is named Dropshiper
use App\Models\User; // assuming dropshipper model is named Dropshiper
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DropshipperOrderController extends Controller
{
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dropshiper_id' => 'required|exists:dropservices,id',
            'product_id'    => 'required|exists:products,id',
            'variant_id'    => 'nullable|exists:product_variants,id',
            'quantity'      => 'required|integer|min:1',
            'price'         => 'required|numeric',
            'mobile'        => 'required|string',
            'address'       => 'required|string',
            'payment_method'=> 'nullable|string|in:cod,paid',
            'delivery_type' => 'nullable|string|in:normal,vip',
            'name'          => 'nullable|string|max:255', // optional
            'dropshiper_invoice_no' => 'nullable|string|max:255',
            'dropshiper_sale_price' => 'nullable|numeric',
            'dropshiper_other'      => 'nullable|array', // optional meta info
        ]);

        $drop = Dropservice::findOrFail($validated['dropshiper_id']);

        // Find or create user by mobile
        $user = User::where('mobile', $validated['mobile'])->first();

        if (!$user) {
            $user = User::create([
                'name'     => $validated['name'] ?? 'Guest User',
                'mobile'   => $validated['mobile'],
                'email'    => $drop->name.'_'. uniqid() . '@example.com',
                'password' => Hash::make('123456'), // default password (optional)
            ]);
        }

        // Generate order number
        $orderNumber = 'ORD-' . strtoupper(Str::random(8));

        // Create order
        $order = Order::create([
            'user_id'        => $user->id,
            'order_number'   => $orderNumber,
            'dropshiper_id'  => $validated['dropshiper_id'],
            'product_id'     => $validated['product_id'],
            'variant_id'     => $validated['variant_id'] ?? null,
            'quantity'       => $validated['quantity'],
            'price'          => $validated['price'],
            'status'         => 'placed',
            'payment_method' => $validated['payment_method'] ?? 'cod',
            'ip_address'     => $request->ip(),
            'mobile'         => $validated['mobile'],
            'address'        => $validated['address'],
            'delivery_type'  => $validated['delivery_type'] ?? 'normal',
            'dropshiper_invoice_no' => $validated['dropshiper_invoice_no'] ?? null,
            'dropshiper_sale_price' => $validated['dropshiper_sale_price'] ?? $validated['price'],
            'dropshiper_other'      => isset($validated['dropshiper_other']) ? json_encode($validated['dropshiper_other']) : null,
        ]);

        // ↓ Decrement product stock
        $product = Product::find($validated['product_id']);
        if ($product && $product->stock >= $validated['quantity']) {
            $product->decrement('stock', $validated['quantity']);
        }

        // ↓ Decrement variant stock (if applicable)
        if (!empty($validated['variant_id'])) {
            $variant = ProductVariant::find($validated['variant_id']);
            if ($variant && $variant->stock >= $validated['quantity']) {
                $variant->decrement('stock', $validated['quantity']);
            }
        }

        return response()->json([
            'status'       => true,
            'message'      => 'Order placed successfully.',
            'order_number' => $order->order_number,
            'order_id'     => $order->id,
            'user_id'      => $user->id,
        ]);
    }

}

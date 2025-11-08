<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity ?? 1;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $request->quantity ?? 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success_msg' => true, 'message' => 'Item added to cart']);
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;
        $qty = $request->quantity;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $qty;
            session()->put('cart', $cart);
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $delivery = (count($cart) > 0) ? 10 : 0;
        $total = $subtotal + $delivery;
        $saving = collect($cart)->sum(fn($item) => ($item['mrp'] - $item['price']) * $item['quantity']);

        $html = View::make('front.layout.cartHtml', compact('cart', 'subtotal', 'delivery', 'total', 'saving'))->render();

        return response()->json(['success_msg' => true, 'html' => $html, 'cart' => count($cart), 'message' => 'Cart updated']);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->id]);
        session()->put('cart', $cart);

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $delivery = (count($cart) > 0) ? 10 : 0;
        $total = $subtotal + $delivery;
        $saving = collect($cart)->sum(fn($item) => ($item['mrp'] - $item['price']) * $item['quantity']);

        $html = View::make('front.layout.cartHtml', compact('cart', 'subtotal', 'delivery', 'total', 'saving'))->render();

        
            
        return response()->json(['success_msg' => true, 'html' => $html, 'cart' => count($cart), 'message' => 'Item removed']);
    }

    public function sidebar()
    {
        return view('front.layout.cart');
    }

    public function getCartHtml(Request $request)
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $delivery = (count($cart) > 0) ? 10 : 0;
        $total = $subtotal + $delivery;
        $saving = collect($cart)->sum(fn($item) => ($item['mrp'] - $item['price']) * $item['quantity']);

        // Render a Blade view and capture it as HTML
        $html = View::make('front.layout.cartHtml', compact('cart', 'subtotal', 'delivery', 'total', 'saving'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'cart' => count($cart)
        ]);
    }

}

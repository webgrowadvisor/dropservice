<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;
use session;

class CustomContoller extends Controller
{
    
    public function store_address(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'address_line' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
        ]);

        UserAddress::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'address_line' => $request->address_line,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'country' => $request->country ?? 'India',
        ]);

        return redirect()->back()->with('success_msg', 'Address added successfully!');
    }

    public function update_address(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'address_line' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
        ]);

        $address = UserAddress::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $address->update([
            'type' => $request->type,
            'address_line' => $request->address_line,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'country' => $request->country ?? 'India',
        ]);

        return redirect()->back()->with('success_msg', 'Address updated successfully!');
    }

    public function delete_address($id)
    {
        $address = UserAddress::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $address->delete();

        return redirect()->back()->with('success_msg', 'Address deleted successfully!');
    }


    // Add or Remove product from wishlist
    public function toggle(Request $request, $productId)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Not logged in'], 401);
        }

        $user = Auth::user();

        // Check if already exists
        $wishlist = Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($wishlist) {
            // Remove if already in wishlist
            $wishlist->delete();
            return response()->json(['status' => 'removed', 'message' => 'Removed from wishlist']);
        } else {
            // Add if not exists
            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            return response()->json(['status' => 'added', 'message' => 'Added to wishlist']);
        }
    }


    public function add_to_cart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $qty = $request->quantity ?? 1;

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->base_price,
                'mrp' => $product->mrp_price,
                'image' => $product->thumbnail,
                'quantity' => $qty
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'success_msg' => $product->name . 'add in to cart']);
    }


}

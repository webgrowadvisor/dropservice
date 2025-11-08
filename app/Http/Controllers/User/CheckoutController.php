<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserAddress;
use App\Models\Wishlist;
use App\Models\Order;

class CheckoutController extends Controller
{
    

    public function process(Request $request)
    {
        // dd($request->post());

        $request->validate([
            'address_id' => 'required|exists:user_addresses,id',
            'payment_method' => 'required|in:cashondelivery,card',
            'delivery_date' => 'required|string',
            'delivery_time' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json(['status' => 'error', 'message' => 'Your cart is empty.']);
        }

        // Optional OTP check (if COD)
        // if ($request->payment_method === 'cashondelivery' && session('otp_verified') !== true) {
        //     return response()->json(['status' => 'error', 'message' => 'Please verify OTP first.']);
        // }

        // Get address info
        $address = \App\Models\UserAddress::find($request->address_id);

        // Loop through cart items and create separate orders (if one per product)
        $orderId = 'ORD' . strtoupper(uniqid());
        foreach ($cart as $id => $item) {
            Order::create([
                'user_id' => auth()->id(),
                'order_number' => $orderId,
                'dropshiper_id' => $item['dropshiper_id'] ?? null,
                'product_id' => $id,
                'variant_id' => $item['variant_id'] ?? null,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'status' => $request->payment_method === 'cashondelivery' ? 'placed' : 'pending',
                'payment_method' => $request->payment_method === 'cashondelivery' ? 'cod' : 'paid',
                'ip_address' => $request->ip(),
                'mobile' => $address->mobile ?? auth()->user()->mobile ?? null,
                'address' => $address->address_line . ', ' . $address->city . ', ' . $address->state . ' - ' . $address->pincode,
                'delivery_type' => $request->delivery_date == 'today' ? 'VIP' : 'Normal',
                'delivery_date' => $request->delivery_date,
                'delivery_time' => $request->delivery_time,
                'dropshiper_invoice_no' => null,
                'dropshiper_sale_price' => null,
                'dropshiper_other' => null,
            ]);
        }

        // Clear cart
        Session::forget('cart');

        return response()->json([
            'status' => 'success',
            'message' => 'Order placed successfully!',
        ]);

    }

    public function sendOtp(Request $request)
    {
        $phone = $request->phone;

        // generate random 4-digit OTP
        $otp = rand(1000, 9999);

        // store in session (you can save to DB if needed)
        Session::put('checkout_otp', $otp);
        Session::put('checkout_phone', $phone);

        // simulate sending OTP (real API later)
        // You can integrate Twilio, MSG91, Fast2SMS etc.
        return response()->json([
            'status' => 'success',
            'message' => 'OTP sent successfully',
            'otp' => $otp // remove this in production
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $enteredOtp = $request->otp;
        $storedOtp = Session::get('checkout_otp');

        if ($enteredOtp == $storedOtp) {
            Session::forget('checkout_otp');
            Session::put('otp_verified', true);

            return response()->json([
                'status' => 'verified',
                'message' => 'OTP verified successfully'
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'Invalid OTP. Please try again.'
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'address_line' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
        ]);

        UserAddress::create([
            'user_id' => auth()->id(),
            'type' => $request->type ?? 'Home',
            'address_line' => $request->address_line,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'country' => $request->country ?? 'India'
        ]);

        return response()->json(['status' => 'success']);
    }



    public function remove(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
}

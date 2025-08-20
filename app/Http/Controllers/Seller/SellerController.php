<?php

namespace App\Http\Controllers\Seller;

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
use App\Models\ProductVariant;
use App\Models\Order;

class SellerController extends Controller
{

    public function index (){
        // dd(Auth::guard('seller')->user());
        return view('seller.dashboard');
    }

    public function accountSettings()
    {
        $seller = Auth::guard('seller')->user();
        return view('seller.users-edit', compact('seller'));
    }

    public function updateAccountSettings(Request $request)
    {
        $seller = Auth::guard('seller')->user();

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:sellers,email,' . $seller->id,
            'mobile' => 'required|string|unique:sellers,mobile,' . $seller->id,
            'password' => 'nullable|min:6', // only update if entered
            'status' => 'nullable',
            'gst' => 'required',
            'logo'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gst_image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $paths = uploadWebp($request->file('logo'), 'seller_logo');
            $seller->logo = $paths['webp'] ?? $paths['image'];
        }
        if ($request->hasFile('gst_image')) {
            $paths = uploadWebp($request->file('gst_image'), 'seller_gstfile');
            $seller->gst_image = $paths['webp'] ?? $paths['image'];
        }

        $seller->status = $request->status;
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->mobile = $request->mobile;
        $seller->gst = $request->gst;

        if ($request->password) {
            $seller->password = Hash::make($request->password);
        }

        $seller->save();

        return redirect()->back()->with('success_msg', 'Account settings updated successfully.');
    }

}

<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandRequest;
use Auth;

class BrandRequestController extends Controller
{
    
    public function index()
    {
        $seller = auth('seller')->user();
        $brands = BrandRequest::where('seller_id', $seller->id)->latest()->paginate('10');
        return view('seller.brand_request.index', compact('brands'));
    }

    public function create()
    {
        return view('seller.brand_request.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'gst_certificate' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'brand_certificate' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $brandPath = null;
        if ($request->hasFile('brand_certificate')) {
            $brandCertPath = uploadWebp($request->file('brand_certificate'), 'brand_certificate');
            $brandPath = $brandCertPath['webp'] ?? $brandCertPath['original'];
        }

        $filePath = null;
        if ($request->hasFile('gst_certificate')) {
            $paths = uploadWebp($request->file('gst_certificate'), 'gst_certificate');
            $filePath = $paths['webp'] ?? $paths['original'];
        }

        BrandRequest::create([
            'seller_id' => auth()->id(),
            'brand_name' => $request->brand_name,
            'brand_certificate' => $brandPath,
            'gst_certificate' => $filePath,
        ]);

        return redirect()->back()->with('success_msg', 'Brand request submitted successfully!');
    }

}

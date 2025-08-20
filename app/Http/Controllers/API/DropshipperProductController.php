<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;

class DropshipperProductController extends Controller
{
    
    public function index(Request $request)
    {
        // Validate inputs
        $request->validate([
            'api_key' => 'required',
            'limit'   => 'nullable|integer|min:1|max:100',
        ]);

        // Check seller by API key
        $seller = Seller::where('api_key', $request->api_key)->first();

        if (!$seller) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid API Key',
            ], 401);
        }

        // Get products with limit (default 10)
        $limit = $request->limit ?? 10;

        $products = Product::with(['variants', 'category'])
            ->where('seller_id', $seller->id)
            ->where('status', 1)
            ->latest()
            ->take($limit)
            ->get()
            ->map(function ($product) {
                // Add full URL for thumbnail
                $product->thumbnail = $product->thumbnail_url;

                // Add full URLs to variant images
                $product->variants->map(function ($variant) {
                    $variant->image = $variant->image_url;
                    $variant->webp  = $variant->webp_url;
                    return $variant;
                });

                return $product;
            });

        return response()->json([
            'status' => true,
            'seller' => [
                'id' => $seller->id,
                'name' => $seller->name,
            ],
            'products' => $products,
        ]);
    }


    public function showSingleProduct($slug)
    {
        $product = Product::with(['variants', 'category', 'seller'])
                    ->where('slug', $slug)
                    ->where('status', 1)
                    ->first();

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ], 404);
        }

        // Hide sensitive seller data
        // $product->seller->makeHidden(['email', 'mobile', 'gst', 'address']);

        return response()->json([
            'status' => true,
            'product' => $product,
        ]);
    }
    
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class PublicProductController extends Controller
{
    public function newProducts(Request $request)
    {
        $limit = $request->limit ?? 10;

        // Get first day and last day of current month
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        // Fetch products created this month
        $products = Product::with(['variants', 'category', 'seller'])
            ->where('status', 1)
            ->whereBetween('created_at', [$start, $end])
            ->latest()
            ->take($limit)
            ->get()
            ->map(function ($product) {
                // Convert thumbnail to full URL
                $product->thumbnail = $product->thumbnail_url;

                // Add full URLs for variants
                $product->variants->map(function ($variant) {
                    $variant->image = $variant->image_url;
                    $variant->webp  = $variant->webp_url;
                    return $variant;
                });

                return $product;
            });

        return response()->json([
            'status' => true,
            'products' => $products,
        ]);
    }
}

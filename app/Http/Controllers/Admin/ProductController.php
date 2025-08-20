<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\SpecificationGroup;
use App\Models\ProductFaq;
use App\Models\Brand;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    
    // Show all products
    public function index()
    {
        $products = Product::with(['seller', 'variants'])->latest()->paginate(10);
        return view('admin.products.product', compact('products'));
    }

    // Show form to create product
    public function create()
    {
        $sellers = Seller::all();
        $brands = Brand::all();
        $specGroups = SpecificationGroup::with('attributes')->get();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('admin.products.add-product', compact('sellers', 'categories', 'specGroups', 'brands'));
    }

    // Store product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'condition'   => 'required',
            'seller_id'   => 'required|exists:sellers,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'base_price'  => 'required|numeric',
            'mrp_price'  => 'required|numeric',
            'status'      => 'required|boolean',
            'brand'    => 'required|integer',
            'slug'    => 'nullable|string|max:255|unique:products,slug',
            'total_stock'    => 'required',
            'product_specail'    => 'nullable',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'weight'    => 'required',
            'length'    => 'required',
            'width'    => 'required',
            'height'    => 'required',
            'label'    => 'required',
            'product_type'    => 'required',
            'cgst'    => 'required',
            'sgst'    => 'required',
            'variants.*.sku'     => 'required|string',
            'variants.*.price'   => 'required|numeric',
            'variants.*.stock'   => 'required|integer',
            'variants.*.options' => 'nullable|string',
            'variant_images.*'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload thumbnail if present
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $paths = uploadWebp($request->file('thumbnail'), 'product_thumbnails');
            $thumbnailPath = $paths['webp']; // or use 'original' if you want
        }

        $product = Product::create([
            'condition'   => $validated['condition'] ?? '',
            'seller_id'   => $validated['seller_id'] ?? '',
            'category_id'   => $validated['category_id'] ?? '',
            'name'        => $validated['name'] ?? '',
            'slug' => Str::slug($validated['slug']) ?? Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'base_price'  => $validated['base_price'] ?? '',
            'mrp_price'  => $validated['mrp_price'] ?? '',
            'status'      => $validated['status'] ?? '',
            'brand_id'      => $validated['brand'] ?? '',
            'product_specail' => $validated['product_specail'] ?? '',
            'thumbnail'   => $thumbnailPath,
            'stock' => $validated['total_stock'] ?? '',
            'weight'    => $validated['weight'],
            'length'    => $validated['length'],
            'width'    => $validated['width'],
            'height'    => $validated['height'],
            'label'    => $validated['label'],
            'product_type'    => $validated['product_type'],
            'cgst'    => $validated['cgst'],
            'sgst'    => $validated['sgst'],
        ]);

        if ($request->has('specifications')) {
            foreach ($request->specifications as $attributeId => $value) {
                $product->specifications()->create([
                    'specification_attribute_id' => $attributeId,
                    'value' => $value,
                ]);
            }
        }

        if ($request->has('faqs')) {
            foreach ($request->faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $product->faqs()->create([
                        'question' => $faq['question'],
                        'answer'   => $faq['answer'],
                    ]);
                }
            }
        }

        foreach ($request->variants as $i => $variant) {
            
            $imagePath = null;

            if ($request->hasFile('variant_images') && isset($request->variant_images[$i])) {
                $imagePath = uploadWebp($request->variant_images[$i], 'variant_images');
            }
            
            $product->variants()->create([
                'sku'     => $variant['sku'] ?? rand(999,9999),
                'price'   => $variant['price'] ?? '',
                'stock'   => $variant['stock'] ?? '1',
                'options' => $variant['options'] ?? null,
                'image'   => $imagePath['original'] ?? '',
                'webp'   => $imagePath['webp'] ?? '',
            ]);
        }

        return redirect()->route('ad.products.index')->with('success_msg', 'Product and variants created successfully.');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::with('variants')->findOrFail($id);

        // Delete product thumbnail if it exists
        if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
            Storage::disk('public')->delete($product->thumbnail);
        }

        // Loop through variants and delete images
        foreach ($product->variants as $variant) {
            if ($variant->image && Storage::disk('public')->exists($variant->image)) {
                Storage::disk('public')->delete($variant->image);
            }

            if ($variant->webp && Storage::disk('public')->exists($variant->webp)) {
                Storage::disk('public')->delete($variant->webp);
            }
        }

        // Delete variants from DB
        $product->variants()->delete();

        $product->specifications()->delete();
        $product->faqs()->delete();

        // Delete product from DB
        $product->delete();

        return redirect()->back()->with('success_msg', 'Product and images deleted successfully.');
    }

    public function edit($id)
    {
        $sellers = Seller::all();
        $brands = Brand::all();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $specGroups = SpecificationGroup::with('attributes')->get();
        $product = Product::with(['variants', 'specifications.attribute'])->findOrFail($id);
        return view('admin.products.product-edit', compact('product', 'sellers', 'categories', 'specGroups', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'condition'   => 'required',
            'seller_id'   => 'required|exists:sellers,id',
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'base_price'  => 'required|numeric',
            'mrp_price'  => 'required|numeric',
            'slug'    => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'status'      => 'required|boolean',
            'brand'    => 'required|integer',
            'total_stock'    => 'required',
            'product_specail'    => 'nullable',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'weight'    => 'required',
            'length'    => 'required',
            'width'    => 'required',
            'height'    => 'required',
            'label'    => 'required',
            'product_type'    => 'required',
            'cgst'    => 'required',
            'sgst'    => 'required',
            'variants.*.sku'     => 'required|string',
            'variants.*.price'   => 'required|numeric',
            'variants.*.stock'   => 'required|integer',
            'variants.*.options' => 'nullable|string',
            'variant_images.*'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // $product = Product::findOrFail($id);

        // Handle thumbnail update
        if ($request->hasFile('thumbnail')) {
            $paths = uploadWebp($request->file('thumbnail'), 'product_thumbnails');
            $product->thumbnail = $paths['webp'];
        }

        $product->update([
            'condition'   => $validated['condition'] ?? '',
            'seller_id'   => $validated['seller_id'],
            'category_id'   => $validated['category_id'],
            'name'        => $validated['name'],
            'slug' => Str::slug($validated['slug']) ?? Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'base_price'  => $validated['base_price'],
            'mrp_price'  => $validated['mrp_price'],
            'status'      => $validated['status'],
            'brand_id'      => $validated['brand'],
            'product_specail' => $validated['product_specail'],
            'stock' => $validated['total_stock'],
            'weight'    => $validated['weight'],
            'length'    => $validated['length'],
            'width'    => $validated['width'],
            'height'    => $validated['height'],
            'label'    => $validated['label'],
            'product_type'    => $validated['product_type'],
            'cgst'    => $validated['cgst'],
            'sgst'    => $validated['sgst'],
        ]);

        if ($request->has('specifications')) {
            foreach ($request->specifications as $attributeId => $value) {
                $product->specifications()->updateOrCreate(
                    ['specification_attribute_id' => $attributeId],
                    ['value' => $value]
                );
            }
        }

        
        if ($request->has('faqs')) {

            $product->faqs()->delete(); // remove old ones

            foreach ($request->faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $product->faqs()->create([
                        'question' => $faq['question'],
                        'answer'   => $faq['answer'],
                    ]);
                }
            }
        }

        // Step 1: Get old variants (you must have loaded them before this)
        $oldVariants = $product->variants;

        // Delete old variants and recreate
        $product->variants()->delete();

        foreach ($request->variants as $i => $variant) {
            
            $imagePath = [
                'original' => '',
                'webp' => '',
            ];

            // Check if image uploaded for this variant
            if ($request->hasFile('variant_images') && isset($request->variant_images[$i])) {

                // Delete old image if exists for this index
                if (isset($oldVariants[$i])) {
                    $old = $oldVariants[$i];

                    if ($old->image && Storage::disk('public')->exists($old->image)) {
                        Storage::disk('public')->delete($old->image);
                    }
                    if ($old->webp && Storage::disk('public')->exists($old->webp)) {
                        Storage::disk('public')->delete($old->webp);
                    }
                }

                // Upload new image
                $imagePath = uploadWebp($request->variant_images[$i], 'variant_images');
            } else {
                // No new image uploaded — reuse old image paths if available
                if (isset($oldVariants[$i])) {
                    $imagePath['original'] = $oldVariants[$i]->image;
                    $imagePath['webp'] = $oldVariants[$i]->webp;
                }
            }

            $product->variants()->create([
                'sku'     => $variant['sku'],
                'price'   => $variant['price'],
                'stock'   => $variant['stock'],
                'options' => $variant['options'] ?? null,
                'image'   => $imagePath['original'] ?? '',
                'webp'    => $imagePath['webp'] ?? '',
            ]);
        }

        return redirect()->route('ad.products.index')->with('success_msg', 'Product updated successfully.');
    }

    public function Status(Request $request, $id)
    {
        $user = Product::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success_msg' => 'Status updated successfully.']);
    }

}

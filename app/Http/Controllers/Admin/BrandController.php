<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Str;

class BrandController extends Controller
{
    
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name|max:255',
        ]);

        Brand::create([
            'status' => $request->status,
            'name' => $request->name,
            'slug' => Str::slug($request->slug) ?? Str::slug($request->name),
        ]);

        return redirect()->route('brands.index')->with('success_msg', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,' . $brand->id,
        ]);

        $brand->update([
            'name' => $request->name,
            'status' => $request->status,
            'slug' => Str::slug($request->slug) ?? Str::slug($request->name),
        ]);

        return redirect()->route('brands.index')->with('success_msg', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $productCount = $brand->products()->count();

        if ($productCount > 0) {
            return redirect()->route('brands.index')
                ->with('error_msg', 'Cannot delete brand. It is associated with existing products.');
        }

        $brand->delete();
        return redirect()->route('brands.index')->with('success_msg', 'Brand deleted successfully.');
    }

}

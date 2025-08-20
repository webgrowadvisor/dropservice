<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class SelCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')
        ->whereNull('parent_id')
        ->orderBy('name')
        ->paginate(10);
        return view('seller.category.category', compact('categories'));
    }

    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('seller.category.add-category', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:categories,slug',
            'parent_id' => 'required|exists:categories,id',
            'status'    => 'required|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        Category::create($validated);

        return redirect()->route('ad.category.index')->with('success_msg', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::whereNull('parent_id')
        ->where('id', '!=', $id)->get(); // exclude self as parent

        return view('seller.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'parent_id' => 'required|exists:categories,id',
            'status'    => 'required|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $category->update($validated);

        return redirect()->route('ad.category.index')->with('success_msg', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::with(['children', 'products'])->findOrFail($id);

        // Check if this category or any of its children has products
        $productCount = $category->products()->count();

        foreach ($category->children as $child) {
            $productCount += $child->products()->count();
        }

        if ($productCount > 0) {
            return redirect()->back()->with('error_msg', 'Cannot delete. Category contains products.');
        }

        // If no products, delete child categories then category
        $category->children()->delete();
        $category->delete();

        return redirect()->back()->with('success_msg', 'Category deleted successfully.');
    }

    public function Status(Request $request, $id)
    {
        $user = Category::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success_msg' => 'Status updated successfully.']);
    }
}

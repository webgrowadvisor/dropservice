<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    
    public function index()
    {
        $pages = Page::latest()->paginate('10');
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'status' => 'required|string',
            'slug' => 'required|string|unique:pages,slug',
            'content' => 'nullable|string',
        ]);

        Page::create($request->all());
        return redirect()->route('pages.index')->with('success_msg', 'Page Created Successfully');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string',
            'status' => 'required|string',
            'slug' => 'required|string|unique:pages,slug,' . $page->id,
            'content' => 'nullable|string',
        ]);

        $page->update($request->all());
        return redirect()->route('pages.index')->with('success_msg', 'Page Updated Successfully');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success_msg', 'Page Deleted');
    }

}

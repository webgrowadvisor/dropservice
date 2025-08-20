<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecificationGroup;
use App\Models\SpecificationAttribute;

class SpecificationGroupController extends Controller
{
    
    public function index() {
        $groups = SpecificationGroup::latest()->paginate('10');
        return view('admin.groups.index', compact('groups'));
    }

    public function create() {
        return view('admin.groups.create');
    }

    public function store(Request $request) {
       $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        SpecificationGroup::create($request->only(['name', 'description', 'status']));

        return redirect()->route('groups.index')->with('success_msg', 'Group created.');
    }

    public function edit($id)
    {
        $grupe = SpecificationGroup::findOrFail($id);
        return view('admin.groups.edit', compact('grupe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        $group = SpecificationGroup::findOrFail($id);
        $group->update($request->only(['name', 'description', 'status']));

        return redirect()->route('groups.index')->with('success_msg', 'Specification group updated successfully.');
    }

    public function destroy($id)
    {
        // SpecificationGroup::findOrFail($id)->delete();
        $group = SpecificationGroup::withCount('attributes')->findOrFail($id);

        // Check if group has any associated attributes
        if ($group->attributes_count > 0) {
            return redirect()->back()->with('error_msg', 'Cannot delete group. It has associated attributes.');
        }

        $group->delete();
        return redirect()->back()->with('success_msg', 'Group deleted successfully.');
    }

}

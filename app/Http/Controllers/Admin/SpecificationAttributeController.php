<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecificationGroup;
use App\Models\SpecificationAttribute;

class SpecificationAttributeController extends Controller
{
    
    public function index() {
        $attributes = SpecificationAttribute::with('group')->latest()->paginate('10');
        return view('admin.attributes.index', compact('attributes'));
    }

    public function create() {
        $groups = SpecificationGroup::all();
        return view('admin.attributes.create', compact('groups'));
    }

    public function store(Request $request) {
        $request->validate([
            'group_id' => 'required|exists:specification_groups,id',
            'name' => 'required',
            'field_type' => 'required|in:text,textarea,select,checkbox,radio',
            'default_value' => 'nullable'
        ]);
        SpecificationAttribute::create($request->only('group_id', 'name', 'field_type', 'default_value'));
        return redirect()->route('attributes.create')->with('success_msg', 'Attribute created.');
    }

    public function edit($id)
    {
        $attribute = SpecificationAttribute::findOrFail($id);
        $groups = SpecificationGroup::all();
        return view('admin.attributes.edit', compact('attribute', 'groups'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'group_id'      => 'required|exists:specification_groups,id',
            'name'          => 'required',
            'field_type'    => 'required|in:text,textarea,select,checkbox,radio',
            'default_value' => 'nullable'
        ]);

        $attribute = SpecificationAttribute::findOrFail($id);
        $attribute->update($request->only('group_id', 'name', 'field_type', 'default_value'));

        return redirect()->route('attributes.index')->with('success_msg', 'Attribute updated successfully.');
    }

    // Delete
    public function destroy($id)
    {
        $attribute = SpecificationAttribute::findOrFail($id);
        $attribute->delete();

        return redirect()->back()->with('success_msg', 'Attribute deleted successfully.');
    }

    

}

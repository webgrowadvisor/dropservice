<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DropPackage;

class DropPackageController extends Controller
{
    
    public function index()
    {
        $packages = DropPackage::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'price'         => 'required|numeric',
            'duration_days' => 'required|integer',
            'commission' => 'required|integer',
            'status' => 'required|integer',
            'features'      => 'required|array|min:1',
        ]);

        DropPackage::create($request->all());

        return redirect()->route('ad.packages.index')->with('success_msg', 'Package created');
    }

    public function edit($id)
    {
        $package = DropPackage::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'price'         => 'required|numeric',
            'duration_days' => 'required|integer',
            'commission' => 'required|integer',
            'status' => 'required|integer',
            'features'      => 'required|array|min:1',
        ]);

        $package = DropPackage::findOrFail($id);
        $package->update($request->all());

        return redirect()->route('ad.packages.index')->with('success_msg', 'Package updated');
    }

    public function destroy($id)
    {
        DropPackage::destroy($id);
        return back()->with('success_msg', 'Package deleted');
    }

}

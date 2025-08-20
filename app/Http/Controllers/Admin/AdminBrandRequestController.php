<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandRequest;

class AdminBrandRequestController extends Controller
{
    
    public function index()
    {
        $requests = BrandRequest::with('seller')->latest()->paginate(20);
        return view('admin.brand_request.index', compact('requests'));
    }

    public function approve($id)
    {
        $request = BrandRequest::findOrFail($id);
        $request->update(['status' => 'approved']);
        return back()->with('success_msg', 'Brand approved successfully.');
    }

    public function reject($id)
    {
        $request = BrandRequest::findOrFail($id);
        $request->update(['status' => 'rejected']);
        return back()->with('success_msg', 'Brand rejected.');
    }

}

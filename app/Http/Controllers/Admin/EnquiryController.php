<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductEnquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = ProductEnquiry::with('product')->latest()->paginate(15);
        return view('admin.enquiries.index', compact('enquiries'));
    }
}

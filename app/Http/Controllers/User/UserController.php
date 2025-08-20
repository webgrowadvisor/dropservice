<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Dropservice;
use App\Models\User;

class UserController extends Controller
{
    public function index (){
        dd(Auth::guard('web')->user());
        return view('admin.dashboard');
    }
}

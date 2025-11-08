<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Dropservice;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    
    public function user_check(Request $request)
    {
        // Validation
        $request->validate([
            'mobile' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
            // Login successful
            return redirect()->route('dashboard_overview');
        }

        // Login failed
        return back()->withErrors([
            'password' => 'Invalid credentials.',
        ])->withInput();
    }

    public function admin_check(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            // Login successful
            return redirect()->route('admin.dashboard')->with('success_msg', value: 'Welcome '.Auth::guard('admin')->user()->name); 
        }
        // Login failed
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function admin_register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|digits:10|unique:admins,mobile',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }


    public function seller_check(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('seller')->attempt($credentials)) {
            // Login successful
            return redirect()->route('seller.dashboard')->with('success_msg', 'Welcome '.Auth::guard('seller')->user()->name); // आप अपनी डैशबोर्ड रूट का नाम यहां दें
        }
        // Login failed
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function seller_register(Request $request, $level = '1')
    {
        if($level == '1'){

            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:admins,email',
                'mobile' => 'required|digits:10|unique:admins,mobile',
                'password' => 'required|min:6|confirmed',
            ]);

            $admin = Seller::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'api_key' => Str::random(60),
                'gst' => $level == '2' ? $request->gst : null,
            ]); 

            Auth::guard('seller')->login($admin);

            return redirect()->route('seller.singup', '2');
        }

        $seller = Auth::guard('seller')->user();
        $seller->gst = $request->gst;
        $seller->save();
        // Auth::guard('seller')->login($admin);
        return redirect()->route('seller.dashboard')->with('success_msg', 'Welcome '.Auth::guard('seller')->user()->name);
    }


    public function dropservice_check(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('dropservice')->attempt($credentials)) {
            // Login successful
            return redirect()->route('drop.dashboard')->with('success_msg', value: 'Welcome '.Auth::guard('dropservice')->user()->name); // आप अपनी डैशबोर्ड रूट का नाम यहां दें
        }
        // Login failed
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function drop_register(Request $request, $level = '1')
    {
        if($level == '1'){
            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:admins,email',
                'mobile' => 'required|digits:10|unique:admins,mobile',
                'password' => 'required|min:6|confirmed',
            ]);

            $admin = Dropservice::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'api_key' => Str::uuid(),
                'gst' => $level == '2' ? $request->gst : null,
            ]);

            Auth::guard('dropservice')->login($admin);
            return redirect()->route('drop.singup', '2');
        }

        $dropservice = Auth::guard('dropservice')->user();
        $dropservice->gst = $request->gst;
        $dropservice->save();

        return redirect()->route('drop.dashboard')->with('success_msg', value: 'Welcome '.Auth::guard('dropservice')->user()->name);
    }

    public function user_logout(){
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }

    public function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }

    public function seller_logout(){
        Auth::guard('seller')->logout();
        return redirect()->route('home');
    }

    public function drop_logout(){
        Auth::guard('dropservice')->logout();
        return redirect()->route('home');
    }


}

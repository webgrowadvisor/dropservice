<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Dropservice;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserAddress;
use App\Models\Wishlist;
use App\Models\Order;
use session;

class UserController extends Controller
{
    // public function index (){
    //     dd(Auth::guard('web')->user());
    //     return view('admin.dashboard');
    // }
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'mobile'   => 'required|string|max:15|unique:users,mobile',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'mobile'   => $request->mobile,
            'password' => Hash::make($request->password),
            'status'   => 1,
        ]);

        // auto-login user after register (optional)
        auth()->login($user);

        return redirect('/')->with('success_msg', 'Registration successful! Welcome to Grocery Store.');
    }

    public function index()
    {
        // dd(Auth::guard('web')->user());
        $categories = Category::whereNull('parent_id')->where('status', 1)->with('children')->get();
        $products = Product::where('status', 1)
            ->with(['variants', 'category'])
            ->latest()
            ->paginate(12);

        return view('front.index', compact('categories', 'products'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()
            ->where('status', 1)
            ->with('variants')
            ->paginate(12);

        return view('front.category', compact('category', 'products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['variants', 'specifications', 'faqs', 'reviews'])
            ->firstOrFail();

        return view('front.single_product_view', compact('product'));
    }

    public function dashboard_overview()
    {
        return view('front.dashboard_overview');
    }

    public function dashboard_my_orders()
    {
        $orders = Order::with('product') // or your related models
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

        return view('front.dashboard_my_orders', compact('orders'));
    }

    public function dashboard_my_wallet()
    {
        return view('front.dashboard_my_wallet');
    }

    public function dashboard_my_wishlist()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('front.dashboard_my_wishlist', compact('wishlists'));
    }

    public function dashboard_my_addresses()
    {
        $addresses = UserAddress::where('user_id', Auth::id())->get();
        return view('front.dashboard_my_addresses', compact('addresses'));
        // return view('front.dashboard_my_addresses');
    }

    public function shop_grid()
    {
        $products = Product::where('status', 1)
            ->with(['variants', 'category'])
            ->latest()
            ->paginate(12);

        return view('front.shop_grid', compact('products'));
    }
    
    public function contact_us()
    {
        return view('front.contact_us');
    }

    public function aboutus()
    {
        return view('front.aboutus');
    }
    
    public function single_product_view($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['variants', 'category', 'specifications', 'faqs', 'reviews'])
            ->firstOrFail();

        $products = Product::where('status', 1)
            ->with(['variants', 'category'])
            ->latest()
            ->paginate(12);

        return view('front.single_product_view', compact('product', 'products'));
    }

    public function checkout()
    {
        // return view('front.checkout');
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect(route('dashboard_overview'))->with('error_msg', 'Your cart is empty');
        }

        $user = auth()->user();
        $addresses = $user ? $user->addresses : collect();

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $delivery = (count($cart) > 0) ? 10 : 0;
        $total = $subtotal + $delivery;
        $saving = collect($cart)->sum(fn($item) => ($item['mrp'] - $item['price']) * $item['quantity']);

        return view('front.checkout', compact('cart', 'subtotal', 'delivery', 'total', 'saving', 'addresses'));
    }
    

}

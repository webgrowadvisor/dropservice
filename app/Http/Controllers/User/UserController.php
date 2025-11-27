<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Dropservice;
use App\Models\User;
use App\Models\Page;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserAddress;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\ServiceLocation;
use App\Models\ProductEnquiry;
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
        $locations = ServiceLocation::where('status', 1)->get();
        return view('front.contact_us', compact('locations'));
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
    

    public function show_page($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 1)->first();

        if (!$page) {
            abort(404);
        }

        return view('front.content_page', compact('page'));
    }

    public function submit(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $product = Product::where('status', 1)->first();

        ProductEnquiry::create([
            'product_id' => $product->id ?? null,
            'name'       => $request->subject,
            'email'      => $request->email,
            'message'    => $request->message,
        ]);

        // You can save or send mail here
        // Example: Mail::to('admin@example.com')->send(new ContactMail($request->all()));

        return response()->json([
            'status' => true,
            'message' => 'Your message has been sent successfully!'
        ]);
    }

    public function setLocation(Request $request)
    {
        $location = ServiceLocation::find($request->id);

        if (!$location) {
            return response()->json(['success' => false, 'message' => 'Location not found']);
        }

        // Store in session
        session([
            'selected_city_id' => $location->id,
            'selected_city_name' => $location->name,
            'selected_shipping_cost' => $location->shipping_cost,
        ]);

        return response()->json([
            'success' => true,
            'name' => $location->name,
            'shipping_cost' => $location->shipping_cost,
        ]);
    }

    public function category_product(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->where('status', 1)->firstOrFail();

        $query = Product::where('status', 1)
        ->where('category_id', $category->id)
        ->with(['variants', 'category']);

        // --- Apply sorting based on filter dropdown ---
        if ($request->sort == 'price_low') {
            $query->orderBy('base_price', 'asc');
        } elseif ($request->sort == 'price_high') {
            $query->orderBy('base_price', 'desc');
        } elseif ($request->sort == 'alpha') {
            $query->orderBy('name', 'asc');
        } elseif ($request->sort == 'off_high') {
            // Sorting by % off — use raw expression
            $query->orderByRaw('((mrp_price - base_price) / mrp_price) DESC');
        } elseif ($request->sort == 'off_low') {
            $query->orderByRaw('((mrp_price - base_price) / mrp_price) ASC');
        } else {
            $query->latest();
        }

        $products = $query->paginate(12);

        return view('front.category_product', compact('products', 'category'));
    }

}

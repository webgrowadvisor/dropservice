<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\GstController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Drop\DropController;
use App\Http\Controllers\Drop\DropPaymentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CustomContoller;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DropPackageController;
use App\Http\Controllers\Admin\SpecificationGroupController;
use App\Http\Controllers\Admin\SpecificationAttributeController;
use App\Http\Controllers\Admin\AdminBrandRequestController;

use App\Http\Controllers\Seller\SelProductController;
use App\Http\Controllers\Seller\SelCategoryController;
use App\Http\Controllers\Seller\SelOrderController;
use App\Http\Controllers\Seller\BrandRequestController;


Route::post('/gst/fetch', [GstController::class, 'getGstDetails']);

// login start 
Route::get('/admin', function () { return view('admin.ad.login'); })->name('admin.login');
Route::get('/seller', function () {  return view('seller.ad.login'); });
Route::get('/dropservice', function () {  return view('drop.ad.login'); })->name('drop.ad.login');

Route::post('/admin/check', [AuthController::class, 'admin_check'])->name('admin.check');
Route::post('/seller/check', [AuthController::class, 'seller_check'])->name('seller.check');
Route::post('/dropservice/check', [AuthController::class, 'dropservice_check'])->name('dropservice.check');
// login end 

// singup route start
Route::get('/singup', function () { return view('admin.ad.reg2'); });
 
Route::get('/admin/singup', function () {  return view('admin.ad.reg1'); });
Route::post('/admin/register', [AuthController::class, 'admin_register'])->name('admin.register');
Route::get('/admin/logout', [AuthController::class, 'admin_logout'])->name('admin.logout');

Route::get('/seller/singup/{level?}', function ($level = 1) {  
    return view('seller.ad.reg1', compact('level')); 
})->name('seller.singup');
Route::post('/seller/register/{level?}', [AuthController::class, 'seller_register'])->name('seller.register');
Route::get('/seller/logout', [AuthController::class, 'seller_logout'])->name('seller.logout');

Route::get('/dropservice/singup/{level?}', function ($level = 1) { 
    return view('drop.ad.reg2', compact('level')); 
})->name('drop.singup');
Route::post('/dropservice/register/{level?}', [AuthController::class, 'drop_register'])->name('drop.register');
Route::get('/dropservice/logout', [AuthController::class, 'drop_logout'])->name('drop.logout');
// end singup route 


// admin Routes
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/account-settings', [HomeController::class, 'accountSettings'])->name('ad.account.settings');
    Route::post('/account-settings', [HomeController::class, 'updateAccountSettings'])->name('ad.account.update');
    
    Route::get('/user', [HomeController::class, 'userlist'])->name('user.list');
    Route::get('/user/{id}/edit', [HomeController::class, 'user_edit'])->name('user.edit');
    Route::put('/user/{id}', [HomeController::class, 'user_update'])->name('users.update');

    Route::get('/seller', [HomeController::class, 'sellerlist'])->name('seller.list');
    Route::get('/seller/{id}/edit', [HomeController::class, 'seller_edit'])->name('seller.edit');
    Route::put('/seller/{id}', [HomeController::class, 'seller_update'])->name('seller.update');

    Route::get('/drop', [HomeController::class, 'droplist'])->name('drop.list');
    Route::get('/drop/{id}/edit', [HomeController::class, 'drop_edit'])->name('drop.edit');
    Route::put('/drop/{id}', [HomeController::class, 'drop_update'])->name('drop.update');

    Route::post('/user/{id}/update-status', [HomeController::class, 'userupdateStatus']);
    Route::post('/seller/{id}/update-status', [HomeController::class, 'sellerupdateStatus']);
    Route::post('/drop/{id}/update-status', [HomeController::class, 'dropupdateStatus']);

    Route::resource('groups', SpecificationGroupController::class);
    Route::resource('attributes', SpecificationAttributeController::class);
    Route::get('/enquiries', [\App\Http\Controllers\Admin\EnquiryController::class, 'index'])->name('enquiries');
    
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
    Route::resource('media', \App\Http\Controllers\Admin\MediaController::class);

    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class);

    Route::get('/brand-requests', [AdminBrandRequestController::class, 'index'])->name('admin.brand.requests');
    Route::post('/brand-requests/{id}/approve', [AdminBrandRequestController::class, 'approve'])->name('admin.brand.approve');
    Route::post('/brand-requests/{id}/reject', [AdminBrandRequestController::class, 'reject'])->name('admin.brand.reject');

    Route::get('reviews', [ProductReviewController::class, 'index'])->name('ad.reviews');
    Route::get('create/{product}', [ProductReviewController::class, 'create'])->name('ad.reviews.create');
    Route::post('/products/{product}/reviews', [ProductReviewController::class, 'store'])->name('ad.reviews.store');
    Route::delete('/admin/review/{id}', [ProductReviewController::class, 'destroy'])->name('ad.review.destroy');


    Route::get('products', [ProductController::class, 'index'])->name('ad.products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('ad.products.create');
    Route::post('products', [ProductController::class, 'store'])->name('ad.products.store');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('ad.products.destroy');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('ad.products.edit');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('ad.products.update');
    Route::post('products/{id}/update-status', [ProductController::class, 'Status']);

    Route::get('category', [CategoryController::class, 'index'])->name('ad.category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('ad.category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('ad.category.store');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('ad.category.destroy');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('ad.category.edit');
    Route::put('category/{id}', [CategoryController::class, 'update'])->name('ad.category.update');
    Route::post('category/{id}/update-status', [CategoryController::class, 'Status']);

    Route::get('/orders', [OrderController::class, 'index'])->name('ad.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('ad.orders.show');
    Route::get('/order/create', [OrderController::class, 'create'])->name('ad.order.create');

    Route::get('/product/{id}/variants', function ($id) {
        $variants = \App\Models\ProductVariant::where('product_id', $id)->get();
        return response()->json($variants);
    });

    // Route::post('/order/store', [OrderController::class, 'store'])->name('ad.order.store');
    Route::post('orders/store', [OrderController::class, 'storeFromAdmin'])->name('ad.orders.store');
    Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('ad.orders.destroy');
    Route::put('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('ad.orders.update-status');
    Route::get('/order/{orderNumber}/bill', [OrderController::class, 'showBill'])->name('ad.order.bill');

    Route::get('/packages', [DropPackageController::class, 'index'])->name('ad.packages.index');
    Route::get('/packages/create', [DropPackageController::class, 'create'])->name('ad.packages.create');
    Route::post('/packages/store', [DropPackageController::class, 'store'])->name('ad.packages.store');
    Route::get('/packages/{id}/edit', [DropPackageController::class, 'edit'])->name('ad.packages.edit');
    Route::post('/packages/{id}/update', [DropPackageController::class, 'update'])->name('ad.packages.update');
    Route::delete('/packages/{id}', [DropPackageController::class, 'destroy'])->name('ad.packages.destroy');

    Route::get('/service-location', [HomeController::class, 'service_location'])->name('ad.service_location');
    Route::get('/service-location/add', [HomeController::class, 'service_location_add'])->name('location.add');
    Route::post('/service-location/store', [HomeController::class, 'service_location_store'])->name('location.store');
    Route::get('/service-location/edit/{id}', [HomeController::class, 'service_location_edit'])->name('location.edit');
    Route::post('/service-location/update/{id}', [HomeController::class, 'service_location_update'])->name('location.update');

});

// Seller Routes
Route::middleware(['auth:seller'])->prefix('seller')->group(function () {
    
    Route::get('/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');

    Route::get('/account-settings', [SellerController::class, 'accountSettings'])->name('seller.account.settings');
    Route::post('/account-settings', [SellerController::class, 'updateAccountSettings'])->name('seller.account.update');

    Route::get('/brand-request', [BrandRequestController::class, 'index'])->name('seller.brand.list');
    Route::get('/brand-create', [BrandRequestController::class, 'create'])->name('seller.brand.request');
    Route::post('/brand-request', [BrandRequestController::class, 'store'])->name('seller.brand.request.store');

    Route::get('products', [SelProductController::class, 'index'])->name('seller.products.index');
    Route::get('products/create', [SelProductController::class, 'create'])->name('seller.products.create');
    Route::post('products', [SelProductController::class, 'store'])->name('seller.products.store');
    Route::delete('products/{id}', [SelProductController::class, 'destroy'])->name('seller.products.destroy');
    Route::get('products/{id}/edit', [SelProductController::class, 'edit'])->name('seller.products.edit');
    Route::put('products/{id}', [SelProductController::class, 'update'])->name('seller.products.update');
    Route::post('products/{id}/update-status', [SelProductController::class, 'Status']);
    
    Route::get('category', [SelCategoryController::class, 'index'])->name('seller.category.index');
    Route::get('category/create', [SelCategoryController::class, 'create'])->name('seller.category.create');
    Route::post('category', [SelCategoryController::class, 'store'])->name('seller.category.store');
    Route::delete('category/{id}', [SelCategoryController::class, 'destroy'])->name('seller.category.destroy');
    Route::get('category/{id}/edit', [SelCategoryController::class, 'edit'])->name('seller.category.edit');
    Route::put('category/{id}', [SelCategoryController::class, 'update'])->name('seller.category.update');
    Route::post('category/{id}/update-status', [SelCategoryController::class, 'Status']);

    Route::get('/orders', [SelOrderController::class, 'index'])->name('seller.orders.index');
    Route::get('/orders/{id}', [SelOrderController::class, 'show'])->name('seller.orders.show');
    Route::get('/order/create', [SelOrderController::class, 'create'])->name('seller.order.create');

    Route::get('/product/{id}/variants', function ($id) {
        $variants = \App\Models\ProductVariant::where('product_id', $id)->get();
        return response()->json($variants);
    });

    // Route::post('/order/store', [SelOrderController::class, 'store'])->name('seller.order.store');
    Route::post('orders/store', [SelOrderController::class, 'storeFromAdmin'])->name('seller.orders.store');
    Route::delete('orders/{id}', [SelOrderController::class, 'destroy'])->name('seller.orders.destroy');
    Route::put('/orders/{id}/update-status', [SelOrderController::class, 'updateStatus'])->name('seller.orders.update-status');
    Route::get('/order/{orderNumber}/bill', [SelOrderController::class, 'showBill'])->name('seller.order.bill');

    Route::get('/dropclient', [SellerController::class, 'index'])->name('seller.dropclient');

});

// Dropservice Routes
Route::middleware(['auth:dropservice'])->prefix('drop')->group(function () {
    
    Route::get('/dashboard', [DropController::class, 'index'])->name('drop.dashboard');

    Route::get('/account-settings', [DropController::class, 'accountSettings'])->name('drop.account.settings');
    Route::post('/account-settings', [DropController::class, 'updateAccountSettings'])->name('drop.account.update');

    // Show product filter page
    Route::get('/products/filter', [DropController::class, 'productFilter'])->name('drop.products.filter');
    // API: Get sellers by category
    Route::get('/api/sellers-by-category/{category_id}', [DropController::class, 'getSellersByCategory']);
    // API: Get products by seller
    Route::get('/api/products-by-seller/{seller_id}', [DropController::class, 'getProductsBySeller']);

    Route::get('/package', [DropController::class, 'package'])->name('drop.package');
    Route::post('/buy-package', [DropController::class, 'buyPackage'])->name('drop.package.buy');

    Route::get('/transactionHistory', [DropPaymentController::class, 'transactionHistory'])->name('drop.payment.history');
    Route::get('/payment', [DropPaymentController::class, 'showForm'])->name('drop.payment.form');
    Route::post('/payment/create', [DropPaymentController::class, 'createOrder'])->name('drop.payment.create');
    Route::post('/payment/callback', [DropPaymentController::class, 'paymentCallback'])->name('drop.payment.callback');
    Route::post('/drop/payment/success', [DropController::class, 'handlePaymentSuccess'])->name('drop.payment.success');
});

// user after login page
Route::middleware(['web', 'auth:web'])->prefix('user')->group(function () {
    
    Route::get('/logout/user', [AuthController::class, 'user_logout'])->name('user.logout');

    Route::post('/products/{product}/reviews', [ProductReviewController::class, 'store'])->name('reviews.store');
    
    Route::get('/dashboard-overview', [UserController::class, 'dashboard_overview'])->name('dashboard_overview');
    Route::get('/dashboard-my-orders', [UserController::class, 'dashboard_my_orders'])->name('dashboard_my_orders');
    Route::get('/dashboard-my-wallet', [UserController::class, 'dashboard_my_wallet'])->name('dashboard_my_wallet');

    Route::get('/dashboard-my-wishlist', [UserController::class, 'dashboard_my_wishlist'])->name('dashboard_my_wishlist');
    Route::post('/wishlist/toggle/{productId}', [CustomContoller::class, 'toggle'])->name('wishlist.toggle');

    Route::get('/dashboard-my-addresses', [UserController::class, 'dashboard_my_addresses'])->name('dashboard_my_addresses');
    Route::post('/address/store', [CustomContoller::class, 'store_address'])->name('address.store');
    Route::post('/address/update/{id}', [CustomContoller::class, 'update_address'])->name('address.update');
    Route::get('/address/delete/{id}', [CustomContoller::class, 'delete_address'])->name('address.delete');

    Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/checkout/send-otp', [CheckoutController::class, 'sendOtp']);
    Route::post('/checkout/verify-otp', [CheckoutController::class, 'verifyOtp']);
    Route::post('/address/store', [CheckoutController::class, 'store'])->name('user.address.store');

    Route::get('/cart/remove', [CheckoutController::class, 'remove'])->name('remove.cart');
});


// Route::get('/', function () { return 'home'; })->name('home');
Route::get('/user/singup', function () { return view('front.sign_up'); })->name('user.singup');
Route::post('/register/user', [UserController::class, 'register'])->name('user.register');
Route::get('/password/forget', function () { return view('front.forgot_password'); })->name('user.forget');
Route::get('/user', function () { return view('front.sign_in'); })->name('user.login');
Route::post('/user/check', [AuthController::class, 'user_check'])->name('user.check');

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/shop-grid', [UserController::class, 'shop_grid'])->name('shop_grid');
Route::get('/contact-us', [UserController::class, 'contact_us'])->name('contact_us');
Route::post('/contact-submit', [UserController::class, 'submit'])->name('contact.submit');
Route::post('/user/cart/add', [CustomContoller::class, 'add_to_cart'])->name('cart.add');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.adds');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/sidebar', [CartController::class, 'sidebar'])->name('cart.sidebar');
Route::get('/cart/html', [CartController::class, 'getCartHtml'])->name('cart.html');

Route::get('/aboutus', [UserController::class, 'aboutus'])->name('aboutus');
Route::get('/product/{slug}', [UserController::class, 'single_product_view'])->name('single_product_view');

Route::get('/{slug}', [UserController::class, 'show_page'])->name('page.show');
Route::post('/set-location', [UserController::class, 'setLocation'])->name('set.location');
Route::get('/category/{slug}', [UserController::class, 'category_product'])->name('category_product');
Route::get('/search', [CustomContoller::class, 'suggestions'])->name('search.suggestions');

Route::get('/optimize', function(){
 
    Artisan::call('optimize:clear');
 
    $notification = "Your version has been updated successfully";
    $notification = array('success_msg' => $notification);
    return redirect()->route('home')->with($notification);
});

Route::get('/composer-update', function () {

    // Run composer command
    exec('composer update');

    return redirect()->route('home')
        ->with(['success_msg' => 'Composer update executed successfully!']);
});


Route::get('/storage-link', function () {

    Artisan::call('storage:link');

    return redirect()->back()->with([
        'success_msg' => 'Storage link created successfully!'
    ]);
});

Route::get('/fix-cache', function () {
    // Artisan::call('config:clear');
    // Artisan::call('cache:clear');
    // Artisan::call('route:clear');
    // Artisan::call('view:clear');
    // Artisan::call('optimize:clear');
    return "Cache Cleared!";
});
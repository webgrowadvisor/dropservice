@include('front.layout.head')

<body>

    @include('front.layout.category')


    @include('front.layout.search_model')


    @include('front.layout.cart')
    {{-- @livewire('cart-component') --}}


    @include('front.layout.header')


    <div class="wrapper">

        <div class="main-banner-slider">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel offers-banner owl-theme">
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img src="{{ asset('front/images/banners/offer-1.jpg') }}" alt="">
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p>6% Off</p>
                                            <div class="top-text-1">Buy More & Save More</div>
                                            <span>Fresh Vegetables</span>
                                        </div>
                                        <a href="{{ route('shop_grid') }}" class="Offer-shop-btn hover-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img src="{{ asset('front/images/banners/offer-2.jpg') }}" alt="">
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p>5% Off</p>
                                            <div class="top-text-1">Buy More & Save More</div>
                                            <span>Fresh Fruits</span>
                                        </div>
                                        <a href="{{ route('shop_grid') }}" class="Offer-shop-btn hover-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img src="{{ asset('front/images/banners/offer-3.jpg') }}" alt="">
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p>3% Off</p>
                                            <div class="top-text-1">Hot Deals on New Items</div>
                                            <span>Daily Essentials Eggs & Dairy</span>
                                        </div>
                                        <a href="{{ route('shop_grid') }}" class="Offer-shop-btn hover-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img src="{{ asset('front/images/banners/offer-4.jpg') }}" alt="">
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p>2% Off</p>
                                            <div class="top-text-1">Buy More & Save More</div>
                                            <span>Beverages</span>
                                        </div>
                                        <a href="{{ route('shop_grid') }}" class="Offer-shop-btn hover-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="offer-item">
                                    <div class="offer-item-img">
                                        <div class="gambo-overlay"></div>
                                        <img src="{{ asset('front/images/banners/offer-5.jpg') }}" alt="">
                                    </div>
                                    <div class="offer-text-dt">
                                        <div class="offer-top-text-banner">
                                            <p>3% Off</p>
                                            <div class="top-text-1">Buy More & Save More</div>
                                            <span>Nuts & Snacks</span>
                                        </div>
                                        <a href="{{ route('shop_grid') }}" class="Offer-shop-btn hover-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>Shop By</span>
                                <h2>Categories</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="owl-carousel cate-slider owl-theme">
                            @foreach ($categories as $categorie)
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        {!! categoryImage($categorie->thumbnail, 50, 50) !!}
                                    </div>
                                    <h4>{{ $categorie->name }}</h4>
                                </a>
                            </div>
                            @endforeach

                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-1.svg') }}" alt="">
                                    </div>
                                    <h4>Vegetables & Fruits</h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-2.svg') }}" alt="">
                                    </div>
                                    <h4> Grocery & Staples </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-3.svg') }}" alt="">
                                    </div>
                                    <h4> Dairy & Eggs </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-4.svg') }}" alt="">
                                    </div>
                                    <h4> Beverages </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-5.svg') }}" alt="">
                                    </div>
                                    <h4> Snacks </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-6.svg') }}" alt="">
                                    </div>
                                    <h4> Home Care </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-7.svg') }}" alt="">
                                    </div>
                                    <h4> Noodles & Sauces </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-8.svg') }}" alt="">
                                    </div>
                                    <h4> Personal Care </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-9.svg') }}" alt="">
                                    </div>
                                    <h4> Pet Care </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-10.svg') }}" alt="">
                                    </div>
                                    <h4> Meat & Seafood </h4>
                                </a>
                            </div>
                            <div class="item">
                                <a href="{{ route('shop_grid') }}" class="category-item">
                                    <div class="cate-img">
                                        <img src="{{ asset('front/images/category/icon-11.svg') }}" alt="">
                                    </div>
                                    <h4> Electronics </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>For You</span>
                                <h2>Top Featured Products</h2>
                            </div>
                            <a href="{{ route('shop_grid') }}" class="see-more-btn">See All</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">
                            @foreach($products as $product)
                            <div class="item">
                                <div class="product-item">
                                    <a href="{{ route('single_product_view', ['slug' => $product->slug]) }}" class="product-img">
                                        {!! productImage($product->thumbnail ?? null, $product->thumbnail ?? null) !!}
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">{{ getDiscountPercent($product->mrp_price, $product->base_price) }}</span>
                                            <span class="like-icon {{ auth()->check() && auth()->user()->wishlists->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $product->id }}" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>({{ ($product->stock > 0) ? 'In Stock' : 'Out of Stock'}})</span></p>
                                        <h4>{{ $product->name }}</h4>
                                        <div class="product-price">
                                            <i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->base_price }}
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->mrp_price }}</span>
                                        </div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon add-to-cart" data-id="{{ $product->id }}"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-1.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">6% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 12
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 15</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-2.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 10
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 13</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-3.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">5% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 5
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 8</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-4.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">3% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 15
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 20</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-5.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 9
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 10</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-6.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 7
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 8</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-7.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">1% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 6.95
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 7</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-8.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">3% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 8
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 10</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>Offers</span>
                                <h2>Best Values</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('shop_grid') }}" class="best-offer-item">
                            <img src="{{ asset('front/images/best-offers/offer-1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('shop_grid') }}" class="best-offer-item">
                            <img src="{{ asset('front/images/best-offers/offer-2.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('shop_grid') }}" class="best-offer-item offr-none">
                            <img src="{{ asset('front/images/best-offers/offer-3.jpg') }}" alt="">

                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('shop_grid') }}" class="code-offer-item">
                            <img src="{{ asset('front/images/best-offers/offer-4.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>For You</span>
                                <h2>Fresh Vegetables & Fruits</h2>
                            </div>
                            <a href="#" class="see-more-btn">See All</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">

                            @foreach($products as $product)
                            <div class="item">
                                <div class="product-item">
                                    <a href="{{ route('single_product_view', ['slug' => $product->slug]) }}" class="product-img">
                                        {!! productImage($product->thumbnail ?? null, $product->thumbnail ?? null) !!}
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">{{ getDiscountPercent($product->mrp_price, $product->base_price) }}</span>
                                            <span class="like-icon {{ auth()->check() && auth()->user()->wishlists->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $product->id }}" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>({{ ($product->stock > 0) ? 'In Stock' : 'Out of Stock'}})</span></p>
                                        <h4>{{ $product->name }}</h4>
                                        <div class="product-price">
                                            <i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->base_price }}
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->mrp_price }}</span>
                                        </div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon add-to-cart" data-id="{{ $product->id }}"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-11.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">6% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 12
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 15</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-12.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 10
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 13</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-13.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">5% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 5
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 8</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-1.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">3% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 15
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 20</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-5.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 9
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 10</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-6.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 7
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 8</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-14.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">1% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 6.95
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 7</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-3.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">3% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 8
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 10</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section145">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title-tt">
                            <div class="main-title-left">
                                <span>For You</span>
                                <h2>Added New Products</h2>
                            </div>
                            <a href="#" class="see-more-btn">See All</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel featured-slider owl-theme">

                            @foreach($products as $product)
                            <div class="item">
                                <div class="product-item">
                                    <a href="{{ route('single_product_view', ['slug' => $product->slug]) }}" class="product-img">
                                        {!! productImage($product->thumbnail ?? null, $product->thumbnail ?? null) !!}
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">{{ getDiscountPercent($product->mrp_price, $product->base_price) }}</span>
                                            <span class="like-icon {{ auth()->check() && auth()->user()->wishlists->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $product->id }}" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>({{ ($product->stock > 0) ? 'In Stock' : 'Out of Stock'}})</span></p>
                                        <h4>{{ $product->name }}</h4>
                                        <div class="product-price">
                                            <i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->base_price }}
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->mrp_price }}</span>
                                        </div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon add-to-cart" data-id="{{ $product->id }}"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-10.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 12
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 15</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-9.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 10
                                        </div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-15.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">5% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 5</div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-11.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 15
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 16</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-14.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 9</div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-2.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 7</div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-5.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 6.95
                                        </div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-item">
                                    <a href="#" class="product-img">
                                        <img src="{{ asset('front/images/product/img-6.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">New</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(Out of Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 8
                                            <span>8.75</span></div>
                                        <div class="qty-cart">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn">
                                                <input type="number" step="1" name="quantity" value="1"
                                                    class="input-text qty text">
                                                <input type="button" value="+" class="plus plus-btn">
                                            </div>
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('front.layout.fotter')

</body>

</html>
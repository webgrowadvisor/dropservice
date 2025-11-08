@include('front.layout.head')

<body>

    @include('front.layout.category')

    @include('front.layout.search_model')

    @include('front.layout.cart')


    @include('front.layout.header')


    <div class="wrapper">
        <div class="gambo-Breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vegetables & Fruits</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-product-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-top-dt">
                            <div class="product-left-title">
                                <h2>Vegetables & Fruits</h2>
                            </div>
                            <a href="#" class="filter-btn pull-bs-canvas-right">Filters</a>
                            <div class="product-sort">
                                <div class="ui selection dropdown vchrt-dropdown">
                                    <input name="gender" type="hidden" value="default">
                                    <i class="dropdown icon d-icon"></i>
                                    <div class="text">Popularity</div>
                                    <div class="menu">
                                        <div class="item" data-value="0">Popularity</div>
                                        <div class="item" data-value="1">Price - Low to High</div>
                                        <div class="item" data-value="2">Price - High to Low</div>
                                        <div class="item" data-value="3">Alphabetical</div>
                                        <div class="item" data-value="4">Saving - High to Low</div>
                                        <div class="item" data-value="5">Saving - Low to High</div>
                                        <div class="item" data-value="6">% Off - High to Low</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-list-view">
                    <div class="row">

                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
                                <a href="{{ route('single_product_view', ['slug' => $product->slug]) }}" class="product-img">
                                    {!! productImage($product->thumbnail) !!}
                                    <div class="product-absolute-options">
                                        @if($product->mrp_price > $product->base_price)
                                            <span class="offer-badge-1">{{ getDiscountPercent($product->mrp_price, $product->base_price) }}</span>
                                        @endif
                                        <span class="like-icon {{ auth()->check() && auth()->user()->wishlists->contains('product_id', $product->id) ? 'active' : '' }}" 
                                            data-id="{{ $product->id }}" title="wishlist"></span>
                                    </div>
                                </a>

                                <div class="product-text-dt">
                                    <p>Available<span>({{ ($product->stock > 0) ? 'In Stock' : 'Out of Stock' }})</span></p>
                                    <h4>{{ $product->name }}</h4>

                                    <div class="product-price">
                                        <i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->base_price }}
                                        @if($product->mrp_price > $product->base_price)
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->mrp_price }}</span>
                                        @endif
                                    </div>

                                    <div class="qty-cart">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn">
                                            <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                            <input type="button" value="+" class="plus plus-btn">
                                        </div>
                                        <span class="cart-icon add-to-cart" data-id="{{ $product->id }}"><i class="uil uil-shopping-cart-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 10 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 13</span></div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 5 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 8</span></div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 15 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 20</span></div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 9 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 10</span></div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 7 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 8</span></div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 12 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 15</span></div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 10 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 13</span></div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 5 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 8</span></div>
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
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
                                    <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 8 <span><i
                                                class="fa-solid fa-indian-rupee-sign"></i> 10</span></div>
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

                    <div class="pagination-wrapper">
                        {{$products->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.layout.fotter')

</body>

</html>
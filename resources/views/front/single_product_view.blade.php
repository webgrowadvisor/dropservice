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
                                <li class="breadcrumb-item"><a href="#">{{$product->category->name}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
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
                        <div class="product-dt-view">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    
                                    <div id="sync1" class="owl-carousel owl-theme">
                                        {{-- Main product thumbnail --}}
                                        @if($product->thumbnail)
                                            <div class="item">
                                                {!! singleProduct($product->thumbnail ?? null, $product->thumbnail ?? null) !!}
                                            </div>
                                        @endif

                                        {{-- Variant images --}}
                                        @foreach($product->variants as $variant)
                                            @if($variant->image)
                                                <div class="item">
                                                    {!! singleProduct($variant->webp ?? null, $variant->image ?? null) !!}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div id="sync2" class="owl-carousel owl-theme">
                                        {{-- Main product thumbnail --}}
                                        @if($product->thumbnail)
                                            <div class="item">
                                                {!! slideProduct($product->thumbnail ?? null, $product->thumbnail ?? null) !!}
                                            </div>
                                        @endif

                                        {{-- Variant images --}}
                                        @foreach($product->variants as $variant)
                                            @if($variant->image)
                                                <div class="item">
                                                    {!! slideProduct($variant->webp ?? null, $variant->image ?? null) !!}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="product-dt-right">
                                        <h2>{{$product->name}}</h2>
                                        <div class="no-stock">
                                            <p class="pd-no">Product No.<span>{{ $product->created_at->format('Ymdhi') }}</span></p>
                                            <p class="stock-qty">Available<span>({{ ($product->stock > 0) ? 'In Stock' : 'Out of Stock'}})</span></p>
                                        </div>
                                        <div class="product-radio">
                                            <ul class="product-now">
                                                
                                                @foreach($product->variants as $key => $variant)
                                                    @php
                                                        $options = json_decode($variant->options, true);

                                                        // If not JSON → create simple structure
                                                        if (!$options) {
                                                            $options = ['label' => $variant->options];
                                                        }
                                                        // Decide display label
                                                        $label = $options['weight'] ??
                                                                $options['size'] ??
                                                                $options['color'] ??
                                                                $options['label'] ??
                                                                'Option';
                                                    @endphp

                                                    <li>
                                                        <input type="radio"
                                                            id="variant{{ $variant->id }}"
                                                            name="variant"
                                                            value="{{ $variant->id }}"
                                                            class="variant-radio">

                                                        <label for="variant{{ $variant->id }}">
                                                            {{ $label }}
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <p class="pp-descp">
                                            {{$product->description}}                                            
                                        </p>
                                        <div class="product-group-dt">
                                            <ul>
                                                <li>
                                                    <div class="main-price color-discount">Discount Price
                                                        <span>
                                                        <i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->base_price }}
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="main-price mrp-price">MRP Price
                                                        <span>
                                                        <i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->mrp_price }}
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="gty-wish-share">
                                                <li>
                                                    <div class="qty-cart">
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus minus-btn">
                                                            <input type="number" step="1" name="quantity" value="1"
                                                                class="input-text qty text">
                                                            <input type="button" value="+" class="plus plus-btn">
                                                        </div>
                                                    </div>
                                                </li>
                                                {{-- <li><span class="like-icon save-icon {{ auth()->check() && auth()->user()->wishlists->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $product->id }}" title="wishlist"></span></li> --}}
                                            </ul>
                                            <ul class="ordr-crt-share">
                                                <li>
                                                    <button class="add-cart-btn hover-btn addtocart" data-id="{{ $product->id }}"><i class="uil uil-shopping-cart-alt"></i>Add to Cart
                                                    </button>
                                                </li>
                                                <li><button class="order-btn like-icon save-icon  {{ auth()->check() && auth()->user()->wishlists->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $product->id }}" >Wishlist</button></li>
                                            </ul>
                                        </div>
                                        <div class="pdp-details">
                                            <ul>
                                                <li>
                                                    <div class="pdp-group-dt">
                                                        <div class="pdp-icon"><i class="uil uil-usd-circle"></i></div>
                                                        <div class="pdp-text-dt">
                                                            <span>Lowest Price Guaranteed</span>
                                                            <p>Get difference refunded if you find it cheaper anywhere
                                                                else.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="pdp-group-dt">
                                                        <div class="pdp-icon"><i class="uil uil-cloud-redo"></i></div>
                                                        <div class="pdp-text-dt">
                                                            <span>Easy Returns & Refunds</span>
                                                            <p>Return products at doorstep and get refund in seconds.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="pdpt-bg">
                            <div class="pdpt-title">
                                <h4>Product Details</h4>
                            </div>
                            <div class="pdpt-body scrollstyle_4">
                                <div class="pdct-dts-1">
                                    {!! $product->product_specail !!}
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('front.layout.fotter')
    

    {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/vendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('front/vendor/semantic/semantic.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script> --}}

    <script src="{{ asset('front/js/product.thumbnail.slider.js') }}"></script>

</body>

</html>
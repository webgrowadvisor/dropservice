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
                                        <div class="item">
                                            <img src="{{ asset('front/images/product/big-1.jpg') }}" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('front/images/product/big-2.jpg') }}" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('front/images/product/big-3.jpg') }}" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('front/images/product/big-4.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div id="sync2" class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{ asset('front/images/product/big-1.jpg') }}" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('front/images/product/big-2.jpg') }}" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('front/images/product/big-3.jpg') }}" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('front/images/product/big-4.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="product-dt-right">
                                        <h2>{{$product->name}}</h2>
                                        <div class="no-stock">
                                            <p class="pd-no">Product No.<span>12345</span></p>
                                            <p class="stock-qty">Available<span>({{ ($product->stock > 0) ? 'In Stock' : 'Out of Stock'}})</span></p>
                                        </div>
                                        <div class="product-radio">
                                            <ul class="product-now">
                                                <li>
                                                    <input type="radio" id="p1" name="product1">
                                                    <label for="p1">500g</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="p2" name="product1">
                                                    <label for="p2">1kg</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="p3" name="product1">
                                                    <label for="p3">2kg</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="p4" name="product1">
                                                    <label for="p4">3kg</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="pp-descp">{{$product->description}}
                                            {{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam vulputate, purus at tempor blandit, nulla felis dictum eros, sed
                                            volutpat odio sapien id lectus. Cras mollis massa ac congue posuere. Fusce
                                            viverra mauris vel magna pretium aliquet. Nunc tincidunt, velit id tempus
                                            tristique, velit dolor hendrerit nibh, at scelerisque neque mauris sed ex. --}}
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
                                                    <div class="qty-product">
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus minus-btn">
                                                            <input type="number" step="1" name="quantity" value="1"
                                                                class="input-text qty text">
                                                            <input type="button" value="+" class="plus plus-btn">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><span class="like-icon save-icon {{ auth()->check() && auth()->user()->wishlists->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $product->id }}" title="wishlist"></span></li>
                                            </ul>
                                            <ul class="ordr-crt-share">
                                                <li><button class="add-cart-btn hover-btn"><i
                                                            class="uil uil-shopping-cart-alt"></i>Add to Cart</button>
                                                </li>
                                                <li><button class="order-btn hover-btn">Order Now</button></li>
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
                                    <div class="pdct-dt-step">
                                        <h4>Description</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere
                                            nunc in condimentum maximus. Integer interdum sem sollicitudin, porttitor
                                            felis in, mollis quam. Nunc gravida erat eu arcu interdum eleifend. Cras
                                            tortor velit, dignissim sit amet hendrerit sed, ultricies eget est. Donec
                                            eget urna sed metus dignissim cursus.</p>
                                    </div>
                                    <div class="pdct-dt-step">
                                        <h4>Benefits</h4>
                                        <div class="product_attr">
                                            Aliquam nec nulla accumsan, accumsan nisl in, rhoncus sapien.<br>
                                            In mollis lorem a porta congue.<br>
                                            Sed quis neque sit amet nulla maximus dignissim id mollis urna.<br>
                                            Cras non libero at lorem laoreet finibus vel et turpis.<br>
                                            Mauris maximus ligula at sem lobortis congue.<br>
                                        </div>
                                    </div>
                                    <div class="pdct-dt-step">
                                        <h4>How to Use</h4>
                                        <div class="product_attr">
                                            The peeled, orange segments can be added to the daily fruit bowl, and its
                                            juice is a refreshing drink.
                                        </div>
                                    </div>
                                    <div class="pdct-dt-step">
                                        <h4>Seller</h4>
                                        <div class="product_attr">
                                            Gambolthemes Pvt Ltd, Sks Nagar, Near Mbd Mall, Ludhana, 141001
                                        </div>
                                    </div>
                                    <div class="pdct-dt-step">
                                        <h4>Disclaimer</h4>
                                        <p>Phasellus efficitur eu ligula consequat ornare. Nam et nisl eget magna
                                            aliquam consectetur. Aliquam quis tristique lacus. Donec eget nibh et quam
                                            maximus rutrum eget ut ipsum. Nam fringilla metus id dui sollicitudin, sit
                                            amet maximus sapien malesuada.</p>
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
                                <h2>Top Featured Products</h2>
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
                                            <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
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
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 12
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 15</span>
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
                                        <img src="{{ asset('front/images/product/img-2.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 10
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 13</span>
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
                                        <img src="{{ asset('front/images/product/img-3.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">5% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 5
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 8</span>
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
                                        <img src="{{ asset('front/images/product/img-4.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">3% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 15
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 20</span>
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
                                        <img src="{{ asset('front/images/product/img-5.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 9
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 10</span>
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
                                            <span class="offer-badge-1">2% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 7
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 8</span>
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
                                        <img src="{{ asset('front/images/product/img-7.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">1% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 6.95
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 7</span>
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
                                        <img src="{{ asset('front/images/product/img-8.jpg') }}" alt="">
                                        <div class="product-absolute-options">
                                            <span class="offer-badge-1">3% off</span>
                                            <span class="like-icon" title="wishlist"></span>
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Available<span>(In Stock)</span></p>
                                        <h4>Product Title Here</h4>
                                        <div class="product-price"><i class="fa-solid fa-indian-rupee-sign"></i> 8
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 10</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- @include('front.layout.fotter') --}}
    <footer class="footer">
        <div class="footer-first-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <ul class="call-email-alt">
                            <li><a href="#" class="callemail"><i class="uil uil-dialpad-alt"></i>1800-000-000</a></li>
                            <li><a href="#" class="callemail"><i
                                        class="uil uil-envelope-alt"></i><span>info@grocery.com</span></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="social-links-footer">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-second-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="second-row-item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">Fruits and Vegetables</a></li>
                                <li><a href="#">Grocery & Staples</a></li>
                                <li><a href="#">Dairy & Eggs</a></li>
                                <li><a href="#">Beverages</a></li>
                                <li><a href="#">Snacks</a></li>
                                <li><a href="#">Home Care</a></li>
                                <li><a href="#">Noodles & Sauces</a></li>
                                <li><a href="#">Personal Care</a></li>
                                <li><a href="#">Pet Care</a></li>
                                <li><a href="#">Meat & Seafood</a></li>
                                <li><a href="#">Electronics</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="second-row-item">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><a href="#">About US</a></li>
                                <li><a href="#">Featured Products</a></li>
                                <li><a href="#">Offers</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="second-row-item">
                            <h4>Top Cities</h4>
                            <ul>
                                <li><a href="#">Gurugram</a></li>
                                <li><a href="#">New Delhi</a></li>
                                <li><a href="#">Bangaluru</a></li>
                                <li><a href="#">Mumbai</a></li>
                                <li><a href="#">Hyderabad</a></li>
                                <li><a href="#">Kolkata</a></li>
                                <li><a href="#">Ludhiana</a></li>
                                <li><a href="#">Chandigrah</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="second-row-item-app">
                            <h4>Download App</h4>
                            <ul>
                                <li><a href="#"><img class="download-btn" src="{{ asset('front/images/download-1.svg') }}" alt=""></a></li>
                                <li><a href="#"><img class="download-btn" src="{{ asset('front/images/download-2.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="second-row-item-payment">
                            <h4>Payment Method</h4>
                            <div class="footer-payments">
                                <ul id="paypal-gateway" class="financial-institutes">
                                    <li class="financial-institutes__logo">
                                        <img alt="Visa" title="Visa" src="{{ asset('front/images/footer-icons/pyicon-6.svg') }}">
                                    </li>
                                    <li class="financial-institutes__logo">
                                        <img alt="Visa" title="Visa" src="{{ asset('front/images/footer-icons/pyicon-1.svg') }}">
                                    </li>
                                    <li class="financial-institutes__logo">
                                        <img alt="MasterCard" title="MasterCard" src="{{ asset('front/images/footer-icons/pyicon-2.svg') }}">
                                    </li>
                                    <li class="financial-institutes__logo">
                                        <img alt="American Express" title="American Express"
                                            src="{{ asset('front/images/footer-icons/pyicon-3.svg') }}">
                                    </li>
                                    <li class="financial-institutes__logo">
                                        <img alt="Discover" title="Discover" src="{{ asset('front/images/footer-icons/pyicon-4.svg') }}">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="second-row-item-payment">
                            <h4>Newsletter</h4>
                            <div class="newsletter-input">
                                <input id="email" name="email" type="text" placeholder="Email Address"
                                    class="form-control input-md" required="">
                                <button class="newsletter-btn hover-btn" type="submit"><i
                                        class="uil uil-telegram-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-last-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bottom-links">
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Term & Conditions</a></li>
                                <li><a href="#">Refund & Return Policy</a></li>
                            </ul>
                        </div>
                        <div class="copyright-text">
                            <i class="uil uil-copyright"></i>Copyright {{date('Y')}} <b>Grocery</b> . All rights reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/vendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('front/vendor/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <script src="{{ asset('front/js/product.thumbnail.slider.js') }}"></script>
    <script src="{{ asset('front/js/offset_overlay.js') }}"></script>
    <script src="{{ asset('front/js/night-mode.js') }}"></script>

</body>

</html>
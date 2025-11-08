@include('front.layout.head')

<body>

    @include('front.layout.category')


    <div id="search_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog"
        aria-modal="false">
        <div class="modal-dialog search-ground-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content">
                    <div class="search-header">
                        <form action="#">
                            <input type="search" placeholder="Search for products...">
                            <button type="submit"><i class="uil uil-search"></i></button>
                        </form>
                    </div>
                    <div class="search-by-cat">
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-1.svg" alt="">
                            </div>
                            <div class="text">
                                Fruits and Vegetables
                            </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-2.svg" alt="">
                            </div>
                            <div class="text"> Grocery & Staples </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-3.svg" alt="">
                            </div>
                            <div class="text"> Dairy & Eggs </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-4.svg" alt="">
                            </div>
                            <div class="text"> Beverages </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-5.svg" alt="">
                            </div>
                            <div class="text"> Snacks </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-6.svg" alt="">
                            </div>
                            <div class="text"> Home Care </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-7.svg" alt="">
                            </div>
                            <div class="text"> Noodles & Sauces </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-8.svg" alt="">
                            </div>
                            <div class="text"> Personal Care </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="images/category/icon-9.svg" alt="">
                            </div>
                            <div class="text"> Pet Care </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('front.layout.cart')


    @include('front.layout.header')


    <div class="wrapper">

        <div class="default-dt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="title129">
                            <h2>Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        @include('front.layout.deshboard-side')
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="dashboard-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-title-tab">
                                        <h4><i class="uil uil-box"></i>My Orders</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    @foreach($orders as $order)
                                    <div class="pdpt-bg mb-4">
                                        <div class="pdpt-title">
                                            <h6>
                                                Delivery Timing 
                                                {{ $order->delivery_date ?? 'N/A' }}, 
                                                {{ $order->delivery_time ?? 'N/A' }}
                                            </h6>
                                        </div>

                                        <div class="order-body10">
                                            <ul class="order-dtsll">
                                                <li>
                                                    <div class="order-dt-img">
                                                        {{-- <img src="{{ asset('front/images/groceries.svg') }}" alt=""> --}}
                                                        {!! categoryImage($order->product->thumbnail, 50, 50) !!}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="order-dt47">
                                                        <h4>{{ $order->product->name ?? 'Product name not set' }}</h4>
                                                        <p>{{ ucfirst($order->status) }}</p>
                                                        <div class="order-title">
                                                            {{ $order->quantity ?? 1 }} Items 
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                            <div class="total-dt">
                                                <div class="total-checkout-group">
                                                    <div class="cart-total-dil">
                                                        <h4>Sub Total</h4>
                                                        <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $order->price }}</span>
                                                    </div>
                                                    <div class="cart-total-dil pt-3">
                                                        <h4>Delivery Charges</h4>
                                                        <span>10</span>
                                                    </div>
                                                </div>
                                                <div class="main-total-cart">
                                                    <h2>Total</h2>
                                                    <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $order->price }}</span>
                                                </div>
                                            </div>

                                            {{-- Track Order --}}
                                            <div class="track-order">
                                                <h4>Track Order</h4>
                                                <div class="bs-wizard" style="border-bottom:0;">
                                                    <div class="bs-wizard-step {{ in_array($order->status, ['placed','packed','on_the_way','delivered']) ? 'complete' : '' }}">
                                                        <div class="text-center bs-wizard-stepnum">Placed</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>

                                                    <div class="bs-wizard-step {{ in_array($order->status, ['packed','on_the_way','delivered']) ? 'complete' : '' }}">
                                                        <div class="text-center bs-wizard-stepnum">Packed</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>

                                                    <div class="bs-wizard-step {{ in_array($order->status, ['on_the_way','delivered']) ? 'active' : '' }}">
                                                        <div class="text-center bs-wizard-stepnum">On the way</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>

                                                    <div class="bs-wizard-step {{ $order->status === 'delivered' ? 'complete' : 'disabled' }}">
                                                        <div class="text-center bs-wizard-stepnum">Delivered</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="alert-offer">
                                                <img src="{{ asset('front/images/ribbon.svg') }}" alt="">
                                                Cashback of <i class="fa-solid fa-indian-rupee-sign"></i> 2 will be credited within 6–12 hours of delivery.
                                            </div> --}}

                                            <div class="call-bill">
                                                <div class="delivery-man">
                                                    Delivery Boy - <a href="#"><i class="uil uil-phone"></i> Call Us</a>
                                                </div>
                                                <div class="order-bill-slip">
                                                    {{-- <a href="{{ route('order.bill', $order->id) }}" class="bill-btn5 hover-btn">View Bill</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{-- <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h6>Delivery Timing 10 May, 3.00PM - 6.00PM</h6>
                                        </div>
                                        <div class="order-body10">
                                            <ul class="order-dtsll">
                                                <li>
                                                    <div class="order-dt-img">
                                                        <img src="{{ asset('front/images/groceries.svg') }}" alt="">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="order-dt47">
                                                        <h4>Gambo - Ludhiana</h4>
                                                        <p>Delivered - Gambo</p>
                                                        <div class="order-title">2 Items <span data-inverted=""
                                                                data-tooltip="2kg broccoli, 1kg Apple"
                                                                data-position="top center">?</span></div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="total-dt">
                                                <div class="total-checkout-group">
                                                    <div class="cart-total-dil">
                                                        <h4>Sub Total</h4>
                                                        <span><i class="fa-solid fa-indian-rupee-sign"></i> 25</span>
                                                    </div>
                                                    <div class="cart-total-dil pt-3">
                                                        <h4>Delivery Charges</h4>
                                                        <span>Free</span>
                                                    </div>
                                                </div>
                                                <div class="main-total-cart">
                                                    <h2>Total</h2>
                                                    <span><i class="fa-solid fa-indian-rupee-sign"></i> 25</span>
                                                </div>
                                            </div>
                                            <div class="track-order">
                                                <h4>Track Order</h4>
                                                <div class="bs-wizard" style="border-bottom:0;">
                                                    <div class="bs-wizard-step complete">
                                                        <div class="text-center bs-wizard-stepnum">Placed</div>
                                                        <div class="progress">
                                                            <div class="progress-bar"></div>
                                                        </div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                    <div class="bs-wizard-step complete">
                                                        <div class="text-center bs-wizard-stepnum">Packed</div>
                                                        <div class="progress">
                                                            <div class="progress-bar"></div>
                                                        </div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                    <div class="bs-wizard-step active">
                                                        <div class="text-center bs-wizard-stepnum">On the way</div>
                                                        <div class="progress">
                                                            <div class="progress-bar"></div>
                                                        </div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                    <div class="bs-wizard-step disabled">
                                                        <div class="text-center bs-wizard-stepnum">Delivered</div>
                                                        <div class="progress">
                                                            <div class="progress-bar"></div>
                                                        </div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert-offer">
                                                <img src="{{ asset('front/images/ribbon.svg') }}" alt="">
                                                Cashback of <i class="fa-solid fa-indian-rupee-sign"></i> 2 will be
                                                credit to Gambo Super Market wallet 6-12 hours of delivery.
                                            </div>
                                            <div class="call-bill">
                                                <div class="delivery-man">
                                                    Delivery Boy - <a href="#"><i class="uil uil-phone"></i> Call Us</a>
                                                </div>
                                                <div class="order-bill-slip">
                                                    <a href="#" class="bill-btn5 hover-btn">View Bill</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h6>Delivery Timing 10 May, 3.00PM - 6.00PM</h6>
                                        </div>
                                        <div class="order-body10">
                                            <ul class="order-dtsll">
                                                <li>
                                                    <div class="order-dt-img">
                                                        <img src="{{ asset('front/images/groceries.svg') }}" alt="">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="order-dt47">
                                                        <h4>Gambo - Ludhiana</h4>
                                                        <p>Delivered - Gambo</p>
                                                        <div class="order-title">2 Items <span data-inverted=""
                                                                data-tooltip="2kg broccoli, 1kg Apple"
                                                                data-position="top center">?</span></div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="total-dt">
                                                <div class="total-checkout-group">
                                                    <div class="cart-total-dil">
                                                        <h4>Sub Total</h4>
                                                        <span><i class="fa-solid fa-indian-rupee-sign"></i> 25</span>
                                                    </div>
                                                    <div class="cart-total-dil pt-3">
                                                        <h4>Delivery Charges</h4>
                                                        <span>Free</span>
                                                    </div>
                                                </div>
                                                <div class="main-total-cart">
                                                    <h2>Total</h2>
                                                    <span><i class="fa-solid fa-indian-rupee-sign"></i> 25</span>
                                                </div>
                                            </div>
                                            <div class="track-order">
                                                <h4>Track Order</h4>
                                                <div class="bs-wizard" style="border-bottom:0;">
                                                    <div class="bs-wizard-step complete">
                                                        <div class="text-center bs-wizard-stepnum">Placed</div>
                                                        <div class="progress">
                                                            <div class="progress-bar"></div>
                                                        </div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                    <div class="bs-wizard-step complete">
                                                        <div class="text-center bs-wizard-stepnum">Packed</div>
                                                        <div class="progress">
                                                            <div class="progress-bar"></div>
                                                        </div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                    <div class="bs-wizard-step complete">
                                                        <div class="text-center bs-wizard-stepnum">Arrived</div>
                                                        <div class="progress">
                                                            <div class="progress-bar"></div>
                                                        </div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                    <div class="bs-wizard-step complete">
                                                        <div class="text-center bs-wizard-stepnum">Delivered</div>
                                                        <div class="progress">
                                                            <div class="progress-bar"></div>
                                                        </div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="call-bill">
                                                <div class="delivery-man">
                                                    <a href="#"><i class="uil uil-rss"></i>Feedback</a>
                                                </div>
                                                <div class="order-bill-slip">
                                                    <a href="#" class="bill-btn5 hover-btn">View Bill</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

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
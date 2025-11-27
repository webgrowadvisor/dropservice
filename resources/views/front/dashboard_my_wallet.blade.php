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
                                <img src="{{ asset('front/images/category/icon-1.svg') }}" alt="">
                            </div>
                            <div class="text">
                                Fruits and Vegetables
                            </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('front/images/category/icon-2.svg') }}" alt="">
                            </div>
                            <div class="text"> Grocery & Staples </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('front/images/category/icon-3.svg') }}" alt="">
                            </div>
                            <div class="text"> Dairy & Eggs </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('front/images/category/icon-4.svg') }}" alt="">
                            </div>
                            <div class="text"> Beverages </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('front/images/category/icon-5.svg') }}" alt="">
                            </div>
                            <div class="text"> Snacks </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('front/images/category/icon-6.svg') }}" alt="">
                            </div>
                            <div class="text"> Home Care </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('front/images/category/icon-7.svg') }}" alt="">
                            </div>
                            <div class="text"> Noodles & Sauces </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('front/images/category/icon-8.svg') }}" alt="">
                            </div>
                            <div class="text"> Personal Care </div>
                        </a>
                        <a href="#" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('front/images/category/icon-9.svg') }}" alt="">
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
                                        <h4><i class="uil uil-wallet"></i>My Wallet</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="reward-body-dtt">
                                            <div class="reward-img-icon">
                                                <img src="{{ asset('front/images/money.svg') }}" alt="">
                                            </div>
                                            <span class="rewrd-title">Refound Balance</span>
                                            <h4 class="cashbk-price"><i class="fa-solid fa-indian-rupee-sign"></i> 0
                                            </h4>
                                            <span class="date-reward">Added : {{date('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="gambo-body-cash">
                                            <div class="reward-img-icon">
                                                <img class="rotate-img" src="{{ asset('front/images/business.svg') }}" alt="">
                                            </div>
                                            <span class="rewrd-title">Cashback Balance</span>
                                            <h4 class="cashbk-price"><i class="fa-solid fa-indian-rupee-sign"></i> 0
                                            </h4>
                                            <p>100% of thiscan be used for your next order.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>Active Offers</h4>
                                        </div>
                                        <div class="active-offers-body">
                                            <div class="table-responsive">
                                                <table class="table ucp-table earning__table">
                                                    <thead class="thead-s">
                                                        <tr>
                                                            <th scope="col">Offers</th>
                                                            <th scope="col">Offer Code</th>
                                                            <th scope="col">Expires Date</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- <tr>
                                                            <td>15%</td>
                                                            <td>GAMBOCOUP15</td>
                                                            <td>31 May 2020</td>
                                                            <td><b class="offer_active">Activated</b></td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
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

    </div>


    @include('front.layout.fotter')
</body>

</html>
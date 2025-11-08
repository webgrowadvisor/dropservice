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
                                            <span class="rewrd-title">My Balance</span>
                                            <h4 class="cashbk-price"><i class="fa-solid fa-indian-rupee-sign"></i> 120
                                            </h4>
                                            <span class="date-reward">Added : 8 May 2020</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="gambo-body-cash">
                                            <div class="reward-img-icon">
                                                <img class="rotate-img" src="{{ asset('front/images/business.svg') }}" alt="">
                                            </div>
                                            <span class="rewrd-title">Gambo Cashback Blance</span>
                                            <h4 class="cashbk-price"><i class="fa-solid fa-indian-rupee-sign"></i> 5
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
                                                        <tr>
                                                            <td>15%</td>
                                                            <td>GAMBOCOUP15</td>
                                                            <td>31 May 2020</td>
                                                            <td><b class="offer_active">Activated</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10%</td>
                                                            <td>GAMBOCOUP10</td>
                                                            <td>25 May 2020</td>
                                                            <td><b class="offer_active">Activated</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>25%</td>
                                                            <td>GAMBOCOUP25</td>
                                                            <td>20 May 2020</td>
                                                            <td><b class="offer_active">Activated</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5%</td>
                                                            <td>GAMBOCOUP05</td>
                                                            <td>15 May 2020</td>
                                                            <td><b class="offer_active">Activated</b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>Add Balance</h4>
                                        </div>
                                        <div class="add-cash-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group mt-1">
                                                        <label class="control-label">Holder Name*</label>
                                                        <div class="ui search focus">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text"
                                                                    name="holdername" value="" id="holder[name]"
                                                                    required="" maxlength="64"
                                                                    placeholder="Holder Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group mt-1">
                                                        <label class="control-label">Card Number*</label>
                                                        <div class="ui search focus">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text"
                                                                    name="cardnumber" value="" id="card[number]"
                                                                    required="" maxlength="64"
                                                                    placeholder="Card Number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group mt-1">
                                                        <label class="control-label">Expiration Month*</label>
                                                        <div class="ui fluid search dropdown form-dropdown selection">
                                                            <select name="card[expire-month]">
                                                                <option value="">Month</option>
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                            </select><i class="dropdown icon"></i><input class="search"
                                                                autocomplete="off" tabindex="0">
                                                            <div class="default text">Month</div>
                                                            <div class="menu" tabindex="-1">
                                                                <div class="item" data-value="1">January</div>
                                                                <div class="item" data-value="2">February</div>
                                                                <div class="item" data-value="3">March</div>
                                                                <div class="item" data-value="4">April</div>
                                                                <div class="item" data-value="5">May</div>
                                                                <div class="item" data-value="6">June</div>
                                                                <div class="item" data-value="7">July</div>
                                                                <div class="item" data-value="8">August</div>
                                                                <div class="item" data-value="9">September</div>
                                                                <div class="item" data-value="10">October</div>
                                                                <div class="item" data-value="11">November</div>
                                                                <div class="item" data-value="12">December</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group mt-1">
                                                        <label class="control-label">Expiration Year*</label>
                                                        <div class="ui search focus">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text"
                                                                    name="card[expire-year]" maxlength="4"
                                                                    placeholder="Year">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group mt-1">
                                                        <label class="control-label">CVV*</label>
                                                        <div class="ui search focus">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" name="card[cvc]"
                                                                    maxlength="3" placeholder="CVV">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group mt-1">
                                                        <label class="control-label">Add Balance*</label>
                                                        <div class="ui search focus">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text"
                                                                    name="addbalance" maxlength="3"
                                                                    placeholder="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="next-btn16 hover-btn mt-3">Add Balance</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>History</h4>
                                        </div>
                                        <div class="history-body scrollstyle_4">
                                            <ul class="history-list">
                                                <li>
                                                    <div class="purchase-history">
                                                        <div class="purchase-history-left">
                                                            <h4>Purchase</h4>
                                                            <p>Transaction ID <ins>gambo14255896</ins></p>
                                                            <span>6 May 2018, 12.56PM</span>
                                                        </div>
                                                        <div class="purchase-history-right">
                                                            <span>-<i class="fa-solid fa-indian-rupee-sign"></i>
                                                                25</span>
                                                            <a href="#">View</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="purchase-history">
                                                        <div class="purchase-history-left">
                                                            <h4>Purchase</h4>
                                                            <p>Transaction ID <ins>gambo14255895</ins></p>
                                                            <span>5 May 2018, 11.16AM</span>
                                                        </div>
                                                        <div class="purchase-history-right">
                                                            <span>-<i class="fa-solid fa-indian-rupee-sign"></i>
                                                                21</span>
                                                            <a href="#">View</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="purchase-history">
                                                        <div class="purchase-history-left">
                                                            <h4>Purchase</h4>
                                                            <p>Transaction ID <ins>gambo14255894</ins></p>
                                                            <span>4 May 2018, 02.56PM</span>
                                                        </div>
                                                        <div class="purchase-history-right">
                                                            <span>-<i class="fa-solid fa-indian-rupee-sign"></i>
                                                                30</span>
                                                            <a href="#">View</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="purchase-history">
                                                        <div class="purchase-history-left">
                                                            <h4>Purchase</h4>
                                                            <p>Transaction ID <ins>gambo14255893</ins></p>
                                                            <span>3 May 2018, 5.56PM</span>
                                                        </div>
                                                        <div class="purchase-history-right">
                                                            <span>-<i class="fa-solid fa-indian-rupee-sign"></i>
                                                                15</span>
                                                            <a href="#">View</a>
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
            </div>
        </div>

    </div>


    @include('front.layout.fotter')
</body>

</html>
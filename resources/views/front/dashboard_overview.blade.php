{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>Grocery</title>

    <!-- <link rel="icon" type="image/png" href="images/fav.png"> -->

    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/night-mode.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">
</head> --}}
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
                                        <h4><i class="uil uil-apps"></i>Overview</h4>
                                    </div>
                                    <div class="welcome-text">
                                        <h2>Hi! {{ userinfo()->name ?? 'User'}}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>My Rewards</h4>
                                        </div>
                                        <div class="ddsh-body">
                                            <h2>6 Rewards</h2>
                                            <ul>
                                                <li>
                                                    <a href="#" class="small-reward-dt hover-btn">Won $2</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="small-reward-dt hover-btn">Won 40% Off</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="small-reward-dt hover-btn">Caskback $1</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="rewards-link5">+More</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="more-link14">Rewards and Details <i
                                                class="uil uil-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>My Orders</h4>
                                        </div>
                                        <div class="ddsh-body">
                                            <h2>2 Recently Purchases</h2>
                                            <ul class="order-list-145">
                                                <li>
                                                    <div class="smll-history">
                                                        <div class="order-title">2 Items <span data-inverted=""
                                                                data-tooltip="2kg broccoli, 1kg Apple"
                                                                data-position="top center">?</span></div>
                                                        <div class="order-status">On the way</div>
                                                        <p><i class="fa-solid fa-indian-rupee-sign"></i> 22</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="more-link14">All Orders <i
                                                class="uil uil-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>My Wallet</h4>
                                        </div>
                                        <div class="wllt-body">
                                            <h2>Credits <i class="fa-solid fa-indian-rupee-sign"></i> 100</h2>
                                            <ul class="wallet-list">
                                                <li>
                                                    <a href="#" class="wallet-links14"><i
                                                            class="uil uil-card-atm"></i>Payment Methods</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="wallet-links14"><i class="uil uil-gift"></i>3
                                                        offers Active</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="wallet-links14"><i
                                                            class="uil uil-coins"></i>Points Earning</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="more-link14">Rewards and Details <i
                                                class="uil uil-angle-double-right"></i></a>
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
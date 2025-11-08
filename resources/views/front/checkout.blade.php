<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>Checkout</title>

    <!-- <link rel="icon" type="image/png" href="images/fav.png"> -->

    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='{{ asset('front/vendor/unicons-2.0.1/css/unicons.css') }}' rel='stylesheet'>
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/night-mode.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/step-wizard.css') }}" rel="stylesheet">

    <link href="{{ asset('front/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/semantic/semantic.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

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
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-product-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div id="checkout_wizard" class="checkout accordion left-chck145">

                            <div class="checkout-step">
                                <div class="checkout-card" id="headingOne">
                                    <span class="checkout-step-number">1</span>
                                    <h4 class="checkout-step-title">
                                        <button class="wizard-btn" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Phone Number Verification</button>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="collapse in show" data-parent="#checkout_wizard">
                                    <div class="checkout-step-body">
                                        <p>We need your phone number so we can inform you about any delay or problem.
                                        </p>
                                        <p class="phn145">4 digits code send your phone <span>+91{{userinfo()->mobile}}</span><a
                                                class="edit-no-btn hover-btn" data-toggle="collapse"
                                                href="#edit-number">Edit</a></p>
                                        <div class="collapse" id="edit-number">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="checkout-login">
                                                        <form>
                                                            <div class="login-phone">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Phone Number">
                                                            </div>
                                                            <a class="chck-btn hover-btn" role="button"
                                                                data-toggle="collapse" href="#otp-verifaction">Send
                                                                Code</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="otp-verifaction">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-0">
                                                        <label class="control-label">Enter Code</label>
                                                        <ul class="code-alrt-inputs">
                                                            <li>
                                                                <input id="code[1]" name="number" type="text"
                                                                    placeholder="" class="form-control input-md"
                                                                    required="">
                                                            </li>
                                                            <li>
                                                                <input id="code[2]" name="number" type="text"
                                                                    placeholder="" class="form-control input-md"
                                                                    required="">
                                                            </li>
                                                            <li>
                                                                <input id="code[3]" name="number" type="text"
                                                                    placeholder="" class="form-control input-md"
                                                                    required="">
                                                            </li>
                                                            <li>
                                                                <input id="code[4]" name="number" type="text"
                                                                    placeholder="" class="form-control input-md"
                                                                    required="">
                                                            </li>
                                                            <li>
                                                                <a class="collapsed chck-btn hover-btn" role="button"
                                                                    data-toggle="collapse"
                                                                    data-parent="#checkout_wizard"
                                                                    href="#collapseTwo">Next</a>
                                                            </li>
                                                        </ul>
                                                        <a href="#" class="resend-link">Resend Code</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-step">
                                <div class="checkout-card" id="headingTwo">
                                    <span class="checkout-step-number">2</span>
                                    <h4 class="checkout-step-title">
                                        <button class="wizard-btn collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo"> Delivery Address</button>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#checkout_wizard">
                                    <div class="checkout-step-body">
                                        <div class="checout-address-step">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="">

                                                        <div class="form-group">
                                                            {{-- <div class="product-radio">
                                                                <ul class="product-now">
                                                                    <li>
                                                                        <input type="radio" id="ad1" name="address1"
                                                                            checked="">
                                                                        <label for="ad1">Home</label>
                                                                    </li>
                                                                    <li>
                                                                        <input type="radio" id="ad2" name="address1">
                                                                        <label for="ad2">Office</label>
                                                                    </li>
                                                                    <li>
                                                                        <input type="radio" id="ad3" name="address1">
                                                                        <label for="ad3">Other</label>
                                                                    </li>
                                                                </ul>
                                                            </div> --}}
                                                            <label for="addressSelect" class="control-label">Select Delivery Address</label>
                                                            <select id="addressSelect" name="address_id" class="form-control">
                                                                @forelse($addresses as $address)
                                                                    <option value="{{ $address->id }}">
                                                                        {{ ucfirst($address->type) }} - {{ $address->address_line }}, {{ $address->city }}, {{ $address->state }} - {{ $address->pincode }}
                                                                    </option>
                                                                @empty
                                                                    <option value="">No saved addresses found</option>
                                                                @endforelse
                                                                <option value="new">➕ Add New Address</option>
                                                            </select>
                                                        </div>
                                                        <div class="address-fieldset" style="display: none;">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name*</label>
                                                                        <input id="name" name="name" type="text"
                                                                            placeholder="Name"
                                                                            class="form-control input-md" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Email
                                                                            Address*</label>
                                                                        <input id="email1" name="email1" type="text"
                                                                            placeholder="Email Address"
                                                                            class="form-control input-md" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Flat / House /
                                                                            Office No.*</label>
                                                                        <input id="flat" name="flat" type="text"
                                                                            placeholder="Address"
                                                                            class="form-control input-md" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Street / Society /
                                                                            Office Name*</label>
                                                                        <input id="street" name="street" type="text"
                                                                            placeholder="Street Address"
                                                                            class="form-control input-md">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Pincode*</label>
                                                                        <input id="pincode" name="pincode" type="text"
                                                                            placeholder="Pincode"
                                                                            class="form-control input-md" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Locality*</label>
                                                                        <input id="Locality" name="locality" type="text"
                                                                            placeholder="Enter City"
                                                                            class="form-control input-md" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="address-btns">
                                                                            <button
                                                                                class="save-btn14 hover-btn">Save</button>
                                                                            <a class="collapsed ml-auto next-btn16 hover-btn"
                                                                                role="button" data-toggle="collapse"
                                                                                data-parent="#checkout_wizard"
                                                                                href="#collapseThree"> Next </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-step">
                                <div class="checkout-card" id="headingThree">
                                    <span class="checkout-step-number">3</span>
                                    <h4 class="checkout-step-title">
                                        <button class="wizard-btn collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree"> Delivery Time &amp; Date </button>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#checkout_wizard">
                                    <div class="checkout-step-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Select Date and Time*</label>
                                                    <div class="date-slider-group">
                                                        <div
                                                            class="owl-carousel date-slider owl-theme owl-loaded owl-drag">

                                                            <div class="owl-stage-outer">
                                                                <div class="owl-stage"
                                                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">

                                                                    @for ($i = 0; $i < 8; $i++)
                                                                        @php
                                                                            $date = now()->addDays($i);
                                                                            $label = match ($i) {
                                                                                0 => 'Today',
                                                                                1 => 'Tomorrow',
                                                                                default => $date->format('d M Y'),
                                                                            };
                                                                        @endphp
                                                                    <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input 
                                                                                    type="radio" 
                                                                                    id="dd{{ $i }}" 
                                                                                    name="delivery_date" 
                                                                                    value="{{ $date->format('Y-m-d') }}" 
                                                                                    {{ $i === 4 ? 'checked' : '' }}
                                                                                >
                                                                                <label for="dd{{ $i }}">{{ $label }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endfor

                                                                    {{-- <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input type="radio" id="dd1"
                                                                                    name="address1" checked="">
                                                                                <label for="dd1">Today</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input type="radio" id="dd2"
                                                                                    name="address1">
                                                                                <label for="dd2">Tomorrow</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input type="radio" id="dd3"
                                                                                    name="address1">
                                                                                <label for="dd3">10 May 2020</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input type="radio" id="dd4"
                                                                                    name="address1">
                                                                                <label for="dd4">11 May 2020</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input type="radio" id="dd5"
                                                                                    name="address1">
                                                                                <label for="dd5">12 May 2020</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input type="radio" id="dd6"
                                                                                    name="address1">
                                                                                <label for="dd6">13 May 2020</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input type="radio" id="dd7"
                                                                                    name="address1">
                                                                                <label for="dd7">14 May 2020</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="owl-item">
                                                                        <div class="item">
                                                                            <div class="date-now">
                                                                                <input type="radio" id="dd8"
                                                                                    name="address1" >
                                                                                <label for="dd8">15 May 2020</label>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="owl-nav disabled"><button type="button"
                                                                    role="presentation" class="owl-prev"><span
                                                                        aria-label="Previous">←</span></button><button
                                                                    type="button" role="presentation"
                                                                    class="owl-next"><span
                                                                        aria-label="Next">→</span></button></div>
                                                            <div class="owl-dots disabled"></div>
                                                        </div>
                                                    </div>
                                                    <div class="time-radio">
                                                        <div class="ui form">
                                                            <div class="grouped fields">
                                                                <div class="field">
                                                                    <div class="ui radio checkbox chck-rdio">
                                                                        <input type="radio" name="fruit"
                                                                            tabindex="0" class="hidden">
                                                                        <label>8.00AM - 10.00AM</label>
                                                                    </div>
                                                                </div>
                                                                <div class="field">
                                                                    <div class="ui radio checkbox chck-rdio">
                                                                        <input type="radio" name="fruit" tabindex="0"
                                                                            class="hidden">
                                                                        <label>10.00AM - 12.00PM</label>
                                                                    </div>
                                                                </div>
                                                                <div class="field">
                                                                    <div class="ui radio checkbox chck-rdio">
                                                                        <input type="radio" name="fruit" tabindex="0"
                                                                            class="hidden">
                                                                        <label>12.00PM - 2.00PM</label>
                                                                    </div>
                                                                </div>
                                                                <div class="field">
                                                                    <div class="ui radio checkbox chck-rdio">
                                                                        <input type="radio" name="fruit" tabindex="0"
                                                                            class="hidden">
                                                                        <label>2.00PM - 4.00PM</label>
                                                                    </div>
                                                                </div>
                                                                <div class="field">
                                                                    <div class="ui radio checkbox chck-rdio">
                                                                        <input type="radio" name="fruit" tabindex="0"
                                                                            class="hidden" checked="">
                                                                        <label>4.00PM - 6.00PM</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="collapsed next-btn16 hover-btn" role="button" data-toggle="collapse"
                                            href="#collapseFour"> Proccess to payment </a>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-step">
                                <div class="checkout-card" id="headingFour">
                                    <span class="checkout-step-number">4</span>
                                    <h4 class="checkout-step-title">
                                        <button class="wizard-btn collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">Payment</button>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                    data-parent="#checkout_wizard">
                                    <div class="checkout-step-body">
                                        <div class="payment_method-checkout">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="rpt100">
                                                        <ul class="radio--group-inline-container_1">
                                                            <li>
                                                                <div class="radio-item_1">
                                                                    <input id="cashondelivery1" value="cashondelivery"
                                                                        name="paymentmethod" type="radio"
                                                                        data-minimum="50.0">
                                                                    <label for="cashondelivery1"
                                                                        class="radio-label_1">Cash on Delivery</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="radio-item_1">
                                                                    <input id="card1" value="card" name="paymentmethod"
                                                                        type="radio" data-minimum="50.0">
                                                                    <label for="card1" class="radio-label_1">Upi /
                                                                        Debit Card</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="form-group return-departure-dts"
                                                        data-method="cashondelivery">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pymnt_title">
                                                                    <h4>Cash on Delivery</h4>
                                                                    <p>Cash on Delivery will not be available if your
                                                                        order value exceeds <i
                                                                            class="fa-solid fa-indian-rupee-sign"></i>
                                                                        10.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group return-departure-dts" data-method="card">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="pymnt_title mb-4">
                                                                    <h4>Credit / Debit Card</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group mt-1">
                                                                    <label class="control-label">Holder Name*</label>
                                                                    <div class="ui search focus">
                                                                        <div class="ui left icon input swdh11 swdh19">
                                                                            <input class="prompt srch_explore"
                                                                                type="text" name="holdername" value=""
                                                                                id="holder[name]" required=""
                                                                                maxlength="64"
                                                                                placeholder="Holder Name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group mt-1">
                                                                    <label class="control-label">Card Number*</label>
                                                                    <div class="ui search focus">
                                                                        <div class="ui left icon input swdh11 swdh19">
                                                                            <input class="prompt srch_explore"
                                                                                type="text" name="cardnumber" value=""
                                                                                id="card[number]" required=""
                                                                                maxlength="64"
                                                                                placeholder="Card Number">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group mt-1">
                                                                    <label class="control-label">Expiration
                                                                        Month*</label>
                                                                    <div
                                                                        class="ui fluid search dropdown form-dropdown selection">
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
                                                                        </select><i class="dropdown icon"></i><input
                                                                            class="search" autocomplete="off"
                                                                            tabindex="0">
                                                                        <div class="default text">Month</div>
                                                                        <div class="menu" tabindex="-1">
                                                                            <div class="item" data-value="1">January
                                                                            </div>
                                                                            <div class="item" data-value="2">February
                                                                            </div>
                                                                            <div class="item" data-value="3">March</div>
                                                                            <div class="item" data-value="4">April</div>
                                                                            <div class="item" data-value="5">May</div>
                                                                            <div class="item" data-value="6">June</div>
                                                                            <div class="item" data-value="7">July</div>
                                                                            <div class="item" data-value="8">August
                                                                            </div>
                                                                            <div class="item" data-value="9">September
                                                                            </div>
                                                                            <div class="item" data-value="10">October
                                                                            </div>
                                                                            <div class="item" data-value="11">November
                                                                            </div>
                                                                            <div class="item" data-value="12">December
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group mt-1">
                                                                    <label class="control-label">Expiration
                                                                        Year*</label>
                                                                    <div class="ui search focus">
                                                                        <div class="ui left icon input swdh11 swdh19">
                                                                            <input class="prompt srch_explore"
                                                                                type="text" name="card[expire-year]"
                                                                                maxlength="4" placeholder="Year">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group mt-1">
                                                                    <label class="control-label">CVV*</label>
                                                                    <div class="ui search focus">
                                                                        <div class="ui left icon input swdh11 swdh19">
                                                                            <input class="prompt srch_explore"
                                                                                name="card[cvc]" maxlength="3"
                                                                                placeholder="CVV">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <a href="#" class="next-btn16 hover-btn" id="placeOrderBtn">Place Order</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-5">
                        <div class="pdpt-bg mt-0">
                            <div class="pdpt-title">
                                <h4>Order Summary</h4>
                            </div>
                            <div class="right-cart-dt-body">
                                @forelse($cart as $id => $item)
                                @php
                                    $product = \App\Models\Product::find($id);
                                @endphp
                                <div class="cart-item border_radius">
                                    <div class="cart-product-img">
                                        {{-- <img src="{{ asset('front/images/product/img-11.jpg') }}" alt=""> --}}
                                        {!! categoryImage($item['image'], 60, 60) !!}
                                        <div class="offer-badge">{{ getDiscountPercent($product->mrp_price, $product->base_price) }}</div>
                                        {{-- <div class="offer-badge">4% OFF</div> --}}
                                    </div>
                                    <div class="cart-text">
                                        <h4>{{ $item['name'] }}</h4>
                                        <div class="cart-item-price"><i class="fa-solid fa-indian-rupee-sign"></i> 
                                            {{ $item['price'] }}
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->mrp_price }}</span>
                                        </div>
                                        {{-- <button type="button" class="cart-close-btn remove-cart-item" data-id="{{ $id }}">
                                            <i class="uil uil-multiply"></i>
                                        </button> --}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="total-checkout-group">
                                <div class="cart-total-dil">
                                    <h4>Gambo Super Market</h4>
                                    <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $subtotal }}</span>
                                </div>
                                <div class="cart-total-dil pt-3">
                                    <h4>Delivery Charges</h4>
                                    <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $delivery }}</span>
                                </div>
                            </div>
                            <div class="cart-total-dil saving-total ">
                                <h4>Total Saving</h4>
                                <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $saving }}</span>
                            </div>
                            <div class="main-total-cart">
                                <h2>Total</h2>
                                <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $total }}</span>
                            </div>
                            <div class="payment-secure">
                                <i class="uil uil-padlock"></i>Secure checkout
                            </div>
                        </div>
                        <a href="#" class="promo-link45">Have a promocode?</a>
                        <div class="checkout-safety-alerts">
                            <p><i class="uil uil-sync"></i>100% Replacement Guarantee</p>
                            <p><i class="uil uil-check-square"></i>100% Genuine Products</p>
                            <p><i class="uil uil-shield-check"></i>Secure Payments</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.layout.fotter')

    <script>
        $(document).on('change', '#addressSelect', function() {
            if ($(this).val() === 'new') {
                $('.address-fieldset').slideDown();
            } else {
                $('.address-fieldset').slideUp();
            }
        });

        $(document).on('click', '#placeOrderBtn', function(e) {
            e.preventDefault();

            // Get selected payment method
            let paymentMethod = $('input[name="paymentmethod"]:checked').val();

            // Get selected address ID
            let addressId = $('select[name="address_id"]').val() || $('input[name="address_id"]:checked').val();

            // Get selected delivery date
            let deliveryDate = $('input[name="delivery_date"]:checked').next('label').text().trim() ||
                            $('input[name="address1"]:checked').next('label').text().trim(); // fallback if same name used

            // Get selected delivery time
            let deliveryTime = $('input[name="delivery_time"]:checked').next('label').text().trim() ||
                            $('input[name="fruit"]:checked').next('label').text().trim(); // fallback if same name used

            // Get OTP fields (if required)
            let otp = '';
            $('.otp-verifaction input[name="number"]').each(function() {
                otp += $(this).val();
            });

            // Basic validation
            if (!addressId) {
                alert("Please select or add a delivery address.");
                return;
            }

            if (!deliveryDate) {
                alert("Please select a delivery date.");
                return;
            }

            if (!deliveryTime) {
                alert("Please select a delivery time.");
                return;
            }

            if (!paymentMethod) {
                alert("Please select a payment method.");
                return;
            }

            // Optional: check OTP
            if ($('.otp-verifaction').is(':visible') && otp.length < 4) {
                alert("Please enter a valid 4-digit OTP.");
                return;
            }

            // Prepare data
            let orderData = {
                address_id: addressId,
                payment_method: paymentMethod,
                delivery_date: deliveryDate,
                delivery_time: deliveryTime,
                otp: otp,
            };

            // AJAX call
            $.ajax({
                url: "/user/checkout/process",
                type: "POST",
                data: orderData,
                beforeSend: function() {
                    $('#placeOrderBtn').text('Processing...').prop('disabled', true);
                },
                success: function(res) {
                    if (res.status === 'success') {
                        alert('Order placed successfully!');
                        // window.location.href = '/order/success/' + res.order_id;
                    } else {
                        alert(res.message || 'Something went wrong.');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON?.message || 'Server error.');
                },
                complete: function() {
                    $('#placeOrderBtn').text('Place Order').prop('disabled', false);
                }
            });
        });

    </script>

</body>

</html>
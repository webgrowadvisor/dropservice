@include('front.layout.head')

<body>
    <div class="sign-inup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sign-form">
                        <div class="sign-inner">
                            <div class="sign-logo" id="logo">
                                <a href="{{route('home')}}"><img src="{{ asset('front/images/logo.png') }}" alt=""></a>
                                <a href="{{route('home')}}"><img class="logo-inverse" src="{{ asset('front/images/dark-logo.png') }}" alt=""></a>
                            </div>
                            <div class="form-dt">
                                <div class="form-inpts checout-address-step">
                                    <form>
                                        <div class="form-title">
                                            <h6>Request a Password Reset</h6>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="email[address]" name="emailaddress" type="email"
                                                placeholder="Your Email Address" class="form-control lgn_input"
                                                required="">
                                            <i class="uil uil-envelope lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="password[old]" name="passwordold" type="password"
                                                placeholder="Enter Old Password" class="form-control lgn_input"
                                                required="">
                                            <i class="uil uil-padlock lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="password[new]" name="passwordnew" type="password"
                                                placeholder="Enter New Password" class="form-control lgn_input"
                                                required="">
                                            <i class="uil uil-padlock lgn_icon"></i>
                                        </div>
                                        <button class="login-btn hover-btn" type="submit">Reset Password</button>
                                    </form>
                                </div>

                                <div class="signup-link">
                                    <p>Go Back - <a href="sign_in.html">Sign In Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text text-center mt-3">
                        <i class="uil uil-copyright"></i>Copyright 2022 <b>Grocery</b> . All rights reserved
                    </div>
                </div>
            </div>
        </div>
    </div>

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
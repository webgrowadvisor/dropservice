{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>Grocery</title>

    <link rel="icon" type="image/png" href="images/fav.png">

    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/night-mode.css" rel="stylesheet">
    <link href="css/step-wizard.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">
</head> --}}
@include('front.layout.head')

<body>
    <div class="sign-inup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sign-form">
                        <div class="sign-inner">
                            <div class="sign-logo" id="logo">
                                <a href="{{ route('home')}}"><img src="{{ asset('front/images/logo.png') }}" alt=""></a>
                                <a href="{{ route('home')}}"><img class="logo-inverse" src="{{ asset('front/images/dark-logo.png') }}" alt=""></a>
                            </div>
                            <div class="form-dt">
                                <div class="form-inpts checout-address-step">
                                    <form action="{{route('user.check')}}" method="POST">
                                        @csrf
                                        <div class="form-title">
                                            <h6>Sign In</h6>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="" name="mobile" type="text"
                                                placeholder="Enter Phone Number" class="form-control lgn_input"
                                                required="">
                                            <i class="uil uil-mobile-android-alt lgn_icon"></i>
                                            @error('mobile')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="" name="password" type="password"
                                                placeholder="Enter Password" class="form-control lgn_input" required="">
                                            <i class="uil uil-padlock lgn_icon"></i>
                                            @error('password')
                                            <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button class="login-btn hover-btn" type="submit">Sign In Now</button>
                                    </form>
                                </div>
                                <div class="password-forgor">
                                    <a href="{{ route('user.forget') }}">Forgot Password?</a>
                                </div>
                                <div class="signup-link">
                                    <p>Don't have an account? - <a href="{{ route('user.singup') }}">Sign Up Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text text-center mt-3">
                        <i class="uil uil-copyright"></i>Copyright {{date('Y')}} <b>Grocery</b> . All rights reserved
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
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
                                @php
                                    use App\Models\Category;
                                    $cats = Category::where('status', 1)->orderBy('id', 'asc')->limit(10)->get();
                                @endphp

                                @foreach($cats as $cat)
                                    <li>
                                        <a href="{{ route('category_product',$cat->slug) }}">
                                            {{ $cat->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="second-row-item">
                            <h4>Useful Links</h4>
                            <ul>
                                @php
                                    use App\Models\Page;
                                    $pages = Page::where('status', 1)->orderBy('id', 'asc')->limit(10)->get();
                                @endphp

                                @foreach($pages as $page)
                                    <li>
                                        <a href="{{ route('page.show', $page->slug) }}">
                                            {{ $page->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="second-row-item">
                            <h4>Top Cities</h4>
                            <ul>
                                @php
                                    use App\Models\ServiceLocation;
                                    $citys = ServiceLocation::where('status', 1)->orderBy('id', 'asc')->limit(10)->get();
                                @endphp

                                @foreach($citys as $city)
                                    <li>
                                        <a href="javascript:void(0);" class="channel_item" data-id="{{ $city->id }}" data-name="{{ $city->name }}">
                                            {{ $city->name }}
                                        </a>
                                    </li>
                                @endforeach
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
                            <i class="uil uil-copyright"></i>Copyright {{date('Y')}} <b>{{projectName()}}</b> . All rights reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>


    @livewireScripts
    
    <script data-cfasync="false" src="{{ asset('front/../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/vendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('front/vendor/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <script src="{{ asset('front/js/offset_overlay.js') }}"></script>
    <script src="{{ asset('front/js/night-mode.js') }}"></script>

    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" onload="this.rel='stylesheet'" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @if(session()->has('success_msg'))
        <script> toastr.success(@json(session()->get('success_msg'))); </script>
    @endif
    @if(session()->has('error_msg'))
        <script> toastr.error(@json(session()->get('error_msg'))); </script>
    @endif

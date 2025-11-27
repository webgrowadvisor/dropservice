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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-product-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel-group accordion" id="accordion0">

                            @foreach($locations as $index => $location)
                                @php
                                    $collapseId = 'collapse' . $index;
                                    $headingId = 'heading' . $index;
                                @endphp

                                <div class="panel panel-default">
                                    <div class="panel-heading" id="{{ $headingId }}">
                                        <div class="panel-title">
                                            <a class="collapsed {{ $loop->first ? '' : 'collapsed' }}"
                                            data-toggle="collapse"
                                            data-target="#{{ $collapseId }}"
                                            href="#"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="{{ $collapseId }}">
                                                <i class="uil uil-location-point chck_icon"></i>{{ $location->name }}
                                            </a>
                                        </div>
                                    </div>

                                    <div id="{{ $collapseId }}"
                                        class="panel-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        role="tabpanel"
                                        aria-labelledby="{{ $headingId }}"
                                        data-parent="#accordion0">
                                        <div class="panel-body">
                                            <strong>{{ $location->name }} Branch :</strong><br>
                                            {!! nl2br(e($location->address)) !!}<br>
                                            @if($location->phone)
                                                <div>Tel: <span class="color-pink">{{ $location->phone }}</span></div>
                                            @endif
                                            {{-- <div><strong>Shipping Cost:</strong> ₹{{ number_format($location->shipping_cost, 2) }}</div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="panel panel-default">
                                <div class="panel-heading" id="headingOne">
                                    <div class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" href="#"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            <i class="uil uil-location-point chck_icon"></i>Ludhiana
                                        </a>
                                    </div>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingOne" data-parent="#accordion0" style="">
                                    <div class="panel-body">
                                        Ludhiana Head Office:<br>
                                        #0000, St No. 0, Lorem ipsum dolor sit amet, Main road, Ludhiana, Punjab<br>
                                        Ludhiana- 141001<br>
                                        <div class="color-pink">Tel: 0000-000-000</div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-title">
                            <h2>Submit customer service request</h2>
                            <p>If you have a question about our service or have an issue to report, please send a
                                request and we will get back to you as soon as possible.</p>
                        </div>
                        <div class="contact-form">
                            <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="form-group mt-1">
                                    <label class="control-label">Email Address*</label>
                                    <div class="ui search focus">
                                        <div class="ui left icon input swdh11 swdh19">
                                            <input class="prompt srch_explore" type="email" name="email"
                                                placeholder="Your Email Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-1">
                                    <label class="control-label">Subject*</label>
                                    <div class="ui search focus">
                                        <div class="ui left icon input swdh11 swdh19">
                                            <input class="prompt srch_explore" type="text" name="subject"
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-1">
                                    <div class="field">
                                        <label class="control-label">Message*</label>
                                        <textarea rows="2" name="message" class="form-control" placeholder="Write Message"></textarea>
                                    </div>
                                </div>
                                <button class="next-btn16 hover-btn mt-3" type="submit">Submit Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('front.layout.fotter')

</body>

</html>
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
                                <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="default-dt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="title129">
                            <h2>{{ $page->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-product-grid">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-title">
                            {!!$page->content!!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    @include('front.layout.fotter')

</body>

</html>
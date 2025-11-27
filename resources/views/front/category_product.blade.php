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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Category</li>
                                <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($category->name) }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-product-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-top-dt">
                            <div class="product-left-title">
                                <h2>{{ ucfirst($category->name) }}</h2>
                            </div>
                            <a href="javascript:void(0);" id="filter_click" class="filter-btn pull-bs-canvas-right">Filters</a>
                            <div class="product-sort">
                                <div class="ui selection dropdown vchrt-dropdown">
                                    <input name="sort" type="hidden" value="{{ request('sort') ?? 'default' }}">
                                    <i class="dropdown icon d-icon"></i>
                                    <div class="text">{{ ucfirst(str_replace('_', ' ', request('sort') ?? 'Popularity')) }}</div>
                                    <div class="menu">
                                        <div class="item" data-value="default">Popularity</div>
                                        <div class="item" data-value="price_low">Price - Low to High</div>
                                        <div class="item" data-value="price_high">Price - High to Low</div>
                                        <div class="item" data-value="alpha">Alphabetical</div>
                                        <div class="item" data-value="off_high">% Off - High to Low</div>
                                        <div class="item" data-value="off_low">% Off - Low to High</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-list-view">
                    <div class="row">

                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item mb-30">
                                <a href="{{ route('single_product_view', ['slug' => $product->slug]) }}" class="product-img">
                                    {!! productImage($product->thumbnail) !!}
                                    <div class="product-absolute-options">
                                        @if($product->mrp_price > $product->base_price)
                                            <span class="offer-badge-1">{{ getDiscountPercent($product->mrp_price, $product->base_price) }}</span>
                                        @endif
                                        <span class="like-icon {{ auth()->check() && auth()->user()->wishlists->contains('product_id', $product->id) ? 'active' : '' }}" 
                                            data-id="{{ $product->id }}" title="wishlist"></span>
                                    </div>
                                </a>

                                <div class="product-text-dt">
                                    <p>Available<span>({{ ($product->stock > 0) ? 'In Stock' : 'Out of Stock' }})</span></p>
                                    <h4>{{ $product->name }}</h4>

                                    <div class="product-price">
                                        <i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->base_price }}
                                        @if($product->mrp_price > $product->base_price)
                                            <span><i class="fa-solid fa-indian-rupee-sign"></i> {{ $product->mrp_price }}</span>
                                        @endif
                                    </div>

                                    <div class="qty-cart">
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus minus-btn">
                                            <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                            <input type="button" value="+" class="plus plus-btn">
                                        </div>
                                        <span class="cart-icon add-to-cart" data-id="{{ $product->id }}"><i class="uil uil-shopping-cart-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="pagination-wrapper">
                        {{$products->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.layout.fotter')

    <script>
        $('.vchrt-dropdown .item').on('click', function() {
            let sort = $(this).data('value');
            let url = new URL(window.location.href);
            url.searchParams.set('sort', sort);
            window.location.href = url.toString();
        });

        $('#filter_click').on('click', function() {
            let sort = $('.vchrt-dropdown input[name="sort"]').val(); // get from hidden input
            let url = new URL(window.location.href);
            url.searchParams.set('sort', sort);
            window.location.href = url.toString();
        });
    </script>

</body>

</html>
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
                                        <h4><i class="uil uil-location-point"></i>My Address</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="pdpt-bg">
                                        <div class="pdpt-title">
                                            <h4>My Address</h4>
                                        </div>
                                        <div class="address-body">
                                            <a href="#" class="add-address hover-btn" data-toggle="modal" data-target="#address_model">
                                                Add New Address
                                            </a>
                                        @foreach($addresses as $address)
                                            <div class="address-item">
                                                <div class="address-icon1">
                                                    <i class="uil uil-home-alt"></i>
                                                </div>
                                                <div class="address-dt-all">
                                                    <h4>{{ $address->type }}</h4>
                                                    <p>{{ $address->address_line }}, {{ $address->city }}, {{ $address->state }} - {{ $address->pincode }}</p>
                                                    <ul class="action-btns">
                                                        <li>
                                                            <a href="#" class="action-btn" data-toggle="modal" data-target="#editAddressModal{{ $address->id }}"><i class="uil uil-edit"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('address.delete', $address->id) }}" class="action-btn" onclick="return confirm('Are you sure?')"><i class="uil uil-trash-alt"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Edit Address Modal -->
                                            <div class="modal fade" id="editAddressModal{{ $address->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <form method="POST" action="{{ route('address.update', $address->id) }}">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5>Edit Address</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="text" name="type" value="{{ $address->type }}" class="form-control" placeholder="Type (Home/Office)">
                                                                <input type="text" name="address_line" value="{{ $address->address_line }}" class="form-control mt-2" placeholder="Address">
                                                                <input type="text" name="city" value="{{ $address->city }}" class="form-control mt-2" placeholder="City">
                                                                <input type="text" name="state" value="{{ $address->state }}" class="form-control mt-2" placeholder="State">
                                                                <input type="text" name="pincode" value="{{ $address->pincode }}" class="form-control mt-2" placeholder="Pincode">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Save Changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
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

    <!-- Add New Address Modal -->
    <div class="modal fade" id="address_model" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('address.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Add New Address</h5>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="type" class="form-control" placeholder="Type (Home/Office)">
                        <input type="text" name="address_line" class="form-control mt-2" placeholder="Address">
                        <input type="text" name="city" class="form-control mt-2" placeholder="City">
                        <input type="text" name="state" class="form-control mt-2" placeholder="State">
                        <input type="text" name="pincode" class="form-control mt-2" placeholder="Pincode">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Address</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @include('front.layout.fotter')
</body>

</html>
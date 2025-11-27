<div id="category_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog"
        aria-modal="false">
        <div class="modal-dialog category-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content">
                    <div class="cate-header">
                        <h4>Select Category</h4>
                    </div>
                    <ul class="category-by-cat">
                    @php
                        $categories = App\Models\Category::whereNull('parent_id')->where('status', 1)->with('children')->get();
                    @endphp
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('category_product',$category->slug) }}" class="single-cat-item">
                                <div class="icon">
                                    {!! categoryImage($category->thumbnail, 50, 50) !!}
                                </div>
                                <div class="text">{{ $category->name }}</div>
                            </a>
                        </li>
                    @endforeach
                        {{-- <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-1.svg') }}" alt="">
                                </div>
                                <div class="text"> Fruits and Vegetables </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-2.svg') }}" alt="">
                                </div>
                                <div class="text"> Grocery & Staples </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-3.svg') }}" alt="">
                                </div>
                                <div class="text"> Dairy & Eggs </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-4.svg') }}" alt="">
                                </div>
                                <div class="text"> Beverages </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-5.svg') }}" alt="">
                                </div>
                                <div class="text"> Snacks </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-6.svg') }}" alt="">
                                </div>
                                <div class="text"> Home Care </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-7.svg') }}" alt="">
                                </div>
                                <div class="text"> Noodles & Sauces </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-8.svg') }}" alt="">
                                </div>
                                <div class="text"> Personal Care </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="single-cat-item">
                                <div class="icon">
                                    <img src="{{ asset('front/images/category/icon-9.svg') }}" alt="">
                                </div>
                                <div class="text"> Pet Care </div>
                            </a>
                        </li> --}}
                    </ul>
                    <a href="{{ route('shop_grid') }}" class="morecate-btn"><i class="uil uil-apps"></i>More Categories</a>
                </div>
            </div>
        </div>
    </div>
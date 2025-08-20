@extends('drop.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Category</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Edit</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            
                            <a href="#" class="btn btn-primary successAlertMessage">
                                <i class="feather-user-plus me-2"></i>
                                <span>category</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">


                            <div class="card-body general-info">
                                

                                <!-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script> -->
                                <form id="razorpayForm">
                                <script 
                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ $key }}"
                                    data-amount="{{ $amount * 100 }}"
                                    data-currency="INR"
                                    data-order_id="{{ $order_id }}"
                                    data-buttontext="Pay Now"
                                    data-name="Your Store"
                                    data-description="Package Payment"
                                    data-image="/your-logo.png"
                                    data-prefill.name="{{ auth('dropservice')->user()->name }}"
                                    data-prefill.email="{{ auth('dropservice')->user()->email }}"
                                    data-theme.color="#0f6efd"
                                ></script>
                            </form>
                                    
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
      
@endsection

@section('script')

@endsection
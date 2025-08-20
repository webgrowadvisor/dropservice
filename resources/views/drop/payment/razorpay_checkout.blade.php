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
                                

                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                <script>
                                    var options = {
                                        "key": "{{ $key }}",
                                        "amount": "{{ $amount * 100 }}",
                                        "currency": "INR",
                                        "name": "Dropship Payment",
                                        "description": "Payment",
                                        "order_id": "{{ $order_id }}",
                                        "handler": function (response){
                                            var form = document.createElement('form');
                                            form.method = "POST";
                                            form.action = "{{ route('drop.payment.callback') }}";

                                            var token = document.createElement('input');
                                            token.name = "_token";
                                            token.value = "{{ csrf_token() }}";
                                            form.appendChild(token);

                                            var pid = document.createElement('input');
                                            pid.name = "razorpay_payment_id";
                                            pid.value = response.razorpay_payment_id;
                                            form.appendChild(pid);

                                            var tid = document.createElement('input');
                                            tid.name = "transaction_id";
                                            tid.value = "{{ $transaction->id }}";
                                            form.appendChild(tid);

                                            document.body.appendChild(form);
                                            form.submit();
                                        }
                                    };

                                    var rzp1 = new Razorpay(options);
                                    rzp1.open();
                                </script>
                                    
                               
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
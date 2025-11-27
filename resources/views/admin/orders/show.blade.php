<!DOCTYPE html>
<html lang="zxx">


@include('admin.partials.head')

<body>
    <!-- Left sidebar -->
    @include('admin.partials.left-sidebar')

    <!-- Header Section Start -->
    @include('admin.partials.header')
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">                    
                        <a href="{{ route('ad.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
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

                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                    data-bs-auto-close="outside">
                                    <i class="feather-more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#taskinfo" data-bs-id="1">
                                        <i class="feather feather-alert-octagon me-3"></i>
                                        <span>Comments</span>
                                    </a>

                                </div>
                            </div>
                            <!-- <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-plus me-2"></i>
                                <span>Make as Customer</span>
                            </a> -->
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->

            <div class="bg-white py-3 border-bottom rounded-0 p-md-0 mb-0">
                <div class="d-md-none d-flex">
                    <a href="javascript:void(0)" class="page-content-left-open-toggle">
                        <i class="feather-align-left fs-20"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="nav-tabs-wrapper page-content-left-sidebar-wrapper">
                        <div class="d-flex d-md-none">
                            <a href="{{ route('ad.orders.index') }}" class="page-content-left-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back to Orders</span>
                            </a>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-custom-style" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profileTab">Profile</button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#notesTab">Notes</button>
                            </li> --}}
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#commentTab">Comments</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#Activity">Activity</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                        <div class="card card-body lead-info">
                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">User Information :</span>
                                </h5>                                
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Order </div>
                                <div class="col-lg-10"><a
                                        href="javascript:void(0);">#{{ $order->id ?? '---'}}</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Order Id </div>
                                <div class="col-lg-10"><a
                                        href="javascript:void(0);">#{{ $order->order_number ?? '---'}}</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Name</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">{{ $order->user->name ?? '---'}}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Mobile</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">{{ $order->mobile ?? '---'}}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Address</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">{{ $order->address ?? '---' }}</a></div>
                            </div>

                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">Product Information :</span>
                                </h5>                                
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Product Image</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        
                                        <span>{!! variantImage($order->product->thumbnail,$order->variant?->webp, 60, 60) !!}</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Seller</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                    {{ $order->product->seller->name ?? '---' }}
                                    </a>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Product Name</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <span>{{ $order->product->name ?? '---' }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Brand Name</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <span>{{ $order->product->brand->name ?? '---' }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Variant</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">
                                        {{ $order->variant?->sku ?? 'Default / None' }}
                                    </a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Quantity</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">
                                        {{ $order->quantity }}
                                    </a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Price</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">
                                        {!! priceicon() !!}{{ $order->price }}
                                    </a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Total</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">
                                        {!! priceicon() !!}{{ $order->price * $order->quantity }}
                                    </a></div>
                            </div>

                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">Order Details :</span>
                                </h5>                                
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Status</div>
                                <div class="col-lg-10"><a href="javascript:void(0);"> {{ ucfirst($order->status) }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Payment Method</div>
                                <div class="col-lg-10"><a href="javascript:void(0);"> {{ $order->payment_method }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Delivery Type</div>
                                <div class="col-lg-10"><a href="javascript:void(0);"> {{ $order->delivery_type }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Delivery Date</div>
                                <div class="col-lg-10"><a href="javascript:void(0);"> {{ $order->delivery_date }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Delivery Time</div>
                                <div class="col-lg-10"><a href="javascript:void(0);"> {{ $order->delivery_time }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">IP Address</div>
                                <div class="col-lg-10"><a href="javascript:void(0);"> {{ $order->ip_address }}</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Change Status:</div>
                                <div class="col-lg-10">
                                    <form action="{{ route('ad.orders.update-status', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-control w-25 mb-3">
                                            <option value="placed" @selected($order->status == 'placed')>Placed</option>
                                            <option value="packed" @selected($order->status == 'packed')>Packed</option>
                                            <option value="on_the_way" @selected($order->status == 'on_the_way')>On the way</option>
                                            <option value="delivered" @selected($order->status == 'delivered')>Delivered</option>
                                            <option value="cancelled" @selected($order->status == 'cancelled')>Cancelled</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Update Status</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>

                    {{-- Order Information --}}
                    <div class="tab-pane fade" id="Activity" role="tabpanel">
                        <div class="card card-body">
                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">Order Information :</span>
                                </h5>
                            </div>

                            {{-- @if (count($customer->orders) == 0) --}}
                                <div class="mb-4 d-flex align-items-center justify-content-center">
                                    <h5 class="fw-bold mb-0">
                                        <span class="d-block mb-2">Data Not Found</span>
                                    </h5>
                                </div>
                            {{-- @endif --}} 

                           {{-- @foreach ($customer->orders as $key => $activty)
                                <div class="row mb-4">
                                    <div class="col-lg-4 fw-medium">{{ $activty->created_at }}</div>
                                    <div class="col-lg-4">
                                        <a href="javascript:void(0);">{{ $activty->full_name }}</a>
                                    </div>
                                    <div class="col-lg-4">
                                        <a href="javascript:void(0);">{{ $activty->email }}</a>
                                    </div>                                    
                                </div>
                            @endforeach --}}
                        </div>
                    </div>
                    
                    {{-- Comments Information  --}}
                    <div class="tab-pane fade" id="commentTab" role="tabpanel">
                        <div class="card card-body lead-info">
                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">Comments Information :</span>
                                </h5>
                            </div>

                            {{-- @if (count($customer->comments) == 0) --}}
                                <div class="mb-4 d-flex align-items-center justify-content-center">
                                    <h5 class="fw-bold mb-0">
                                        <span class="d-block mb-2">Data Not Found</span>
                                    </h5>
                                </div>
                            {{-- @endif --}}

                            {{--@foreach ($customer->comments as $key => $comments)--}}
                                {{-- <div class="row mb-4">
                                    <div class="col-lg-2 fw-medium">{{ $comments->created_at }}</div>
                                    <div class="col-lg-10"><a href="javascript:void(0);">{{ $comments->message }}</a></div>
                                </div> --}}
                            {{--@endforeach--}}
                        </div>
                    </div>

                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        @include('admin.partials.footer')
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--<< Footer Section Start >>-->
    @include('admin.partials.theme-customizer')
    <!--<< All JS Plugins >>-->
    @include('admin.partials.script')

    <div class="modal fade" tabindex="-1" id="taskinfo" aria-labelledby="taskinfoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comments</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body informationbox">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $('[data-bs-id]').on('click', function () {
                let Task = $(this).attr('data-bs-id');
                $('.informationbox').html('<div class="text-center">  <div class="spinner-border" role="status">    <span class="visually-hidden">Loading...</span>  </div></div>');
                $('.informationbox').load("{{url('/admin/customer-comment-send')}}/" + Task);
                $('.modal-title').text('Comments');
            });
        });
    </script>


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
</body>

</html>
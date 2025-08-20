<!DOCTYPE html>
<html lang="zxx">


@include('partials.head')

<body>
    <!-- Left sidebar -->
    @include('partials.left-sidebar')

    <!-- Header Section Start -->
    @include('partials.header')
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Product Info</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">View</li>
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

                            <a href="{{ route('lead.product.edit', $LeadProduct->id) }}" class="btn btn-icon btn-light-brand">
                                <i class="feather-edit"></i>
                            </a>
                            {{-- <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                    data-bs-auto-close="outside">
                                    <i class="feather-more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#taskinfo" data-bs-id="{{$leads->id}}">
                                        <i class="feather feather-alert-octagon me-3"></i>
                                        <span>Comments</span>
                                    </a>

                                </div>
                            </div> --}}
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
                            <a href="javascript:void(0)" class="page-content-left-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-custom-style" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profileTab">Profile</button>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#Activity">Product/Service Buyer</button>
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
                                    <span class="d-block mb-2">Product Information :</span>
                                    <span class="fs-12 fw-normal text-muted d-block">Following information for your
                                        lead</span>
                                </h5>
                                
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Prodcut Name</div>
                                <div class="col-lg-10"><a
                                        href="javascript:void(0);">{{ $LeadProduct->product_name ?? '---' }}</a></div>
                            </div>                           
                           
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Description</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">{{ $LeadProduct->description ?? '---' }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Quantity</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">{{ $LeadProduct->quantity ?? '---' }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Price</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">
                                        {{ $LeadProduct->price ?? '---' }}
                                    </a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Product Life</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">{{ $LeadProduct->produc_life ?? '---' }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Day</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">
                                        {{ $LeadProduct->day ?? '---' }}
                                    </a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Type</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">{{ $LeadProduct->type ?? '---' }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Upsale Product</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">{{ $LeadProduct->upsale ?? '---' }}</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Renewal Time</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">
                                {{ $LeadProduct->renwal ?? '---' }} Day</a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Status</div>
                                <div class="col-lg-10">
                                    @if($LeadProduct->status == '1')
                                        {{ 'Active' }}
                                    @else 
                                        {{ 'InActive' }}
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                       
                    </div>

                    <div class="tab-pane fade" id="Activity" role="tabpanel">
                        <div class="card card-body">
                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">Buyer Information :</span>
                                </h5>
                            </div>

                            @if (count($leads) == 0)
                                <div class="mb-4 d-flex align-items-center justify-content-center">
                                    <h5 class="fw-bold mb-0">
                                        <span class="d-block mb-2">Data Not Found</span>
                                    </h5>
                                </div>
                            @endif

                            @foreach ($leads as $key => $activty)
                                <div class="row mb-4">
                                    <div class="col-lg-3 fw-medium">{{ $activty->full_name }}</div>
                                    <div class="col-lg-3">
                                        <a href="javascript:void(0);">{{ $activty->email }}</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="javascript:void(0);">{{ $activty->phone }}</a>
                                    </div> 
                                    <div class="col-lg-3">
                                        <a href="javascript:void(0);">{{ $activty->lead_source }}</a>
                                    </div>                                    
                                </div>
                            @endforeach
                        </div>
                    </div>                    

                    {{-- <div class="tab-pane fade" id="commentTab" role="tabpanel">
                        <div class="card card-body lead-info">
                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">Comments Information :</span>
                                </h5>
                            </div>

                            @if (count($leads->comment) == 0)
                                <div class="mb-4 d-flex align-items-center justify-content-center">
                                    <h5 class="fw-bold mb-0">
                                        <span class="d-block mb-2">Data Not Found</span>
                                    </h5>
                                </div>
                            @endif

                            @foreach ($leads->comment as $key => $comments)
                                <div class="row mb-4">
                                    <div class="col-lg-2 fw-medium">{{ $comments->created_at }}</div>
                                    <div class="col-lg-10"><a href="javascript:void(0);">{{ $comments->message }}</a></div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}

                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        @include('partials.footer')
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--<< Footer Section Start >>-->
    @include('partials.theme-customizer')
    <!--<< All JS Plugins >>-->
    @include('partials.script')

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
                $('.informationbox').load("{{url('admin/leads-comment-send')}}/" + Task);
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
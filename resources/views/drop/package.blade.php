<!DOCTYPE html>
<html lang="zxx">


@include('drop.partials.head')

<body>
    <!-- Left sidebar -->
    @include('drop.partials.left-sidebar')

    <!-- Header Section Start -->
    @include('drop.partials.header')
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">                    
                        <a href="#" class="btn btn-secondary">Back to Orders</a>
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
                
            </div>

            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                        <div class="card card-body lead-info">
                            

                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">Information :</span>
                                </h5>                                
                            </div>
                            
                            <div class="row mb-4">
                                @foreach ($packages as $pkg)
                                    <div class="col-md-4 mb-4">
                                        <form action="{{ route('drop.package.buy') }}" method="POST">
                                        @csrf
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body text-center d-flex justify-content-center flex-column">
                                                <h4 class="card-title">{{ $pkg['name'] }}</h4>
                                                <h5 class="text-success mb-3">{{ $pkg['price'] }}</h5>
                                                <h5 class="text-danger mb-3">{{ $pkg['duration_days'] }} Days</h5>
                                                <input type="hidden" name="commission" value="{{ $pkg['commission'] }}">
                                                <input type="hidden" name="duration_days" value="{{ $pkg['duration_days'] }}">
                                                <input type="hidden" name="package_name" value="{{ $pkg['name'] }}">
                                                <input type="hidden" name="price" value="{{ preg_replace('/[^\d.]/', '', $pkg['price']) }}">
                                                <ul class="list-unstyled mb-3">
                                                    @foreach ($pkg['features'] as $feature)
                                                        <li>✅ {{ $feature }}</li>
                                                        <input type="hidden" name="features[]" value="{{ $feature }}">
                                                    @endforeach
                                                </ul>
                                                <button type="submit" class="btn btn-primary">Buy Package</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            <!-- <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">IP Address</div>
                                <div class="col-lg-10">
                                    <a href="javascript:void(0);"> 12000</a>
                                </div>
                            </div> -->
                            
                        </div>
                        
                    </div>

                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        @include('drop.partials.footer')
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--<< Footer Section Start >>-->
    @include('drop.partials.theme-customizer')
    <!--<< All JS Plugins >>-->
    @include('drop.partials.script')

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
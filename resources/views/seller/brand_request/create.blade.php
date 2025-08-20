@extends('seller.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add Brand</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Create</li>
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
                            
                            <a href="javascript:void(0);" class="btn btn-primary ">
                                <i class="feather-user-plus me-2"></i>
                                <span>Create </span>
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
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <form action="{{ route('seller.brand.request.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Brand Info :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">Brand information for your </span>
                                    </h5>                                   
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Brand Name: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="brand_name" 
                                            value="{{ old('brand_name') }}" id="fullnameInput" placeholder="Brand Name">
                                        </div>
                                        @error('brand_name') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Brand Certificate (PDF/JPG/PNG): </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="file" class="form-control" name="brand_certificate" 
                                            value="{{ old('brand_certificate') }}" >                                            
                                        </div>
                                        @error('brand_certificate') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">GST Certificate (PDF/JPG/PNG): </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="file" class="form-control" name="gst_certificate" 
                                            value="{{ old('gst_certificate') }}" >                                            
                                        </div>
                                        @error('gst_certificate') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" class="submit-fix btn btn-primary" >Submit Request</button>
                                    </div>
                                </div>
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

<script>
    

    $(document).ready(function () {        

        $('#interested_product').on('change', function () {
            var productId = $(this).val();

            if (productId) {
                $.ajax({
                    url: '/admin/get-product-details/' + productId,
                    type: 'GET',
                    success: function (response) {
                        $('#product').text(response.produc_life);
                        $('#quantity').text(response.quantity);
                        $('#product_price').text(response.price);
                        $('#product_description').text(response.description);
                        $('#product_details').show();
                        if(response.upsale == 'Yes'){
                            $('#product_upsale').show();
                        }else{
                            $('#product_upsale').hide();
                        }
                    }
                });
            } else {
                $('#product_details').hide();
            }
        });
    });
</script>

@endsection
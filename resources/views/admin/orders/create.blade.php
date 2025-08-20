@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add orders with Variants</h5>
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
            <form action="{{ route('ad.orders.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Categories Info :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">General information for your Categories </span>
                                    </h5>                                   
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="user_id" class="fw-semibold">User: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <select name="user_id" class="form-control" data-select2-selector="status">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                                @endforeach  
                                            </select>                                             
                                        </div>
                                        @error('user_id') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="product_id" class="fw-semibold">Product: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <select name="product_id" class="form-control" id="product-select" data-select2-selector="status">
                                                <option value="">-- Select Product --</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }} (Base: ₹{{ $product->base_price }})</option>
                                                @endforeach 
                                            </select>                                             
                                        </div>
                                        @error('product_id') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="variant_id">Variant (optional)</label>
                                            <select name="variant_id" class="form-control" id="variant-select">
                                                <option value="">-- Select Variant --</option>
                                                {{-- Variants can be dynamically loaded via JS or preloaded --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="quantity" class="fw-semibold">Quantity: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="number" class="form-control" name="quantity" 
                                            value="{{ old('name', 1) }}" id="" placeholder="Quantity">                                            
                                        </div>
                                        @error('quantity') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="mobile" class="fw-semibold">Mobile: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="number" class="form-control" name="mobile" 
                                            value="{{ old('mobile') }}" id="" placeholder="Mobile">                                            
                                        </div>
                                        @error('mobile') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="address" class="fw-semibold">Address: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="address" 
                                            value="{{ old('address') }}" id="" placeholder="Address">                                            
                                        </div>
                                        @error('address') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Payment Method: <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <select name="payment_method" class="form-control" data-select2-selector="status">
                                                <option value="COD">Cash on Delivery</option>
                                                <option value="Paid">Paid</option>                                               
                                            </select>                                            
                                        </div>
                                        @error('payment_method') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="delivery_type" class="fw-semibold">Delivery Type: <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <select name="delivery_type" class="form-control" data-select2-selector="status">
                                                <option value="Normal">Normal</option>
                                                <option value="VIP">VIP</option>                                               
                                            </select>                                            
                                        </div>
                                        @error('delivery_type') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" class="submit-fix btn btn-primary" >Place Order</button>
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
        
            $('#product-select').change(function() {
                let productId = $(this).val();
                $('#variant-select').empty().append('<option value="">Loading...</option>');

                if (productId) {
                    $.get('/admin/product/' + productId + '/variants', function(variants) {
                        let variantOptions = '<option value="">-- Select Variant --</option>';
                        if (variants.length > 0) {
                            variants.forEach(variant => {
                                let display = `SKU: ${variant.sku} | ₹${variant.price} | Stock: ${variant.stock}`;
                                variantOptions += `<option value="${variant.id}">${display}</option>`;
                            });
                        } else {
                            variantOptions += `<option value="">No variants found</option>`;
                        }
                        $('#variant-select').html(variantOptions);
                    });
                } else {
                    $('#variant-select').html('<option value="">-- Select Variant --</option>');
                }
            });

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
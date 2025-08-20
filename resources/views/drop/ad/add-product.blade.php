@extends('layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Product Add</h5>
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
                            
                            <a href="{{ route('lead.product') }}" class="btn btn-primary">
                                <i class="feather-user-plus me-2"></i>
                                <span>Product List</span>
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
            <form action="{{ route('lead.addProduct') }}" method="post">
                @csrf
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body lead-status">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Product Add :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">Typically refers to adding a new Product Add</span>
                                    </h5>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 mb-4">
                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" data-select2-selector="status">
                                            <option @if(old('status') == '1') {{ 'selected' }} @endif value="1">Active</option>
                                            <option @if(old('status') == '0') {{ 'selected' }} @endif value="0">InActive</option>
                                        </select>
                                        @error('status') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror     
                                        
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <label class="form-label">Type<span class="text-danger">*</span></label>
                                        <select name="type" class="form-control" data-select2-selector="status">
                                            <option @if(old('type') == 'Service') {{ 'selected' }} @endif value="Service">Service</option>
                                            <option @if(old('type') == 'Product') {{ 'selected' }} @endif value="Product">Product</option>                                            
                                        </select>
                                        @error('type') 
                                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror 
                                    </div>                                    

                                    <div class="col-lg-3 mb-4">
                                        <label class="form-label">Product Life<span class="text-danger">*</span></label>
                                        <select id="product_life" name="produc_life" class="form-control" data-select2-selector="status">
                                            <option @if(old('produc_life') == 'Lifetime') {{ 'selected' }} @endif value="Lifetime">Lifetime</option>
                                            <option @if(old('produc_life') == 'Expirable') {{ 'selected' }} @endif value="Expirable">Expirable</option>                                            
                                        </select>
                                        @error('produc_life') 
                                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                    
                                    <div class="col-lg-3 mb-4">
                                        <label class="form-label">Product Upsale<span class="text-danger">*</span></label>
                                        <select id="" name="upsale" class="form-control" data-select2-selector="status">
                                            <option @if(old('upsale') == 'No') {{ 'selected' }} @endif value="No">No</option>
                                            <option @if(old('upsale') == 'Yes') {{ 'selected' }} @endif value="Yes">Yes</option>                                            
                                        </select>
                                        @error('upsale') 
                                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                                                      
                                </div>
                            </div>

                            <hr class="mt-0">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Basic Info :</span>
                                    </h5>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Product Name: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="product_name" 
                                            value="{{ old('product_name') }}" id="fullnameInput" placeholder="Product Name">                                            
                                        </div>
                                        @error('product_name') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="mailInput" class="fw-semibold">Description: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-mail"></i></div>
                                            <input type="text" class="form-control" value="{{ old('description') }}" name="description" 
                                            id="mailInput" placeholder="Description">                                            
                                        </div>
                                        @error('description') 
                                           <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="usernameInput" class="fw-semibold">Price: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-phone"></i></div>
                                            <input type="number" class="form-control" 
                                            id="usernameInput" placeholder="Price" name="price" value="{{ old('price') }}">                                            
                                        </div>
                                        @error('price') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Quantity: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-link-2"></i></div>
                                            <input type="number" class="form-control" 
                                            id="" placeholder="Quantity" name="quantity" value="{{ old('quantity') }}">                                            
                                        </div>
                                        @error('quantity') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Renewal Day: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-link-2"></i></div>
                                            <input type="number" class="form-control" 
                                            id="" placeholder="Renewal Day" name="renwal" value="{{ old('renwal') }}">
                                        </div>
                                        @error('renwal') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-4 align-items-center" id="days_field" style="display: none;">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Product LifeTime Days: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-link-2"></i></div>
                                            <input type="number" class="form-control" 
                                            id="" placeholder="Product LifeTime Days" name="days" value="{{ old('days') }}">                                            
                                        </div>
                                        @error('days') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" class="submit-fix btn btn-primary" >Add Product</button>
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
    $(document).ready(function() {
        function toggleDaysField() {
            if ($('#product_life').val() === 'Expirable') {
                $('#days_field').show();
            } else {
                $('#days_field').hide();
            }
        }

        // Initial check on page load
        toggleDaysField();

        // Listen for changes
        $('#product_life').on('change', function() {
            toggleDaysField();
        });
    });
</script>

@endsection
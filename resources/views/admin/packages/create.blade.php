@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add Package</h5>
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
            <form action="{{ route('ad.packages.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Package Info :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">General information for your package </span>
                                    </h5>
                                </div>     
                                
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Status: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <select name="status" class="form-control" data-select2-selector="status">
                                                <option {{ old('status') == '1' ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ old('status') == '0' ? 'selected' : '' }} value="0">Inactive</option>                                            
                                            </select>                                             
                                        </div>
                                        @error('status') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Package Name: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="name" 
                                            value="{{ old('name') }}" id="fullnameInput" placeholder="Package Name">                                            
                                        </div>
                                        @error('name') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Price ({{ priceicon() }}): <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="number" class="form-control" name="price" 
                                            value="{{ old('price') }}" id="fullnameInput" placeholder="Price ({{ priceicon() }})">                                            
                                        </div>
                                        @error('price') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Commission (%): <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="number" class="form-control" name="commission" 
                                            value="{{ old('commission') }}" placeholder="15">                                            
                                        </div>
                                        @error('commission') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Duration (Days): <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="duration_days" 
                                            value="{{ old('duration_days') }}" id="fullnameInput" placeholder="30">                                            
                                        </div>
                                        @error('duration_days') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Features: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control  mt-3" name="features[]" placeholder="e.g. 10 products">
                                        </div>
                                        <div class="input-group">                                          
                                            <input type="text" class="form-control mt-3" name="features[]" placeholder="e.g. Standard support">                                                                                        
                                        </div>
                                        <div class="input-group" id="feature-wrapper"></div>
                                        <button type="button" class="btn btn-sm btn-outline-primary mt-3" onclick="addFeature()">+ Add Feature</button>
                                        @error('name') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" class="submit-fix btn btn-primary" >Save Package</button>
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
    function addFeature() {
        const wrapper = document.getElementById('feature-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'features[]';
        input.classList.add('form-control', 'mt-2');
        input.placeholder = 'Enter feature';
        wrapper.appendChild(input);
    }
</script>

@endsection
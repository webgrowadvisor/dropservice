@extends('admin.layout.main')

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
            
            <!-- [ Main Content ] start -->
            <form action="{{ route('ad.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">


                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Category Info :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">General information for your Category</span>
                                    </h5>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Status: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <select name="status" class="form-control" data-select2-selector="status">
                                                <option {{ old('status', $category->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ old('status', $category->status) == '0' ? 'selected' : '' }} value="0">Inactive</option>                                            
                                            </select>                                             
                                        </div>
                                        @error('status') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Category
                                        Name: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="name" 
                                            value="{{ old('name', $category->name) }}" id="fullnameInput" placeholder="Category Name">                                            
                                        </div>
                                        @error('name') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Main Category: <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <select name="parent_id" class="form-control" data-select2-selector="status">
                                                <option value=""> --- parent category ---</option>
                                                @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->name }}
                                                </option>
                                                @endforeach
                                            </select>                               
                                        </div>
                                        @error('parent_id') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Slug: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="slug" 
                                            value="{{ old('slug', $category->slug) }}" id="" placeholder="slug Name">                                            
                                        </div>
                                        @error('slug') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" class="submit-fix btn btn-primary" >Save Category</button>
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

@endsection
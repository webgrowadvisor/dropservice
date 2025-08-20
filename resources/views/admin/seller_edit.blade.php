@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Seller/Employee</h5>
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
                                <span>Create Seller/Employee</span>
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
            <form action="{{ route('seller.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <hr class="mt-0">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Basic Info :</span>
                                    </h5>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Edit Seller</a>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Full
                                        Name: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="name" 
                                            value="{{ old('name', $user->name) }}" id="fullnameInput" placeholder="Full Name">                                            
                                        </div>
                                        @error('name') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="mailInput" class="fw-semibold">Email: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-mail"></i></div>
                                            <input type="text" class="form-control" value="{{ old('email', $user->email) }}" name="email" 
                                            id="mailInput" placeholder="Email">                                            
                                        </div>
                                        @error('email') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="usernameInput" class="fw-semibold">Phone Number: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-phone"></i></div>
                                            <input type="tel" class="form-control" 
                                            id="usernameInput" placeholder="Phone Number" name="mobile" value="{{ old('mobile', $user->mobile) }}">                                            
                                        </div>
                                        @error('mobile') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="gst" class="fw-semibold">GST: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="gst" 
                                            value="{{ old('gst', $user->gst) }}" id="" placeholder="GST">                                            
                                        </div>
                                        @error('gst') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="gst" class="fw-semibold">Address: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="address" 
                                            value="{{ old('address', $user->address) }}" id="" placeholder="Address">                                            
                                        </div>
                                        @error('address') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select name="status" class="form-control" data-select2-selector="status">
                                            <option @if($user->status == '1') {{ 'selected' }} @endif value="1">Active</option>
                                            <option @if($user->status == '0') {{ 'selected' }} @endif value="0">InActive</option>
                                        </select>
                                        @error('status') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Password: <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-link-2"></i></div>
                                            <input type="password" class="form-control" 
                                            id="" placeholder="Password" name="password" value="{{ old('password') }}">                                            
                                        </div>
                                        @error('password') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" class="submit-fix btn btn-primary" >Update User</button>
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
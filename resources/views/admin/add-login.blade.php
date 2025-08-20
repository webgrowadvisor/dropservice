@extends('layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">User/Employee</h5>
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
                            {{-- <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
                                <i class="feather-layers me-2"></i>
                                <span>Save as Draft</span>
                            </a> --}}
                            <a href="{{ route('user') }}" class="btn btn-primary ">
                                <i class="feather-user-plus me-2"></i>
                                <span>User/Employee</span>
                            </a>
                            <!-- successAlertMessage -->
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
            <form action="{{ route('add-user') }}" method="post">
                @csrf
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body lead-status">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">User/Employee Status :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">Typically refers to adding a new User/Employee</span>
                                    </h5>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 mb-4">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control" data-select2-selector="status">
                                            <option @if(old('status') == '1') {{ 'selected' }} @endif value="1">Active</option>
                                            <option @if(old('status') == '0') {{ 'selected' }} @endif value="0">InActive</option>
                                        </select>
                                        @error('status') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror     
                                        
                                    </div>
                                    <div class="col-lg-3 mb-4">
                                        <label class="form-label">Department</label>
                                        <select name="department" class="form-control" data-select2-selector="status">
                                            <option @if(old('department') == 'Sales') {{ 'selected' }} @endif value="Sales">Sales</option>
                                            <option @if(old('department') == 'Admin') {{ 'selected' }} @endif value="Admin">Admin</option>
                                            <option @if(old('department') == 'Logistics') {{ 'selected' }} @endif value="Logistics">Logistics</option>
                                            <option @if(old('department') == 'Verification') {{ 'selected' }} @endif value="Verification">Verification</option>
                                            <option @if(old('department') == 'Manager') {{ 'selected' }} @endif value="Manager">Manager</option>
                                        </select>
                                        @error('department') 
                                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror 
                                    </div>                                    

                                    <div class="col-lg-3 mb-4">
                                        <label class="form-label">Permission:</label>
                                        <select class="form-select form-control" name="permission[]" data-select2-selector="tag" multiple>
                                            <option @if(old('permission') == 'Sales') {{ 'selected' }} @endif value="Sales" data-bg="bg-success">Sales</option>
                                            <option @if(old('permission') == 'Admin') {{ 'selected' }} @endif value="Admin" data-bg="bg-info">Admin</option>
                                            <option @if(old('permission') == 'Logistics') {{ 'selected' }} @endif value="Logistics" data-bg="bg-primary">Logistics</option>
                                            <option @if(old('permission') == 'Verification') {{ 'selected' }} @endif value="Verification" data-bg="bg-teal">Verification</option>
                                            <option @if(old('permission') == 'Manager') {{ 'selected' }} @endif value="Manager" data-bg="bg-success">Manager</option>
                                            <option @if(old('permission') == 'Customers') {{ 'selected' }} @endif value="Customers" data-bg="bg-success">Customers</option>
                                        </select> 
                                        @error('permission') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror                                            
                                    </div>

                                    <div class="col-lg-3 mb-4">
                                        <label class="form-label">Sales Parity</label>
                                        <select name="parity" class="form-control" data-select2-selector="status">
                                            <option @if(old('parity') == 'Yes') {{ 'selected' }} @endif value="Yes">Yes</option>
                                            <option @if(old('parity') == 'No') {{ 'selected' }} @endif value="No">No</option>
                                        </select>
                                        @error('parity') 
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
                                        <label for="fullnameInput" class="fw-semibold">Full
                                        Name: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="full_name" 
                                            value="{{ old('full_name') }}" id="fullnameInput" placeholder="Full Name">                                            
                                        </div>
                                        @error('full_name') 
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
                                            <input type="text" class="form-control" value="{{ old('email') }}" name="email" 
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
                                            id="usernameInput" placeholder="Phone Number" name="phone" value="{{ old('phone') }}">                                            
                                        </div>
                                        @error('phone') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Password: <span class="text-danger">*</span></label>
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

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Max Leads: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-link-2"></i></div>
                                            <input type="number" class="form-control" 
                                            id="" placeholder="Max Leads In One Day" name="maxleads" value="{{ old('maxleads') }}"> 
                                        </div>
                                        @error('maxleads') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" class="submit-fix btn btn-primary" >Add User</button>
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
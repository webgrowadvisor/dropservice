@extends('layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Logo Part</h5>
                    </div>
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
                            
                            <a href="{{ route('leads') }}" class="btn btn-primary">
                                <i class="feather-user-plus me-2"></i>
                                <span>Lead List</span>
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
            
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body lead-status">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Big Logo :</span>                                        
                                    </h5>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-5 mb-4">
                                    <form action="{{ route('logo.change') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label class="form-label">
                                            Big Logo<span class="text-danger">*</span>
                                        </label>
                                        
                                        <input type="file" class="form-control" name="big" >
                                        @error('big') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror     
                                        
                                    </div>
                                    <div class="col-lg-4"></div>                             
                                </div>
                               
                            </div>

                            <div class="card-body lead-status">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Small Logo :</span>                                        
                                    </h5>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-5 mb-4">
                                    
                                        <label class="form-label">Small Logo<span class="text-danger">*</span></label>
                                        
                                        <input type="file" class="form-control" name="small" >
                                        @error('small') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror     
                                        
                                    </div>
                                    <div class="col-lg-4"></div>                             
                                </div>
                                
                            </div>

                            <div class="card-body lead-status">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Defult Avtar :</span>                                        
                                    </h5>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-5 mb-4">
                                    
                                        <label class="form-label">Defult Avtar<span class="text-danger">*</span></label>
                                        
                                        <input type="file" class="form-control" name="defult" >
                                        @error('defult') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror     
                                        
                                    </div>
                                    <div class="col-lg-4"></div>                             
                                </div>
                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4">
                                        <button type="submit" name="third" class="btn btn-primary" >Change</button>
                                        </from>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
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
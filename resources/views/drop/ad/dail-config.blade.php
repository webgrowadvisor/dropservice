@extends('layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Set VicidialLog</h5>
                    </div>
                </div>                
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <form action="{{ route('dial.configchange') }}" method="post">
                @csrf
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Vici Info for dialLog :</span>
                                        <!-- <span class="fs-12 fw-normal text-muted text-truncate-1-line">General information for your lead</span> -->
                                    </h5>                                   
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">source: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="source" 
                                            value="{{ old('source', $credential->source) }}" id="" placeholder="source"> 
                                        </div>
                                        @error('source') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="mailInput" class="fw-semibold">user: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" value="{{ old('user', $credential->user) }}" name="user" 
                                            id="" placeholder="user">
                                        </div>
                                        @error('user') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="usernameInput" class="fw-semibold">pass: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" 
                                            id="usernameInput" placeholder="pass" name="pass" value="{{ old('pass', $credential->pass) }}">
                                        </div>
                                        @error('pass') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">agent_user: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="agent_user" 
                                            value="{{ old('agent_user', $credential->agent_user) }}" placeholder="agent_user">
                                        </div>
                                        @error('agent_user') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">phone_code: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="phone_code" 
                                            value="{{ old('phone_code', $credential->phone_code) }}" placeholder="phone_code">
                                        </div>
                                        @error('phone_code') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>                                

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">search: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <select id="" name="search" class="form-control" data-select2-selector="search">
                                                <option @if($credential->search == 'YES') {{ 'selected' }} @endif value="YES">YES</option>                                    
                                                <option @if($credential->search == 'NO') {{ 'selected' }} @endif value="NO">NO</option>
                                            </select>
                                        </div>
                                        @error('search') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">preview: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <select id="" name="preview" class="form-control" data-select2-selector="preview">
                                                <option @if($credential->preview == 'YES') {{ 'selected' }} @endif value="YES">YES</option>                                    
                                                <option @if($credential->preview == 'NO') {{ 'selected' }} @endif value="NO">NO</option>
                                            </select>
                                        </div>
                                        @error('preview') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">focus: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <select id="" name="focus" class="form-control" data-select2-selector="focus">
                                                <option @if($credential->focus == 'YES') {{ 'selected' }} @endif value="YES">YES</option>                                    
                                                <option @if($credential->focus == 'NO') {{ 'selected' }} @endif value="NO">NO</option>
                                            </select>
                                        </div>
                                        @error('focus') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">is_active: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <select id="" name="status" class="form-control" data-select2-selector="status">
                                                <option @if($credential->status == '1') {{ 'selected' }} @endif value="1">Active</option>                                    
                                                <option @if($credential->status == '0') {{ 'selected' }} @endif value="0">Inactive</option>                                    
                                            </select>
                                        </div>
                                        @error('status') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>                                
                                
                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" 
                                            class="submit-fix btn btn-primary" >
                                            Set VicidialLog Credentials
                                        </button>
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
    });
</script>

@endsection
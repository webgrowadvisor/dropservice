@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Leads</h5>
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
                            
                            <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                <i class="feather-bar-chart"></i>
                            </a>

                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="modal" data-bs-target="#taskinfo" data-bs-date="true" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter"></i>
                                </a>                                
                            </div>                  

                            <a href="#" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Create Lead</span>
                            </a>
                            <a href="{{ url()->current() }}" class="btn btn-warning ">
                                <i class="feather-at-sign"></i>
                                <span> Reset</span>
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

            <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
                <div class="accordion-body pb-2">
                    <div class="row">
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-users"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="d-block">Total Leads</span>
                                                <span class="fs-24 fw-bolder d-block">
                                                150
                                                </span>
                                            </a>
                                        </div>
                                        <div class="badge bg-soft-success text-success">
                                            <i class="fs-10 me-1"></i>
                                            <span>
                                                100%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-user-check"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="d-block">Active Leads</span>
                                                <span class="fs-24 fw-bolder d-block">250</span>
                                            </a>
                                        </div>
                                        <div class="badge bg-soft-success text-success">
                                            <i class=" fs-10 me-1"></i>
                                            <span>
                                                25%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-user-plus"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="d-block">New Leads</span>
                                                <span class="fs-24 fw-bolder d-block">20</span>
                                            </a>
                                        </div>
                                        <div class="badge bg-soft-success text-success">
                                            <i class="feather-arrow-up fs-10 me-1"></i>
                                            <span>
                                            25%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-user-minus"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="d-block">Inactive Leads</span>
                                                <span class="fs-24 fw-bolder d-block">5</span>
                                            </a>
                                        </div>
                                        <div class="badge bg-soft-success text-success">
                                            <i class="fs-10 me-1"></i>
                                            <span>
                                            5%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
             
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="leadList">
                                        <thead>
                                            <tr>
                                                <th>Label</th>
                                                <th>Lead</th>
                                                <th>Email</th>
                                                <th>Source</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         {{-- @foreach($leads as $key => $lead) --}}
                                            <tr class="single-item">
                                                <td>1
                                                {{-- ($leads->currentPage() - 1) * $leads->perPage() + $key + 1 --}} 
                                                </td>                                                
                                                <td>12563322</td>                                                
                                                <td>123</td>
                                                {{-- <select class="form-control update-status" data-select2-selector="status">
                                                        <option value="Ringing">Ringing</option>
                                                    </select> --}}
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="#" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#taskinfo" 
                                                                    data-bs-id="#" >
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Comments</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#taskinfo" 
                                                                    data-bs-pay="#" >
                                                                        <i class="feather-dollar-sign"></i>
                                                                        <span>Advance Payment</span>
                                                                    </a>
                                                                </li>                                                                
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" onclick="return confirm('Do you want to delete ?')" href="#">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                         {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                                {{-- @if(count($leads) == 0) --}} 
                                    <div class="d-flex justify-content-center mt-4">
                                    <h3>{{ 'Data Not Found' }}</h3>
                                    </div>
                                {{-- @endif  --}}
                            </div> 
                        </div>
                    </div>
                </div>
                {{-- $leads->links('pagination::bootstrap-5') --}}
            </div>
            <!-- [ Main Content ] end -->            
        </div>     
        
@endsection



@section('script')

<script>        

    $(document).ready(function() { 
        
        $('[data-bs-id]').on('click',function(){
            let Task = $(this).attr('data-bs-id');
            $('.informationbox').html('<div class="text-center">  <div class="spinner-border" role="status">    <span class="visually-hidden">Loading...</span>  </div></div>');
            {{-- $('.informationbox').load("{{url('/admin/leads-comment-send')}}/"+Task); --}}
            $('.modal-title').text('Comments');
        });

        $('[data-bs-pay]').on('click',function(){
            let Task = $(this).attr('data-bs-pay');
            $('.informationbox').html('<div class="text-center">  <div class="spinner-border" role="status">    <span class="visually-hidden">Loading...</span>  </div></div>');
            {{-- $('.informationbox').load("{{url('/admin/leads-pay')}}/"+Task); --}}
            $('.modal-title').text('Advance Payment');
        });

        $('[data-bs-date]').on('click',function(){   
            let Url = 'leads';          
            $('.informationbox').html('<div class="text-center">  <div class="spinner-border" role="status">    <span class="visually-hidden">Loading...</span>  </div></div>');
            {{-- $('.informationbox').load("{{url('/admin/filter-emp')}}/"+Url); --}}
            $('.modal-title').text('Custom Filter');
        });

        $('.update-status').change(function() {
            var leadId = $(this).data('lead-id');
            var status = $(this).val();
            let Task = $(this).attr('data-lead-id');   
            
            $.ajax({
                url: '',
                type: 'POST',
                data: {
                    _token: XCSRF_Token,
                    lead_status: status
                },
                success: function(response) {
                    toastr.success(response.success_msg);                    
                },
                error: function(xhr) {
                    console.log(xhr);
                    alert('Error updating status. Please try again.');
                }
            });
        });
    });
</script>

@endsection
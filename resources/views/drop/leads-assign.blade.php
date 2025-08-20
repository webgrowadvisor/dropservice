@extends('layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Leads Assign</h5>
                    </div>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            {{-- custom filter --}}
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="modal" data-bs-target="#taskinfo" data-bs-date="true" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter"></i>
                                </a>                                
                            </div>
                            {{-- source filter --}}
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-facebook"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" style="width: auto;">
                                    @foreach($leadSources as $sources) 
                                    <a href="{{ url()->current() }}?sources={{ $sources }}" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-primary rounded-circle d-inline-block me-3"></span>
                                        <span>{{ $sources}}</span>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            {{-- user filter --}}
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" style="width: auto;">
                                    @foreach($user as $data) 
                                    <a href="{{ url()->current() }}?assign={{ $data->id }}" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-primary rounded-circle d-inline-block me-3"></span>
                                        <span>{{ $data->name .' - '. $data->department }}</span>
                                    </a>
                                    @endforeach
                                </div>
                            </div>

                            {{-- <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ url()->current() }}?status=New" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-primary rounded-circle d-inline-block me-3"></span>
                                        <span>New</span>
                                    </a>
                                    <a href="{{ url()->current() }}?status=Contacted" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-warning rounded-circle d-inline-block me-3"></span>
                                        <span>Contacted</span>
                                    </a>
                                    <a href="{{ url()->current() }}?status=Follow-up" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-success rounded-circle d-inline-block me-3"></span>
                                        <span>Follow-up</span>
                                    </a>
                                    <a href="{{ url()->current() }}?status=Qualified" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-danger rounded-circle d-inline-block me-3"></span>
                                        <span>Qualified</span>
                                    </a>
                                    <a href="{{ url()->current() }}?status=Converted" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-teal rounded-circle d-inline-block me-3"></span>
                                        <span>Converted</span>
                                    </a>
                                    <a href="{{ url()->current() }}?status=Lost" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-indigo rounded-circle d-inline-block me-3"></span>
                                        <span>Lost</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ url()->current() }}?status=Pending" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-warning rounded-circle d-inline-block me-3"></span>
                                        <span>Pending</span>
                                    </a>
                                    <a href="{{ url()->current() }}?status=In Progress" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-teal rounded-circle d-inline-block me-3"></span>
                                        <span>In Progress</span>
                                    </a>
                                </div>
                            </div> --}}

                            {{-- Bulk assign filter --}}    
                            <a href="#" class="btn btn-primary bulkremove">
                                <i class="feather-plus me-2"></i>
                                <span>Bulk Assign</span>
                            </a>      
                            {{-- Bulk delete filter --}}                       
                            <a href="#" class="btn btn-danger bulkdelete">
                                <i class="feather feather-trash-2 me-3"></i>
                                <span>Bulk Delete</span>
                            </a>
                            {{-- Bulk bulkchange filter --}}                       
                            <a href="#" class="btn btn-danger bulkchange">
                                <i class="feather-check-square me-3"></i>
                                <span>Status</span>
                            </a>
                            {{-- reset --}} 
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

            <!-- [ page-header ] end -->
             
            <!-- [ Main Content ] start -->
            <div class="main-content">
            <form method="POST" class="removfrom" action="{{route('bulk.updateassign')}}">
                @csrf
                <div class="row">

                    <div class="col-4"></div>
                    <div class="col-4">
                        <select name="lead_status_new" class="form-control" data-select2-selector="assign">
                            <option value="">-- Leads Status --</option>
                            <option @if('Demo' == 'New') {{ 'selected' }} @endif value="New">New</option>
                            <option @if('Demo' == 'Contacted') {{ 'selected' }} @endif value="Contacted">Contacted</option>
                            <option @if('Demo' == 'Follow-up') {{ 'selected' }} @endif value="Follow-up">Follow-up</option>
                            <option @if('Demo' == 'Qualified') {{ 'selected' }} @endif value="Qualified">Qualified</option>
                            <option @if('Demo' == 'Converted') {{ 'selected' }} @endif value="Converted">Converted</option>
                            <option @if('Demo' == 'Lost') {{ 'selected' }} @endif value="Lost">Lost</option>
                            <option @if('Demo' == 'Pending Verification') {{ 'selected' }} @endif value="Pending Verification">Pending Verification</option>
                            <option @if('Demo' == 'Verified') {{ 'selected' }} @endif value="Verified">Verified</option>
                            <option @if('Demo' == 'Unverified') {{ 'selected' }} @endif value="Unverified">Unverified</option>
                            <option @if('Demo' == 'Rejected') {{ 'selected' }} @endif value="Rejected">Rejected</option>
                            <option @if('Demo' == 'Duplicate') {{ 'selected' }} @endif value="Duplicate">Duplicate</option>
                            <option @if('Demo' == 'Pending Dispatch') {{ 'selected' }} @endif value="Pending Dispatch">Pending Dispatch</option>
                            <option @if('Demo' == 'Awaiting Approval') {{ 'selected' }} @endif value="Awaiting Approval">Awaiting Approval</option>
                            <option @if('Demo' == 'Awaiting Payment') {{ 'selected' }} @endif value="Awaiting Payment">Awaiting Payment</option>
                            <option @if('Demo' == 'Packing in Progress') {{ 'selected' }} @endif value="Packing in Progress">Packing in Progress</option>
                            <option @if('Demo' == 'Dispatched') {{ 'selected' }} @endif value="Dispatched">Dispatched</option>
                            <option @if('Demo' == 'Out for Delivery') {{ 'selected' }} @endif value="Out for Delivery">Out for Delivery</option>                        
                            <option @if('Demo' == 'Cancelled') {{ 'selected' }} @endif value="Cancelled">Cancelled</option>    
                            <option @if('Demo' == 'In Transit') {{ 'selected' }} @endif value="In Transit">In Transit</option>
                            <option @if('Demo' == 'Delayed') {{ 'selected' }} @endif value="Delayed">Delayed</option>    
                                            
                            <option @if('Demo' == 'Delivery Failed') {{ 'selected' }} @endif value="Delivery Failed">Delivery Failed</option>    
                            <option @if('Demo' == 'Returned to Sender') {{ 'selected' }} @endif value="Returned to Sender">Returned to Sender</option>    
                            <option @if('Demo' == 'Lost in Transit') {{ 'selected' }} @endif value="Lost in Transit">Lost in Transit</option>    
                            <option @if('Demo' == 'Damaged in Transit') {{ 'selected' }} @endif value="Damaged in Transit">Damaged in Transit</option>    
                            <option @if('Demo' == 'Refund/Replacement Requested') {{ 'selected' }} @endif value="Refund/Replacement Requested">Refund/Replacement Requested</option>    
                                            
                            <option @if('Demo' == 'Received & Verified by Client') {{ 'selected' }} @endif value="Received & Verified by Client">Received & Verified by Client</option>    
                            <option @if('Demo' == 'Delivered') {{ 'selected' }} @endif value="Delivered">Delivered</option>    
                            <option @if('Demo' == 'Closed') {{ 'selected' }} @endif value="Closed">Closed</option>                                                                                       
                        </select>
                    </div>
                    <div class="col-4 mb-2">
                        <select name="lead_assing" class="form-control" data-select2-selector="assign">
                            <option value="">-- Leads Assign --</option>
                            @foreach($user as $data)
                            <option value="{{ $data->id }}">{{ $data->name .' - '. $data->department .' Department'}}</option>
                            @endforeach                                                                                        
                        </select>
                    </div>

                    <div class="col-lg-12">                        
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="leadList">
                                        <thead>
                                            <tr>
                                                <th class="wd-30" style="width: 30px;">
                                                    <div class="btn-group mb-1">
                                                        <div class="custom-control custom-checkbox ms-1">
                                                            <input type="checkbox" class="custom-control-input" id="checkAllLead">
                                                            <label class="custom-control-label" for="checkAllLead"></label>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>Label</th>
                                                <th>Lead</th>
                                                <th>Source</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Assign</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($leads as $key => $lead)
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="check[]" value="{{$lead->id}}" class="custom-control-input checkbox" id="checkBox_{{ $key }}">
                                                            <label class="custom-control-label" for="checkBox_{{ $key }}"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                {!! getLeadLabel($lead->lead_status) !!} 
                                                </td>                                                
                                                <td>
                                                    <a class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            @if(Auth::user()->department == 'Admin' || Auth::user()->department == 'Manager')
                                                            {{ ($leads->currentPage() - 1) * $leads->perPage() + $key + 1 }}
                                                            @else                                                                
                                                            {{ $key + 1 }} 
                                                            @endif                                                                                                                          
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">
                                                                {{ $lead->full_name }} 
                                                            </span>
                                                        </div>
                                                    </a>                                                    
                                                </td>
                                                <td>{{ $lead->lead_source }}</td>
                                                <td>{{ $lead->phone }}</td>
                                                <td>First:{{ $lead->created_at->format('Y-m-d') }} </br> Last:{{ $lead->updated_at->format('Y-m-d') }}</td>
                                                <td>
                                                <select name="lead_owner" class="form-control update-assign" data-assign-id="{{ $lead->id }}" data-select2-selector="assign">
                                                    <option value="">-- Leads Assign --</option>
                                                    @foreach($user as $data)
                                                    <option @if($lead->lead_owner == $data->id) {{ 'selected' }} @endif value="{{ $data->id }}">{{ $data->name .' - '. $data->department .' Department'}}</option>
                                                    @endforeach                                                                                        
                                                </select>
                                                </td>
                                                <td>
                                                    <select class="form-control update-status" data-select2-selector="status" data-lead-id="{{ $lead->id }}">
                                                        <option @if($lead->lead_status == 'New') {{ 'selected' }} @endif value="New">New</option>
                                                        <option @if($lead->lead_status == 'Contacted') {{ 'selected' }} @endif value="Contacted">Contacted</option>
                                                        <option @if($lead->lead_status == 'Follow-up') {{ 'selected' }} @endif value="Follow-up">Follow-up</option>
                                                        <option @if($lead->lead_status == 'Qualified') {{ 'selected' }} @endif value="Qualified">Qualified</option>
                                                        <option @if($lead->lead_status == 'Lost') {{ 'selected' }} @endif value="Lost">Lost</option>
                                                        <option @if($lead->lead_status == 'Renewal') {{ 'selected' }} @endif value="Renewal">Renewal</option>
                                                        <option @if($lead->lead_status == 'Rejected') {{ 'selected' }} @endif value="Rejected">Rejected</option>
                                                        <option @if($lead->lead_status == 'Unverified') {{ 'selected' }} @endif value="Unverified">Unverified</option>
                                                        <option @if($lead->lead_status == 'Duplicate') {{ 'selected' }} @endif value="Duplicate">Duplicate</option>
                                                        <option @if($lead->lead_status == 'Busy') {{ 'selected' }} @endif value="Busy">Busy</option>
                                                        @if($lead->lead_status == 'Upsale Rejected' || $lead->lead_status == 'Upsale Converted')
                                                        <option @if($lead->lead_status == 'Upsale Converted') {{ 'selected' }} @endif value="Upsale Converted">Upsale Converted</option>
                                                        <option @if($lead->lead_status == 'Upsale Rejected') {{ 'selected' }} @endif value="Upsale Rejected">Upsale Rejected</option>
                                                        @else
                                                        <option @if($lead->lead_status == 'Converted') {{ 'selected' }} @endif value="Converted">Converted</option>
                                                        @endif
                                                        <option @if($lead->lead_status == 'Call Back') {{ 'selected' }} @endif value="Call Back">Call Back</option>
                                                        <option @if($lead->lead_status == 'Call Disconnected') {{ 'selected' }} @endif value="Call Disconnected">Call Disconnected</option>
                                                        <option @if($lead->lead_status == 'Future Call Back') {{ 'selected' }} @endif value="Future Call Back">Future Call Back</option>
                                                        <option @if($lead->lead_status == 'Hindi language') {{ 'selected' }} @endif value="Hindi language">Hindi language</option>
                                                        <option @if($lead->lead_status == 'Language barrier') {{ 'selected' }} @endif value="Language barrier">Language barrier</option>
                                                        <option @if($lead->lead_status == 'Not connected') {{ 'selected' }} @endif value="Not connected">Not connected</option>
                                                        <option @if($lead->lead_status == 'Not interested') {{ 'selected' }} @endif value="Not interested">Not interested</option>
                                                        <option @if($lead->lead_status == 'Ringing') {{ 'selected' }} @endif value="Ringing">Ringing</option>
                                                        <option @if($lead->lead_status == 'Tamil language') {{ 'selected' }} @endif value="Tamil language">Tamil language</option>
                                                        <option @if($lead->lead_status == 'Telugu language') {{ 'selected' }} @endif value="Telugu language">Telugu language</option>
                                                        <option @if($lead->lead_status == 'Wrong Number') {{ 'selected' }} @endif value="Wrong Number">Wrong Number</option>
                                                        <option @if($lead->lead_status == 'Ringing') {{ 'selected' }} @endif value="Ringing">Ringing</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('leads_view_info', $lead->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('leads.edit', $lead->id) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#taskinfo" 
                                                                    data-bs-id="{{$lead->id}}" >
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Comments</span>
                                                                    </a>
                                                                </li>
                                                                
                                                                @if(Auth::user()->department == 'Admin' || Auth::user()->department == 'Manager')
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" onclick="return confirm('Do you want to delete ?')" href="{{ route('leads.destroy', $lead->id) }}">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if(count($leads) == 0) 
                                    <div class="d-flex justify-content-center mt-4">
                                    <h3>{{ 'Data Not Found' }}</h3>
                                    </div>
                                @endif 
                            </div> 
                        </div>
                    </div>
                </div>
                </form>
                @if(Auth::user()->department == 'Admin' || Auth::user()->department == 'Manager')
                {{ $leads->links('pagination::bootstrap-5') }}
                @endif
            </div>
            <!-- [ Main Content ] end -->            
        </div>     
        
@endsection



@section('script')

<script>   
     document.addEventListener('DOMContentLoaded', function () {
        const checkAll = document.getElementById('checkAllLead');
        const checkboxes = document.querySelectorAll('.checkbox');

        checkAll.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = checkAll.checked;
            });
        });
    });

    $(document).ready(function() { 

        $('.bulkremove').on('click',function(e){
            if(confirm('Do you want to assign leads?')){
                $('.removfrom').submit();
            }
        });

        $('.bulkdelete').on('click',function(e){
            $('.removfrom').attr('action', @json(route('bulk.updatedelete')));
            if(confirm('Do you want to delete leads?')){
                $('.removfrom').submit();
            }
        });

        $('.bulkchange').on('click',function(e){
            $('.removfrom').attr('action', @json(route('bulk.statuschange')));
            if(confirm('Do you want to change status of leads?')){
                $('.removfrom').submit();
            }
        });
        
        $('[data-bs-id]').on('click',function(){
            let Task = $(this).attr('data-bs-id');
            $('.informationbox').html('<div class="text-center">  <div class="spinner-border" role="status">    <span class="visually-hidden">Loading...</span>  </div></div>');
            $('.informationbox').load("{{url('/admin/leads-comment-send')}}/"+Task);
            $('.modal-title').text('Comments');
        });

        $('[data-bs-date]').on('click',function(){            
            $('.informationbox').html('<div class="text-center">  <div class="spinner-border" role="status">    <span class="visually-hidden">Loading...</span>  </div></div>');
            $('.informationbox').load("{{url('/admin/filter-date')}}");
            $('.modal-title').text('Custom Filter');
        });

        $('.update-assign').change(function() {
            var status = $(this).val();
            var leadId = $(this).attr('data-assign-id');
           
            $.ajax({
                url: '/admin/leads/' + leadId + '/update-assign',
                type: 'POST',
                data: {
                    _token: XCSRF_Token,
                    lead_owner: status
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

        $('.update-status').change(function() {
            var leadId = $(this).data('lead-id');
            var status = $(this).val();
            let Task = $(this).attr('data-lead-id');

            $('.informationbox').html('<div class="text-center">  <div class="spinner-border" role="status">    <span class="visually-hidden">Loading...</span>  </div></div>');
            $('.informationbox').load("{{url('/admin/leads-comment-send')}}/" + Task, function() {
                $('#taskinfo').modal('show'); 
                setTimeout(function() {
                    $('#textAreaExample').val('Client want to order');
                }, 200);
                $('.modal-title').text('Status Change Comments');
            });
            
            
            $.ajax({
                url: '/admin/leads/' + leadId + '/update-status',
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
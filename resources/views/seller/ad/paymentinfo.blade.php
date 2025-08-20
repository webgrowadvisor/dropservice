@extends('layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Payment</h5>
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

                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ url()->current() }}?status=Success" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-primary rounded-circle d-inline-block me-3"></span>
                                        <span>Success</span>
                                    </a>
                                    <a href="{{ url()->current() }}?status=Pending" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-warning rounded-circle d-inline-block me-3"></span>
                                        <span>Pending</span>
                                    </a>
                                    <a href="{{ url()->current() }}" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-danger rounded-circle d-inline-block me-3"></span>
                                        <span>Reset</span>
                                    </a>
                                </div>
                            </div>
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
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="leadList">
                                        <colgroup>
                                            <col style="width:20%">
                                            <col style="width:20%">
                                            <col style="width:10%">
                                            <col style="width:10%">
                                            <col style="width:10%">
                                            <col style="width:10%">
                                            <col style="width:10%">
                                            <col style="width:10%">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>payment_gateway</th>
                                                <th>seller_id</th>
                                                <th>ip</th>
                                                <th>client_name | client_email</th>
                                                <th>amount</th>
                                                <th>pay_action</th>
                                                <th>pay_ip</th>
                                                <th class="text-end">payment_remark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($leads as $key => $lead)
                                            <tr class="single-item">
                                                
                                                <td>
                                                    <a class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            {{ ($leads->currentPage() - 1) * $leads->perPage() + $key + 1 }}                                                            
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">{{ $lead->payment_gateway }}</span>
                                                        </div>
                                                    </a>                                                    
                                                </td>
                                                <td>{{ $lead->user->name }} </br> {{ $lead->created_at }}</td>
                                                <td>{{ $lead->ip }}</td>
                                                <td>{{ $lead->client_name }}</br>{{ $lead->client_email }}</td>
                                                <td>{{ $lead->amount ?? '---' }}</td>
                                                <td>{{ $lead->pay_action ?? '---' }}</td>
                                                <td>{{ $lead->pay_ip ?? '---' }}</td>
                                                <td>{{ $lead->payment_remark ?? '---' }}</td>
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
                {{ $leads->links('pagination::bootstrap-5') }}
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
            $('.informationbox').load("{{url('/admin/leads-comment-send')}}/"+Task);
            $('.modal-title').text('Comments');
        });

        $('.update-status').change(function() {
            var leadId = $(this).data('lead-id');
            var status = $(this).val();
            let Task = $(this).attr('data-lead-id');

            //$('.informationbox').html('<div class="text-center">  <div class="spinner-border" role="status">    <span class="visually-hidden">Loading...</span>  </div></div>');
            //$('.informationbox').load("{{url('/admin/leads-comment-send')}}/" + Task, function() {
                //$('#taskinfo').modal('show'); 
                //setTimeout(function() {
                    //$('#textAreaExample').val('Client want to order');
                //}, 200);
                //$('.modal-title').text('Status Change Comments');
            //});
            
            
            $.ajax({
                url: '/admin/product/' + leadId + '/update-status',
                type: 'POST',
                data: {
                    _token: XCSRF_Token,
                    status: status
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
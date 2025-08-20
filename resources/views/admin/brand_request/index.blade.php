@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Brand Request List</h5>
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
                                    <a href="{{ url()->current() }}" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-danger rounded-circle d-inline-block me-3"></span>
                                        <span>Reset</span>
                                    </a>                                                                    
                                </div>
                            </div>  

                            {{-- <a href="{{ route('seller.brand.request') }}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Add Brand</span>
                            </a> --}}

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
                                        <thead>
                                            <tr>
                                                
                                                <th>S.No.</th>
                                                <th>Seller</th>
                                                <th>Brand Name</th>
                                                <th>Brand Certificate</th>
                                                <th>GST Certificate</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($requests as $key => $req)
                                            <tr class="single-item">                                                
                                                <td>
                                                {{ ($requests->currentPage() - 1) * $requests->perPage() + $key + 1 }}
                                                </td>
                                                <td>{{ $req->seller->name }}</td>
                                                <td>{{ $req->brand_name }}</td>
                                                <td>
                                                <a href="{{ asset('storage/' . $req->brand_certificate) }}" target="_blank">
                                                    {!! variantImage($req->brand_certificate, 60, 60) !!}
                                                </a>
                                                </td>
                                                <td>
                                                <a href="{{ asset('storage/' . $req->gst_certificate) }}" target="_blank">
                                                    {!! variantImage($req->gst_certificate, 60, 60) !!}
                                                </a>
                                                </td>
                                                <td><strong>{{ ucfirst($req->status) }}</strong></td>
                                                <td>
                                                    @if($req->status == 'pending')
                                                    <form action="{{ route('admin.brand.approve', $req->id) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm">Approve</button>
                                                    </form>
                                                    <form action="{{ route('admin.brand.reject', $req->id) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm">Reject</button>
                                                    </form>
                                                    @else
                                                    <em>No Action</em>
                                                    @endif
                                                </td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div> 
                                @if(count($requests) == 0) 
                                    <div class="d-flex justify-content-center mt-4">
                                    <h3>{{ 'Data Not Found' }}</h3>
                                    </div>
                                @endif                               
                            </div>                            
                        </div>
                    </div>
                </div>
                {{ $requests->links('pagination::bootstrap-5') }}
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
            $('.informationbox').load("{{url('leads-comment-send')}}/"+Task);
            $('.modal-title').text('Comments');
        });

        $('.update-status').change(function() {
            var leadId = $(this).attr('data-lead-id');
            var status = $(this).val();
            
            $.ajax({
                url: '/admin/category/' + leadId + '/update-status',
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
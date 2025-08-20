@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Categories List with Variants</h5>
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

                            <a href="{{ route('ad.category.create') }}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Add Categories</span>
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
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="leadList">
                                        <thead>
                                            <tr>
                                                
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>slug</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($categories as $key => $category)
                                            <tr class="single-item">                                                
                                                <td>
                                                {{ ($categories->currentPage() - 1) * $categories->perPage() + $key + 1 }}
                                                </td>
                                                <td>
                                                    {{ $category->name }}
                                                    @if($category->children->count())
                                                        <ul>
                                                            @foreach($category->children as $child)
                                                                <li>↳ {{ $child->name }} 
                                                                    <a href="{{ route('ad.category.edit', $child->id) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </td>
                                                <td>
                                                {{ $category->slug }}
                                                </td>                                              
                                                <td>
                                                    <select class="form-control update-status" data-select2-selector="status" data-lead-id="{{ $category->id }}">                                                        
                                                        <option @if($category->status == '1') {{ 'selected' }} @endif value="1" >Active</option>
                                                        <option @if($category->status == '0') {{ 'selected' }} @endif value="0" >InActive</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        {{-- <a href="{{ route('user_view', $user->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a> --}}
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('ad.category.edit', $category->id) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>   
                                                                <li>
                                                                    <a class="dropdown-item" role="button" href="#">
                                                                    <form method="POST" action="{{ route('ad.category.destroy', $category->id) }}">
                                                                        @csrf @method('DELETE')
                                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                                                                    </form>
                                                                    </a>
                                                                </li>                                                              
                                                            </ul>
                                                        </div> 
                                                    </div>
                                                </td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div> 
                                @if(count($categories) == 0) 
                                    <div class="d-flex justify-content-center mt-4">
                                    <h3>{{ 'Data Not Found' }}</h3>
                                    </div>
                                @endif                               
                            </div>                            
                        </div>
                    </div>
                </div>
                {{ $categories->links('pagination::bootstrap-5') }}
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
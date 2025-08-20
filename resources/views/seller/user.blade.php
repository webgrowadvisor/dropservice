@extends('layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">USER</h5>
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
                                    @if (request()->department) 
                                    <a href="{{ url()->current() }}" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-danger rounded-circle d-inline-block me-3"></span>
                                        <span>Reset</span>
                                    </a>
                                    @endif
                                    <a href="{{ url()->current() }}?department=Admin" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-success rounded-circle d-inline-block me-3"></span>
                                        <span>Admin</span>
                                    </a>
                                    <a href="{{ url()->current() }}?department=Sales" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-primary rounded-circle d-inline-block me-3"></span>
                                        <span>Sales</span>
                                    </a>
                                    <a href="{{ url()->current() }}?department=Logistics" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-danger rounded-circle d-inline-block me-3"></span>
                                        <span>Logistics</span>
                                    </a>
                                    <a href="{{ url()->current() }}?department=Verification" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-warning rounded-circle d-inline-block me-3"></span>
                                        <span>Verification</span>
                                    </a>
                                    <a href="{{ url()->current() }}?department=Manager" class="dropdown-item">
                                        <span class="wd-7 ht-7 bg-primary rounded-circle d-inline-block me-3"></span>
                                        <span>Manager</span>
                                    </a>
                                </div>
                            </div>  

                            <a href="{{ route('create-user') }}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Create User</span>
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
                                                
                                                <th>Lead</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th>Parmission</th>
                                                <th>Last Login</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($userlist as $key => $user)
                                            <tr class="single-item">
                                                
                                                <td>
                                                    <a class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            {{ ($userlist->currentPage() - 1) * $userlist->perPage() + $key + 1 }}                                                            
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">{{ $user->name }}</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="hstack gap-2">{{ $user->department }}
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                        $permissions = !empty($user->permission) ? json_decode($user->permission, true) : [];
                                                    @endphp
                                                    @if (!empty($permissions))
                                                        @foreach ($permissions as $permission)
                                                            {{ $permission }} <br>
                                                        @endforeach
                                                    @else
                                                        {{ $user->permission }}
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <select class="form-control update-status" data-select2-selector="status" data-lead-id="{{ $user->id }}">                                                        
                                                        <option @if($user->status == '1') {{ 'selected' }} @endif value="1" >Active</option>
                                                        <option @if($user->status == '0') {{ 'selected' }} @endif value="0" >InActive</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('user_view', $user->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
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
                                @if(count($userlist) == 0) 
                                    <div class="d-flex justify-content-center mt-4">
                                    <h3>{{ 'Data Not Found' }}</h3>
                                    </div>
                                @endif                               
                            </div>                            
                        </div>
                    </div>
                </div>
                {{ $userlist->links('pagination::bootstrap-5') }}
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
            var leadId = $(this).data('lead-id');
            var status = $(this).val();
            
            $.ajax({
                url: '/admin/users/' + leadId + '/update-status',
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
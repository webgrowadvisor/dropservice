@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Review</h5>
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
                                                <th>Product</th>
                                                <th>Image</th>
                                                <th>Comment</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($reviews as $key => $review)
                                            <tr class="single-item">
                                                <td>
                                                {{ ($reviews->currentPage() - 1) * $reviews->perPage() + $key + 1 }}
                                                </td>
                                                <td>{{ $review->product->name ?? 'N/A' }}</td>
                                                <td>{!! variantImage($review->product->thumbnail, 60, 60) !!}</td>
                                                <td>
                                                    <strong>{{ $review->user->name ?? $review->admin->name }}</strong><br/>
                                                    <span>Rating: {{ $review->rating }}⭐</span>
                                                    <p>{{ $review->comment }}</p>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">  
                                                                <li>
                                                                    <a class="dropdown-item" role="button" href="#">
                                                                    <form method="POST" action="{{ route('ad.review.destroy', $review->id) }}">
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
                                @if(count($reviews) == 0) 
                                    <div class="d-flex justify-content-center mt-4">
                                    <h3>{{ 'Data Not Found' }}</h3>
                                    </div>
                                @endif                               
                            </div>                            
                        </div>
                    </div>
                </div>
                {{ $reviews->links('pagination::bootstrap-5') }}
            </div>
            <!-- [ Main Content ] end -->            
        </div>     
        
@endsection



@section('script')

<script>        

   
</script>

@endsection
@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Media</h5>
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
                            <a href="{{ route('media.create') }}" class="btn btn-primary">
                                    <i class="feather-plus me-2"></i>Upload Media
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
                                                <th>Webp</th>
                                                <th>Original</th>
                                                <th>alt_text</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($media as $key => $page)
                                            <tr class="single-item">
                                                <td>{{ ($media->currentPage() - 1) * $media->perPage() + $key + 1 }}</td>
                                                <td> {!! variantImage($page->webp_path, 60, 60) !!} </td>
                                                <td>{!! variantImage($page->original_path, 60, 60) !!}</td>
                                                <td>{{ $page->alt_text ?? 'N/A' }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('media.destroy', $page->id) }}">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div> 
                                @if(count($media) == 0) 
                                    <div class="d-flex justify-content-center mt-4">
                                    <h3>{{ 'Data Not Found' }}</h3>
                                    </div>
                                @endif                               
                            </div>                            
                        </div>
                    </div>
                </div>
                {{ $media->links('pagination::bootstrap-5') }}
            </div>
            <!-- [ Main Content ] end -->            
        </div>     
        
@endsection



@section('script')

<script>        

   
</script>

@endsection
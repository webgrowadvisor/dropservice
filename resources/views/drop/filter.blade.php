@extends('drop.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Filter</h5>
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
                            
                            <a href="#" class="btn btn-primary ">
                                <i class="feather-user-plus me-2"></i>
                                <span>Back</span>
                            </a>
                            <!-- successAlertMessage -->
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
                                        @if($activePackage)
                                        <span class="d-block mb-2">Your Active Package : {{ $activePackage->package_name }} ✅</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line"><strong>Commission: </strong>{{ $activePackage->commission }}%</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line"><strong>Valid Until: </strong>{{ $activePackage->valid_until }}</span>
                                        @else
                                        <div class="alert alert-warning">
                                                You do not have any active package. <a href="{{ route('drop.package') }}">Buy a package now</a>.
                                            </div>
                                        @endif
                                    </h5>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Select Category or Subcategory</label>
                                        <select class="form-control" id="categorySelect">
                                            <option value="">-- Select Category --</option>
                                            @foreach($categories as $parent)
                                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                @foreach($parent->children as $child)
                                                    <option value="{{ $child->id }}">↳ {{ $child->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>                                          
                                        
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label class="form-label">Department</label>
                                        <select id="sellerSelect" class="form-control" disabled >
                                            <option value="">-- Select Seller --</option>
                                        </select>                                        
                                    </div>  
                                                                      
                                </div>
                            </div>

                            <hr class="mt-0">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Basic Info :</span>
                                    </h5>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="card stretch stretch-full">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="leadList">
                                                    <thead>
                                                        <tr>                                                            
                                                            <th>Image</th>
                                                            <th>Category</th>
                                                            <th>Product</th>
                                                            <th>Slug</th>
                                                            <th>Seller</th>
                                                            <th>Seller Key</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="productTableBody">

                                                        <tr>
                                                            <td colspan="6" class="text-muted text-center">Select a seller to load products.</td>
                                                        </tr>
                                                    
                                                        <!-- <tr class="single-item">                                                
                                                            <td>
                                                                <img src="image.webp" alt="">
                                                            </td>
                                                            <td>Category Name</td>
                                                            <td>Product Name</td>
                                                            <td>Seller Name</td>
                                                            <td>Seller Api_key</td>
                                                            <td>₹ 142</td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>                               
                                        </div>                            
                                    </div>
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
<script>
    document.getElementById('categorySelect').addEventListener('change', function() {
        const categoryId = this.value;
        console.log("Selected category:", categoryId); // ✅

        const sellerSelect = document.getElementById('sellerSelect');
        sellerSelect.innerHTML = `<option>Loading...</option>`;
        sellerSelect.disabled = true;

        if (categoryId) {
            fetch(`/drop/api/sellers-by-category/${categoryId}`)
                .then(res => res.json())
                .then(data => {
                    console.log("Sellers loaded:", data); // ✅

                    if (data.status) {
                        sellerSelect.innerHTML = `<option value="">-- Select Seller --</option>`;
                        data.sellers.forEach(seller => {
                            sellerSelect.innerHTML += `<option value="${seller.id}" data-api="${seller.api_key}">${seller.name}</option>`;
                        });
                        sellerSelect.disabled = false;
                    }
                });
        }
    });

    document.getElementById('sellerSelect').addEventListener('change', function () {
        const sellerId = this.value;
        console.log("Sellers id:", sellerId);
        const tableBody = document.getElementById('productTableBody');
        tableBody.innerHTML = '';

        if (sellerId) {
            fetch(`/drop/api/products-by-seller/${sellerId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status && data.products.length > 0) {
                        data.products.forEach(product => {
                            const variant = product.variants[0]; // use first variant for display
                            const row = `
                                <tr>
                                    <td>
                                        <img src="/storage/${product.thumbnail}" alt="${product.name}" width="60">
                                    </td>
                                    <td>${product.category?.name ?? 'N/A'}</td>
                                    <td>${product.name}</td>
                                    <td>${product.slug}</td>
                                    <td>${product.seller?.name ?? 'N/A'}</td>
                                    <td>${product.seller?.api_key ?? ''}</td>
                                    <td>₹ ${variant?.price ?? product.base_price}</td>
                                </tr>
                            `;
                            tableBody.innerHTML += row;
                        });
                    } else {
                        tableBody.innerHTML = `
                            <tr>
                                <td colspan="6" class="text-center text-muted">No products found.</td>
                            </tr>
                        `;
                    }
                })
                .catch(error => {
                    console.error("Fetch error:", error);
                    tableBody.innerHTML = `<tr><td colspan="6" class="text-danger">Error loading products.</td></tr>`;
                });
        }
    });
</script>
@endsection
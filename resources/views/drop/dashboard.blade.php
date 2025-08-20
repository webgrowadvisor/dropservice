@extends('drop.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
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
                    <!-- [Invoices Awaiting Payment] start -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="avatar-text avatar-lg bg-gray-200">
                                            <i class="feather-dollar-sign"></i>
                                        </div>
                                        <div>
                                            <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $transactions }}</span></div>
                                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Transactions
                                            </h3>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                </div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);"
                                            class="fs-12 fw-medium text-muted text-truncate-1-line">Transactions </a>
                                        <div class="w-100 text-end">
                                            <span class="fs-12 text-dark">{{ $transactions }}</span>
                                        </div>
                                    </div>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Invoices Awaiting Payment] end -->
                    <!-- [Converted Leads] start -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="avatar-text avatar-lg bg-gray-200">
                                            <i class="feather-cast"></i>
                                        </div>
                                        <div>
                                            <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $ordercount }}</span></div>
                                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Order Count</h3>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                </div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);"
                                            class="fs-12 fw-medium text-muted text-truncate-1-line">Order Count </a>
                                        <div class="w-100 text-end">
                                            <span class="fs-12 text-dark">{{ $ordercount }}</span>
                                        </div>
                                    </div>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 63%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Converted Leads] end -->

                    <!-- [Projects In Progress] start -->
                    <div class="col-xxl-12 col-md-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body bg-success text-white">
                                @if($activePackage)
                                <h5 class="card-title">Your Active Package</h5>
                                <p><strong>Name:</strong> {{ $activePackage->package_name }}</p>
                                <p><strong>Price:</strong> {{ priceicon() }}{{ $activePackage->price }}</p>
                                <p><strong>Commission:</strong> {{ $activePackage->commission }}%</p>
                                <p><strong>Valid Until:</strong> {{ $activePackage->valid_until }}</p>
                                <p><strong>Features:</strong></p>
                                <ul>
                                    @foreach($activePackage->features as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                                @else
                                    <div class="alert alert-warning">
                                        You do not have any active package. <a href="{{ route('drop.package') }}">Buy a package now</a>.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- [Projects In Progress] end -->
                    
                    
                    <!-- [Latest Leads] start -->
                    <div class="col-xxl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Recent Orders</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                                data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                                data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                                data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm"
                                            data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr class="border-b">
                                                <th>#Order</th>
                                                <th>Product</th>
                                                <th>Variant</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>User</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->product->name ?? 'N/A' }}</td>
                                                <td>{{ $order->variant->sku ?? 'N/A' }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ priceicon() }}{{ $order->price }}</td>
                                                <td>{{ $order->user->name ?? 'Guest' }}</td>
                                                <td>
                                                    <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                                                </td>
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">No orders found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                               {{ $orders->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                    <!-- [Latest Leads] end -->
                    
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>


@endsection
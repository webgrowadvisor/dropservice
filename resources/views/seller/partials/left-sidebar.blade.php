    <!--! ================================================================ !-->
    <!--! [Start] Navigation Manu !-->
    <!--! ================================================================ !-->
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="#" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <!-- <img src="#" alt="" class="logo logo-lg" />
                    <img src="#" alt="" class="logo logo-sm" /> -->
                    @if (sellerinfo()->logo)
                    {!! variantImage(sellerinfo()->logo, 60, 60) !!}
                    @else
                    Seller Admin
                    @endif
                </a>
            </div>
            <div class="navbar-content">
            
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('seller.dashboard') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"></span>
                        </a>                        
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Brand</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Brand</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('seller.brand.list') }}">Brand Request</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Products</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Products</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('seller.products.index') }}">All Products</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Category</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Category</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('seller.category.index') }}">All Category</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Orders</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Orders</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('seller.orders.index') }}">All Orders</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>DropService User</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">DropService</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('seller.dropclient') }}">Client List</a></li>                            
                        </ul>
                    </li>
                
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="#" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-bell"></i></span>
                            <span class="badge bg-danger nxl-h-badge">0</span>
                            <span class="nxl-mtext">Assign Leads</span><span class="nxl-arrow"></span>
                        </a>                        
                    </li>  --}}                                    

                    <li class="nxl-item nxl-caption">
                        <label>Logout</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a onclick="return confirm('Are you sure you want to log out?')" href="{{ route('seller.logout') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-power"></i></span>
                            <span class="nxl-mtext">Logout</span><span class="nxl-arrow"></span>
                        </a>                      
                    </li>
                    
                    
                </ul>
                
            </div>
        </div>
    </nav>
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->
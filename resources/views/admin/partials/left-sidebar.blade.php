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
                    ADMIN Panel
                </a>
            </div>
            <div class="navbar-content">
            
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('admin.dashboard') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"></span>
                        </a>                        
                    </li> 
                    

                    <li class="nxl-item nxl-caption">
                        <label>Users</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Users</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('user.list') }}">Users</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('seller.list') }}">Seller</a></li>                            
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('drop.list') }}">DropShiper</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Product Specification</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Specification</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('groups.index') }}">All Groups</a></li>                            
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('attributes.index') }}">All Attributes</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Brands</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Brands</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('brands.index') }}">All Brands</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Seller Brand</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Seller Brand</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('admin.brand.requests') }}">Seller Brand Requests</a></li>                            
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
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('ad.products.index') }}">All Products</a></li>                            
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
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('ad.category.index') }}">All Category</a></li>                            
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
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('ad.orders.index') }}">All Orders</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Media</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Media</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('media.index') }}">Media Image</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Package</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Package</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('ad.packages.index') }}">All Package</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Review</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Review</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('ad.reviews') }}">All Review</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Pages</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Pages</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('pages.index') }}">All Pages</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Logout</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a onclick="return confirm('Are you sure you want to log out?')" href="{{ route('admin.logout') }}" class="nxl-link">
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
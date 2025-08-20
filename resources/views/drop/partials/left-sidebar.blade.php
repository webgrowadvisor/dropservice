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
                    @if (dropinfo()->logo)
                    {!! variantImage(dropinfo()->logo, 60, 60) !!}
                    @else
                    Drop Service                    
                    @endif
                </a>
            </div>
            <div class="navbar-content">
            
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('drop.dashboard') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"></span>
                        </a>                        
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Select Products</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Select Products</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('drop.products.filter') }}">Products Filter</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Package</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Select Package</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('drop.package') }}">Package</a></li>                            
                        </ul>
                    </li>

                    <li class="nxl-item nxl-caption">
                        <label>Payment</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Create Payment</span><span class="nxl-arrow">
                                <i class="feather-chevron-right"></i>
                            </span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('drop.payment.history') }}">Payment History</a></li>                            
                        </ul>
                    </li>      

                    <li class="nxl-item nxl-caption">
                        <label>Logout</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a onclick="return confirm('Are you sure you want to log out?')" href="{{ route('drop.logout') }}" class="nxl-link">
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
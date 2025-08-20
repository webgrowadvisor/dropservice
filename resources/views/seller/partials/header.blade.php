
    <!--! ================================================================ !-->
    <!--! [Start] Header !-->
    <!--! ================================================================ !-->
    <header class="nxl-header">
        <div class="header-wrapper">
            <!--! [Start] Header Left !-->
            <div class="header-left d-flex align-items-center gap-4">
                <!--! [Start] nxl-head-mobile-toggler !-->
                <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <!--! [Start] nxl-head-mobile-toggler !-->
                <!--! [Start] nxl-navigation-toggle !-->
                <div class="nxl-navigation-toggle">
                    <a href="javascript:void(0);" id="menu-mini-button">
                        <i class="feather-align-left"></i>
                    </a>
                    <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>
                <!--! [End] nxl-navigation-toggle !-->
                <!--! [Start] nxl-lavel-mega-menu-toggle !-->
                <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                    <a href="javascript:void(0);" id="nxl-lavel-mega-menu-open">
                        <i class="feather-align-left"></i>
                    </a>
                </div>
                <!--! [End] nxl-lavel-mega-menu-toggle !-->
                <!--! [Start] nxl-lavel-mega-menu !-->
                <div class="nxl-drp-link nxl-lavel-mega-menu">
                    <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                        <a href="javascript:void(0)" id="nxl-lavel-mega-menu-hide">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <!--! [Start] nxl-lavel-mega-menu-wrapper !-->
                    <div class="nxl-lavel-mega-menu-wrapper d-flex gap-3">
                        <!--! [Start] nxl-lavel-menu !-->
                        <div class="dropdown nxl-h-item nxl-lavel-menu">
                            <a href="javascript:void(0);" class="avatar-text avatar-md bg-primary text-white" 
                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <i class="feather-plus"></i>
                            </a>
                            <div class="dropdown-menu nxl-h-dropdown">                              
                                
                                
                                <div class="dropdown nxl-level-menu">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <span class="hstack">
                                            <i class="feather-alert-circle"></i>
                                            <span>Leads</span>
                                        </span>
                                        <i class="feather-chevron-right ms-auto me-0"></i>
                                    </a>
                                    <div class="dropdown-menu nxl-h-dropdown">
                                        <a href="#" class="dropdown-item">
                                            <i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
                                            <span>Leads</span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
                                            <span>Leads Create</span>
                                        </a>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                        <!--! [End] nxl-lavel-menu !-->                        
                    </div>
                    <!--! [End] nxl-lavel-mega-menu-wrapper !-->
                </div>
                <!--! [End] nxl-lavel-mega-menu !-->
            </div>
            <!--! [End] Header Left !-->
            <!--! [Start] Header Right !-->
            <div class="header-right ms-auto">
                <div class="d-flex align-items-center">

                    <div class="dropdown nxl-h-item nxl-header-search">
                        <a href="javascript:void(0);" class="nxl-head-link me-0" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <i class="feather-search"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-search-dropdown">
                            <div class="input-group search-form">
                                <span class="input-group-text">
                                    <i class="feather-search fs-6 text-muted"></i>
                                </span>
                                <input type="text" id="search" class="form-control search-input-field" onkeyup="searchData()" placeholder="Search...." />
                                <span class="input-group-text">
                                    <button type="button" class="btn-close"></button>
                                </span>
                            </div>
                            <div class="dropdown-divider mt-0"></div>

                            <div class="search-items-wrapper" style="margin-left: 20px; margin-right: 10px;">
                                <p class="fs-11 fw-medium text-muted">Leads searching for...</p>                                

                            </div>
                        </div>
                    </div>

                    
                    <div class="nxl-h-item d-none d-sm-flex">
                        <div class="full-screen-switcher">
                            <a href="javascript:void(0);" class="nxl-head-link me-0" onclick="$('body').fullScreenHelper('toggle');">
                                <i class="feather-maximize maximize"></i>
                                <i class="feather-minimize minimize"></i>
                            </a>
                        </div>
                    </div>

                    

                    <div class="dropdown nxl-h-item">
                        <a class="nxl-head-link me-3" data-bs-toggle="dropdown" href="#" role="button" data-bs-auto-close="outside">
                            <i class="feather-bell"></i>
                            <span class="badge bg-danger nxl-h-badge">25</span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
                            <div class="d-flex justify-content-between align-items-center notifications-head">
                                <h6 class="fw-bold text-dark mb-0">Notifications</h6>
                                <a href="javascript:void(0);" class="fs-11 text-success text-end ms-auto" data-bs-toggle="tooltip" title="Make as Read">
                                    <i class="feather-check"></i>
                                    <span>Read</span>
                                </a>
                            </div>

                        
                            <div class="notifications-item">
                                <img src="{{ asset('assets/images/avatar/2.png')}}" alt="" class="rounded me-3 border" />
                                <div class="notifications-desc">
                                    <a href="javascript:void(0);" class="font-body text-truncate-2-line"> 
                                        <span class="fw-semibold text-dark">Dilip, 9315209358</span> 
                                        New Lead for you
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="notifications-date text-muted border-bottom border-bottom-dashed">
                                        25-4-25
                                        </div>
                                        <div class="d-flex align-items-center float-end gap-2">
                                            <a href="javascript:void(0);" class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" title="Make as Read"></a>
                                            <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" title="Remove">
                                                <i class="feather-x fs-12"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                        
                            <div class="notifications-item">
                                <img src="{{ asset('assets/images/avatar/2.png')}}" alt="" class="rounded me-3 border" />
                                <div class="notifications-desc">
                                    <a href="javascript:void(0);" class="font-body text-truncate-2-line"> 
                                        <span class="fw-semibold text-dark">Dilip Sing</span> 
                                        login today our panel
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="notifications-date text-muted border-bottom border-bottom-dashed">
                                        24-05-25
                                        </div>
                                        <div class="d-flex align-items-center float-end gap-2">
                                            <a href="javascript:void(0);" class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" title="Make as Read"></a>
                                            <a href="javascript:void(0);" class="text-danger" data-bs-toggle="tooltip" title="Remove">
                                                <i class="feather-x fs-12"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="text-center notifications-footer">
                                <a href="javascript:void(0);" class="fs-13 fw-semibold text-dark">Alls Notifications</a>
                            </div>

                        </div>
                    </div>

                    
                    <div class="dropdown nxl-h-item">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
                             @if (sellerinfo()->logo)
                            {!! variantImage(sellerinfo()->logo, 60, 60) !!}
                            @else
                            <img src="{{ asset('assets/images/avatar/1.png') }}" alt="user-image" class="img-fluid user-avtar me-0" />
                            @endif                            
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/avatar/1.png') }}" alt="user-image" class="img-fluid user-avtar" />
                                    <div>
                                        <h6 class="text-dark mb-0">{{ sellerinfo()->name }} <span class="badge bg-soft-success text-success ms-1">PRO</span></h6>
                                        <span class="fs-12 fw-medium text-muted">{{sellerinfo()->email}}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="dropdown">
                                    <span class="hstack">
                                        <i class="wd-10 ht-10 border border-2 border-gray-1 bg-success rounded-circle me-2"></i>
                                        <span>Active</span>
                                    </span>
                                    <i class="feather-chevron-right ms-auto me-0"></i>
                                </a>
                            </div> --}}
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="dropdown">
                                    <span class="hstack">
                                        <i class="wd-10 ht-10 border border-2 border-gray-1 bg-success rounded-circle me-2"></i>
                                        <span>Active</span>
                                    </span>
                                    <i class="feather-chevron-right ms-auto me-0"></i>
                                </a>
                                
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        <span class="hstack">
                                            <i class="wd-10 ht-10 border border-2 border-gray-1 bg-success rounded-circle me-2"></i>
                                            <span>Active</span>
                                        </span>
                                    </a>                                    
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            
                            <a href="{{ route('seller.account.settings') }}" class="dropdown-item">
                                <i class="feather-settings"></i>
                                <span>Account Settings</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            
                            <a href="#" class="dropdown-item">
                                <i class="feather-activity"></i>
                                <span>Activity Feed</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a onclick="return confirm('Are you sure you want to log out?')" href="{{ route('seller.logout') }}" class="dropdown-item">
                                <i class="feather-log-out"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--! [End] Header Right !-->
        </div>
    </header>
    <!--! ================================================================ !-->
    <!--! [End] Header !-->
    <!--! ================================================================ !-->
                        <div class="left-side-tabs">
                            <div class="dashboard-left-links">
                                <a href="{{route('dashboard_overview')}}" class="user-item {{ request()->segment(2) == 'dashboard-overview' ? 'active' : '' }}"><i
                                        class="uil uil-apps"></i>Overview</a>
                                <a href="{{route('dashboard_my_orders')}}" class="user-item {!! request()->segment(2) == 'dashboard-my-orders' ? 'active' : '' !!}"><i class="uil uil-box"></i>My
                                    Orders</a>
                                <a href="{{route('dashboard_my_wallet')}}" class="user-item {{ request()->segment(2) == 'dashboard-my-wallet' ? 'active' : '' }}"><i class="uil uil-wallet"></i>My
                                    Wallet</a>
                                <a href="{{route('dashboard_my_wishlist')}}" class="user-item {{ request()->segment(2) == 'dashboard-my-wishlist' ? 'active' : '' }}"><i
                                        class="uil uil-heart"></i>Shopping Wishlist</a>
                                <a href="{{route('dashboard_my_addresses')}}" class="user-item {{ request()->segment(2) == 'dashboard-my-addresses' ? 'active' : '' }}"><i
                                        class="uil uil-location-point"></i>My Address</a>
                                <a href="{{route('user.logout')}}" class="user-item"><i class="uil uil-exit"></i>Logout</a>
                            </div>
                        </div>
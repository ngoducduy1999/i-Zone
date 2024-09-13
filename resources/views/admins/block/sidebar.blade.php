<!-- Left Sidebar Start -->
<div class="app-sidebar-menu bg-dark">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-dark' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-light' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title text-light">Quản trị</li>

                <li>
                    <a class='text-light' href='{{ route('admin') }}'>
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse" class="text-white">
                        <i data-feather="table"></i>
                        <span> Quản lý tài khoản </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            @if (Auth::user()->vai_tro=='admin')
                            <li>
                                <a class='text-white' href='{{route('admin.nhanviens')}}'>Quản lý nhân viên </a>
                            </li>
                            @endif
                            @if (Auth::user()->vai_tro=='admin')

                            <li>
                                <a class='text-white' href='{{route('admin.khachhangs')}}'>Quản lý khách hàng</a>
                            </li>
        
                            @else
                            <li>
                                <a class='text-white' href='{{route('staff.khachhangs')}}'>Quản lý khách hàng</a>
                            </li>   
                            @endif
                            


                        </ul>
                    </div>
                </li>

                <li class="menu-title text-light">Kinh doanh</li>

                <li>
                    <a class='text-light' href=''>
                        <i data-feather="list"></i>
                        <span> Danh mục sản phẩm </span>
                    </a>
                </li>

                <li>
                    <a class='text-light' href=''>
                        <i data-feather="package"></i>
                        <span> Thông tin sản phẩm </span>
                    </a>
                </li>

                <li>
                    <a class='text-light' href=''>
                        <i data-feather="shopping-bag"></i>
                        <span> Thông tin đơn hàng </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->
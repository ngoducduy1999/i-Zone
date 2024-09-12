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
                    <a class='text-light' href=''>
                        <i data-feather="users"></i>
                        <span> Quản lý tài khoản </span>
                    </a>
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

                <li>
                    <a href="#banner" data-bs-toggle="collapse">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-white">
                            <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                            <line x1="7" y1="2" x2="7" y2="22"></line>
                            <line x1="17" y1="2" x2="17" y2="22"></line>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <line x1="2" y1="7" x2="7" y2="7"></line>
                            <line x1="2" y1="17" x2="7" y2="17"></line>
                            <line x1="17" y1="17" x2="22" y2="17"></line>
                            <line x1="17" y1="7" x2="22" y2="7"></line>
                        </svg>
                        <span class="text-white"> Banner </span>
                        <span class="menu-arrow text-white"></span>
                    </a>
                    <div class="collapse" id="banner">
                        <ul class="nav-second-level">
                            {{-- <li>
                                <a class='text-white' href="{{ route('admin.banners.index') }}">Danh sách</a>
                            </li> --}}
                            <li>
                                <a class='text-white' href="{{ route('admin.banners.create') }}">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->

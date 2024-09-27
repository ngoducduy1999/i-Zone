<!-- Topbar Bắt đầu -->
<div class="topbar-custom">
    <div class="container-xxl">
        <div class="d-flex justify-content-between">
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link ps-0">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>
                <li class="d-none d-lg-block">
                    <div class="position-relative topbar-search">
                        <input type="text" class="form-control bg-light bg-opacity-75 border-light ps-4" placeholder="Tìm kiếm...">
                        <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                    </div>
                </li>
            </ul>

            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                <li class="d-none d-sm-flex">
                    <button type="button" class="btn nav-link" data-toggle="fullscreen">
                        <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                    </button>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="bell" class="noti-icon"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    <a href="#" class="text-dark">
                                        <small>Xóa tất cả</small>
                                    </a>
                                </span>Thông báo
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary active">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/admin/images/users/user-12.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="notify-details">Carl Steadham</p>
                                    <small class="text-muted">5 phút trước</small>
                                </div>
                                <p class="mb-0 user-msg">
                                    <small class="fs-14">Hoàn thành <span class="text-reset">Cải thiện quy trình làm việc trong Figma</span></small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/admin/images/users/user-2.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <div class="notify-content">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="notify-details">Olivia McGuire</p>
                                        <small class="text-muted">1 phút trước</small>
                                    </div>
                        
                                    <div class="d-flex mt-2 align-items-center">
                                        <div class="notify-sub-icon">
                                            <i class="mdi mdi-download-box text-dark"></i>
                                        </div>

                                        <div>
                                            <p class="notify-details mb-0">dark-themes.zip</p>
                                            <small class="text-muted">2.4 MB</small>
                                        </div>
                                    </div>

                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/admin/images/users/user-3.jpg') }}" class="img-fluid rounded-circle" alt="" /> 
                                </div>
                                <div class="notify-content">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="notify-details">Travis Williams</p>
                                        <small class="text-muted">7 phút trước</small>
                                    </div>
                                    <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2"><span class="text-primary">@Patryk</span> Vui lòng đảm bảo rằng bạn...</p>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/admin/images/users/user-8.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="notify-details">Violette Lasky</p>
                                    <small class="text-muted">5 phút trước</small>
                                </div>
                                <p class="mb-0 user-msg">
                                    <small class="fs-14">Hoàn thành <span class="text-reset">Tạo các thành phần mới</span></small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/admin/images/users/user-5.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="notify-details">Ralph Edwards</p>
                                    <small class="text-muted">5 phút trước</small>
                                </div>
                                <p class="mb-0 user-msg">
                                    <small class="fs-14">Hoàn thành <span class="text-reset">Cải thiện quy trình làm việc trong React</span></small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/admin/images/users/user-6.jpg') }}" class="img-fluid rounded-circle" alt="" /> 
                                </div>
                                <div class="notify-content">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="notify-details">Jocab Jones</p>
                                        <small class="text-muted">7 phút trước</small>
                                    </div>
                                    <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2"><span class="text-reset">@Patryk</span> Vui lòng đảm bảo rằng bạn...</p>
                                </div>
                            </a>
                        </div>

                        <!-- Tất cả-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            Xem tất cả
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        @if (Auth::user()->anh_dai_dien!='')
                        <img src="{{ asset('storage/' .Auth::user()->anh_dai_dien) }}" alt="user-image" class="rounded-circle">                                        
                        @else                                       
                        <img src="{{ asset('assets/admin/images/users/user-11.jpg') }}" alt="user-image" class="rounded-circle">    
                        @endif
                        <span class="pro-user-name ms-1">
                            {{ Auth::user()->ten }} <i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Chào mừng, {{ Auth::user()->ten }}!</h6>
                        </div>                        

                        <!-- item-->
                        <a class='dropdown-item notify-item' href='{{ route('admin.profile') }}'>
                            <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                            <span>Tài khoản của tôi</span>
                        </a>

                        <!-- item-->
                        <a class='dropdown-item notify-item' href='auth-lock-screen.html'>
                            <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                            <span>Màn hình khóa</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                        <a class='dropdown-item notify-item' href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                            <span>Đăng xuất</span>
                        </a>
                        

                    </div>
                </li>

            </ul>
        </div>

    </div>
   
</div>
<!-- end Topbar -->

<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from template.wphix.com/shofy-prv/shofy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Sep 2024 13:18:58 GMT -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>i-Zone - Hệ thống bán hàng điện thoại</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/client/img/logo/favicon.png') }}">


    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/flaticon_shofy.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/danhgia.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/gioithieu.css') }}">
    @yield('css')


    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- chuyen json len dau -->
    <script src="{{ asset('assets/client/js/vendor/jquery.js') }}"></script>

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->


    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- loading content here -->
                <div class="tp-preloader-content">
                    <div class="tp-preloader-logo">
                        <div class="tp-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                            </svg>
                        </div>
                        <img src="{{ asset('assets/client/img/logo/preloader/preloader-icon.png') }}" alt="" style="width: 50px">
                    </div>
                    <p class="tp-preloader-subtitle">Loading</p>
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->


    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area offcanvas__radius">
        <div class="offcanvas__wrapper">

            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas-close-btn">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo" >
                        <a href="index.html" >
                            <img src="{{ asset('assets/client/img/logo/logo.png') }}" alt="logo" style="width:150px; height:40px;">
                        </a>
                    </div>
                </div>
                <div class="offcanvas__category pb-40">
                    <button class="tp-offcanvas-category-toggle">
                        <i class="fa-solid fa-bars"></i>
                        Tất cả danh mục
                    </button>
                    <div class="tp-category-mobile-menu">
                    </div>
                </div>
                <div class="tp-main-menu-mobile fix d-lg-none mb-40"></div>
                
                <div class="offcanvas__contact align-items-center d-none">
                    <div class="offcanvas__contact-icon mr-20">
                        <span>
                            <img src="{{ asset('assets/client/img/icon/contact.png') }}" alt="">
                        </span>
                    </div>
                    <div class="offcanvas__contact-content">
                        <h3 class="offcanvas__contact-title">
                            <a href="tel:098-852-987">004524865</a>
                        </h3>
                    </div>
                </div>
                <div class="offcanvas__btn">
                    <a href="contact.html" class="tp-btn-2 tp-btn-border-2">Liên hệ với chúng tôi</a>
                </div>
                </div>
                
                </div>
                </div>
                <div class="body-overlay"></div>
                <!-- offcanvas area end -->
                
                <!-- mobile menu area start -->
                <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
                    <div class="container">
                        <div class="row row-cols-5">
                            <div class="col">
                                <div class="tp-mobile-item text-center">
                                    <a href="shop.html" class="tp-mobile-item-btn">
                                        <i class="flaticon-store"></i>
                                        <span>Cửa hàng</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="tp-mobile-item text-center">
                                    <button class="tp-mobile-item-btn tp-search-open-btn">
                                        <i class="flaticon-search-1"></i>
                                        <span>Tìm kiếm</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="tp-mobile-item text-center">
                                    <a href="{{ route('yeuthich') }}" class="tp-mobile-item-btn">
                                        <i class="flaticon-love"></i>
                                        <span>Danh sách yêu thích</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="tp-mobile-item text-center">
                                    <a href="profile.html" class="tp-mobile-item-btn">
                                        <i class="flaticon-user"></i>
                                        <span>Tài khoản</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="tp-mobile-item text-center">
                                    <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                                        <i class="flaticon-menu-1"></i>
                                        <span>Menu</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mobile menu area end -->
                

    <!-- search area start -->
    <section class="tp-search-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-search-form">
                        <div class="tp-search-close text-center mb-20">
                            <button class="tp-search-close-btn tp-search-close-btn"></button>
                        </div>
                        <form action="#">
                            <div class="tp-search-input mb-10">
                                <input type="text" placeholder="Search for product...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="tp-search-category">
                                <span>Search by : </span>
                                <a href="#">Men, </a>
                                <a href="#">Women, </a>
                                <a href="#">Children, </a>
                                <a href="#">Shirt, </a>
                                <a href="#">Demin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search area end -->

    <!-- cart mini area start -->
    <div class="cartmini__area tp-all-font-roboto">
        <div class="cartmini__wrapper d-flex justify-content-between flex-column">

            <div class="change-item-cart" id="change-item-cart">
                @if (Session::has('cart') != null)
                    <div class="cartmini__top-wrapper">
                        <div class="cartmini__top p-relative">
                            <div class="cartmini__top-title">
                                <h4>Giỏ hàng</h4>
                            </div>
                            {{-- <div class="cartmini__close">
                               <button type="button" class="cartmini__close-btn cartmini-close-btn"><i
                                       class="fal fa-times"></i></button>
                           </div> --}}
                        </div>
                        <div class="cartmini__widget">
                            @foreach (Session::get('cart')->products as $idbt => $product)
                                <div class="cartmini__widget-item">
                                    <div class="cartmini__thumb">
                                        <a href="{{ route('chitietsanpham', $product['productInfo']->id) }}">
                                            <img src="{{ asset($product['productInfo']->anh_san_pham) }}"
                                                alt="{{ $product['productInfo']->ten_san_pham ?? 'Product Image' }}">
                                        </a>
                                    </div>
                                    <div class="cartmini__content">
                                        <h5 class="cartmini__title"
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                            <a href="{{ route('chitietsanpham', $product['productInfo']->id) }}"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                {{ isset($product['productInfo']->ten_san_pham) ? $product['productInfo']->ten_san_pham : 'Tên sản phẩm không có' }}
                                            </a>
                                        </h5>
                                        <div class="cartmini__price-wrapper">
                                            <span class="cartmini__price">
                                                {{ isset($product['bienthe']->gia_moi) ? number_format($product['bienthe']->gia_moi, 0, ',', '.') . ' VNĐ' : 'Chưa có giá' }}
                                            </span>
                                            <span class="cartmini__quantity">
                                                x {{ isset($product['quantity']) ? $product['quantity'] : '...' }}
                                            </span>
                                        </div>
                                        <div class="cartmini__price-wrapper">
                                            <span>
                                                {{ isset($product['bienthe']->dungLuong) ? $product['bienthe']->dungLuong->ten_dung_luong : '...' }}
                                            </span>

                                            <span class="cartmini__quantity">
                                                x
                                                {{ isset($product['bienthe']->mauSac) ? $product['bienthe']->mauSac->ten_mau_sac : '...' }}
                                            </span>
                                        </div>
                                    </div>
                                    <button class="cartmini__del"><i class="fa-regular fa-xmark"
                                            data-idbt="{{ $idbt }}"></i></button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="cartmini__checkout">
                        <div class="cartmini__checkout-title mb-30">
                            <h4>Tổng giá:</h4>
                            <span>
                                {{ isset(Session::get('cart')->totalPrice) ? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : '0' }}
                                VNĐ
                            </span>
                            <input type="number" hidden name="" id="total-quantity-cart"
                                value="{{ isset(Session::get('cart')->totalProduct) ? Session::get('cart')->totalProduct : 0 }}">
                        </div>
                        <div class="cartmini__checkout-title mb-30">
                            <h4>Tổng sản phẩm:</h4>
                            <span>
                                {{ isset(Session::get('cart')->totalProduct) ? number_format(Session::get('cart')->totalProduct, 0, ',', '.') : '0' }}
                            </span>
                        </div>
                        <div class="cartmini__checkout-btn">
                            <a href="{{ route('cart.index') }}" class="tp-btn mb-10 w-100"> Xem giỏ hàng</a>
                            <a href="{{ route('thanhtoan') }}" class="tp-btn tp-btn-border w-100"> Thanh toán</a>
                        </div>
                    </div>
                @else
                    <div class="cartmini__empty text-center">
                        <img src="{{ asset('assets/client/img/product/cartmini/empty-cart.png') }}" alt="">
                        <p>Giỏ hàng của bạn trống</p>
                        <a href="{{ route('trangchu') }}" class="tp-btn">Đi tới cửa hàng</a>
                        <input type="number" hidden name="" id="total-quantity-cart"
                            value="{{ isset(Session::get('cart')->totalProduct) ? Session::get('cart')->totalProduct : 0 }}">
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- cart mini area end -->

    <!-- header area start -->

    <header>
        @include('clients.block.header')
    </header>
    <!-- header area end -->

    <div id="header-sticky-2" class="tp-header-sticky-area">
        <div class="container">
            <div class="tp-mega-menu-wrapper p-relative">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="logo">
                            <a href="">
                                <img src="{{ asset('assets/client/img/logo/logo.png') }}" alt="logo" style="width:150px; height:40px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-block">
                        <div class="tp-header-sticky-menu main-menu menu-style-1">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-mega-menu">
                                       <a href="{{ route('trangchu') }}">Trang chủ</a>
        
                                    </li>
                                    <li>
                                       <a href="{{ route('san-pham') }}">Sản phẩm</a>
                                    </li>                   
        
                                    <li>
                                       <a href="{{ route('bai-viet') }}">Tin tức</a>
                                    </li>
                                    <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
                                 </ul>
                            </nav>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="tp-header-action d-flex align-items-center justify-content-end ml-50">                 
                            <div class="tp-header-action-item d-none d-lg-block">
                                <a href="{{ route('yeuthich') }}" class="tp-header-action-btn">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <span class="tp-header-action-badge">
                                        @if (Auth::user())
                                            <span id="favorite-count">
                                                <span>
                                                    {{ Auth::user()->sanPhamYeuThichs()->count() }}
                                                </span>
                                            </span>
                                        @else
                                            <span id="favorite-count">
                                                <span>
                                                    0
                                                </span>
                                            </span>
                                        @endif
                                    </span>
                                </a>
                            </div>
                            <div class="tp-header-action-item">
                                <button type="button" class="tp-header-action-btn cartmini-open-btn">
                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span class="tp-header-action-badge">
                                        @if (Session::has('cart'))
                                            <span id="total-quantity-show">
                                                <span>
                                                    {{ Session::has('cart') ? Session::get('cart')->totalProduct : 0 }}
                                                </span>
                                            </span>
                                        @else
                                            <span id="total-quantity-show">
                                                <span>
                                                    0
                                                </span>
                                            </span>
                                        @endif
                                    </span>
                                </button>
                            </div>
                            <div class="tp-header-action-item d-lg-none">
                                <button type="button" class="tp-header-action-btn tp-offcanvas-open-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                        viewBox="0 0 30 16">
                                        <rect x="10" width="20" height="2" fill="currentColor" />
                                        <rect x="5" y="7" width="25" height="2" fill="currentColor" />
                                        <rect x="10" y="14" width="20" height="2" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <main>
        @yield('content')
    </main>


    <!-- footer area start -->
    <footer>
        @include('clients.block.footer')
    </footer>
    <!-- footer area end -->
    <!-- <script>
        var swiper = new Swiper('.tp-slider-active', {
            loop: true,
            autoplay: {
                delay: 3000,
            },
            navigation: {
                nextEl: '.tp-slider-button-next',
                prevEl: '.tp-slider-button-prev',
            },
            pagination: {
                el: '.tp-swiper-dot',
                clickable: true,
            },
        });
    </script> -->



    <!-- JS here -->
    <script data-cfasync="false"
        src="{{ asset('assets/client/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/client/js/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/client/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/client/js/slick.js') }}"></script>
    <script src="{{ asset('assets/client/js/range-slider.js') }}"></script>
    <script src="{{ asset('assets/client/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/client/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/client/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/client/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/client/js/wow.js') }}"></script>
    <script src="{{ asset('assets/client/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/client/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/client/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    @yield('js')

    {{-- thêm link thông báo ở cuối --}}
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />

    <script src="{{ asset('assets/client/js/anhnt.js') }}"></script>
    
</body>

<!-- Mirrored from template.wphix.com/shofy-prv/shofy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Sep 2024 13:19:32 GMT -->

</html>

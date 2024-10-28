<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from template.wphix.com/shofy-prv/shofy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Sep 2024 13:18:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shofy - Multipurpose eCommerce HTML Template</title>
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
                        <img src="{{ asset('assets/client/img/logo/preloader/preloader-icon.svg') }}" alt="">
                    </div>
                    <h3 class="tp-preloader-title">Shofy</h3>
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
                    <div class="offcanvas__logo logo">
                        <a href="index.html">
                            <img src="{{ asset('assets/client/img/logo/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="offcanvas__category pb-40">
                    <button class="tp-offcanvas-category-toggle">
                        <i class="fa-solid fa-bars"></i>
                        All Categories
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
                    <a href="contact.html" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
                </div>
            </div>
            <div class="offcanvas__bottom">
                <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                    <div class="offcanvas__currency-wrapper currency">
                        <span class="offcanvas__currency-selected-currency tp-currency-toggle"
                            id="tp-offcanvas-currency-toggle">Currency : USD</span>
                        <ul class="offcanvas__currency-list tp-currency-list">
                            <li>USD</li>
                            <li>ERU</li>
                            <li>BDT </li>
                            <li>INR</li>
                        </ul>
                    </div>
                    <div class="offcanvas__select language">
                        <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                            <div class="offcanvas__lang-img mr-15">
                                <img src="{{ asset('assets/client/img/icon/language-flag.png') }}" alt="">
                            </div>
                            <div class="offcanvas__lang-wrapper">
                                <span class="offcanvas__lang-selected-lang tp-lang-toggle"
                                    id="tp-offcanvas-lang-toggle">English</span>
                                <ul class="offcanvas__lang-list tp-lang-list">
                                    <li>Spanish</li>
                                    <li>Portugese</li>
                                    <li>American</li>
                                    <li>Canada</li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                            <span>Store</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-search-open-btn">
                            <i class="flaticon-search-1"></i>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="wishlist.html" class="tp-mobile-item-btn">
                            <i class="flaticon-love"></i>
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="profile.html" class="tp-mobile-item-btn">
                            <i class="flaticon-user"></i>
                            <span>Account</span>
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
                                <h4>Shopping cart</h4>
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
                            <h4>Total price:</h4>
                            <span>
                                {{ isset(Session::get('cart')->totalPrice) ? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : '0' }}
                                VNĐ
                            </span>
                            <input type="number" hidden name="" id="total-quantity-cart"
                                value="{{ isset(Session::get('cart')->totalProduct) ? Session::get('cart')->totalProduct : 0 }}">
                        </div>
                        <div class="cartmini__checkout-title mb-30">
                            <h4>Total product:</h4>
                            <span>
                                {{ isset(Session::get('cart')->totalProduct) ? number_format(Session::get('cart')->totalProduct, 0, ',', '.') : '0' }}
                            </span>
                        </div>
                        <div class="cartmini__checkout-btn">
                            <a href="{{ route('cart.index') }}" class="tp-btn mb-10 w-100"> view cart</a>
                            <a href="checkout.html" class="tp-btn tp-btn-border w-100"> checkout</a>
                        </div>
                    </div>
                @else
                    <div class="cartmini__empty text-center">
                        <img src="{{ asset('assets/client/img/product/cartmini/empty-cart.png') }}" alt="">
                        <p>Your Cart is empty</p>
                        <a href="{{ route('trangchu') }}" class="tp-btn">Go to Shop</a>
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
                            <a href="index.html">
                                <img src="{{ asset('assets/client/img/logo/logo.svg') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-block">
                        <div class="tp-header-sticky-menu main-menu menu-style-1">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown has-mega-menu">
                                        <a href="index.html">Home</a>
                                        <div class="home-menu tp-submenu tp-mega-menu">
                                            <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-5">
                                                <div class="col">
                                                    <div class="home-menu-item ">
                                                        <a href="index.html">
                                                            <div class="home-menu-thumb p-relative fix">
                                                                <img src="{{ asset('assets/client/img/menu/menu-home-1.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="home-menu-content">
                                                                <h5 class="home-menu-title">Electronics </h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                        </div>
                                                <div class="col">
                                                    <div class="home-menu-item ">
                                                        <a href="index-2.html">
                                                            <div class="home-menu-thumb p-relative fix">
                                                                <img src="{{ asset('assets/client/img/menu/menu-home-2.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="home-menu-content">
                                                                <h5 class="home-menu-title">Fashion</h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="home-menu-item ">
                                                        <a href="index-3.html">
                                                            <div class="home-menu-thumb p-relative fix">
                                                                <img src="{{ asset('assets/client/img/menu/menu-home-3.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="home-menu-content">
                                                                <h5 class="home-menu-title">Beauty</h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="home-menu-item ">
                                                        <a href="index-4.html">
                                                            <div class="home-menu-thumb p-relative fix">
                                                                <img src="{{ asset('assets/client/img/menu/menu-home-4.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="home-menu-content">
                                                                <h5 class="home-menu-title">Jewelry </h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="home-menu-item ">
                                                        <a href="index-5.html">
                                                            <div class="home-menu-thumb p-relative fix">
                                                                <img src="{{ asset('assets/client/img/menu/menu-home-5.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="home-menu-content">
                                                                <h5 class="home-menu-title">Grocery</h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-dropdown has-mega-menu">
                                        <a href="shop.html">Shop</a>
                                        <div class="shop-mega-menu tp-submenu tp-mega-menu">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="shop-mega-menu-list">
                                                        <a href="shop.html" class="shop-mega-menu-title">Shop
                                                            Pages</a>
                                                        <ul>
                                                            <li><a href="shop-category.html">Grid Category</a></li>
                                                            <li><a href="shop.html">Grid Layout</a></li>
                                                            <li><a href="shop-list.html">List Layout</a></li>
                                                            <li><a href="shop-masonary.html">Masonary Layout</a></li>
                                                            <li><a href="shop-full-width.html">Full width Layout</a>
                                                            </li>
                                                            <li><a href="shop-1600.html">1600px Layout</a></li>
                                                            <li><a href="shop.html">Left Sidebar</a></li>
                                                            <li><a href="shop-right-sidebar.html">Right Sidebar</a>
                                                            </li>
                                                            <li><a href="shop-no-sidebar.html">Hidden Sidebar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="shop-mega-menu-list">
                                                        <a href="shop.html" class="shop-mega-menu-title">Features</a>
                                                        <ul>
                                                            <li><a href="shop-filter-dropdown.html">Filter Dropdown</a>
                                                            </li>
                                                            <li><a href="shop-filter-offcanvas.html">Filters
                                                                    Offcanvas</a></li>
                                                            <li><a href="shop.html">Filters Sidebar</a></li>
                                                            <li><a href="shop-load-more.html">Load More button</a></li>
                                                            <li><a href="shop-infinite-scroll.html">Infinit
                                                                    scrolling</a></li>
                                                            <li><a href="shop-list.html">Collections list</a></li>
                                                            <li><a href="shop.html">Hidden search</a></li>
                                                            <li><a href="shop.html">Search Full screen</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="shop-mega-menu-list">
                                                        <a href="shop.html" class="shop-mega-menu-title">Hover
                                                            Style</a>
                                                        <ul>
                                                            <li><a href="shop.html">Hover Style 1</a></li>
                                                            <li><a href="shop.html">Hover Style 2</a></li>
                                                            <li><a href="shop.html">Hover Style 3</a></li>
                                                            <li><a href="shop.html">Hover Style 4</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="shop-mega-menu-img">
                                                        <img src="{{ asset('assets/client/img/menu/product/menu-product-img-1.jpg') }}"
                                                            alt="">
                                                        <div class="shop-mega-menu-btn">
                                                            <a href="shop-category.html"
                                                                class="tp-menu-showcase-btn tp-menu-showcase-btn-2">Phones</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="shop-mega-menu-img">
                                                        <img src="{{ asset('assets/client/img/menu/product/menu-product-img-2.jpg') }}"
                                                            alt="">
                                                        <div class="shop-mega-menu-btn">
                                                            <a href="shop-category.html"
                                                                class="tp-menu-showcase-btn tp-menu-showcase-btn-2">Cameras</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-dropdown has-mega-menu ">

                                        <a href="shop.html">Products</a>
                                        <ul class="tp-submenu tp-mega-menu mega-menu-style-2">
                                            <!-- first col -->
                                            <li class="has-dropdown">
                                                <a href="shop.html" class="mega-menu-title">Shop Page</a>
                                                <ul class="tp-submenu">
                                                    <li><a href="shop-category.html">Only Categories</a></li>
                                                    <li><a href="shop-filter-offcanvas.html">Shop Grid</a></li>
                                                    <li><a href="shop.html">Shop Grid with Sideber</a></li>
                                                    <li><a href="shop-list.html">Shop List</a></li>
                                                    <li><a href="shop-category.html">Categories</a></li>
                                                    <li><a href="product-details.html">Product Details</a></li>
                                                    <li><a href="product-details-progress.html">Product Details
                                                            Progress</a></li>
                                                </ul>
                                            </li>
                                            <!-- third col -->
                                            <li class="has-dropdown">
                                                <a href="product-details.html" class="mega-menu-title">Products</a>
                                                <ul class="tp-submenu">

                                                    <li><a href="product-details.html">Product Simple</a></li>
                                                    <li><a href="product-details-video.html">With Video</a></li>
                                                    <li><a href="product-details-countdown.html">With Countdown
                                                            Timer</a></li>
                                                    <li><a href="product-details-presentation.html">Product
                                                            Presentation</a></li>
                                                    <li><a href="product-details-swatches.html">Variations Swatches</a>
                                                    </li>
                                                    <li><a href="product-details-list.html">List View</a></li>
                                                    <li><a href="product-details-gallery.html">Details Gallery</a></li>
                                                    <li><a href="product-details-slider.html">With Slider</a></li>
                                                </ul>
                                            </li>
                                            <!-- third col -->
                                            <li class="has-dropdown">
                                                <a href="shop.html" class="mega-menu-title">eCommerce</a>
                                                <ul class="tp-submenu">
                                                    <li><a href="cart.html">Shopping Cart</a></li>
                                                    <li><a href="order.html">Track Your Order</a></li>
                                                    <li><a href="compare.html">Compare</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="profile.html">My account</a></li>
                                                </ul>
                                            </li>

                                            <!-- second col -->
                                            <li class="has-dropdown">
                                                <a href="shop.html" class="mega-menu-title">More Pages</a>
                                                <ul class="tp-submenu">


                                                    <li><a href="about.html">About</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="register.html">Register</a></li>
                                                    <li><a href="forgot.html">Forgot Password</a></li>
                                                    <li><a href="404.html">404 Error</a></li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="coupon.html">Coupons</a></li>
                                    <li class="has-dropdown">
                                        <a href="blog.html">Blog</a>
                                        <ul class="tp-submenu">
                                            <li><a href="blog.html">Blog Standard</a></li>
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-list.html">Blog List</a></li>
                                            <li><a href="blog-details-2.html">Blog Details Full Width</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="tp-header-action d-flex align-items-center justify-content-end ml-50">
                            <div class="tp-header-action-item d-none d-lg-block">
                                <a href="compare.html" class="tp-header-action-btn">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.8396 17.3319V3.71411" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19.1556 13L15.0778 17.0967L11 13" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4.91115 1.00056V14.6183" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M0.833496 5.09667L4.91127 1L8.98905 5.09667" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            <div class="tp-header-action-item d-none d-lg-block">
                                <a href="wishlist.html" class="tp-header-action-btn">
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
                                    <span class="tp-header-action-badge">4</span>
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


    <script>
        var dungLuongId;
        var mauSacId;
        // lấy màu sắc, dung lượng
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.tp-size-variation-btn');
            const colorButtons = document.querySelectorAll('.tp-color-variation-btn');
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    buttons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    dungLuongId = parseInt(button.getAttribute('data-dung-luong-id'));
                });
            });
            colorButtons.forEach(button => {
                button.addEventListener('click', () => {
                    colorButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    mauSacId = parseInt(button.getAttribute('data-mau-sac-id'));
                });
            });
        });
        // thêm sản phẩm vào giỏ hàng
        function addToCart(id) {
            var quantityInput = document.querySelector('.tp-cart-input');
            var quantity = parseInt(quantityInput.value);
            if (quantity < 1) {
                alert("Số lượng sản phẩm không được nhỏ hơn 1");
                return;
            }
            if (mauSacId === undefined) {
                alert("Vui lòng chọn màu sắc sản phẩm!");
                return;
            }
            if (dungLuongId === undefined) {
                alert("Vui lòng chọn dung lượng sản phẩm!");
                return;
            }
            $.ajax({
                    url: "/Add-Cart/" + id,
                    type: "GET",
                    data: {
                        quantity: quantity,
                        mauSacId: mauSacId,
                        dungLuongId: dungLuongId,
                    }
                })
                .done((response) => {
                    RenderCartDrop(response);
                    alertify.success('Đã thêm vào giỏ hàng!');
                })
                .fail((jqXHR, textStatus, errorThrown) => {
                    alertify.error('Thêm vào giỏ hàng thất bại!');
                    console.error("Error adding to cart:", textStatus, errorThrown);
                });
        }
        // xóa sản phẩm khỏi giỏ hàng, giỏ hàng drop
        $('#change-item-cart').off("click", ".cartmini__del i").on("click", ".cartmini__del i", function() {
            console.log("clicked");
            $.ajax({
                    url: "/Delete-Item-Cart/" + $(this).data("idbt"),
                    type: "GET",
                })
                .done((response) => {
                    RenderCartDrop(response);
                    alertify.success('Xóa thành công!');
                    cartIndex();
                });
        });
        // hiển thị lại giỏ hàng, giỏ hàng drop sidebar
        function RenderCartDrop(response) {
            if ($("#change-item-cart")) {
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                let totalQuantity = $("#total-quantity-cart").val();
                if (totalQuantity) {
                    $("#total-quantity-show").text(totalQuantity);
                    $("#total-quantity-show span").text(totalQuantity);
                }
            }
            bindCartEvents();
        }
        // hiển thị giỏ hàng
        function RenderListCart(response) {
            if ($("#list-cart")) {
                $("#list-cart").empty();
                $("#list-cart").html(response);
                let totalQuantity = $("#total-quantity-list-cart").val();
                if (totalQuantity) {
                    $("#total-quantity-show").text(totalQuantity);
                    $("#total-quantity-show span").text(totalQuantity);
                }
            }
            bindCartEvents();
        }
        // danh sach san pham gio hang drop sideber
        function cartIndex() {
            if ($("#list-cart")) {
                $.ajax({
                        url: "/Cart-List",
                        type: "GET",
                    })
                    .done((response) => {
                        RenderListCart(response);
                    });
            }
        }
        // danh sach san pham gio hang
        function cartDropIndex() {
            if ($("#change-item-cart")) {
                $.ajax({
                        url: "/Cart-List-Drop",
                        type: "GET",
                    })
                    .done((response) => {
                        RenderCartDrop(response);
                    });
            }
        }
        // xóa sản phẩm khỏi giỏ hàng
        function DeleteItemCart(idbt) {
            console.log(idbt);
            $.ajax({
                    url: "/Delete-Item-List-Cart/" + idbt,
                    type: "GET",
                })
                .done((response) => {
                    RenderListCart(response);
                    alertify.success('Xóa thành công!');
                    cartDropIndex();
                });
        }

        // Cập nhập số lượng sản phẩm
        function UpdateItemCart(idbt, quantity) {
            $.ajax({
                url: "/Update-Item-Cart/" + idbt,
                type: "GET",
                data: {
                    'quantity': quantity
                }
            }).done((response) => {
                $("#list-cart").empty().html(response);
                alertify.success('Cập nhật thành công!');
                bindCartEvents();
            }).fail((xhr, status, error) => {
                console.error('Update failed:', error);
                alertify.error('Cập nhật thất bại. Vui lòng thử lại.');
            });
        }


        function bindCartEvents() {
            // Gán lại sự kiện cho input số lượng
            document.querySelectorAll('.cart-quantity').forEach(input => {
                input.oninput = function() {
                    let quantity = parseInt(this.value);
                    let idbt = this.closest('tr').dataset.id;
                    let maxQuantity = parseInt(this.getAttribute('data-max-quantity'));

                    if (isNaN(quantity) || quantity < 1) {
                        quantity = 1;
                        this.value = quantity;
                    } else if (quantity > maxQuantity) {
                        alertify.error(`Số lượng không được lớn hơn ${maxQuantity}`);
                        quantity = maxQuantity;
                    }
                    this.value = quantity;
                    UpdateItemCart(idbt, quantity);
                    cartDropIndex();
                    cartIndex();
                };
            });
            // Xử lý nút "+"
            document.querySelectorAll('.cart-plus').forEach(button => {
                button.onclick = function(event) {
                    event.stopPropagation();
                    let input = this.closest('.tp-product-quantity').querySelector('.cart-quantity');
                    let quantity = parseInt(input.value) || 0;
                    let maxQuantity = parseInt(input.getAttribute('data-max-quantity'));
                    let idbt = this.closest('tr').dataset.id;
                    console.log('out if ' + quantity);
                    if (quantity < maxQuantity) {
                        // quantity++;
                        if (quantity >= maxQuantity) {
                            quantity = maxQuantity
                            input.value = maxQuantity;
                        }
                        input.value = quantity;
                        UpdateItemCart(idbt, quantity);
                    }
                    if (quantity > maxQuantity) {
                        quantity = maxQuantity;
                        alertify.error(`Số lượng không được lớn hơn ${maxQuantity}`);
                        input.value = maxQuantity;
                    }
                    if (quantity >= maxQuantity) {
                        input.value = maxQuantity;
                        quantity = maxQuantity;
                        alertify.warning(`Sản phẩm chỉ còn ${maxQuantity}`);
                    }
                    cartDropIndex();
                    cartIndex();
                };
            });
            // Xử lý nút "-"
            document.querySelectorAll('.cart-minus').forEach(button => {
                button.onclick = function(event) {
                    event.stopPropagation();
                    let input = this.closest('.tp-product-quantity').querySelector('.cart-quantity');
                    let quantity = parseInt(input.value) || 0;
                    console.log(quantity);
                    // quantity--;
                    input.value = quantity;
                    let idbt = this.closest('tr').dataset.id;
                    UpdateItemCart(idbt, quantity);
                    cartDropIndex();
                    cartIndex();
                };
            });
        }
        // giảm giá sản phẩm
        function discount() {
            const discountCode = document.getElementById('discount-code').value;
            if (discountCode == "") {
                alertify.error('Vui lòng nhập mã giảm giá.');
                return;
            }
            console.log(discountCode);
            $.ajax({
                url: `/Discount-Cart/${discountCode}`,
                type: "GET",
            }).done((response) => {
                $("#list-cart").empty();
                $("#list-cart").html(response);
                alertify.success('Đã giảm giá!');
                bindCartEvents();
            }).fail((xhr, status, error) => {
                console.error('Update failed:', error);
                let errorMessage;
                if (xhr.status === 404) {
                    errorMessage = 'Mã giảm giá không hợp lệ.';
                } else if (xhr.status === 400) {
                    errorMessage = 'Mã giảm giá đã hết hạn.';
                } else {
                    errorMessage = 'Vui lòng thử lại sau.';
                }
                alertify.error(errorMessage);
            });
        }
        // khi load lại trang gọi lại sự kiện thay đổi 
        document.addEventListener('DOMContentLoaded', bindCartEvents);
    </script>
</body>

<!-- Mirrored from template.wphix.com/shofy-prv/shofy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Sep 2024 13:19:32 GMT -->

</html>

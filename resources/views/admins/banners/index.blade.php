@extends('layouts.admin')
@section('title', 'Thêm banner')
@section('css')

<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('assets/client/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/client/css/swiper-bundle.css') }}">
<link rel="stylesheet" href="{{ asset('assets/client/css/main.css') }}">
@endsection
@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">{{ session('success') }}</div>
@endif
@if (session('error'))
<div class="alert alert-danger" role="alert">{{ session('error') }}</div>
@endif

@section('content')

@if ($banners->where('vi_tri', 'header')->isNotEmpty())
<section class="tp-slider-area p-relative z-index-1">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Vị trí header</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="tp-slider-active tp-slider-variation swiper-container" style="max-width: 920px; margin: auto;"> <!-- Giới hạn chiều rộng -->
                            <div class="swiper-wrapper">
                                @foreach ($banners->where('vi_tri', 'header')->where('trang_thai', 1) as $banner)
                                <div class="tp-slider-item tp-slider-height d-flex align-items-center swiper-slide green-dark-bg">
                                    <div class="tp-slider-shape">
                                        <img class="tp-slider-shape-1" src="{{ asset('assets/client/img/slider/shape/slider-shape-1.png') }}" alt="slider-shape">
                                        <img class="tp-slider-shape-2" src="{{ asset('assets/client/img/slider/shape/slider-shape-2.png') }}" alt="slider-shape">
                                        <img class="tp-slider-shape-3" src="{{ asset('assets/client/img/slider/shape/slider-shape-3.png') }}" alt="slider-shape">
                                        <img class="tp-slider-shape-4" src="{{ asset('assets/client/img/slider/shape/slider-shape-4.png') }}" alt="slider-shape">
                                    </div>
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-xl-5 col-lg-6 col-md-6">
                                                <div class="tp-slider-content p-relative z-index-1">
                                                    <h3 class="tp-slider-title">{{ $banner->ten_banner }}</h3>
                                                    <div class="tp-slider-btn">
                                                        <a href="{{ $banner->url_lien_ket }}" class="tp-btn tp-btn-2 tp-btn-white">Mua Ngay</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-6 col-md-6">
                                                <div class="tp-slider-thumb text-end">
                                                    <img src="{{ asset('storage/' . $banner->anh_banner) }}" alt="slider-img" style="max-width: 100%; height: auto;"> <!-- Giới hạn chiều rộng ảnh -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="tp-slider-arrow tp-swiper-arrow d-none d-lg-block">
                                <button type="button" class="tp-slider-button-prev">
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                        
                                </button>
                                <button type="button" class="tp-slider-button-next">
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                        
                                </button>
                            </div>
                            <div class="tp-slider-dot tp-swiper-dot"></div>
                        </div>
                    </td>
                    <td>
                        <a  href="{{ route('admin.banners.show', $banner->vi_tri) }}">Xem</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@else
<span class="badge badge-danger bg-danger">Không có banner nào để hiển thị</span>
@endif
@if ($banners->where('vi_tri', 'sidebar')->isNotEmpty())
<section class="tp-slider-area p-relative z-index-1">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Vị trí sidebar</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!-- banner area start -->
                        <section class="tp-banner-area pb-70">
                            <div class="container">
                                <div class="row">
                                    @foreach ($banners->where('vi_tri', 'sidebar')->where('trang_thai', 1) as $index => $banner)
                                        @if ($index % 2 == 0)
                                            <div class="col-xl-8 col-lg-7">
                                                <div class="tp-banner-item tp-banner-height p-relative mb-30 z-index-1 fix">
                                                    <div class="tp-banner-thumb include-bg transition-3" style="background-image: url('{{ asset('storage/' . $banner->anh_banner) }}');"></div>
                                                    <div class="tp-banner-content">
                                                        <h3 class="tp-banner-title sidebar-title" data-index="{{ $index }}">
                                                            <a href="{{ $banner->url_lien_ket }}">{{ $banner->ten_banner }}</a>
                                                        </h3>
                                                        <div class="tp-banner-btn">
                                                            <a href="{{ $banner->url_lien_ket }}" class="tp-link-btn">Mua Ngay 
                                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-xl-4 col-lg-5">
                                                <div class="tp-banner-item tp-banner-item-sm tp-banner-height p-relative mb-30 z-index-1 fix">
                                                    <div class="tp-banner-thumb include-bg transition-3" style="background-image: url('{{ asset('storage/' . $banner->anh_banner) }}');"></div>
                                                    <div class="tp-banner-content">
                                                        <h3 class="tp-banner-title sidebar-title">
                                                            <a href="{{ $banner->url_lien_ket }}">{{ $banner->ten_banner }}</a>
                                                        </h3>
                                                        <div class="tp-banner-btn">
                                                            <a href="{{ $banner->url_lien_ket }}" class="tp-link-btn">Mua Ngay 
                                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <!-- banner area end --> 
                    </td>
                    <td>
                        <a class="dropdown-item" href="{{ route('admin.banners.show', $banner->vi_tri) }}">Xem</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@else
<span class="badge badge-danger bg-danger">Không có banner nào để hiển thị</span>
@endif
@if ($banners->where('vi_tri', 'footer')->isNotEmpty())
<section class="tp-slider-area p-relative z-index-1">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Vị trí footer</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="tp-product-banner-area pb-90" style="max-width: 920px; margin: auto;">
                        <div class="container">
                           <div class="tp-product-banner-slider fix">
                              <div class="tp-product-banner-slider-active swiper-container" >
                                 <div class="swiper-wrapper">
                                @foreach ($banners->where('vi_tri', 'footer')->where('trang_thai', 1) as $banner)
                                <div class="tp-product-banner-inner theme-bg p-relative z-index-1 fix swiper-slide">
                                    <div class="row align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="tp-product-banner-content p-relative z-index-1">
                                                <h3 class="tp-product-banner-title">{{ $banner->ten_banner }}</h3>
                                                <div class="tp-product-banner-btn">
                                                    <a href="" class="tp-btn tp-btn-2">Mua Ngay</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="tp-product-banner-thumb-wrapper p-relative">
                                                <div class="tp-product-banner-thumb text-end p-relative z-index-1">
                                                    <img src="{{ asset('storage/' . $banner->anh_banner) }}" alt="footer-banner-img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            
				                   
			 </div>
			 <div class="tp-product-banner-slider-dot tp-swiper-dot"></div>
		  </div>
	   </div>
	</div>
 </div>
                    </td>
                    <td>
                        <a class="dropdown-item" href="{{ route('admin.banners.show', $banner->vi_tri) }}">Xem</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@else
<span class="badge badge-danger bg-danger">Không có banner nào để hiển thị</span>
@endif
@endsection


@section('js')
<script src="{{ asset('assets/client/js/meanmenu.js') }}"></script>
<script src="{{ asset('assets/client/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('assets/client/js/slick.js') }}"></script>
<script src="{{ asset('assets/client/js/range-slider.js') }}"></script>
<script src="{{ asset('assets/client/js/nice-select.js') }}"></script>
<script>
/***************************************************
==================== JS INDEX ======================
****************************************************
13. Smooth Scroll Js
14. Slider Activation Area Start
****************************************************/

(function ($) {
	"use strict";

	var windowOn = $(window);
	////////////////////////////////////////////////////
	
	//////////////////////////////////////////////
	// 03. Common Js

	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});

	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	});

	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));
	});

	$("[data-text-color]").each(function () {
		$(this).css("color", $(this).attr("data-text-color"));
	});

	$(".has-img").each(function () {
		var imgSrc = $(this).attr("data-menu-img");
		var img = `<img class="mega-menu-img" src="${imgSrc}" alt="img">`;
		$(this).append(img);

	});


	$('.wp-menu nav > ul > li').slice(-4).addClass('menu-last');

	$('.tp-header-side-menu > nav > ul > li a, .offcanvas__category > nav > ul > li a').each(function(i, v) {
		$(v).contents().eq(2).wrap('<span class="menu-text"/>');
	});


	if($('.main-menu.menu-style-3 > nav > ul').length > 0){
		$('.main-menu.menu-style-3 > nav > ul').append(`<li id="marker" class="tp-menu-line"></li>`);
	}

	if ($("#tp-offcanvas-lang-toggle").length > 0) {
		window.addEventListener('click', function(e){
		
			if (document.getElementById('tp-offcanvas-lang-toggle').contains(e.target)){
				$(".tp-lang-list").toggleClass("tp-lang-list-open");
			}
			else{
				$(".tp-lang-list").removeClass("tp-lang-list-open");
			}
		});
	}

	if ($("#tp-offcanvas-currency-toggle").length > 0) {
		window.addEventListener('click', function(e){
		
			if (document.getElementById('tp-offcanvas-currency-toggle').contains(e.target)){
				$(".tp-currency-list").toggleClass("tp-currency-list-open");
			}
			else{
				$(".tp-currency-list").removeClass("tp-currency-list-open");
			}
		});
	}

	// for header language
	if ($("#tp-header-lang-toggle").length > 0) {
		window.addEventListener('click', function(e){
	
			if (document.getElementById('tp-header-lang-toggle').contains(e.target)){
				$(".tp-header-lang ul").toggleClass("tp-lang-list-open");
			}
			else{
				$(".tp-header-lang ul").removeClass("tp-lang-list-open");
			}
		});
	}

	// for header currency
	if ($("#tp-header-currency-toggle").length > 0) {
		window.addEventListener('click', function(e){
	
			if (document.getElementById('tp-header-currency-toggle').contains(e.target)){
				$(".tp-header-currency ul").toggleClass("tp-currency-list-open");
			}
			else{
				$(".tp-header-currency ul").removeClass("tp-currency-list-open");
			}
		});
	}

	// for header setting
	if ($("#tp-header-setting-toggle").length > 0) {
		window.addEventListener('click', function(e){
	
			if (document.getElementById('tp-header-setting-toggle').contains(e.target)){
				$(".tp-header-setting ul").toggleClass("tp-setting-list-open");
			}
			else{
				$(".tp-header-setting ul").removeClass("tp-setting-list-open");
			}
		});
	}

	$('.tp-hamburger-toggle').on('click', function(){
		$('.tp-header-side-menu').slideToggle('tp-header-side-menu');
	});


	////////////////////////////////////////////////////
	// 06. Search Js
	$(".tp-search-open-btn").on("click", function () {
		$(".tp-search-area").addClass("opened");
		$(".body-overlay").addClass("opened");
	});
	$(".tp-search-close-btn").on("click", function () {
		$(".tp-search-area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});

	////////////////////////////////////////////////////
	// 07. cartmini Js
	$(".cartmini-open-btn").on("click", function () {
		$(".cartmini__area").addClass("cartmini-opened");
		$(".body-overlay").addClass("opened");
	});


	$(".cartmini-close-btn").on("click", function () {
		$(".cartmini__area").removeClass("cartmini-opened");
		$(".body-overlay").removeClass("opened");
	});

	////////////////////////////////////////////////////
	// 08. filter
	$(".filter-open-btn").on("click", function () {
		$(".tp-filter-offcanvas-area").addClass("offcanvas-opened");
		$(".body-overlay").addClass("opened");
	});


	$(".filter-close-btn").on("click", function () {
		$(".tp-filter-offcanvas-area").removeClass("offcanvas-opened");
		$(".body-overlay").removeClass("opened");
	});

	$(".filter-open-dropdown-btn").on("click", function () {
		$(".tp-filter-dropdown-area").toggleClass('filter-dropdown-opened');
	});


	////////////////////////////////////////////////////
	// 09. Body overlay Js
	$(".body-overlay").on("click", function () {
		$(".offcanvas__area").removeClass("offcanvas-opened");
		$(".tp-search-area").removeClass("opened");
		$(".cartmini__area").removeClass("cartmini-opened");
		$(".tp-filter-offcanvas-area").removeClass("offcanvas-opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
	// 10. Sticky Header Js
	windowOn.on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$("#header-sticky").removeClass("header-sticky");
			$("#header-sticky-2").removeClass("header-sticky-2");
		} else {
			$("#header-sticky").addClass("header-sticky");
			$("#header-sticky-2").addClass("header-sticky-2");
		}
	});

	windowOn.on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$(".tp-side-menu-5").removeClass("sticky-active");
		} else {
			$(".tp-side-menu-5").addClass("sticky-active");
		}
	});




	



	
	///////////////////////////////////////////////////
	// 13. Smooth Scroll Js
	function smoothSctoll() {
		$('.smooth a').on('click', function (event) {
			var target = $(this.getAttribute('href'));
			if (target.length) {
				event.preventDefault();
				$('html, body').stop().animate({
					scrollTop: target.offset().top - 120
				}, 1500);
			}
		});
	}
	smoothSctoll();

	function back_to_top() {
		var btn = $('#back_to_top');
		var btn_wrapper = $('.back-to-top-wrapper');

		windowOn.scroll(function () {
			if (windowOn.scrollTop() > 300) {
				btn_wrapper.addClass('back-to-top-btn-show');
			} else {
				btn_wrapper.removeClass('back-to-top-btn-show');
			}
		});

		btn.on('click', function (e) {
			e.preventDefault();
			$('html, body').animate({ scrollTop: 0 }, '300');
		});
	}
	back_to_top();

	var tp_rtl = localStorage.getItem('tp_dir');
	let rtl_setting = tp_rtl == 'rtl' ? true : false;

	
	////////////////////////////////////////////////////
	// 14. Slider Activation Area Start
	$('.tp-slider-active-4').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		fade: true,
		rtl: rtl_setting,
		centerMode: true,
		prevArrow: `<button type="button" class="tp-slider-3-button-prev"><svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
		   <path d="M1.00073 6.99989L15 6.99989" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		   <path d="M6.64648 1.5L1.00011 6.99954L6.64648 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`,
		nextArrow: `<button type="button" class="tp-slider-3-button-next"><svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M14.9993 6.99989L1 6.99989" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M9.35352 1.5L14.9999 6.99954L9.35352 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg></button>`,
		asNavFor: '.tp-slider-nav-active',
		appendArrows: $('.tp-slider-arrow-4'),
		
	});

	$('.tp-slider-nav-active').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		vertical: true,
		asNavFor: '.tp-slider-active-4',
		dots: false,
		arrows: false,
		prevArrow: '<button type="button" class="tp-slick-prev"><i class="fa-solid fa-arrow-up"></i></button>',
		nextArrow: '<button type="button" class="tp-slick-next"><i class="fa-solid fa-arrow-down"></i></button>',
		centerMode: false,
		focusOnSelect: true,
		rtl: false,
	});


	// home electronics
	var mainSlider = new Swiper('.tp-slider-active', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		rtl: rtl_setting,
		effect : 'fade',
		// Navigation arrows
		navigation: {
			nextEl: ".tp-slider-button-next",
			prevEl: ".tp-slider-button-prev",
		},
		pagination: {
			el: ".tp-slider-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
	});

	mainSlider.on('slideChangeTransitionStart', function (realIndex) {
        if ($('.swiper-slide.swiper-slide-active, .tp-slider-item .is-light').hasClass('is-light')) {
            $('.tp-slider-variation').addClass('is-light');
        } else {
            $('.tp-slider-variation').removeClass('is-light');
        }
    });

	// home electronics
	var slider = new Swiper('.shop-mega-menu-slider-active', {
		slidesPerView: 3,
		spaceBetween: 20,
		loop: true,
		rtl: rtl_setting,
		// Navigation arrows
		navigation: {
			nextEl: ".tp-shop-mega-menu-button-next",
			prevEl: ".tp-shop-mega-menu-button-prev",
		},
		pagination: {
			el: ".tp-shop-mega-menu-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
	});

	// home electronics
	var slider = new Swiper('.tp-blog-main-slider-active', {
		slidesPerView: 3,
		spaceBetween: 20,
		loop: true,
		autoplay: {
			delay: 4000,
		  },
		rtl: rtl_setting,
		// Navigation arrows
		navigation: {
			nextEl: ".tp-blog-main-slider-button-next",
			prevEl: ".tp-blog-main-slider-button-prev",
		},
		pagination: {
			el: ".tp-blog-main-slider-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},
		breakpoints: {
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	var slider = new Swiper('.tp-product-banner-slider-active', {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		effect: 'fade',
		pagination: {
			el: ".tp-product-banner-slider-dot",
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '">' + '<button>' + (index + 1) + '</button>' + "</span>";
			},
		},

	});
})(jQuery);
</script>
@endsection

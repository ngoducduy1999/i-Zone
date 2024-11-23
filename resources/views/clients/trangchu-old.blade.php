@extends('layouts.client')

@section('content')
    {{-- slide 1 --}}
    <section class="tp-slider-area p-relative z-index-1">
        <div class="tp-slider-active tp-slider-variation swiper-container">
            <div class="swiper-wrapper">
                @foreach ($bannersHeas as $bannersHea)
                    <div class="tp-slider-item tp-slider-height d-flex align-items-center swiper-slide green-dark-bg">
                        <div class="tp-slider-shape">
                            <img class="tp-slider-shape-1"
                                src="{{ asset('assets/client/img/slider/shape/slider-shape-1.png') }}" alt="slider-shape">
                            <img class="tp-slider-shape-2"
                                src="{{ asset('assets/client/img/slider/shape/slider-shape-2.png') }}" alt="slider-shape">
                            <img class="tp-slider-shape-3"
                                src="{{ asset('assets/client/img/slider/shape/slider-shape-3.png') }}" alt="slider-shape">
                            <img class="tp-slider-shape-4"
                                src="{{ asset('assets/client/img/slider/shape/slider-shape-4.png') }}" alt="slider-shape">
                        </div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-5 col-lg-6 col-md-6">
                                    <div class="tp-slider-content p-relative z-index-1">
                                        <span>SALE</span>
                                        <h3 class="tp-slider-title"
                                            style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $bannersHea->ten_banner }}</h3>
                                        <div class="tp-slider-btn">
                                            <a href="{{ $bannersHea->url_lien_ket }}"
                                                class="tp-btn tp-btn-2 tp-btn-white">Xem ngay
                                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-6">
                                    <div class="tp-slider-thumb text-end">
                                        <img src="{{ asset('storage/' . $bannersHea->anh_banner) }}" width="420px"
                                            height="350px" style="object-fit: cover; border-radius: 10%;" alt="slider-img">
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
                        <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <button type="button" class="tp-slider-button-next">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="tp-slider-dot tp-swiper-dot"></div>
        </div>
    </section>
    {{-- hết slide 1 --}}

    {{-- danh mục  --}}
    <section class="tp-product-arrival-area pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-arrival-slider fix">
                        <div class="tp-product-arrival-active swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($danhMucs as $danhMuc)
                                    <div class="transition-3 swiper-slide">
                                        <!-- Hình ảnh sản phẩm -->
                                        <div class="tp-product-category-item text-center">
                                            <div class="tp-product-category-thumb"
                                                style="position: relative; width: 100%; overflow: hidden; border-radius: 50%;">
                                                <a href="#">
                                                    <img src="{{ asset($danhMuc->anh_danh_muc) }}"
                                                        alt="{{ $danhMuc->ten_danh_muc }}"
                                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px; transition: transform 0.3s; mix-blend-mode: darken; border-radius: 50%">
                                                </a>
                                            </div>
                                            <div class="tp-product-category-content">
                                                <h3 class="tp-product-category-title">
                                                    <a href="#">
                                                        {{ $danhMuc->ten_danh_muc }}
                                                    </a>
                                                </h3>
                                                <p>{{ $danhMuc->san_phams_count }} Product</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-product-arrival-more-wrapper d-flex justify-content-end">
                <div class="tp-product-arrival-arrow tp-swiper-arrow mb-40 text-end">
                    <button type="button" class="tp-arrival-slider-button-prev">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button type="button" class="tp-arrival-slider-button-next">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- hết danh mục  --}}



    <section class="tp-feature-area tp-feature-border-radius pb-70">
        <div class="container">
            <div class="row gx-1 gy-1 gy-xl-0">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                            <span>
                                <svg width="33" height="27" viewBox="0 0 33 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.7222 1H31.5555V19.0556H10.7222V1Z" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.7222 7.94446H5.16667L1.00001 12.1111V19.0556H10.7222V7.94446Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M25.3055 26C23.3879 26 21.8333 24.4454 21.8333 22.5278C21.8333 20.6101 23.3879 19.0555 25.3055 19.0555C27.2232 19.0555 28.7778 20.6101 28.7778 22.5278C28.7778 24.4454 27.2232 26 25.3055 26Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M7.25001 26C5.33235 26 3.77778 24.4454 3.77778 22.5278C3.77778 20.6101 5.33235 19.0555 7.25001 19.0555C9.16766 19.0555 10.7222 20.6101 10.7222 22.5278C10.7222 24.4454 9.16766 26 7.25001 26Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-feature-content">
                            <h3 class="tp-feature-title">Giao hàng miễn phí</h3>
                            <p>Tất cả các đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                            <span>
                                <svg width="21" height="35" viewBox="0 0 21 35" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.3636 1V34" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M17.8636 7H6.61365C5.22126 7 3.8859 7.55312 2.90134 8.53769C1.91677 9.52226 1.36365 10.8576 1.36365 12.25C1.36365 13.6424 1.91677 14.9777 2.90134 15.9623C3.8859 16.9469 5.22126 17.5 6.61365 17.5H14.1136C15.506 17.5 16.8414 18.0531 17.826 19.0377C18.8105 20.0223 19.3636 21.3576 19.3636 22.75C19.3636 24.1424 18.8105 25.4777 17.826 26.4623C16.8414 27.4469 15.506 28 14.1136 28H1.36365"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-feature-content">
                            <h3 class="tp-feature-title">Trả hàng & Hoàn tiền</h3>
                            <p>Đảm bảo hoàn lại tiền</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                            <span>
                                <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_1211_583" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                        y="0" width="31" height="30">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30.0024V29.9998H0V0Z"
                                            fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_1211_583)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.4168 27.1116C14.3017 27.9756 15.7266 27.9651 16.6056 27.0816L17.6885 26.0017C18.5285 25.1632 19.6894 24.6848 20.8728 24.6848H22.4178C23.6687 24.6848 24.6856 23.6678 24.6856 22.4184V20.875C24.6856 19.6736 25.1506 18.5441 25.9995 17.6937L27.0795 16.6122C27.519 16.1713 27.7544 15.5998 27.7529 14.9938C27.7514 14.3894 27.513 13.8209 27.0825 13.3919L26.001 12.309C25.1506 11.4525 24.6856 10.3246 24.6856 9.12318V7.58277C24.6856 6.33184 23.6687 5.3149 22.4178 5.3149H20.8758C19.6744 5.3149 18.545 4.84842 17.6945 4.00397L16.6116 2.91954C15.7101 2.02709 14.2717 2.03159 13.3913 2.91804L12.3128 3.99947C11.4519 4.84992 10.3225 5.3149 9.12553 5.3149H7.58212C6.33269 5.3164 5.31575 6.33334 5.31575 7.58277V9.12018C5.31575 10.3216 4.84927 11.451 4.00332 12.303L2.93839 13.3694C2.92789 13.3814 2.91739 13.3904 2.90689 13.4009C2.02644 14.2874 2.03094 15.7258 2.91739 16.6062L4.00032 17.6892C4.84927 18.5411 5.31575 19.6706 5.31575 20.872V22.4184C5.31575 23.6678 6.33119 24.6848 7.58212 24.6848H9.12253C10.3255 24.6863 11.4549 25.1527 12.3053 26.0002L13.3868 27.0786C13.3958 27.0891 13.4063 27.0996 13.4168 27.1116ZM14.9972 30.0002C13.8468 30.0002 12.6963 29.5652 11.8159 28.6923C11.8039 28.6803 11.7919 28.6683 11.7799 28.6548L10.715 27.5914C10.2905 27.1699 9.72352 26.9359 9.12055 26.9344H7.58164C5.09029 26.9344 3.06541 24.908 3.06541 22.4182V20.8717C3.06541 20.2688 2.82992 19.7033 2.40694 19.2773L1.32851 18.2004C-0.423392 16.4575 -0.444391 13.6197 1.27601 11.8498C1.28951 11.8363 1.30301 11.8228 1.31651 11.8093L2.40844 10.7143C2.82992 10.2899 3.06541 9.72139 3.06541 9.11993V7.58252C3.06541 5.09266 5.09029 3.06628 7.58014 3.06478H9.12505C9.72652 3.06478 10.2935 2.82929 10.724 2.40482L11.7964 1.32938C13.5498 -0.436017 16.4161 -0.445016 18.1845 1.31288L19.281 2.40932C19.7054 2.83079 20.2724 3.06478 20.8754 3.06478H22.4173C24.9086 3.06478 26.935 5.09116 26.935 7.58252V9.12293C26.935 9.72439 27.169 10.2929 27.5935 10.7203L28.6704 11.7988C29.5239 12.6462 29.9978 13.7787 30.0023 14.9861C30.0068 16.1935 29.5404 17.329 28.6899 18.1854L27.5905 19.2818C27.169 19.7063 26.935 20.2718 26.935 20.8747V22.4182C26.935 24.908 24.9086 26.9344 22.4188 26.9344H20.8724C20.2784 26.9344 19.6979 27.1744 19.2765 27.5929L18.1995 28.6698C17.3191 29.5562 16.1581 30.0002 14.9972 30.0002Z"
                                            fill="currentColor" />
                                    </g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.145 19.9811C10.857 19.9811 10.569 19.8716 10.3501 19.6511C9.91058 19.2116 9.91058 18.5006 10.3501 18.0612L18.0596 10.3501C18.4991 9.91064 19.2115 9.91064 19.651 10.3501C20.0905 10.7896 20.0905 11.502 19.651 11.9415L11.94 19.6511C11.721 19.8716 11.433 19.9811 11.145 19.9811Z"
                                        fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18.7544 20.2476C17.925 20.2476 17.247 19.5772 17.247 18.7477C17.247 17.9183 17.9115 17.2478 18.7409 17.2478H18.7544C19.5839 17.2478 20.2543 17.9183 20.2543 18.7477C20.2543 19.5772 19.5839 20.2476 18.7544 20.2476Z"
                                        fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.2548 12.748C10.4254 12.748 9.74744 12.0775 9.74744 11.2481C9.74744 10.4186 10.4119 9.74817 11.2413 9.74817H11.2548C12.0843 9.74817 12.7548 10.4186 12.7548 11.2481C12.7548 12.0775 12.0843 12.748 11.2548 12.748Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-feature-content">
                            <h3 class="tp-feature-title">Giảm giá cho thành viên</h3>
                            <p>Đơn hàng trên 10.000.000VNĐ</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                            <span>
                                <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.5 24.3333V15C1.5 11.287 2.975 7.72602 5.60051 5.10051C8.22602 2.475 11.787 1 15.5 1C19.213 1 22.774 2.475 25.3995 5.10051C28.025 7.72602 29.5 11.287 29.5 15V24.3333"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M29.5 25.8889C29.5 26.714 29.1722 27.5053 28.5888 28.0888C28.0053 28.6722 27.214 29 26.3889 29H24.8333C24.0082 29 23.2169 28.6722 22.6335 28.0888C22.05 27.5053 21.7222 26.714 21.7222 25.8889V21.2222C21.7222 20.3971 22.05 19.6058 22.6335 19.0223C23.2169 18.4389 24.0082 18.1111 24.8333 18.1111H29.5V25.8889ZM1.5 25.8889C1.5 26.714 1.82778 27.5053 2.41122 28.0888C2.99467 28.6722 3.78599 29 4.61111 29H6.16667C6.99179 29 7.78311 28.6722 8.36656 28.0888C8.95 27.5053 9.27778 26.714 9.27778 25.8889V21.2222C9.27778 20.3971 8.95 19.6058 8.36656 19.0223C7.78311 18.4389 6.99179 18.1111 6.16667 18.1111H1.5V25.8889Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-feature-content">
                            <h3 class="tp-feature-title">Hỗ trợ 24/7</h3>
                            <p>Liên hệ với chúng tôi </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- sản phẩm nhiều lượt xem nhất --}}
    <section class="tp-product-area pb-55">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-5 col-lg-6 col-md-5">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Sản phẩm nổi bật

                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                    stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-tab-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel"
                                aria-labelledby="new-tab" tabindex="0">
                                <div class="row">
                                    @foreach ($products as $index => $product)
                                        <div class="col-xl-3 col-lg-3 col-sm-6">
                                            <div class="tp-product-item p-relative transition-3 mb-25">
                                                <div class="tp-product-thumb p-relative fix m-img">
                                                    <a href="{{ route('chitietsanpham', $product->id) }}">
                                                        <img width="254px" height="214px" style="object-fit: cover"
                                                            src="{{ asset($product->anh_san_pham) }}"
                                                            alt="product-electronic">
                                                    </a>

                                                    <!-- product badge -->
                                                    <div class="tp-product-badge">
                                                        <span class="product-hot">Hot</span>
                                                    </div>

                                                    <!-- product action -->
                                                    <div class="tp-product-action">
                                                        <div class="tp-product-action-item d-flex flex-column">
                                                            <a href="{{ route('chitietsanpham', $product->id) }}">
                                                                <button type="button"
                                                                    class="tp-product-action-btn tp-product-add-cart-btn">
                                                                    <svg width="20" height="20"
                                                                        viewBox="0 0 20 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z"
                                                                            fill="currentColor" />

                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z"
                                                                            fill="currentColor" />

                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z"
                                                                            fill="currentColor" />
                                                                    </svg>

                                                                </button>
                                                            </a>
                                                            <button type="button"
                                                                class="tp-product-action-btn tp-product-quick-view-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#product{{ $index }}">
                                                                <svg width="20" height="17" viewBox="0 0 20 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z"
                                                                        fill="currentColor" />
                                                                    <g mask="url(#mask0_1211_721)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z"
                                                                            fill="currentColor" />
                                                                    </g>
                                                                </svg>

                                                            </button>
                                                            @if (Auth::user())
                                                                <button type="button"
                                                                    id="wishlist-button-{{ $index }}"
                                                                    onclick="Love({{ $product->id }}, {{ $index }})"
                                                                    class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <div id="wishlist-icon-{{ $index }}">

                                                                        @if (isset($isLoved[$product->id]) && $isLoved[$product->id])
                                                                            <svg width="20" height="19"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c2.04 0 3.99.81 5.5 2.09C15.51 3.81 17.46 3 19.5 3 22.58 3 25 5.42 25 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        @else
                                                                            <svg width="20" height="19"
                                                                                viewBox="0 0 20 19" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                                    fill="currentColor" />
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        @endif
                                                                    </div>
                                                                </button>
                                                            @else
                                                                <button type="button"
                                                                    id="wishlist-button-{{ $index }}"
                                                                    onclick="PleaseLogin()"
                                                                    class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <div id="wishlist-icon-{{ $index }}">
                                                                        <svg width="20" height="19"
                                                                            viewBox="0 0 20 19" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                                fill="currentColor" />
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </div>
                                                                    <span class="tp-product-tooltip">Add To Wishlist</span>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product content -->
                                                <div class="tp-product-content">
                                                    <div class="tp-product-category">
                                                        <a href="{{ isset($product->danhMuc->id) ? route('sanpham.danhmuc', $product->danhMuc->id) : '#' }}">
                                                            {{ isset($product->danhMuc->ten_danh_muc) ? $product->danhMuc->ten_danh_muc : '...' }}</a>
                                                    </div>
                                                    <h3 class="tp-product-title"
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 199px;">
                                                        <a href="{{ route('chitietsanpham', $product->id) }}">
                                                            {{ $product->ten_san_pham }}
                                                        </a>
                                                    </h3>

                                                    <div class="tp-product-rating d-flex align-items-center">
                                                        <div class="tp-product-rating-icon">
                                                            @php
                                                                // Lấy điểm trung bình của sản phẩm (tính từ danh gia)
                                                                $averageRating = $product->danhGias->avg('diem_so');

                                                                // Nếu không có đánh giá, mặc định là 0 sao
                                                                $averageRating = $averageRating ?: 0;

                                                                // Tính số sao đầy, sao nửa, và sao trống
                                                                $fullStars = floor($averageRating);
                                                                $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                                            @endphp

                                                            <!-- Hiển thị sao đầy -->
                                                            @for ($i = 0; $i < $fullStars; $i++)
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                            @endfor

                                                            <!-- Hiển thị sao nửa -->
                                                            @for ($i = 0; $i < $halfStar; $i++)
                                                                <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                                            @endfor

                                                            <!-- Hiển thị sao trống -->
                                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                                <span><i class="fa-solid fa-star"
                                                                        style="color: #dcdcdc;"></i></span>
                                                            @endfor
                                                        </div>

                                                        <div class="tp-product-rating-text">
                                                            <span>({{ $product->danhGias->count() }} Reviews)</span>
                                                        </div>
                                                    </div>

                                                    <div class="tp-product-price-wrapper">
                                                        @if ($product->bienTheSanPhams->first()->gia_cu > $product->bienTheSanPhams->first()->gia_moi)
                                                            <span
                                                                class="tp-product-price new-price">{{ number_format($product->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                                        @else
                                                            <span
                                                                class="tp-product-price old-price">{{ number_format($product->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ</span>
                                                            <span
                                                                class="tp-product-price new-price">{{ number_format($product->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- xem nhanh product nhiều lượt xem nhất --}}
    @foreach ($products as $index => $product)
        <div class="modal fade tp-product-modal" id="product{{ $index }}" tabindex="-1"
            aria-labelledby="product{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="tp-product-modal-content d-lg-flex align-items-start">
                        <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                            data-bs-target="#product{{ $index }}"><i class="fa-regular fa-xmark"></i></button>
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column" id="productDetailsNavThumb{{ $index }}"
                                    role="tablist">
                                    @foreach ($product->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                        <button class="nav-link {{ $imageIndex == 0 ? 'active' : '' }}"
                                            id="nav-{{ $imageIndex }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-{{ $imageIndex }}{{ $index }}" type="button"
                                            role="tab" aria-controls="nav-{{ $imageIndex }}{{ $index }}"
                                            aria-selected="{{ $imageIndex == 0 ? 'true' : 'false' }}">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt="">
                                        </button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content m-img" style="width: 450px;"
                                id="productDetailsNavContent{{ $index }}">
                                @foreach ($product->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                    <div class="tab-pane fade {{ $imageIndex == 0 ? 'show active' : '' }}"
                                        id="nav-{{ $imageIndex }}{{ $index }}" role="tabpanel"
                                        aria-labelledby="nav-{{ $imageIndex }}-tab" tabindex="0">
                                        <div class="tp-product-details-nav-main-thumb">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt=""
                                                style="object-fit: cover; width: 450px; height: 450px;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>
                                    {{ isset($product->danhMuc->ten_danh_muc) ? $product->danhMuc->ten_danh_muc : '...' }}
                                </span>
                                &
                                <span
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                    {{ $product->ma_san_pham ? $product->ma_san_pham : '...' }}
                                </span>
                            </div>
                            <div class="tp-product-category">
                                <a href="#">
                                    {{ isset($product->danhMuc->ten_danh_muc) ? $product->danhMuc->ten_danh_muc : '...' }}</a>
                            </div>
                            <h3 class="tp-product-details-title" style="max-width: 350px;">
                                {{ $product->ten_san_pham }}</h3>
                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                </div>
                            </div>
                            <p
                                style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; max-width: 350px;">
                                {{ $product->mo_ta }}</p>
                            <a style="color: #0989ff" href="{{ route('chitietsanpham', $product->id) }}">Xem thêm</a>
                            <!-- variations -->
                            <div class="tp-product-details-variation">
                                <div class="tp-product-details-variation-item">
                                    <h4 class="tp-product-details-variation-title">Lựa chọn
                                        :</h4>
                                    <div class="tp-product-details-variation-list">
                                        @foreach ($product->bienTheSanPhams as $bienThe)
                                            <button type="button"
                                                style="width: auto; margin-bottom: 4px; padding: 0 5px;"
                                                class="tp-size-variation-btn {{ $loop->first ? 'active' : '' }}"
                                                data-id="{{ $bienThe->id }}">
                                                <span>{{ $bienThe->dungLuong->ten_dung_luong }}
                                                    -
                                                    {{ $bienThe->mauSac->ten_mau_sac }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="tp-product-details-action-wrapper">
                                <a href="{{ route('chitietsanpham', $product->id) }}">
                                    <button class="tp-product-details-buy-now-btn w-100">Chi tiết sản
                                        phẩm</button>
                                </a>
                            </div>
                        </div>
                        {{-- kia --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- hết sản phẩm nhiều lượt xem nhất --}}

    {{-- khuyến mại --}}
    <section class="tp-product-offer grey-bg-2 pt-70 pb-80">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-4 col-md-5 col-sm-6">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Mã khuyến mãi
                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                    stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-8 col-md-7 col-sm-6">
                    <div class="tp-product-offer-more-wrapper d-flex justify-content-sm-end p-relative z-index-1">
                        <div class="tp-product-offer-more mb-40 text-sm-end grey-bg-2">
                            <span class="tp-product-offer-more-border"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-offer-slider fix">
                        <div class="tp-product-offer-slider-active swiper-container">
                            <div class="swiper-wrapper">
                                <!-- Hiển thị danh sách khuyến mãi -->
                                @foreach ($khuyenMais as $khuyenMai)
                                    <div class="tp-product-offer-item tp-product-item transition-3 swiper-slide">
                                        <div class="tp-product-content">
                                            <h4>Mã khuyến mãi :
                                                <div class="centered">
                                                    <div class="highlight">
                                                        <pre style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;"
                                                            class="highlight javascript"><code>{{ $khuyenMai->ma_khuyen_mai }}</code></pre>
                                                    </div>
                                                </div>
                                            </h4>
                                            <div class="tp-product-price-wrapper">
                                                <span class="tp-product-price new-price">Giảm giá:
                                                    {{ $khuyenMai->phan_tram_khuyen_mai }}% </span><br>
                                                <span class="tp-product-price text-danger">Giảm tối đa:
                                                    {{ number_format($khuyenMai->giam_toi_da, 0, ',', '.') }}₫ </span>
                                            </div>
                                            <div class="tp-product-countdown" data-countdown
                                                data-date="{{ $khuyenMai->ngay_ket_thuc }}">
                                                <div class="tp-product-countdown-inner">
                                                    <ul>
                                                        <li><span data-days></span> Ngày</li>
                                                        <li><span data-hours></span> Giờ</li>
                                                        <li><span data-minutes></span>Phút</li>
                                                        <li><span data-seconds></span> Giây</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tp-deals-slider-dot tp-swiper-dot text-center mt-40"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            div.highlight button {
                box-sizing: border-box;
                transition: 0.2s ease-out;
                cursor: pointer;
                user-select: none;
                background: rgba(0, 0, 0, 0.15);
                border: 1px solid rgba(0, 0, 0, 0);
                padding: 5px 10px;
                font-size: 0.8em;
                position: absolute;
                top: 0;
                right: 0;
                border-radius: 0 0.15rem;
            }
        </style>
        <script>
            const copyToClipboard = (str) => {
                const el = document.createElement('textarea') // Create a <textarea> element
                el.value = str // Set its value to the string that you want copied
                el.setAttribute('readonly', '') // Make it readonly to be tamper-proof
                el.style.position = 'absolute'
                el.style.left = '-9999px' // Move outside the screen to make it invisible
                document.body.appendChild(el) // Append the <textarea> element to the HTML document
                const selected =
                    document.getSelection().rangeCount > 0 // Check if there is any content selected previously
                    ?
                    document.getSelection().getRangeAt(0) // Store selection if found
                    :
                    false // Mark as false to know no selection existed before
                el.select() // Select the <textarea> content
                document.execCommand('copy') // Copy - only works as a result of a user action (e.g. click events)
                document.body.removeChild(el) // Remove the <textarea> element
                if (selected) {
                    // If a selection existed before copying
                    document.getSelection().removeAllRanges() // Unselect everything on the HTML document
                    document.getSelection().addRange(selected) // Restore the original selection
                }
            }

            function handleCopyClick(evt) {
                // get the children of the parent element
                const {
                    children
                } = evt.target.parentElement
                // grab the first element (we append the copy button on afterwards, so the first will be the code element)
                // destructure the innerText from the code block
                const {
                    innerText
                } = Array.from(children)[0]

                // copy all of the code to the clipboard
                copyToClipboard(innerText)
                // alert to show it worked, but you can put any kind of tooltip/popup
                alertify.success(`Copy mã khuyến mãi: ${innerText}`);
            }

            // get the list of all highlight code blocks
            const highlights = document.querySelectorAll('div.highlight')
            // add the copy button to each code block
            highlights.forEach((div) => {
                // create the copy button
                const copy = document.createElement('button')
                copy.innerHTML = 'Copy'
                // add the event listener to each click
                copy.addEventListener('click', handleCopyClick)
                // append the copy button to each code block
                div.append(copy)
            })
        </script>
    </section>
    {{-- hết khuyến mại --}}

    {{-- slide 2  --}}
    <section class="tp-banner-area pb-70">
        <div class="container">
            <div class="row">
                @foreach ($bannersSides as $bannersSide)
                    <div class="col-xl-6 col-lg-6">
                        <div class="tp-banner-item tp-banner-height p-relative mb-30 z-index-1 fix">
                            <div class="tp-banner-thumb include-bg transition-3"
                                data-background="{{ asset('storage/' . $bannersSide->anh_banner) }}"></div>
                            <div class="tp-banner-content">
                                <span>Sale</span>
                                <h3 class="tp-banner-title"
                                    style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <a href="{{ $bannersSide->url_lien_ket }}">{{ $bannersSide->ten_banner }}</a>
                                </h3>
                                <div class="tp-banner-btn">
                                    <a href="{{ $bannersSide->url_lien_ket }}" class="tp-link-btn">Xem ngay
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- hết slide 2  --}}

    {{-- sản phẩm mới  --}}
    <section class="tp-product-gadget-area pt-80 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="tp-product-gadget-sidebar mb-40">
                        <div class="tp-product-gadget-categories p-relative fix mb-10">
                            <div class="tp-product-gadget-thumb">
                                <img src="{{ asset('assets/client/img/product/gadget/gadget-girl.png') }}"
                                    alt="">
                            </div>
                            <h3 class="tp-product-gadget-categories-title">Sản phẩm <br> Tiện ích</h3>
                            @foreach ($danhMucs as $danhMuc)
                                <div class="tp-product-gadget-categories-list">
                                    <ul>
                                        <li><a
                                                href="{{ route('san-pham') }}?danh_muc={{ $danhMuc->id }}">{{ $danhMuc->ten_danh_muc }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            <div class="tp-product-gadget-btn">
                                <a href="{{ route('san-pham') }}" class="tp-link-btn">Sản phẩm khác
                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="tp-product-gadget-wrapper">
                        <div class="row">
                            @foreach ($newProducts as $index => $newProduct)
                                <div class="col-xl-4 col-sm-6">
                                    <div class="tp-product-item p-relative transition-3 mb-25">
                                        <div class="tp-product-thumb p-relative fix m-img">
                                            <a href="{{ route('chitietsanpham', $newProduct->id) }}">
                                                <img width="254px" height="214px" style="object-fit: cover"
                                                    src="{{ asset($newProduct->anh_san_pham) }}"
                                                    alt="product-electronic">
                                            </a>

                                            <!-- product badge -->
                                            {{-- <div class="tp-product-badge">
                                                <span class="product-offer">-25%</span>
                                            </div> --}}

                                            <!-- product action -->
                                            <div class="tp-product-action">
                                                <div class="tp-product-action-item d-flex flex-column">
                                                    <button type="button"
                                                        class="tp-product-action-btn tp-product-add-cart-btn">
                                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z"
                                                                fill="currentColor" />

                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z"
                                                                fill="currentColor" />

                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z"
                                                                fill="currentColor" />
                                                        </svg>

                                                        <span class="tp-product-tooltip">Add to Cart</span>
                                                    </button>
                                                    <button type="button"
                                                        class="tp-product-action-btn tp-product-quick-view-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#newProduct{{ $index }}">
                                                        <svg width="20" height="17" viewBox="0 0 20 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z"
                                                                fill="currentColor" />
                                                            <g mask="url(#mask0_1211_721)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z"
                                                                    fill="currentColor" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    @if (Auth::user())
                                                        <button type="button" id="wishlist-button-{{ $newProduct->id }}"
                                                            onclick="Love({{ $newProduct->id }}, {{ $newProduct->id }})"
                                                            class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                            <div id="wishlist-icon-{{ $newProduct->id }}">

                                                                @if (isset($isLoved2[$newProduct->id]) && $isLoved2[$newProduct->id])
                                                                    <svg width="20" height="19"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c2.04 0 3.99.81 5.5 2.09C15.51 3.81 17.46 3 19.5 3 22.58 3 25 5.42 25 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                @else
                                                                    <svg width="20" height="19"
                                                                        viewBox="0 0 20 19" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                @endif
                                                            </div>
                                                        </button>
                                                    @else
                                                        <button type="button" id="wishlist-button-{{ $index }}"
                                                            onclick="PleaseLogin()"
                                                            class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                            <div id="wishlist-icon-{{ $index }}">
                                                                <svg width="20" height="19" viewBox="0 0 20 19"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                        fill="currentColor" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product content -->
                                        <div class="tp-product-content">
                                            <div class="tp-product-category">
                                                <a
                                                    href="#">{{ isset($product->danhMuc->ten_danh_muc) ? $product->danhMuc->ten_danh_muc : '...' }}</a>
                                            </div>
                                            <h3 class="tp-product-title"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 199px;">
                                                <a href="{{ route('chitietsanpham', $newProduct->id) }}">
                                                    {{ $newProduct->ten_san_pham }}
                                                </a>
                                            </h3>
                                            {{-- <div class="tp-product-rating d-flex align-items-center">
                                                <div class="tp-product-rating-icon">
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                    <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                                </div>
                                                <div class="tp-product-rating-text">
                                                    <span>({{$newProduct->danhGias->count()}} Review)</span>
                                                </div>
                                            </div> --}}
                                            <div class="tp-product-rating d-flex align-items-center">
                                                <div class="tp-product-rating-icon">
                                                    @php
                                                        // Lấy điểm trung bình của sản phẩm (tính từ danh gia)
                                                        $averageRating = $newProduct->danhGias->avg('diem_so');

                                                        // Nếu không có đánh giá, mặc định là 0 sao
                                                        $averageRating = $averageRating ?: 0;

                                                        // Tính số sao đầy, sao nửa, và sao trống
                                                        $fullStars = floor($averageRating);
                                                        $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                                        $emptyStars = 5 - ($fullStars + $halfStar);
                                                    @endphp

                                                    <!-- Hiển thị sao đầy -->
                                                    @for ($i = 0; $i < $fullStars; $i++)
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    @endfor

                                                    <!-- Hiển thị sao nửa -->
                                                    @for ($i = 0; $i < $halfStar; $i++)
                                                        <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                                    @endfor

                                                    <!-- Hiển thị sao trống -->
                                                    @for ($i = 0; $i < $emptyStars; $i++)
                                                        <span><i class="fa-solid fa-star"
                                                                style="color: #dcdcdc;"></i></span>
                                                    @endfor
                                                </div>

                                                <div class="tp-product-rating-text">
                                                    <span>({{ $newProduct->danhGias->count() }} Reviews)</span>
                                                </div>
                                            </div>
                                            <div class="tp-product-price-wrapper">
                                                <span
                                                    class="tp-product-price old-price">{{ number_format($newProduct->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ</span>
                                                <span
                                                    class="tp-product-price new-price">{{ number_format($newProduct->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- xem nhanh newproduct --}}
    @foreach ($newProducts as $index => $newProduct)
        <div class="modal fade tp-product-modal" id="newProduct{{ $index }}" tabindex="-1"
            aria-labelledby="newProduct{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="tp-product-modal-content d-lg-flex align-items-start">
                        <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                            data-bs-target="#newProduct{{ $index }}"><i class="fa-regular fa-xmark"></i></button>
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column"
                                    id="productDetailsNavThumb{{ $index }}{{ $index }}" role="tablist">
                                    @foreach ($newProduct->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                        <button class="nav-link {{ $imageIndex == 0 ? 'active' : '' }}"
                                            id="nav-{{ $imageIndex }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-{{ $imageIndex }}{{ $index }}{{ $index }}"
                                            type="button" role="tab"
                                            aria-controls="nav-{{ $imageIndex }}{{ $index }}{{ $index }}"
                                            aria-selected="{{ $imageIndex == 0 ? 'true' : 'false' }}">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt="">
                                        </button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content m-img" style="width: 450px;"
                                id="productDetailsNavContent{{ $index }}{{ $index }}">
                                @foreach ($newProduct->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                    <div class="tab-pane fade {{ $imageIndex == 0 ? 'show active' : '' }}"
                                        id="nav-{{ $imageIndex }}{{ $index }}{{ $index }}"
                                        role="tabpanel" aria-labelledby="nav-{{ $imageIndex }}-tab" tabindex="0">
                                        <div class="tp-product-details-nav-main-thumb">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt=""
                                                style="object-fit: cover; width: 450px; height: 450px;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <h1></h1> --}}
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>
                                    {{ isset($newProduct->danhMuc->ten_danh_muc) ? $newProduct->danhMuc->ten_danh_muc : '...' }}
                                </span>
                                &
                                <span
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                    {{ $newProduct->ma_san_pham ? $newProduct->ma_san_pham : '...' }}
                                </span>
                            </div>
                            <div class="tp-product-category">
                                <a href="#">
                                    {{ isset($newProduct->danhMuc->ten_danh_muc) ? $newProduct->danhMuc->ten_danh_muc : '...' }}</a>
                            </div>
                            <h3 class="tp-product-details-title" style="max-width: 350px;">
                                {{ $newProduct->ten_san_pham }}</h3>
                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                    <div class="tp-product-details-rating">
                                    </div>
                                    <div class="tp-product-details-reviews">
                                    </div>
                                </div>
                            </div>
                            <p
                                style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; max-width: 350px;">
                                {{ $newProduct->mo_ta }}</p>
                            <a style="color: #0989ff" href="{{ route('chitietsanpham', $newProduct->id) }}">Xem thêm</a>
                            <!-- variations -->
                            <div class="tp-product-details-variation">
                                <div class="tp-product-details-variation-item">
                                    <h4 class="tp-product-details-variation-title">Lựa chọn
                                        :</h4>
                                    <div class="tp-product-details-variation-list">
                                        @foreach ($newProduct->bienTheSanPhams as $bienThe)
                                            <button type="button"
                                                style="width: auto; margin-bottom: 4px; padding: 0 5px;"
                                                class="tp-size-variation-btn {{ $loop->first ? 'active' : '' }}"
                                                data-id="{{ $bienThe->id }}">
                                                <span>{{ $bienThe->dungLuong->ten_dung_luong }}
                                                    -
                                                    {{ $bienThe->mauSac->ten_mau_sac }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tp-product-details-action-wrapper">
                                <a href="{{ route('chitietsanpham', $newProduct->id) }}">
                                    <button class="tp-product-details-buy-now-btn w-100">Chi tiết sản
                                        phẩm</button>
                                </a>
                            </div>
                            <!-- actions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- hết sản phẩm mới  --}}


    {{-- slide 3 --}}
    <div class="tp-product-banner-area pb-90">
        <div class="container">
            <div class="tp-product-banner-slider fix">
                <div class="tp-product-banner-slider-active swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($bannersFoots as $bannersFoot)
                            <div class="tp-product-banner-inner theme-bg p-relative z-index-1 fix swiper-slide">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tp-product-banner-content p-relative z-index-1">
                                            <span class="tp-product-banner-subtitle">Sale</span>
                                            <h3 class="tp-product-banner-title"
                                                style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $bannersFoot->ten_banner }}</h3>

                                            <div class="tp-product-banner-btn">
                                                <a href="{{ $bannersFoot->url_lien_ket }}" class="tp-btn tp-btn-2">Xem
                                                    ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tp-product-banner-thumb-wrapper p-relative">
                                            <div class="tp-product-banner-thumb-shape">
                                                <span class="tp-product-banner-thumb-gradient"></span>
                                            </div>
                                            <div class="tp-product-banner-thumb text-end p-relative z-index-1">
                                                <img src="{{ asset('storage/' . $bannersFoot->anh_banner) }}"
                                                    width="420px" height="350px"
                                                    style="object-fit: cover; border-radius: 10%" alt="">
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
    {{-- hết slide 3 --}}

    {{-- anhnt --}}
    <section class="tp-product-area pb-55">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-5 col-lg-6 col-md-5">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Gợi ý sản phẩm

                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                    stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-tab-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel"
                                aria-labelledby="new-tab" tabindex="0">
                                <div class="row">
                                    @foreach ($randProducts as $index => $randProduct)
                                        <div class="col-xl-3 col-lg-3 col-sm-6">
                                            <div class="tp-product-item p-relative transition-3 mb-25">
                                                <div class="tp-product-thumb p-relative fix m-img">
                                                    <a href="{{ route('chitietsanpham', $randProduct->id) }}">
                                                        <img width="254px" height="214px" style="object-fit: cover"
                                                            src="{{ asset($randProduct->anh_san_pham) }}"
                                                            alt="product-electronic">
                                                    </a>

                                                    <!-- product badge -->
                                                    <div class="tp-product-badge">
                                                        <span class="product-hot">Hot</span>
                                                    </div>

                                                    <!-- product action -->
                                                    <div class="tp-product-action">
                                                        <div class="tp-product-action-item d-flex flex-column">
                                                            <a href="{{ route('chitietsanpham', $randProduct->id) }}">
                                                                <button type="button"
                                                                    class="tp-product-action-btn tp-product-add-cart-btn">
                                                                    <svg width="20" height="20"
                                                                        viewBox="0 0 20 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z"
                                                                            fill="currentColor" />

                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z"
                                                                            fill="currentColor" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z"
                                                                            fill="currentColor" />

                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z"
                                                                            fill="currentColor" />
                                                                    </svg>

                                                                </button>
                                                            </a>
                                                            <button type="button"
                                                                class="tp-product-action-btn tp-product-quick-view-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#randProduct{{ $index }}">
                                                                <svg width="20" height="17" viewBox="0 0 20 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z"
                                                                        fill="currentColor" />
                                                                    <g mask="url(#mask0_1211_721)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z"
                                                                            fill="currentColor" />
                                                                    </g>
                                                                </svg>

                                                            </button>
                                                            @if (Auth::user())
                                                                <button type="button"
                                                                    id="wishlist-button-{{ $randProduct->id }}{{ $randProduct->id }}"
                                                                    onclick="Love({{ $randProduct->id }}, {{ $randProduct->id }}{{ $randProduct->id }})"
                                                                    class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <div
                                                                        id="wishlist-icon-{{ $randProduct->id }}{{ $randProduct->id }}">
                                                                        @if (isset($isLoved3[$randProduct->id]) && $isLoved3[$randProduct->id])
                                                                            <svg width="20" height="19"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c2.04 0 3.99.81 5.5 2.09C15.51 3.81 17.46 3 19.5 3 22.58 3 25 5.42 25 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        @else
                                                                            <svg width="20" height="19"
                                                                                viewBox="0 0 20 19" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                                    fill="currentColor" />
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                        @endif
                                                                    </div>
                                                                </button>
                                                            @else
                                                                <button type="button"
                                                                    id="wishlist-button-{{ $randProduct->id }}"
                                                                    onclick="PleaseLogin()"
                                                                    class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                                    <div id="wishlist-icon-{{ $index }}">
                                                                        <svg width="20" height="19"
                                                                            viewBox="0 0 20 19" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                                fill="currentColor" />
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </div>
                                                                    <span class="tp-product-tooltip">Add To
                                                                        Wishlist</span>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product content -->
                                                <div class="tp-product-content">
                                                    <div class="tp-product-category">
                                                        <a href="#">
                                                            {{ isset($randProduct->danhMuc->ten_danh_muc) ? $randProduct->danhMuc->ten_danh_muc : '...' }}</a>
                                                    </div>
                                                    <h3 class="tp-product-title"
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 199px;">
                                                        <a href="{{ route('chitietsanpham', $randProduct->id) }}">
                                                            {{ $randProduct->ten_san_pham }}
                                                        </a>
                                                    </h3>

                                                    <div class="tp-product-rating d-flex align-items-center">
                                                        <div class="tp-product-rating-icon">
                                                            @php
                                                                // Lấy điểm trung bình của sản phẩm (tính từ danh gia)
                                                                $averageRating = $randProduct->danhGias->avg('diem_so');

                                                                // Nếu không có đánh giá, mặc định là 0 sao
                                                                $averageRating = $averageRating ?: 0;

                                                                // Tính số sao đầy, sao nửa, và sao trống
                                                                $fullStars = floor($averageRating);
                                                                $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                                                $emptyStars = 5 - ($fullStars + $halfStar);
                                                            @endphp

                                                            <!-- Hiển thị sao đầy -->
                                                            @for ($i = 0; $i < $fullStars; $i++)
                                                                <span><i class="fa-solid fa-star"></i></span>
                                                            @endfor

                                                            <!-- Hiển thị sao nửa -->
                                                            @for ($i = 0; $i < $halfStar; $i++)
                                                                <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                                            @endfor

                                                            <!-- Hiển thị sao trống -->
                                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                                <span><i class="fa-solid fa-star"
                                                                        style="color: #dcdcdc;"></i></span>
                                                            @endfor
                                                        </div>

                                                        <div class="tp-product-rating-text">
                                                            <span>({{ $randProduct->danhGias->count() }} Reviews)</span>
                                                        </div>
                                                    </div>
                                                    <div class="tp-product-price-wrapper">
                                                        <span
                                                            class="tp-product-price old-price">{{ number_format($randProduct->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ</span>
                                                        <span
                                                            class="tp-product-price new-price">{{ number_format($randProduct->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- xem nhanh product random --}}
    @foreach ($randProducts as $index => $randProduct)
        <div class="modal fade tp-product-modal" id="randProduct{{ $index }}" tabindex="-1"
            aria-labelledby="randProduct{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="tp-product-modal-content d-lg-flex align-items-start">
                        <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                            data-bs-target="#randProduct{{ $index }}"><i
                                class="fa-regular fa-xmark"></i></button>
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column"
                                    id="productDetailsNavThumb{{ $index }}{{ $index }}{{ $index }}"
                                    role="tablist">
                                    @foreach ($randProduct->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                        <button class="nav-link {{ $imageIndex == 0 ? 'active' : '' }}"
                                            id="nav-{{ $imageIndex }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-{{ $imageIndex }}{{ $index }}{{ $index }}{{ $index }}"
                                            type="button" role="tab"
                                            aria-controls="nav-{{ $imageIndex }}{{ $index }}{{ $index }}{{ $index }}"
                                            aria-selected="{{ $imageIndex == 0 ? 'true' : 'false' }}">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}" alt="">
                                        </button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content m-img" style="width: 450px;"
                                id="productDetailsNavContent{{ $index }}{{ $index }}{{ $index }}">
                                @foreach ($randProduct->hinhAnhSanPhams as $imageIndex => $hinhAnh)
                                    <div class="tab-pane fade {{ $imageIndex == 0 ? 'show active' : '' }}"
                                        id="nav-{{ $imageIndex }}{{ $index }}{{ $index }}{{ $index }}"
                                        role="tabpanel" aria-labelledby="nav-{{ $imageIndex }}-tab" tabindex="0">
                                        <div class="tp-product-details-nav-main-thumb">
                                            <img src="{{ asset($hinhAnh->hinh_anh) }}"
                                                style="object-fit: cover; width: 450px; height: 450px;" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <h1></h1> --}}
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>
                                    {{ isset($randProduct->danhMuc->ten_danh_muc) ? $randProduct->danhMuc->ten_danh_muc : '...' }}
                                </span>
                                &
                                <span
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                    {{ $randProduct->ma_san_pham ? $randProduct->ma_san_pham : '...' }}
                                </span>
                            </div>
                            <div class="tp-product-category">
                                <a href="#">
                                    {{ isset($randProduct->danhMuc->ten_danh_muc) ? $randProduct->danhMuc->ten_danh_muc : '...' }}</a>
                            </div>
                            <h3 class="tp-product-details-title" style="max-width: 350px;">
                                {{ $randProduct->ten_san_pham }}</h3>
                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                </div>
                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                </div>
                            </div>
                            <p
                                style="max-height: 4.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; max-width: 350px;">
                                {{ $newProduct->mo_ta }}</p>
                            <a style="color: #0989ff" href="{{ route('chitietsanpham', $newProduct->id) }}">Xem thêm</a>
                            <!-- variations -->
                            <div class="tp-product-details-variation">
                                <div class="tp-product-details-variation-item">
                                    <h4 class="tp-product-details-variation-title">Lựa chọn
                                        :</h4>
                                    <div class="tp-product-details-variation-list">
                                        @foreach ($randProduct->bienTheSanPhams as $bienThe)
                                            <button type="button"
                                                style="width: auto; margin-bottom: 4px; padding: 0 5px;"
                                                class="tp-size-variation-btn {{ $loop->first ? 'active' : '' }}"
                                                data-id="{{ $bienThe->id }}">
                                                <span>{{ $bienThe->dungLuong->ten_dung_luong }}
                                                    -
                                                    {{ $bienThe->mauSac->ten_mau_sac }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- actions -->
                            <div class="tp-product-details-action-wrapper">
                                <a href="{{ route('chitietsanpham', $randProduct->id) }}">
                                    <button class="tp-product-details-buy-now-btn w-100">Chi tiết sản
                                        phẩm</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- anhnt --}}

    <!-- blog area start -->
    <section class="tp-blog-area pt-50 pb-75">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-4 col-md-6">
                    <div class="tp-section-title-wrapper mb-50">
                        <h3 class="tp-section-title">Tin tức & bài viết
                            <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                    stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6">
                    <div class="tp-blog-more-wrapper d-flex justify-content-md-end">
                        <div class="tp-blog-more mb-50 text-md-end">
                            <a href="blog-grid.html" class="tp-btn tp-btn-2 tp-btn-blue">Xem tất cả bài
                                viết
                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <span class="tp-blog-more-border"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-blog-main-slider">
                        <div class="tp-blog-main-slider-active swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($baiViets as $baiViet)
                                    <div class="tp-blog-item mb-30 swiper-slide">
                                        <div class="tp-blog-thumb p-relative fix">
                                            <a href="{{ route('chitietbaiviet', ['id' => $baiViet->id]) }}">
                                                <img src="{{ asset('storage/' . $baiViet->anh_bai_viet) }}"
                                                    alt="{{ $baiViet->tieu_de }}">
                                            </a>
                                            <div class="tp-blog-meta tp-blog-meta-date">
                                                <span>{{ \Carbon\Carbon::parse($baiViet->created_at)->translatedFormat(' d  n, Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="tp-blog-content">
                                            <h3 class="tp-blog-title">
                                                <a
                                                    href="{{ route('chitietbaiviet', ['id' => $baiViet->id]) }}">{{ $baiViet->tieu_de }}</a>
                                            </h3>
                                            <div class="tp-blog-tag">
                                                <span><i class="fa-light fa-tag"></i></span>
                                                @if ($baiViet->danhMuc)
                                                    <a href="{{ route('bai-viet', ['danh_muc' => $danhMuc->id]) }}">
                                                        {{ $baiViet->danhMuc->ten_danh_muc }}</a>
                                                @endif
                                            </div>
                                            <p>{{ Str::limit(strip_tags($baiViet->noi_dung), 60) }}</p>
                                            <div class="tp-blog-btn">
                                                <a href="{{ route('chitietbaiviet', ['id' => $baiViet->id]) }}"
                                                    class="tp-btn-2 tp-btn-border-2">
                                                    Xem thêm
                                                    <span>
                                                        <svg width="17" height="15" viewBox="0 0 17 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 7.5L1 7.5" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end -->
@endsection

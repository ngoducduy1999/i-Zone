@extends('layouts.client')

@section('content')
<!-- slider area start -->
<section class="tp-slider-area p-relative z-index-1">
   <div class="tp-slider-active tp-slider-variation swiper-container">
      <div class="swiper-wrapper">
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
                     <span>I -<b>Zone</b></span>
                        <h3 class="tp-slider-title">Đại tiệc mùa thu  <br> Ưu đãi vù vù</h3>
                        <p>Giảm đến
                           <span>50%
                              <svg width="94" height="20" viewBox="0 0 94 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M74.8576 4.63367L78.6048 5.11367C80.9097 5.35155 82.8309 5.75148 84.4483 5.97993L86.6581 6.31091L88.4262 6.63948C89.4684 6.81761 90.2699 6.9312 90.8805 6.99186C93.3213 7.24888 92.7011 6.63674 92.8183 6.12534C92.9355 5.61394 93.7175 5.37081 91.3267 4.45886C90.73 4.24001 89.9345 3.97481 88.8826 3.65818L87.1034 3.12577L84.8643 2.63282C83.236 2.28025 81.2402 1.82307 78.8684 1.52138L75.0177 0.981633C73.6188 0.823014 72.1417 0.730003 70.5389 0.582533C63.0297 0.0282543 55.4847 0.193022 48.0068 1.07459C39.9065 2.04304 31.9328 3.87384 24.2213 6.53586C18.0824 8.61764 12.1674 11.3089 6.56479 14.5692C4.88189 15.5255 3.25403 16.5756 1.68892 17.7145C0.568976 18.5077 -0.00964231 18.9932 0.0547097 19.0858C0.388606 19.6584 10.6194 13.1924 25.151 8.99361C32.789 6.72748 40.6283 5.20536 48.5593 4.44848C55.8569 3.76455 63.1992 3.69678 70.5082 4.24591L74.8223 4.62335" fill="currentColor" />
                              </svg>
                           </span>
                           
                        </p>

                        <div class="tp-slider-btn">
                           <a href="shop.html" class="tp-btn tp-btn-2 tp-btn-white">Mua ngay
                              <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-6 col-md-6">
                     @if($banners)
                     <div class="tp-slider-thumb text-end">
                        <img src="{{ asset($banners->anh_banner) }}" alt="{{ $banners->ten_banner }}" width="580">
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
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
                     <span>I -<b>Zone</b></span>
                        <h3 class="tp-slider-title">Uy tín Chất lượng <br> Giá rẻ bất ngờ</h3>
                        <p>Giảm giá
                           <span>-10%
                              <svg width="94" height="20" viewBox="0 0 94 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M74.8576 4.63367L78.6048 5.11367C80.9097 5.35155 82.8309 5.75148 84.4483 5.97993L86.6581 6.31091L88.4262 6.63948C89.4684 6.81761 90.2699 6.9312 90.8805 6.99186C93.3213 7.24888 92.7011 6.63674 92.8183 6.12534C92.9355 5.61394 93.7175 5.37081 91.3267 4.45886C90.73 4.24001 89.9345 3.97481 88.8826 3.65818L87.1034 3.12577L84.8643 2.63282C83.236 2.28025 81.2402 1.82307 78.8684 1.52138L75.0177 0.981633C73.6188 0.823014 72.1417 0.730003 70.5389 0.582533C63.0297 0.0282543 55.4847 0.193022 48.0068 1.07459C39.9065 2.04304 31.9328 3.87384 24.2213 6.53586C18.0824 8.61764 12.1674 11.3089 6.56479 14.5692C4.88189 15.5255 3.25403 16.5756 1.68892 17.7145C0.568976 18.5077 -0.00964231 18.9932 0.0547097 19.0858C0.388606 19.6584 10.6194 13.1924 25.151 8.99361C32.789 6.72748 40.6283 5.20536 48.5593 4.44848C55.8569 3.76455 63.1992 3.69678 70.5082 4.24591L74.8223 4.62335" fill="currentColor" />
                              </svg>
                           </span>
                           các sản phẩm
                        </p>

                        <div class="tp-slider-btn">
                           <a href="shop.html" class="tp-btn tp-btn-2 tp-btn-white">Mua ngay
                              <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-6 col-md-6">
                     @if($banners2)
                     <div class="tp-slider-thumb text-end">
                        <img src="{{ asset($banners2->anh_banner) }}" alt="{{ $banners2->ten_banner }}" width="580">
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <div class="tp-slider-item is-light tp-slider-height d-flex align-items-center swiper-slide" data-bg-color="#E3EDF6">
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
                        <span>I -<b>Zone</b></span>
                        <h3 class="tp-slider-title">Điện thoại thông minh <br> Mới nhất 2024</h3>
                        <p>Các
                           <span>khuyến mãi
                              <svg width="94" height="20" viewBox="0 0 94 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M74.8576 4.63367L78.6048 5.11367C80.9097 5.35155 82.8309 5.75148 84.4483 5.97993L86.6581 6.31091L88.4262 6.63948C89.4684 6.81761 90.2699 6.9312 90.8805 6.99186C93.3213 7.24888 92.7011 6.63674 92.8183 6.12534C92.9355 5.61394 93.7175 5.37081 91.3267 4.45886C90.73 4.24001 89.9345 3.97481 88.8826 3.65818L87.1034 3.12577L84.8643 2.63282C83.236 2.28025 81.2402 1.82307 78.8684 1.52138L75.0177 0.981633C73.6188 0.823014 72.1417 0.730003 70.5389 0.582533C63.0297 0.0282543 55.4847 0.193022 48.0068 1.07459C39.9065 2.04304 31.9328 3.87384 24.2213 6.53586C18.0824 8.61764 12.1674 11.3089 6.56479 14.5692C4.88189 15.5255 3.25403 16.5756 1.68892 17.7145C0.568976 18.5077 -0.00964231 18.9932 0.0547097 19.0858C0.388606 19.6584 10.6194 13.1924 25.151 8.99361C32.789 6.72748 40.6283 5.20536 48.5593 4.44848C55.8569 3.76455 63.1992 3.69678 70.5082 4.24591L74.8223 4.62335" fill="currentColor" />
                              </svg>
                           </span>
                           cực hot
                        </p>

                        <div class="tp-slider-btn">
                           <a href="shop.html" class="tp-btn tp-btn-2 tp-btn-white">Mua ngay
                              <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-6 col-md-6">
                     @if($banners1)
                     <div class="tp-slider-thumb text-end">
                        <img src="{{ asset($banners1->anh_banner) }}" alt="{{ $banners1->ten_banner }}" width="580">
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tp-slider-arrow tp-swiper-arrow d-none d-lg-block">
         <button type="button" class="tp-slider-button-prev">
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </button>
         <button type="button" class="tp-slider-button-next">
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </button>
      </div>
      <div class="tp-slider-dot tp-swiper-dot"></div>
   </div>
</section>
<!-- slider area end -->

<!-- product category area start -->
<section class="tp-product-category pt-60 pb-15">
   <div class="container">
      <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-4">
         @foreach($danhMucs as $danhMuc)
         <div class="col">
            <div class="tp-product-category-item text-center mb-40">
               <div class="tp-product-category-thumb fix">
                  <a href="{{ url('shop-category/' . $danhMuc->id) }}"> <!-- Link đến trang danh mục -->
                     <img src="{{ asset( $danhMuc->anh_danh_muc) }}" alt="{{ $danhMuc->ten_danh_muc }}">
                  </a>
               </div>
               <div class="tp-product-category-content">
                  <h3 class="tp-product-category-title">
                     <a href="{{ url('shop-category/' . $danhMuc->id) }}">{{ $danhMuc->ten_danh_muc }}</a>
                  </h3>
                  <p>{{ $danhMuc->san_phams_count }} Product</p> <!-- Số lượng sản phẩm -->
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>


<!-- product category area end -->

<!-- feature area start -->
<section class="tp-feature-area tp-feature-border-radius pb-70">
   <div class="container">
      <div class="row gx-1 gy-1 gy-xl-0">
         <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="tp-feature-item d-flex align-items-start">
               <div class="tp-feature-icon mr-15">
                  <span>
                     <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7222 1H31.5555V19.0556H10.7222V1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.7222 7.94446H5.16667L1.00001 12.1111V19.0556H10.7222V7.94446Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M25.3055 26C23.3879 26 21.8333 24.4454 21.8333 22.5278C21.8333 20.6101 23.3879 19.0555 25.3055 19.0555C27.2232 19.0555 28.7778 20.6101 28.7778 22.5278C28.7778 24.4454 27.2232 26 25.3055 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.25001 26C5.33235 26 3.77778 24.4454 3.77778 22.5278C3.77778 20.6101 5.33235 19.0555 7.25001 19.0555C9.16766 19.0555 10.7222 20.6101 10.7222 22.5278C10.7222 24.4454 9.16766 26 7.25001 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                     <svg width="21" height="35" viewBox="0 0 21 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3636 1V34" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17.8636 7H6.61365C5.22126 7 3.8859 7.55312 2.90134 8.53769C1.91677 9.52226 1.36365 10.8576 1.36365 12.25C1.36365 13.6424 1.91677 14.9777 2.90134 15.9623C3.8859 16.9469 5.22126 17.5 6.61365 17.5H14.1136C15.506 17.5 16.8414 18.0531 17.826 19.0377C18.8105 20.0223 19.3636 21.3576 19.3636 22.75C19.3636 24.1424 18.8105 25.4777 17.826 26.4623C16.8414 27.4469 15.506 28 14.1136 28H1.36365" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                     <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_1211_583" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="31" height="30">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30.0024V29.9998H0V0Z" fill="white" />
                        </mask>
                        <g mask="url(#mask0_1211_583)">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4168 27.1116C14.3017 27.9756 15.7266 27.9651 16.6056 27.0816L17.6885 26.0017C18.5285 25.1632 19.6894 24.6848 20.8728 24.6848H22.4178C23.6687 24.6848 24.6856 23.6678 24.6856 22.4184V20.875C24.6856 19.6736 25.1506 18.5441 25.9995 17.6937L27.0795 16.6122C27.519 16.1713 27.7544 15.5998 27.7529 14.9938C27.7514 14.3894 27.513 13.8209 27.0825 13.3919L26.001 12.309C25.1506 11.4525 24.6856 10.3246 24.6856 9.12318V7.58277C24.6856 6.33184 23.6687 5.3149 22.4178 5.3149H20.8758C19.6744 5.3149 18.545 4.84842 17.6945 4.00397L16.6116 2.91954C15.7101 2.02709 14.2717 2.03159 13.3913 2.91804L12.3128 3.99947C11.4519 4.84992 10.3225 5.3149 9.12553 5.3149H7.58212C6.33269 5.3164 5.31575 6.33334 5.31575 7.58277V9.12018C5.31575 10.3216 4.84927 11.451 4.00332 12.303L2.93839 13.3694C2.92789 13.3814 2.91739 13.3904 2.90689 13.4009C2.02644 14.2874 2.03094 15.7258 2.91739 16.6062L4.00032 17.6892C4.84927 18.5411 5.31575 19.6706 5.31575 20.872V22.4184C5.31575 23.6678 6.33119 24.6848 7.58212 24.6848H9.12253C10.3255 24.6863 11.4549 25.1527 12.3053 26.0002L13.3868 27.0786C13.3958 27.0891 13.4063 27.0996 13.4168 27.1116ZM14.9972 30.0002C13.8468 30.0002 12.6963 29.5652 11.8159 28.6923C11.8039 28.6803 11.7919 28.6683 11.7799 28.6548L10.715 27.5914C10.2905 27.1699 9.72352 26.9359 9.12055 26.9344H7.58164C5.09029 26.9344 3.06541 24.908 3.06541 22.4182V20.8717C3.06541 20.2688 2.82992 19.7033 2.40694 19.2773L1.32851 18.2004C-0.423392 16.4575 -0.444391 13.6197 1.27601 11.8498C1.28951 11.8363 1.30301 11.8228 1.31651 11.8093L2.40844 10.7143C2.82992 10.2899 3.06541 9.72139 3.06541 9.11993V7.58252C3.06541 5.09266 5.09029 3.06628 7.58014 3.06478H9.12505C9.72652 3.06478 10.2935 2.82929 10.724 2.40482L11.7964 1.32938C13.5498 -0.436017 16.4161 -0.445016 18.1845 1.31288L19.281 2.40932C19.7054 2.83079 20.2724 3.06478 20.8754 3.06478H22.4173C24.9086 3.06478 26.935 5.09116 26.935 7.58252V9.12293C26.935 9.72439 27.169 10.2929 27.5935 10.7203L28.6704 11.7988C29.5239 12.6462 29.9978 13.7787 30.0023 14.9861C30.0068 16.1935 29.5404 17.329 28.6899 18.1854L27.5905 19.2818C27.169 19.7063 26.935 20.2718 26.935 20.8747V22.4182C26.935 24.908 24.9086 26.9344 22.4188 26.9344H20.8724C20.2784 26.9344 19.6979 27.1744 19.2765 27.5929L18.1995 28.6698C17.3191 29.5562 16.1581 30.0002 14.9972 30.0002Z" fill="currentColor" />
                        </g>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.145 19.9811C10.857 19.9811 10.569 19.8716 10.3501 19.6511C9.91058 19.2116 9.91058 18.5006 10.3501 18.0612L18.0596 10.3501C18.4991 9.91064 19.2115 9.91064 19.651 10.3501C20.0905 10.7896 20.0905 11.502 19.651 11.9415L11.94 19.6511C11.721 19.8716 11.433 19.9811 11.145 19.9811Z" fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7544 20.2476C17.925 20.2476 17.247 19.5772 17.247 18.7477C17.247 17.9183 17.9115 17.2478 18.7409 17.2478H18.7544C19.5839 17.2478 20.2543 17.9183 20.2543 18.7477C20.2543 19.5772 19.5839 20.2476 18.7544 20.2476Z" fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2548 12.748C10.4254 12.748 9.74744 12.0775 9.74744 11.2481C9.74744 10.4186 10.4119 9.74817 11.2413 9.74817H11.2548C12.0843 9.74817 12.7548 10.4186 12.7548 11.2481C12.7548 12.0775 12.0843 12.748 11.2548 12.748Z" fill="currentColor" />
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
                     <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5 24.3333V15C1.5 11.287 2.975 7.72602 5.60051 5.10051C8.22602 2.475 11.787 1 15.5 1C19.213 1 22.774 2.475 25.3995 5.10051C28.025 7.72602 29.5 11.287 29.5 15V24.3333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M29.5 25.8889C29.5 26.714 29.1722 27.5053 28.5888 28.0888C28.0053 28.6722 27.214 29 26.3889 29H24.8333C24.0082 29 23.2169 28.6722 22.6335 28.0888C22.05 27.5053 21.7222 26.714 21.7222 25.8889V21.2222C21.7222 20.3971 22.05 19.6058 22.6335 19.0223C23.2169 18.4389 24.0082 18.1111 24.8333 18.1111H29.5V25.8889ZM1.5 25.8889C1.5 26.714 1.82778 27.5053 2.41122 28.0888C2.99467 28.6722 3.78599 29 4.61111 29H6.16667C6.99179 29 7.78311 28.6722 8.36656 28.0888C8.95 27.5053 9.27778 26.714 9.27778 25.8889V21.2222C9.27778 20.3971 8.95 19.6058 8.36656 19.0223C7.78311 18.4389 6.99179 18.1111 6.16667 18.1111H1.5V25.8889Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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

<!-- product area start -->
<section class="tp-product-area pb-55">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-xl-5 col-lg-6 col-md-5">
            <div class="tp-section-title-wrapper mb-40">
               <h3 class="tp-section-title">Sản phẩm nổi bật
                  <svg width="114" height="35" viewBox="0 0 114 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053" stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637" stroke-linecap="round" />
                  </svg>
               </h3>
            </div>
         </div>
      <div class="col-xl-12">
        <div class="tp-product-tab-content">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab" tabindex="0">
                    <div class="row">
                        @foreach ($featuredProducts as $sanpham)
                        <div class="col-xl-3 col-lg-3 col-sm-6">
                            <div class="tp-product-item p-relative transition-3 mb-25">
                                <div class="tp-product-thumb p-relative fix m-img">
                                    <a href="{{ ( $sanpham->id) }}">
                                        <img src="{{ asset($sanpham->anh_san_pham) }}" alt="{{ $sanpham->ten_san_pham }}">
                                    </a>

                                    <!-- product badge -->
                                    <div class="tp-product-badge">
                                        <span class="product-hot">Hot</span>
                                    </div>

                                    <!-- product action -->
                                    <div class="tp-product-action">
                                        <div class="tp-product-action-item d-flex flex-column">
                                        <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z" fill="currentColor" />
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z" fill="currentColor" />
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z" fill="currentColor" />

                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z" fill="currentColor" />
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z" fill="currentColor" />

                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z" fill="currentColor" />
                                          </svg>

                                          <span class="tp-product-tooltip">Thêm vào giỏ</span>
                                       </button>
                                       <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                          <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                             <g mask="url(#mask0_1211_721)">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                             </g>
                                          </svg>

                                          <span class="tp-product-tooltip">Xem</span>
                                       </button>
                                       <button type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                          <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                          </svg>
                                          <span class="tp-product-tooltip">Yêu thích</span>
                                       </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tp-product-info text-center">
                                 <br>
                                   <h2 class="tp-product-title">
                                        <a href="{{ ( $sanpham->id) }}">
                                            {{ $sanpham->ten_san_pham }}
                                        </a>
                                    </h2>
                                    <div class="tp-product-category">
                                    <a href="{{ $sanpham->danh_muc_id }}">{{ $sanpham->danhmucs->ten_danh_muc ?? 'Danh mục' }}</a>
                                    </div>
                                    
                                    <div class="tp-product-rating d-flex align-items-center">
                                        <!-- <div class="tp-product-rating-icon">
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                        </div> -->
                                        <!-- <div class="tp-product-rating-text">
                                            <span>(7 Review)</span>
                                        </div> -->
                                    </div>
                                    <div class="tp-product-price-wrapper">
                                        <span class="tp-product-price old-price">
                                            {{ $sanpham->bienThe->first()->gia_cu ?? 'Chưa có giá' }}VNĐ
                                        </span>
                                        <span class="tp-product-price new-price">
                                            {{ $sanpham->bienThe->first()->gia_moi ?? 'Chưa có giá' }}VNĐ
                                        </span>
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
<!-- banner area end -->



<!-- product offer area start -->
<section class="tp-product-offer grey-bg-2 pt-70 pb-80">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-xl-4 col-md-5 col-sm-6">
            <div class="tp-section-title-wrapper mb-40">
               <h3 class="tp-section-title">Khuyến mãi Hot
                  <svg width="114" height="35" viewBox="0 0 114 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053" stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637" stroke-linecap="round" />
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
                     @foreach($khuyenMais as $khuyenMai)
                     <div class="tp-product-offer-item tp-product-item transition-3 swiper-slide">
                        <div class="tp-product-content">
                           <h3 class="tp-product-title">Khuyến mãi: {{ $khuyenMai->ma_khuyen_mai }}</h3>
                           <div class="tp-product-price-wrapper">
                              <span class="tp-product-price new-price">{{ $khuyenMai->phan_tram_khuyen_mai }}% Off</span>
                           </div>
                           <div class="tp-product-countdown" data-countdown data-date="{{ $khuyenMai->ngay_ket_thuc }}">
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
</section>

<!-- product deal area end -->

<section class="tp-product-gadget-area pt-80 pb-75">
   <div class="container">
      <div class="row">
         <div class="col-xl-4 col-lg-5">
            <div class="tp-product-gadget-sidebar mb-40">
               <div class="tp-product-gadget-categories p-relative fix mb-10">
                  <div class="tp-product-gadget-thumb">
                     <img src="{{ asset('assets/client/img/product/gadget/gadget-girl.png') }}" alt="">
                  </div>
                  <h3 class="tp-product-gadget-categories-title">Electronics <br> Gadgets</h3>

                  <div class="tp-product-gadget-categories-list">
                     <ul>
                        <li><a href="shop-category.html">Micrscope</a></li>
                        <li><a href="shop-category.html">Remote Control</a></li>
                        <li><a href="shop-category.html">Monitor</a></li>
                        <li><a href="shop-category.html">Thermometer</a></li>
                        <li><a href="shop-category.html">Backpack</a></li>
                        <li><a href="shop-category.html">Headphones</a></li>
                     </ul>
                  </div>

                  <div class="tp-product-gadget-btn">
                     <a href="shop-category.html" class="tp-link-btn">More Products
                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                           <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                     </a>
                  </div>
               </div>
               <div class="tp-product-gadget-banner">
                  <div class="tp-product-gadget-banner-slider-active swiper-container">
                     <div class="swiper-wrapper">
                        <div class="tp-product-gadget-banner-item swiper-slide include-bg" data-background="{{ asset('assets/client/img/product/gadget/gadget-banner-1.jpg') }}">
                           <div class="tp-product-gadget-banner-content">
                              <span class="tp-product-gadget-banner-price">Only $99.00</span>
                              <h3 class="tp-product-gadget-banner-title">
                                 <a href="product-details.html">Selected novelty <br> Products</a>
                              </h3>
                           </div>
                        </div>
                        <div class="tp-product-gadget-banner-item swiper-slide include-bg" data-background="{{ asset('assets/client/img/product/gadget/gadget-banner-2.jpg') }}">
                           <div class="tp-product-gadget-banner-content">
                              <span class="tp-product-gadget-banner-price">Only $55.00</span>
                              <h3 class="tp-product-gadget-banner-title">
                                 <a href="product-details.html">Top Rated <br> Products</a>
                              </h3>
                           </div>
                        </div>
                     </div>
                     <div class="tp-product-gadget-banner-slider-dot tp-swiper-dot"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-8 col-lg-7">
            <div class="tp-product-gadget-wrapper">
               <div class="row">
                  @foreach ($sanPhamsMoiNhat as $sanphamNew)
                  <div class="col-xl-4 col-sm-6">
                     <div class="tp-product-item p-relative transition-3 mb-25">
                        <div class="tp-product-thumb p-relative fix m-img">
                           <a href="{{ ( $sanpham->id) }}">
                              <img src="{{ asset($sanphamNew->anh_san_pham) }}" alt="{{ $sanphamNew->ten_san_pham }}">
                           </a>

                           <!-- product badge -->
                           <div class="tp-product-badge">
                              <span class="product-trending">New</span>
                           </div>

                           <!-- product action -->
                           <div class="tp-product-action">
                              <div class="tp-product-action-item d-flex flex-column">
                                 <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add to Cart</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                       <g mask="url(#mask0_1211_721)">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                       </g>
                                    </svg>

                                    <span class="tp-product-tooltip">Quick View</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add To Wishlist</span>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <!-- product content -->
                        <div class="tp-product-content">
                           <div class="tp-product-category">
                              <a href="{{ $sanphamNew->danh_muc_id }}">{{ $sanphamNew->danhmucs->ten_danh_muc ?? 'Danh mục' }}</a>
                           </div>


                           
                           <h3 class="tp-product-title">
                                 <a href="{{ ( $sanphamNew->id) }}">
                                    {{ $sanphamNew->ten_san_pham }}
                                 </a>
                           </h3>

                           <div class="tp-product-rating d-flex align-items-center">
                              <div class="tp-product-rating-icon">
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star-half-stroke"></i></span>
                              </div>
                              <div class="tp-product-rating-text">
                                 <span>(6 Review)</span>
                              </div>
                           </div>
                           <div class="tp-product-price-wrapper">
                              <span class="tp-product-price old-price">
                                 {{ $sanphamNew->bienThe->first()->gia_cu ?? 'Chưa có giá' }}VNĐ
                              </span>
                              <span class="tp-product-price new-price">
                                 {{ $sanphamNew->bienThe->first()->gia_moi ?? 'Chưa có giá' }}VNĐ
                              </span>
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

<!-- product banner area start -->
<div class="tp-product-banner-area pb-90">
   <div class="container">
      <div class="tp-product-banner-slider fix">
         <div class="tp-product-banner-slider-active swiper-container">
            <div class="swiper-wrapper">
               <div class="tp-product-banner-inner theme-bg p-relative z-index-1 fix swiper-slide">
                  <h4 class="tp-product-banner-bg-text">tablet</h4>
                  <div class="row align-items-center">
                     <div class="col-xl-6 col-lg-6">
                        <div class="tp-product-banner-content p-relative z-index-1">
                           <span class="tp-product-banner-subtitle">Tablet Collection 2023</span>
                           <h3 class="tp-product-banner-title">Samsung Galaxy Tab S6, Wifi Tablet</h3>
                           <div class="tp-product-banner-price mb-40">
                              <span class="old-price">$1240.00</span>
                              <p class="new-price">$975.00</p>
                           </div>
                           <div class="tp-product-banner-btn">
                              <a href="shop.html" class="tp-btn tp-btn-2">Shop now</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6">
                        <div class="tp-product-banner-thumb-wrapper p-relative">
                           <div class="tp-product-banner-thumb-shape">
                              <span class="tp-product-banner-thumb-gradient"></span>
                              <img class="tp-offer-shape" src="{{ asset('assets/client/img/banner/banner-slider-offer.png') }}" alt="">
                           </div>

                           <div class="tp-product-banner-thumb text-end p-relative z-index-1">
                              <img src="{{ asset('assets/client/img/banner/banner-slider-1.png') }}" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tp-product-banner-inner theme-bg p-relative z-index-1 fix swiper-slide">
                  <h4 class="tp-product-banner-bg-text">tablet</h4>
                  <div class="row align-items-center">
                     <div class="col-xl-6 col-lg-6">
                        <div class="tp-product-banner-content p-relative z-index-1">
                           <span class="tp-product-banner-subtitle">Latest Technology Added</span>
                           <h3 class="tp-product-banner-title">Apple iPad 10.2 9th Gen - 2021</h3>
                           <div class="tp-product-banner-price mb-40">
                              <span class="old-price">$1450.00</span>
                              <p class="new-price">$1199.00</p>
                           </div>
                           <div class="tp-product-banner-btn">
                              <a href="shop.html" class="tp-btn tp-btn-2">Shop now</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6">
                        <div class="tp-product-banner-thumb-wrapper p-relative">
                           <div class="tp-product-banner-thumb-shape">
                              <span class="tp-product-banner-thumb-gradient"></span>
                              <img class="tp-offer-shape" src="{{ asset('assets/client/img/banner/banner-slider-offer.png') }}" alt="">
                           </div>

                           <div class="tp-product-banner-thumb text-end p-relative z-index-1">
                              <img src="{{ asset('assets/client/img/banner/banner-slider-2.png') }}" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tp-product-banner-inner theme-bg p-relative z-index-1 fix swiper-slide">
                  <h4 class="tp-product-banner-bg-text">tablet</h4>
                  <div class="row align-items-center">
                     <div class="col-xl-6 col-lg-6">
                        <div class="tp-product-banner-content p-relative z-index-1">
                           <span class="tp-product-banner-subtitle">Tablet Collection 2023</span>
                           <h3 class="tp-product-banner-title">Microsoft Surface Pro 8, Wifi Included</h3>
                           <div class="tp-product-banner-price mb-40">
                              <span class="old-price">$1249.00</span>
                              <p class="new-price">$1300.00</p>
                           </div>
                           <div class="tp-product-banner-btn">
                              <a href="shop.html" class="tp-btn tp-btn-2">Shop now</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6">
                        <div class="tp-product-banner-thumb-wrapper p-relative">
                           <div class="tp-product-banner-thumb-shape">
                              <span class="tp-product-banner-thumb-gradient"></span>
                              <img class="tp-offer-shape" src="{{ asset('assets/client/img/banner/banner-slider-offer.png') }}" alt="">
                           </div>

                           <div class="tp-product-banner-thumb text-end p-relative z-index-1">
                              <img src="{{ asset('assets/client/img/banner/banner-slider-3.png') }}" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tp-product-banner-slider-dot tp-swiper-dot"></div>
         </div>
      </div>
   </div>
</div>
<!-- product banner area end -->

<!-- product arrival area start -->
<section class="tp-product-arrival-area pb-55">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-xl-5 col-sm-6">
            <div class="tp-section-title-wrapper mb-40">
               <h3 class="tp-section-title">New Arrivals

                  <svg width="114" height="35" viewBox="0 0 114 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053" stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637" stroke-linecap="round" />
                  </svg>
               </h3>
            </div>
         </div>
         <div class="col-xl-7 col-sm-6">
            <div class="tp-product-arrival-more-wrapper d-flex justify-content-end">
               <div class="tp-product-arrival-arrow tp-swiper-arrow mb-40 text-end tp-product-arrival-border">
                  <button type="button" class="tp-arrival-slider-button-prev">
                     <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
                  <button type="button" class="tp-arrival-slider-button-next">
                     <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-12">
            <div class="tp-product-arrival-slider fix">
               <div class="tp-product-arrival-active swiper-container">
                  <div class="swiper-wrapper">
                     <div class="tp-product-item transition-3 mb-25 swiper-slide">
                        <div class="tp-product-thumb p-relative fix m-img">
                           <a href="product-details.html">
                              <img src="{{ asset('assets/client/img/product/product-6.jpg') }}" alt="product-electronic">
                           </a>

                           <!-- product badge -->
                           <div class="tp-product-badge">
                              <span class="product-trending">Trending</span>
                           </div>

                           <!-- product action -->
                           <div class="tp-product-action">
                              <div class="tp-product-action-item d-flex flex-column">
                                 <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add to Cart</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                       <g mask="url(#mask0_1211_721)">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                       </g>
                                    </svg>

                                    <span class="tp-product-tooltip">Quick View</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add To Wishlist</span>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <!-- product content -->
                        <div class="tp-product-content">
                           <div class="tp-product-category">
                              <a href="shop.html">Fast Charger</a>
                           </div>
                           <h3 class="tp-product-title">
                              <a href="product-details.html">
                                 Fast Charger 6.5A Type-C Cable For OPPO Find X3 Pro
                              </a>
                           </h3>
                           <div class="tp-product-rating d-flex align-items-center">
                              <div class="tp-product-rating-icon">
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star-half-stroke"></i></span>
                              </div>
                              <div class="tp-product-rating-text">
                                 <span>(7 Review)</span>
                              </div>
                           </div>
                           <div class="tp-product-price-wrapper">
                              <span class="tp-product-price old-price">$475.00</span>
                              <span class="tp-product-price new-price">$7350.00</span>
                           </div>
                        </div>
                     </div>
                     <div class="tp-product-item transition-3 mb-25 swiper-slide ">
                        <div class="tp-product-thumb p-relative fix m-img">
                           <a href="product-details.html">
                              <img src="{{ asset('assets/client/img/product/product-7.jpg') }}" alt="product-electronic">
                           </a>

                           <!-- product action -->
                           <div class="tp-product-action">
                              <div class="tp-product-action-item d-flex flex-column">
                                 <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add to Cart</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                       <g mask="url(#mask0_1211_721)">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                       </g>
                                    </svg>

                                    <span class="tp-product-tooltip">Quick View</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add To Wishlist</span>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <!-- product content -->
                        <div class="tp-product-content">
                           <div class="tp-product-category">
                              <a href="shop.html">Earbuds</a>
                           </div>
                           <h3 class="tp-product-title">
                              <a href="product-details.html">
                                 True Wireless Noise Cancelling Earbuds with Apple.
                              </a>
                           </h3>
                           <div class="tp-product-rating d-flex align-items-center">
                              <div class="tp-product-rating-icon">
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star-half-stroke"></i></span>
                              </div>
                              <div class="tp-product-rating-text">
                                 <span>(2 Review)</span>
                              </div>
                           </div>
                           <div class="tp-product-price-wrapper">
                              <span class="tp-product-price old-price">$140.00</span>
                              <span class="tp-product-price new-price">$120.00</span>
                           </div>
                        </div>
                     </div>
                     <div class="tp-product-item transition-3 mb-25 swiper-slide ">
                        <div class="tp-product-thumb p-relative fix m-img">
                           <a href="product-details.html">
                              <img src="{{ asset('assets/client/img/product/product-8.jpg') }}" alt="product-electronic">
                           </a>

                           <!-- product badge -->
                           <div class="tp-product-badge">
                              <span class="product-hot">Hot</span>
                           </div>

                           <!-- product action -->
                           <div class="tp-product-action">
                              <div class="tp-product-action-item d-flex flex-column">
                                 <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add to Cart</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                       <g mask="url(#mask0_1211_721)">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                       </g>
                                    </svg>

                                    <span class="tp-product-tooltip">Quick View</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add To Wishlist</span>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <!-- product content -->
                        <div class="tp-product-content">
                           <div class="tp-product-category">
                              <a href="shop.html">Tablet</a>
                           </div>
                           <h3 class="tp-product-title">
                              <a href="product-details.html">
                                 Galaxy Tab S6 Lite 10.4-inch Android Tablet 128GB.
                              </a>
                           </h3>
                           <div class="tp-product-rating d-flex align-items-center">
                              <div class="tp-product-rating-icon">
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star-half-stroke"></i></span>
                              </div>
                              <div class="tp-product-rating-text">
                                 <span>(7 Review)</span>
                              </div>
                           </div>
                           <div class="tp-product-price-wrapper">
                              <span class="tp-product-price old-price">$320.00</span>
                              <span class="tp-product-price new-price">$247.00</span>
                           </div>
                        </div>
                     </div>
                     <div class="tp-product-item transition-3 mb-25 swiper-slide ">
                        <div class="tp-product-thumb p-relative fix m-img">
                           <a href="product-details.html">
                              <img src="{{ asset('assets/client/img/product/product-9.jpg') }}" alt="product-electronic">
                           </a>

                           <!-- product badge -->
                           <div class="tp-product-badge">
                              <span class="product-hot">Hot</span>
                           </div>

                           <!-- product action -->
                           <div class="tp-product-action">
                              <div class="tp-product-action-item d-flex flex-column">
                                 <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add to Cart</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                       <g mask="url(#mask0_1211_721)">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                       </g>
                                    </svg>

                                    <span class="tp-product-tooltip">Quick View</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add To Wishlist</span>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <!-- product content -->
                        <div class="tp-product-content">
                           <div class="tp-product-category">
                              <a href="shop.html">Tablet</a>
                           </div>
                           <h3 class="tp-product-title">
                              <a href="product-details.html">
                                 Galaxy Tab S6 Lite 10.4-inch Android Tablet 128GB.
                              </a>
                           </h3>
                           <div class="tp-product-rating d-flex align-items-center">
                              <div class="tp-product-rating-icon">
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star-half-stroke"></i></span>
                              </div>
                              <div class="tp-product-rating-text">
                                 <span>(7 Review)</span>
                              </div>
                           </div>
                           <div class="tp-product-price-wrapper">
                              <span class="tp-product-price old-price">$320.00</span>
                              <span class="tp-product-price new-price">$247.00</span>
                           </div>
                        </div>
                     </div>
                     <div class="tp-product-item transition-3 mb-25 swiper-slide ">
                        <div class="tp-product-thumb p-relative fix m-img">
                           <a href="product-details.html">
                              <img src="{{ asset('assets/client/img/product/product-10.jpg') }}" alt="product-electronic">
                           </a>

                           <!-- product badge -->
                           <div class="tp-product-badge">
                              <span class="product-hot">Hot</span>
                           </div>

                           <!-- product action -->
                           <div class="tp-product-action">
                              <div class="tp-product-action-item d-flex flex-column">
                                 <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z" fill="currentColor" />

                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add to Cart</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor" />
                                       <g mask="url(#mask0_1211_721)">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor" />
                                       </g>
                                    </svg>

                                    <span class="tp-product-tooltip">Quick View</span>
                                 </button>
                                 <button type="button" class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z" fill="currentColor" />
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z" fill="currentColor" />
                                    </svg>

                                    <span class="tp-product-tooltip">Add To Wishlist</span>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <!-- product content -->
                        <div class="tp-product-content">
                           <div class="tp-product-category">
                              <a href="shop.html">Tablet</a>
                           </div>
                           <h3 class="tp-product-title">
                              <a href="product-details.html">
                                 Galaxy Tab S6 Lite 10.4-inch Android Tablet 128GB.
                              </a>
                           </h3>
                           <div class="tp-product-rating d-flex align-items-center">
                              <div class="tp-product-rating-icon">
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star"></i></span>
                                 <span><i class="fa-solid fa-star-half-stroke"></i></span>
                              </div>
                              <div class="tp-product-rating-text">
                                 <span>(7 Review)</span>
                              </div>
                           </div>
                           <div class="tp-product-price-wrapper">
                              <span class="tp-product-price old-price">$320.00</span>
                              <span class="tp-product-price new-price">$247.00</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- product arrival area end -->

<!-- product sm area start -->
<section class="tp-product-sm-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-4 col-md-6">
            <div class="tp-product-sm-list mb-50">
               <div class="tp-section-title-wrapper mb-40">
                  <h3 class="tp-section-title tp-section-title-sm">Discount Products
                     <svg width="64" height="20" viewBox="0 0 64 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M62 13.1107C1.91792 -5.41202 -3.10865 1.22305 5.00242 18.3636" stroke="currentColor" stroke-width="3" stroke-miterlimit="3.8637" stroke-linecap="round" />
                     </svg>
                  </h3>
               </div>

               <div class="tp-product-sm-wrapper mr-20">
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-1.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">HD Camera</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">
                              Oppo A96 5G Mobile Phone
                           </a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(4 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$97.00</span>
                        </div>
                     </div>
                  </div>
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-2.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">Iron Man</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">Single Stem Vase</a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(5 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$97.00</span>
                        </div>
                     </div>
                  </div>
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-3.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">Speaker</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">Echo Dot smart speaker</a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(10 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$142.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6">
            <div class="tp-product-sm-list mb-50">
               <div class="tp-section-title-wrapper mb-40">
                  <h3 class="tp-section-title tp-section-title-sm">Featured Products
                     <svg width="64" height="20" viewBox="0 0 64 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M62 13.1107C1.91792 -5.41202 -3.10865 1.22305 5.00242 18.3636" stroke="currentColor" stroke-width="3" stroke-miterlimit="3.8637" stroke-linecap="round" />
                     </svg>
                  </h3>
               </div>

               <div class="tp-product-sm-wrapper mr-20">
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-4.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">Motherboard</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">CPU Cooler 6 Heat Pipes</a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(4 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$12.00</span>
                        </div>
                     </div>
                  </div>
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-5.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">Digital Camera</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">Photography Camera</a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(9 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$84.00</span>
                        </div>
                     </div>
                  </div>
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-6.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">Smart Watches</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">Real-Time Weather.</a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(6 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$120.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-md-6">
            <div class="tp-product-sm-list mb-50">
               <div class="tp-section-title-wrapper mb-40">
                  <h3 class="tp-section-title tp-section-title-sm">Selling Products
                     <svg width="64" height="20" viewBox="0 0 64 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M62 13.1107C1.91792 -5.41202 -3.10865 1.22305 5.00242 18.3636" stroke="currentColor" stroke-width="3" stroke-miterlimit="3.8637" stroke-linecap="round" />
                     </svg>
                  </h3>
               </div>

               <div class="tp-product-sm-wrapper mr-20">
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-7.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">Usb Flash Disk</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">Metal Usb 3.0 Pen Drive 2TB</a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(4 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$102.00</span>
                        </div>
                     </div>
                  </div>
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-8.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">HawkEye</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">HawkEye Fishtrax</a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(2 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$59.00</span>
                        </div>
                     </div>
                  </div>
                  <div class="tp-product-sm-item d-flex align-items-center">
                     <div class="tp-product-thumb mr-25 fix">
                        <a href="product-details.html">
                           <img src="{{ asset('assets/client/img/product/sm/product-sm-9.jpg') }}" alt="">
                        </a>
                     </div>
                     <div class="tp-product-sm-content">
                        <div class="tp-product-category">
                           <a href="shop.html">Tablet</a>
                        </div>
                        <h3 class="tp-product-title">
                           <a href="product-details.html">Galaxy Tab S6 Android</a>
                        </h3>
                        <div class="tp-product-rating d-sm-flex align-items-center">
                           <div class="tp-product-rating-icon">
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <div class="tp-product-rating-text">
                              <span>(12 Review)</span>
                           </div>
                        </div>
                        <div class="tp-product-price-wrapper">
                           <span class="tp-product-price">$356.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- product sm area end -->

<!-- blog area start -->
<section class="tp-blog-area pt-50 pb-75">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-xl-4 col-md-6">
            <div class="tp-section-title-wrapper mb-50">
               <h3 class="tp-section-title">Latest news & articles

                  <svg width="114" height="35" viewBox="0 0 114 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053" stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637" stroke-linecap="round" />
                  </svg>
               </h3>
            </div>
         </div>
         <div class="col-xl-8 col-md-6">
            <div class="tp-blog-more-wrapper d-flex justify-content-md-end">
               <div class="tp-blog-more mb-50 text-md-end">
                  <a href="blog-grid.html" class="tp-btn tp-btn-2 tp-btn-blue">View All Blog
                     <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                     <div class="tp-blog-item mb-30 swiper-slide">
                        <div class="tp-blog-thumb p-relative fix">
                           <a href="blog-details.html">
                              <img src="{{ asset('assets/client/img/blog/blog-1.jpg') }}" alt="">
                           </a>
                           <div class="tp-blog-meta tp-blog-meta-date">
                              <span>14 July, 2022</span>
                           </div>
                        </div>
                        <div class="tp-blog-content">
                           <h3 class="tp-blog-title">
                              <a href="blog-details.html">The Modern Art Clay Ceramics.</a>
                           </h3>

                           <div class="tp-blog-tag">
                              <span><i class="fa-light fa-tag"></i></span>
                              <a href="#">Tablet,</a>
                              <a href="#">News</a>
                           </div>

                           <p>The world is an amazing place providing an incredible assortment of interesting locations across.</p>

                           <div class="tp-blog-btn">
                              <a href="blog-details.html" class="tp-btn-2 tp-btn-border-2">
                                 Read More
                                 <span>
                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M16 7.5L1 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                       <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="tp-blog-item mb-30 swiper-slide">
                        <div class="tp-blog-thumb p-relative fix">
                           <a href="blog-details.html">
                              <img src="{{ asset('assets/client/img/blog/blog-2.jpg') }}" alt="">
                           </a>
                           <div class="tp-blog-meta tp-blog-meta-date">
                              <span>10 Nov, 2022</span>
                           </div>
                        </div>
                        <div class="tp-blog-content">
                           <h3 class="tp-blog-title">
                              <a href="blog-details.html">How clothes are linked to climate</a>
                           </h3>

                           <div class="tp-blog-tag">
                              <span><i class="fa-light fa-tag"></i></span>
                              <a href="#">Monitor,</a>
                              <a href="#">Technology</a>
                           </div>

                           <p>The world is an amazing place providing an incredible assortment of interesting locations across.</p>

                           <div class="tp-blog-btn">
                              <a href="blog-details.html" class="tp-btn-2 tp-btn-border-2">
                                 Read More
                                 <span>
                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M16 7.5L1 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                       <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="tp-blog-item mb-30 swiper-slide">
                        <div class="tp-blog-thumb p-relative fix">
                           <a href="blog-details.html">
                              <img src="{{ asset('assets/client/img/blog/blog-3.jpg') }}" alt="">
                           </a>
                           <div class="tp-blog-meta tp-blog-meta-date">
                              <span>20 June, 2023</span>
                           </div>
                        </div>
                        <div class="tp-blog-content">
                           <h3 class="tp-blog-title">
                              <a href="blog-details.html">The Sound Of Fashion: Malcolm</a>
                           </h3>

                           <div class="tp-blog-tag">
                              <span><i class="fa-light fa-tag"></i></span>
                              <a href="#">Microphone,</a>
                              <a href="#">Computer</a>
                           </div>

                           <p>The world is an amazing place providing an incredible assortment of interesting locations across.</p>

                           <div class="tp-blog-btn">
                              <a href="blog-details.html" class="tp-btn-2 tp-btn-border-2">
                                 Read More
                                 <span>
                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M16 7.5L1 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                       <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- blog area end -->

<!-- instagram area start -->
<div class="tp-instagram-area pb-70">
   <div class="container">
      <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1">
         <div class="col">
            <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
               <img src="{{ asset('assets/client/img/instagram/instagram-1.jpg') }}" alt="">
               <div class="tp-instagram-icon">
                  <a href="{{ asset('assets/client/img/instagram/instagram-1.jpg') }}" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
               <img src="{{ asset('assets/client/img/instagram/instagram-2.jpg') }}" alt="">
               <div class="tp-instagram-icon">
                  <a href="{{ asset('assets/client/img/instagram/instagram-2.jpg') }}" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
               <img src="{{ asset('assets/client/img/instagram/instagram-3.jpg') }}" alt="">
               <div class="tp-instagram-icon">
                  <a href="{{ asset('assets/client/img/instagram/instagram-3.jpg') }}" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
               <img src="{{ asset('assets/client/img/instagram/instagram-4.jpg') }}" alt="">
               <div class="tp-instagram-icon">
                  <a href="{{ asset('assets/client/img/instagram/instagram-4.jpg') }}" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
               </div>
            </div>
         </div>
         <div class="col">
            <div class="tp-instagram-item p-relative z-index-1 fix mb-30 w-img">
               <img src="{{ asset('assets/client/img/instagram/instagram-5.jpg') }}" alt="">
               <div class="tp-instagram-icon">
                  <a href="{{ asset('assets/client/img/instagram/instagram-5.jpg') }}" class="popup-image"><i class="fa-brands fa-instagram"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- instagram area end -->

<!-- subscribe area start -->
<section class="tp-subscribe-area pt-70 pb-65 theme-bg p-relative z-index-1">
   <div class="tp-subscribe-shape">
      <img class="tp-subscribe-shape-1" src="{{ asset('assets/client/img/subscribe/subscribe-shape-1.png') }}" alt="">
      <img class="tp-subscribe-shape-2" src="{{ asset('assets/client/img/subscribe/subscribe-shape-2.png') }}" alt="">
      <img class="tp-subscribe-shape-3" src="{{ asset('assets/client/img/subscribe/subscribe-shape-3.png') }}" alt="">
      <img class="tp-subscribe-shape-4" src="{{ asset('assets/client/img/subscribe/subscribe-shape-4.png') }}" alt="">
      <!-- plane shape -->
      <div class="tp-subscribe-plane">
         <img class="tp-subscribe-plane-shape" src="{{ asset('assets/client/img/subscribe/plane.png') }}" alt="">
         <svg width="399" height="110" class="d-none d-sm-block" viewBox="0 0 399 110" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.499634 1.00049C8.5 20.0005 54.2733 13.6435 60.5 40.0005C65.6128 61.6426 26.4546 130.331 15 90.0005C-9 5.5 176.5 127.5 218.5 106.5C301.051 65.2247 202 -57.9188 344.5 40.0003C364 53.3997 384 22 399 22" stroke="white" stroke-opacity="0.5" stroke-dasharray="3 3" />
         </svg>
         <svg class="d-sm-none" width="193" height="110" viewBox="0 0 193 110" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1C4.85463 20.0046 26.9085 13.6461 29.9086 40.0095C32.372 61.6569 13.5053 130.362 7.98637 90.0217C-3.57698 5.50061 85.7981 127.53 106.034 106.525C145.807 65.2398 98.0842 -57.9337 166.742 40.0093C176.137 53.412 185.773 22.0046 193 22.0046" stroke="white" stroke-opacity="0.5" stroke-dasharray="3 3" />
         </svg>
      </div>
   </div>
   <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-7 col-lg-7">
            <div class="tp-subscribe-content">
               <span>Sale 20% off all store</span>
               <h3 class="tp-subscribe-title">Subscribe our Newsletter</h3>
            </div>
         </div>
         <div class="col-xl-5 col-lg-5">
            <div class="tp-subscribe-form">
               <form action="#">
                  <div class="tp-subscribe-input">
                     <input type="email" placeholder="Enter Your Email">
                     <button type="submit">Subscribe</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- subscribe area end -->

<div class="modal fade tp-product-modal" id="producQuickViewModal" tabindex="-1" aria-labelledby="producQuickViewModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="tp-product-modal-content d-lg-flex align-items-start">
            <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal"><i class="fa-regular fa-xmark"></i></button>
            <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
               <nav>
                  <div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
                     <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">
                        <img src="{{ asset('assets/client/img/product/details/nav/product-details-nav-1.jpg') }}" alt="">
                     </button>
                     <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                        <img src="{{ asset('assets/client/img/product/details/nav/product-details-nav-2.jpg') }}" alt="">
                     </button>
                     <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                        <img src="{{ asset('assets/client/img/product/details/nav/product-details-nav-3.jpg') }}" alt="">
                     </button>
                     <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                        <img src="{{ asset('assets/client/img/product/details/nav/product-details-nav-4.jpg') }}" alt="">
                     </button>
                  </div>
               </nav>
               <div class="tab-content m-img" id="productDetailsNavContent">
                  <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
                     <div class="tp-product-details-nav-main-thumb">
                        <img src="{{ asset('assets/client/img/product/details/main/product-details-main-1.jpg') }}" alt="">
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab" tabindex="0">
                     <div class="tp-product-details-nav-main-thumb">
                        <img src="{{ asset('assets/client/img/product/details/main/product-details-main-2.jpg') }}" alt="">
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab" tabindex="0">
                     <div class="tp-product-details-nav-main-thumb">
                        <img src="{{ asset('assets/client/img/product/details/main/product-details-main-3.jpg') }}" alt="">
                     </div>
                  </div>
                  <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab" tabindex="0">
                     <div class="tp-product-details-nav-main-thumb">
                        <img src="{{ asset('assets/client/img/product/details/main/product-details-main-4.jpg') }}" alt="">
                     </div>
                  </div>
               </div>
            </div>
            <div class="tp-product-details-wrapper">
               <div class="tp-product-details-category">
                  <span>Computers & Tablets</span>
               </div>
               <h3 class="tp-product-details-title">Samsung galaxy A8 tablet</h3>

               <!-- inventory details -->
               <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                  <div class="tp-product-details-stock mb-10">
                     <span>In Stock</span>
                  </div>
                  <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                     <div class="tp-product-details-rating">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                        <span><i class="fa-solid fa-star"></i></span>
                     </div>
                     <div class="tp-product-details-reviews">
                        <span>(36 Reviews)</span>
                     </div>
                  </div>
               </div>
               <p>A Screen Everyone Will Love: Whether your family is streaming or video chatting with friends tablet A8... <span>See more</span></p>

               <!-- price -->
               <div class="tp-product-details-price-wrapper mb-20">
                  <span class="tp-product-details-price old-price">$320.00</span>
                  <span class="tp-product-details-price new-price">$236.00</span>
               </div>

               <!-- variations -->
               <div class="tp-product-details-variation">
                  <!-- single item -->
                  <div class="tp-product-details-variation-item">
                     <h4 class="tp-product-details-variation-title">Color :</h4>
                     <div class="tp-product-details-variation-list">
                        <button type="button" class="color tp-color-variation-btn">
                           <span data-bg-color="#F8B655"></span>
                           <span class="tp-color-variation-tootltip">Yellow</span>
                        </button>
                        <button type="button" class="color tp-color-variation-btn active">
                           <span data-bg-color="#CBCBCB"></span>
                           <span class="tp-color-variation-tootltip">Gray</span>
                        </button>
                        <button type="button" class="color tp-color-variation-btn">
                           <span data-bg-color="#494E52"></span>
                           <span class="tp-color-variation-tootltip">Black</span>
                        </button>
                        <button type="button" class="color tp-color-variation-btn">
                           <span data-bg-color="#B4505A"></span>
                           <span class="tp-color-variation-tootltip">Brown</span>
                        </button>
                     </div>
                  </div>
               </div>

               <!-- actions -->
               <div class="tp-product-details-action-wrapper">
                  <h3 class="tp-product-details-action-title">Quantity</h3>
                  <div class="tp-product-details-action-item-wrapper d-sm-flex align-items-center">
                     <div class="tp-product-details-quantity">
                        <div class="tp-product-quantity mb-15 mr-15">
                           <span class="tp-cart-minus">
                              <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                           </span>
                           <input class="tp-cart-input" type="text" value="1" />
                           <span class="tp-cart-plus">
                              <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                           </span>
                        </div>
                     </div>
                     <div class="tp-product-details-add-to-cart mb-15 w-100">
                        <button class="tp-product-details-add-to-cart-btn w-100">Add To Cart</button>
                     </div>
                  </div>
                  <button class="tp-product-details-buy-now-btn w-100">Buy Now</button>
               </div>
               <div class="tp-product-details-action-sm">
                  <button type="button" class="tp-product-details-action-sm-btn">
                     <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 3.16431H10.8622C12.0451 3.16431 12.9999 4.08839 12.9999 5.23315V7.52268" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3.25177 0.985168L1 3.16433L3.25177 5.34354" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12.9999 12.5983H3.13775C1.95486 12.5983 1 11.6742 1 10.5295V8.23993" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.748 14.7774L12.9998 12.5983L10.748 10.4191" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                     Compare
                  </button>
                  <button type="button" class="tp-product-details-action-sm-btn">
                     <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33541 7.54172C3.36263 10.6766 7.42094 13.2113 8.49945 13.8387C9.58162 13.2048 13.6692 10.6421 14.6635 7.5446C15.3163 5.54239 14.7104 3.00621 12.3028 2.24514C11.1364 1.8779 9.77578 2.1014 8.83648 2.81432C8.64012 2.96237 8.36757 2.96524 8.16974 2.81863C7.17476 2.08487 5.87499 1.86999 4.69024 2.24514C2.28632 3.00549 1.68259 5.54167 2.33541 7.54172ZM8.50115 15C8.4103 15 8.32018 14.9784 8.23812 14.9346C8.00879 14.8117 2.60674 11.891 1.29011 7.87081C1.28938 7.87081 1.28938 7.8701 1.28938 7.8701C0.462913 5.33895 1.38316 2.15812 4.35418 1.21882C5.7492 0.776121 7.26952 0.97088 8.49895 1.73195C9.69029 0.993159 11.2729 0.789057 12.6401 1.21882C15.614 2.15956 16.5372 5.33966 15.7115 7.8701C14.4373 11.8443 8.99571 14.8088 8.76492 14.9332C8.68286 14.9777 8.592 15 8.50115 15Z" fill="currentColor" />
                        <path d="M8.49945 13.8387L8.42402 13.9683L8.49971 14.0124L8.57526 13.9681L8.49945 13.8387ZM14.6635 7.5446L14.5209 7.4981L14.5207 7.49875L14.6635 7.5446ZM12.3028 2.24514L12.348 2.10211L12.3478 2.10206L12.3028 2.24514ZM8.83648 2.81432L8.92678 2.93409L8.92717 2.9338L8.83648 2.81432ZM8.16974 2.81863L8.25906 2.69812L8.25877 2.69791L8.16974 2.81863ZM4.69024 2.24514L4.73548 2.38815L4.73552 2.38814L4.69024 2.24514ZM8.23812 14.9346L8.16727 15.0668L8.16744 15.0669L8.23812 14.9346ZM1.29011 7.87081L1.43266 7.82413L1.39882 7.72081H1.29011V7.87081ZM1.28938 7.8701L1.43938 7.87009L1.43938 7.84623L1.43197 7.82354L1.28938 7.8701ZM4.35418 1.21882L4.3994 1.36184L4.39955 1.36179L4.35418 1.21882ZM8.49895 1.73195L8.42 1.85949L8.49902 1.90841L8.57801 1.85943L8.49895 1.73195ZM12.6401 1.21882L12.6853 1.0758L12.685 1.07572L12.6401 1.21882ZM15.7115 7.8701L15.5689 7.82356L15.5686 7.8243L15.7115 7.8701ZM8.76492 14.9332L8.69378 14.8011L8.69334 14.8013L8.76492 14.9332ZM2.19287 7.58843C2.71935 9.19514 4.01596 10.6345 5.30013 11.744C6.58766 12.8564 7.88057 13.6522 8.42402 13.9683L8.57487 13.709C8.03982 13.3978 6.76432 12.6125 5.49626 11.517C4.22484 10.4185 2.97868 9.02313 2.47795 7.49501L2.19287 7.58843ZM8.57526 13.9681C9.12037 13.6488 10.4214 12.8444 11.7125 11.729C12.9999 10.6167 14.2963 9.17932 14.8063 7.59044L14.5207 7.49875C14.0364 9.00733 12.7919 10.4 11.5164 11.502C10.2446 12.6008 8.9607 13.3947 8.42364 13.7093L8.57526 13.9681ZM14.8061 7.59109C15.1419 6.5613 15.1554 5.39131 14.7711 4.37633C14.3853 3.35729 13.5989 2.49754 12.348 2.10211L12.2576 2.38816C13.4143 2.75381 14.1347 3.54267 14.4905 4.48255C14.8479 5.42648 14.8379 6.52568 14.5209 7.4981L14.8061 7.59109ZM12.3478 2.10206C11.137 1.72085 9.72549 1.95125 8.7458 2.69484L8.92717 2.9338C9.82606 2.25155 11.1357 2.03494 12.2577 2.38821L12.3478 2.10206ZM8.74618 2.69455C8.60221 2.8031 8.40275 2.80462 8.25906 2.69812L8.08043 2.93915C8.33238 3.12587 8.67804 3.12163 8.92678 2.93409L8.74618 2.69455ZM8.25877 2.69791C7.225 1.93554 5.87527 1.71256 4.64496 2.10213L4.73552 2.38814C5.87471 2.02742 7.12452 2.2342 8.08071 2.93936L8.25877 2.69791ZM4.64501 2.10212C3.39586 2.49722 2.61099 3.35688 2.22622 4.37554C1.84299 5.39014 1.85704 6.55957 2.19281 7.58826L2.478 7.49518C2.16095 6.52382 2.15046 5.42513 2.50687 4.48154C2.86175 3.542 3.58071 2.7534 4.73548 2.38815L4.64501 2.10212ZM8.50115 14.85C8.43415 14.85 8.36841 14.8341 8.3088 14.8023L8.16744 15.0669C8.27195 15.1227 8.38645 15.15 8.50115 15.15V14.85ZM8.30897 14.8024C8.19831 14.7431 6.7996 13.9873 5.26616 12.7476C3.72872 11.5046 2.07716 9.79208 1.43266 7.82413L1.14756 7.9175C1.81968 9.96978 3.52747 11.7277 5.07755 12.9809C6.63162 14.2373 8.0486 15.0032 8.16727 15.0668L8.30897 14.8024ZM1.29011 7.72081C1.31557 7.72081 1.34468 7.72745 1.37175 7.74514C1.39802 7.76231 1.41394 7.78437 1.42309 7.8023C1.43191 7.81958 1.43557 7.8351 1.43727 7.84507C1.43817 7.8504 1.43869 7.85518 1.43898 7.85922C1.43913 7.86127 1.43923 7.8632 1.43929 7.865C1.43932 7.86591 1.43934 7.86678 1.43936 7.86763C1.43936 7.86805 1.43937 7.86847 1.43937 7.86888C1.43937 7.86909 1.43937 7.86929 1.43938 7.86949C1.43938 7.86959 1.43938 7.86969 1.43938 7.86979C1.43938 7.86984 1.43938 7.86992 1.43938 7.86994C1.43938 7.87002 1.43938 7.87009 1.28938 7.8701C1.13938 7.8701 1.13938 7.87017 1.13938 7.87025C1.13938 7.87027 1.13938 7.87035 1.13938 7.8704C1.13938 7.8705 1.13938 7.8706 1.13938 7.8707C1.13938 7.8709 1.13938 7.87111 1.13938 7.87131C1.13939 7.87173 1.13939 7.87214 1.1394 7.87257C1.13941 7.87342 1.13943 7.8743 1.13946 7.8752C1.13953 7.87701 1.13962 7.87896 1.13978 7.88103C1.14007 7.88512 1.14059 7.88995 1.14151 7.89535C1.14323 7.90545 1.14694 7.92115 1.15585 7.93861C1.16508 7.95672 1.18114 7.97896 1.20762 7.99626C1.2349 8.01409 1.26428 8.02081 1.29011 8.02081V7.72081ZM1.43197 7.82354C0.623164 5.34647 1.53102 2.26869 4.3994 1.36184L4.30896 1.0758C1.23531 2.04755 0.302663 5.33142 1.14679 7.91665L1.43197 7.82354ZM4.39955 1.36179C5.7527 0.932384 7.22762 1.12136 8.42 1.85949L8.57791 1.60441C7.31141 0.820401 5.74571 0.619858 4.30881 1.07585L4.39955 1.36179ZM8.57801 1.85943C9.73213 1.14371 11.2694 0.945205 12.5951 1.36192L12.685 1.07572C11.2763 0.632908 9.64845 0.842602 8.4199 1.60447L8.57801 1.85943ZM12.5948 1.36184C15.4664 2.27018 16.3769 5.34745 15.5689 7.82356L15.8541 7.91663C16.6975 5.33188 15.7617 2.04893 12.6853 1.07581L12.5948 1.36184ZM15.5686 7.8243C14.9453 9.76841 13.2952 11.4801 11.7526 12.7288C10.2142 13.974 8.80513 14.7411 8.69378 14.8011L8.83606 15.0652C8.9555 15.0009 10.3826 14.2236 11.9413 12.9619C13.4957 11.7037 15.2034 9.94602 15.8543 7.91589L15.5686 7.8243ZM8.69334 14.8013C8.6337 14.8337 8.56752 14.85 8.50115 14.85V15.15C8.61648 15.15 8.73201 15.1217 8.83649 15.065L8.69334 14.8013Z" fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209Z" fill="currentColor" />
                        <path d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209" stroke="currentColor" stroke-width="0.3" />
                     </svg>
                     Add Wishlist
                  </button>
                  <button type="button" class="tp-product-details-action-sm-btn">
                     <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.575 12.6927C8.775 12.6927 8.94375 12.6249 9.08125 12.4895C9.21875 12.354 9.2875 12.1878 9.2875 11.9907C9.2875 11.7937 9.21875 11.6275 9.08125 11.492C8.94375 11.3565 8.775 11.2888 8.575 11.2888C8.375 11.2888 8.20625 11.3565 8.06875 11.492C7.93125 11.6275 7.8625 11.7937 7.8625 11.9907C7.8625 12.1878 7.93125 12.354 8.06875 12.4895C8.20625 12.6249 8.375 12.6927 8.575 12.6927ZM8.55625 5.0638C8.98125 5.0638 9.325 5.17771 9.5875 5.40553C9.85 5.63335 9.98125 5.92582 9.98125 6.28294C9.98125 6.52924 9.90625 6.77245 9.75625 7.01258C9.60625 7.25272 9.3625 7.5144 9.025 7.79763C8.7 8.08087 8.44063 8.3795 8.24688 8.69352C8.05313 9.00754 7.95625 9.29385 7.95625 9.55246C7.95625 9.68792 8.00938 9.79567 8.11563 9.87572C8.22188 9.95576 8.34375 9.99578 8.48125 9.99578C8.63125 9.99578 8.75625 9.94653 8.85625 9.84801C8.95625 9.74949 9.01875 9.62635 9.04375 9.47857C9.08125 9.23228 9.16562 9.0137 9.29688 8.82282C9.42813 8.63195 9.63125 8.42568 9.90625 8.20402C10.2812 7.89615 10.5531 7.58829 10.7219 7.28042C10.8906 6.97256 10.975 6.62775 10.975 6.246C10.975 5.59333 10.7594 5.06996 10.3281 4.67589C9.89688 4.28183 9.325 4.0848 8.6125 4.0848C8.1375 4.0848 7.7 4.17716 7.3 4.36187C6.9 4.54659 6.56875 4.81751 6.30625 5.17463C6.20625 5.31009 6.16563 5.44863 6.18438 5.59025C6.20313 5.73187 6.2625 5.83962 6.3625 5.91351C6.5 6.01202 6.64688 6.04281 6.80313 6.00587C6.95937 5.96892 7.0875 5.88272 7.1875 5.74726C7.35 5.5256 7.54688 5.35627 7.77813 5.23929C8.00938 5.1223 8.26875 5.0638 8.55625 5.0638ZM8.5 15.7775C7.45 15.7775 6.46875 15.5897 5.55625 15.2141C4.64375 14.8385 3.85 14.3182 3.175 13.6532C2.5 12.9882 1.96875 12.2062 1.58125 11.3073C1.19375 10.4083 1 9.43547 1 8.38873C1 7.35431 1.19375 6.38762 1.58125 5.48866C1.96875 4.58969 2.5 3.80772 3.175 3.14273C3.85 2.47775 4.64375 1.95438 5.55625 1.57263C6.46875 1.19088 7.45 1 8.5 1C9.5375 1 10.5125 1.19088 11.425 1.57263C12.3375 1.95438 13.1313 2.47775 13.8063 3.14273C14.4813 3.80772 15.0156 4.58969 15.4094 5.48866C15.8031 6.38762 16 7.35431 16 8.38873C16 9.43547 15.8031 10.4083 15.4094 11.3073C15.0156 12.2062 14.4813 12.9882 13.8063 13.6532C13.1313 14.3182 12.3375 14.8385 11.425 15.2141C10.5125 15.5897 9.5375 15.7775 8.5 15.7775ZM8.5 14.6692C10.2625 14.6692 11.7656 14.0534 13.0094 12.822C14.2531 11.5905 14.875 10.1128 14.875 8.38873C14.875 6.6647 14.2531 5.18695 13.0094 3.95549C11.7656 2.72404 10.2625 2.10831 8.5 2.10831C6.7125 2.10831 5.20312 2.72404 3.97188 3.95549C2.74063 5.18695 2.125 6.6647 2.125 8.38873C2.125 10.1128 2.74063 11.5905 3.97188 12.822C5.20312 14.0534 6.7125 14.6692 8.5 14.6692Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                     </svg>
                     Ask a question
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
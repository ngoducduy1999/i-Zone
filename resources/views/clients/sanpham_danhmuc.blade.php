@extends('layouts.client')

@section('css')
<style>
    .filter-container {
        background-color: #f8f9fa; /* Màu nền cho khung chứa */
        border: 1px solid #ddd; /* Viền mờ cho khung */
        border-radius: 8px; /* Bo tròn viền khung */
        box-shadow: 0 1px 3px rgba(0,0,0,0.1); /* Thêm hiệu ứng đổ bóng nhẹ */
        max-width: 700px; /* Giới hạn chiều rộng khung */
        margin: 0 auto; /* Căn giữa khung */
        height: 60px;
    }

    .product-filter-form .d-flex {
        display: flex;
        align-items: center; /* Căn giữa các phần tử theo chiều dọc */
        justify-content: flex-start; /* Căn chỉnh theo chiều ngang */
        gap: 10px; /* Khoảng cách giữa các phần tử */
    }

    .product-filter-form .filter-item {
        margin-bottom: 0; /* Xóa khoảng cách dưới mỗi phần tử */
        width: 180px; /* Cố định chiều rộng cho các phần tử select */
    }

    .product-filter-form .filter-item label {
        font-size: 14px;
        margin-bottom: 0; /* Xóa khoảng cách dưới chữ */
    }

    .product-filter-form .form-control {
        width: 100%;
        padding: 8px 12px; /* Điều chỉnh padding bên trong select */
        font-size: 14px;
        line-height: 1.5; /* Đảm bảo mũi tên giữa */
        padding-right: 30px; /* Thêm không gian cho mũi tên */
        
        appearance: none; /* Xóa mũi tên mặc định */
        background-size: 10px 5px; /* Căn chỉnh mũi tên */
    }

    .product-filter-form .d-flex > .filter-item:last-child {
        margin-right: 0;
    }
</style>
@endsection

@section('content')
 <!-- breadcrumb area start -->
 <section class="breadcrumb__area include-bg pt-100 pb-50">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
            <div class="breadcrumb__content p-relative z-index-1">
                <h3 class="breadcrumb__title">{{ $danhMuc->ten_danh_muc }}</h3>
                <div class="breadcrumb__list">
                    <span><a href="{{ route('trangchu') }}">Trang chủ</a></span>
                    <span>{{ $danhMuc->ten_danh_muc }}</span>
                </div>
            </div>
            
          </div>
       </div>
    </div>
 </section>
 <!-- breadcrumb area end -->
 <!-- shop area start -->
 <section class="tp-shop-area pb-120">
    <div class="container">
       <div class="row">
          <div class="col-xl-12">
            <div class="tp-shop-main-wrapper">
                <div class="tp-shop-top mb-45">
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="tp-shop-top-left d-flex align-items-center ">
                                <div class="tp-shop-top-tab tp-tab">
                                    <ul class="nav nav-tabs" id="productTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#grid-tab-pane" type="button" role="tab"
                                                aria-controls="grid-tab-pane" aria-selected="true">
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="list-tab" data-bs-toggle="tab"
                                                data-bs-target="#list-tab-pane" type="button" role="tab"
                                                aria-controls="list-tab-pane" aria-selected="false">
                                                <svg width="16" height="15" viewBox="0 0 16 15"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 7.11108H1" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15 1H1" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </li>                                      
                                    </ul>                                                       
                                </div>                                            
                            </div>                        
                        </div>
                        <div class="col-xl-6">
                            <form action="{{ route('sanpham.danhmuc', ['danh_muc_id' => $danh_muc_id]) }}" method="GET" class="product-filter-form">
                                <div class="filter-container p-2 border rounded">
                                    <!-- Dòng chứa Tiêu đề và các select -->
                                    <div class="d-flex align-items-center mb-3">
                                        <!-- Tiêu đề Bộ Lọc -->
                                        <div class="filter-item pr-3">
                                            <label for="price_range" class="font-weight-bold mb-0">Bộ Lọc:</label>
                                        </div>
                        
                                        <!-- Lọc theo giá -->
                                        <div class="filter-item pr-3">
                                            <select name="price_range" id="price_range" onchange="this.form.submit()" class="form-control">
                                                <option value="">Chọn mức giá</option>
                                                <option value="duoi-5-trieu" {{ request('price_range') == 'duoi-5-trieu' ? 'selected' : '' }}>Dưới 5 triệu</option>
                                                <option value="5-den-10-trieu" {{ request('price_range') == '5-den-10-trieu' ? 'selected' : '' }}>5 triệu - 10 triệu</option>
                                                <option value="10-den-20-trieu" {{ request('price_range') == '10-den-20-trieu' ? 'selected' : '' }}>10 triệu - 20 triệu</option>
                                                <option value="20-den-30-trieu" {{ request('price_range') == '20-den-30-trieu' ? 'selected' : '' }}>20 triệu - 30 triệu</option>
                                                <option value="tren-30-trieu" {{ request('price_range') == 'tren-30-trieu' ? 'selected' : '' }}>Trên 30 triệu</option>
                                            </select>
                                        </div>                                                                                
                        
                                        <!-- Lọc theo màu sắc -->
                                        <div class="filter-item pr-3">
                                            <select name="mau_sac_id" id="mau_sac_id" onchange="this.form.submit()" class="form-control">
                                                <option value="">Chọn màu sắc</option>
                                                @foreach ($mauSacs as $mauSac)
                                                    <option value="{{ $mauSac->id }}" {{ request('mau_sac_id') == $mauSac->id ? 'selected' : '' }}>
                                                        {{ $mauSac->ten_mau_sac }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                        
                                        <!-- Lọc theo dung lượng -->
                                        <div class="filter-item">
                                            <select name="dung_luong_id" id="dung_luong_id" onchange="this.form.submit()" class="form-control">
                                                <option value="">Chọn dung lượng</option>
                                                @foreach ($dungLuongs as $dungLuong)
                                                    <option value="{{ $dungLuong->id }}" {{ request('dung_luong_id') == $dungLuong->id ? 'selected' : '' }}>
                                                        {{ $dungLuong->ten_dung_luong }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                         <!-- Sắp xếp giá -->
                                        <div class="filter-item pr-3">
                                            <select name="price_order" id="price_order" onchange="this.form.submit()" class="form-control">
                                                <option value="">Sắp xếp</option>
                                                <option value="asc" {{ request('price_order') == 'asc' ? 'selected' : '' }}>Giá thấp nhất</option>
                                                <option value="desc" {{ request('price_order') == 'desc' ? 'selected' : '' }}>Giá cao nhất</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4">                                
                            <div class="tp-shop-top-right d-sm-flex align-items-center justify-content-xl-end">
                                <div class="tp-sidebar-widget mb-35">
                                    <div class="tp-sidebar-search">
                                        {{-- Hiển thị form tìm kiếm --}}
                                        <form action="{{ route('sanpham.danhmuc', ['danh_muc_id' => $danh_muc_id]) }}" method="GET">
                                            <div class="tp-sidebar-search-input">
                                                <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." value="{{ request('search') }}">
                                                <button type="submit">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M16.9995 17L13.1328 13.1333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>                                            
                                    </div>
                                </div>                                                                                                                                                          
                             </div>                                                             
                        </div>
                    </div>
                </div>
                <div class="tp-shop-items-wrapper tp-shop-item-primary">
                   <div class="tab-content" id="productTabContent">
                      <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                         <div class="row">
                            @if ($sanPhams->isEmpty())                                    
                                <p>Không có sản phẩm nào.</p>
                            @endif
                            @foreach ($sanPhams as $item)
                            <div class="col-xl-3 col-lg-3 col-sm-6">
                                <div class="tp-product-item p-relative transition-3 mb-25">
                                    <div class="tp-product-thumb p-relative fix m-img">
                                        <a href="{{ route('chitietsanpham', $item->id) }}">
                                            <img width="254px" height="214px" style="object-fit: contain"
                                                src="{{ asset($item->anh_san_pham) }}"
                                                alt="product-electronic">
                                        </a>
                                   
                                    </div>
                                        <!-- Conditionally display discount percentage -->
                                        @php
                                        $giaCu = $item->bienTheSanPhams->first()->gia_cu;
                                        $giaMoi = $item->bienTheSanPhams->first()->gia_moi;
                                        $discountPercentage = 0;

                                        if ($giaCu > 0 && $giaMoi < $giaCu) {
                                            $discountPercentage = round((($giaCu - $giaMoi) / $giaCu) * 100);
                                        }
                                        @endphp

                                        @if ($discountPercentage > 0)
                                        <div class="tp-product-badge">
                                            <span class="product-discount">{{ $discountPercentage }}% OFF</span>
                                        </div>
                                        @endif
                                    <!-- product content -->
                                    <div class="tp-product-content">
                                        <div class="tp-product-category">
                                            <a href="{{ isset($item->danhMuc->id) ? route('sanpham.danhmuc', $item->danhMuc->id) : '#' }}">
                                                {{ isset($item->danhMuc->ten_danh_muc) ? $item->danhMuc->ten_danh_muc : '...' }}
                                            </a>
                                        </div>
                                        <h3 class="tp-product-title"
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 199px;">
                                            <a href="{{ route('chitietsanpham', $item->id) }}">
                                                {{ $item->ten_san_pham }}
                                            </a>
                                        </h3>

                                        <div class="tp-product-rating d-flex align-items-center">
                                            <div class="tp-product-rating-icon">
                                                @php
                                                    // Get the average rating of the product (from reviews)
                                                    $averageRating = $item->danhGias->avg('diem_so') ?: 0;

                                                    // Calculate the full stars, half stars, and empty stars
                                                    $fullStars = floor($averageRating);
                                                    $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                                                    $emptyStars = 5 - ($fullStars + $halfStar);
                                                @endphp

                                                <!-- Full stars -->
                                                @for ($i = 0; $i < $fullStars; $i++)
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                @endfor

                                                <!-- Half star -->
                                                @for ($i = 0; $i < $halfStar; $i++)
                                                    <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                                @endfor

                                                <!-- Empty stars -->
                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <span><i class="fa-solid fa-star" style="color: #dcdcdc;"></i></span>
                                                @endfor
                                            </div>

                                            <div class="tp-product-rating-text">
                                                <span>({{ $item->danhGias->count() }} Reviews)</span>
                                            </div>
                                        </div>

                                        <div class="tp-product-price-wrapper">
                                            @if ($item->bienTheSanPhams->first()->gia_cu > $item->bienTheSanPhams->first()->gia_moi)
                                                <span class="tp-product-price new-price">{{ number_format($item->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                                <span class="tp-product-price old-price">{{ number_format($item->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ</span>
                                            @else
                                                <span class="tp-product-price new-price">{{ number_format($item->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                      </div>
                      <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="0">
                         <div class="tp-shop-list-wrapper tp-shop-item-primary mb-70">
                            <div class="row justify-content-center">
                               <div class="col-xl-10">
                                <div class="row">
                                    @foreach ($sanPhams as $product)
                                        <div class="tp-product-list-item d-md-flex mb-4">
                                            <div class="tp-product-list-thumb p-relative fix">
                                                <a href="#">
                                                    <img src="{{ asset($product->anh_san_pham) }}" alt="{{ $product->ten_san_pham }}">
                                                </a>
                                            </div>
                                            <div class="tp-product-list-content">
                                                <div class="tp-product-content-2 pt-15">
                                                    <div class="tp-product-tag-2">
                                                        <a href="#">{{ $product->danhMuc->ten_danh_muc }}</a>
                                                    </div>
                                                    <h3 class="tp-product-title-2">
                                                        <a href="{{ route('chitietsanpham', $product->id) }}">{{ $product->ten_san_pham }}</a>
                                                    </h3>
                                                    <div class="tp-product-rating-icon tp-product-rating-icon-2">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <span>
                                                                <i class="fa-solid fa-star" style="color: {{ $i < round($product->avg_rating) ? 'gold' : 'lightgray' }}"></i>
                                                            </span>
                                                        @endfor
                                                    </div>
                                                    <div class="tp-product-price-wrapper-2">
                                                        @if ($product->bienTheSanPhams->isNotEmpty())
                                                            <span class="tp-product-price-2 new-price">
                                                                {{ number_format($product->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ
                                                            </span>
                                                            @if (isset($product->bienTheSanPhams->first()->gia_cu) && $product->bienTheSanPhams->first()->gia_cu > $product->bienTheSanPhams->first()->gia_moi)
                                                                <span class="tp-product-price-2 old-price">
                                                                    {{ number_format($product->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ
                                                                </span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <p>{{ Str::limit(strip_tags($product->mo_ta), 100) }}</p>
                                                    <div class="tp-product-list-add-to-cart">
                                                        <a href="{{ route('chitietsanpham', ['id'=>$product->id]) }}"><button class="tp-product-list-add-to-cart-btn">Chi tiết sản phẩm</button></a>
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
                <div class="tp-shop-pagination mt-20">
                    <div class="tp-pagination">
                        <nav>
                            <ul class="pagination">
                                <!-- Nút trang trước -->
                                @if ($sanPhams->onFirstPage())
                                    <li class="disabled">
                                        <span class="tp-pagination-prev prev page-numbers">
                                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $sanPhams->previousPageUrl() }}" class="tp-pagination-prev prev page-numbers">
                                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                
                                <!-- Các số trang -->
                                @foreach ($sanPhams->getUrlRange(1, $sanPhams->lastPage()) as $page => $url)
                                    @if ($page == $sanPhams->currentPage())
                                        <li><span class="current">{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                
                                <!-- Nút trang sau -->
                                @if ($sanPhams->hasMorePages())
                                    <li>
                                        <a href="{{ $sanPhams->nextPageUrl() }}" class="next page-numbers">
                                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>                                     
                                        </a>
                                    </li>
                                @else
                                    <li class="disabled">
                                        <span class="next page-numbers">
                                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- shop area end -->
@endsection
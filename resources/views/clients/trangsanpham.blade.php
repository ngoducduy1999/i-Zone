@extends('layouts.client')

@section('css')
    
@endsection

@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-100 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Sản phẩm</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('trangchu') }}">Trang chủ</a></span>
                            <span>Sản phẩm</span>
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
                <div class="col-xl-3 col-lg-4">
                    <div class="tp-shop-sidebar mr-10">
                        <form id="filterForm" action="{{ route('trangsanpham') }}" method="GET">
                            <!-- Lọc theo giá -->
                            <div class="tp-shop-widget mb-50">
                                <h3 class="tp-shop-widget-title">Lọc Theo Giá</h3>
                                <div class="tp-shop-widget-content">
                                    <div class="tp-shop-widget-checkbox">
                                        <ul class="filter-items filter-checkbox">
                                            <li class="filter-item checkbox">
                                                <input id="price_under_1m" type="checkbox" name="price[]" value="duoi-1-trieu" onchange="submitFilterForm()">
                                                <label for="price_under_1m">Dưới 1 triệu</label>
                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="price_1m_to_5m" type="checkbox" name="price[]" value="1-den-5-trieu" onchange="submitFilterForm()">
                                                <label for="price_1m_to_5m">1 triệu - 5 triệu</label>
                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="price_5m_to_10m" type="checkbox" name="price[]" value="5-den-10-trieu" onchange="submitFilterForm()">
                                                <label for="price_5m_to_10m">5 triệu - 10 triệu</label>
                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="price_10m_to_20m" type="checkbox" name="price[]" value="10-den-20-trieu" onchange="submitFilterForm()">
                                                <label for="price_10m_to_20m">10 triệu - 20 triệu</label>
                                            </li>
                                            <li class="filter-item checkbox">
                                                <input id="price_above_20m" type="checkbox" name="price[]" value="tren-20-trieu" onchange="submitFilterForm()">
                                                <label for="price_above_20m">Trên 20 triệu</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                            
                        
                            <!-- Lọc theo dung lượng -->
                            <div class="tp-shop-widget mb-50">
                                <h3 class="tp-shop-widget-title">Dung Lượng</h3>
                                <div class="tp-shop-widget-content">
                                    <div class="tp-shop-widget-checkbox">
                                        <ul class="filter-items filter-checkbox">
                                            @foreach ($dungLuongs as $dungLuong)
                                                <li class="filter-item checkbox">
                                                    <input id="dung_luong_{{ $dungLuong->id }}" type="checkbox" name="dung_luong[]" value="{{ $dungLuong->id }}" onchange="submitFilterForm()">
                                                    <label for="dung_luong_{{ $dungLuong->id }}">{{ $dungLuong->ten_dung_luong }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Lọc theo danh mục -->
                            <div class="tp-shop-widget mb-50">
                                <h3 class="tp-shop-widget-title">Danh Mục</h3>
                                <div class="tp-shop-widget-content">
                                    <div class="tp-shop-widget-categories">
                                        <ul>
                                            @foreach ($danhMucs as $danhMuc)
                                                <li>
                                                    <a href="#" onclick="selectCategory('{{ $danhMuc->id }}'); return false;">
                                                        {{ $danhMuc->ten_danh_muc }} 
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Lọc theo màu sắc -->
                            <div class="tp-shop-widget mb-50">
                                <h3 class="tp-shop-widget-title">Màu Sắc</h3>
                                <div class="tp-shop-widget-content">
                                    <div class="tp-shop-widget-checkbox-circle-list">
                                        <ul>
                                            @foreach ($mauSacs as $mauSac)
                                                <li>
                                                    <div class="tp-shop-widget-checkbox-circle">
                                                        <input type="checkbox" id="color_{{ $mauSac->id }}" onchange="filterByColor('{{ $mauSac->id }}', this.checked);">
                                                        <label for="color_{{ $mauSac->id }}">{{ $mauSac->ten_mau_sac }}</label>
                                                        <span data-bg-color="{{ $mauSac->ma_mau ?? '#FFFFFF' }}" class="tp-shop-widget-checkbox-circle-self" style="background-color: {{ $mauSac->ma_mau ?? '#FFFFFF' }};"></span>
                                                    </div>
                                                    <span class="tp-shop-widget-checkbox-circle-number">{{ $mauSac->so_luong }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                        
                            <!-- Sản phẩm được đánh giá cao -->
                            <div class="tp-shop-widget mb-50">
                                <h3 class="tp-shop-widget-title">Sản phẩm đánh giá cao</h3>
                                <div class="tp-shop-widget-content">
                                    <div class="tp-shop-widget-product">
                                        @foreach($products as $product)
                                            <div class="tp-shop-widget-product-item d-flex align-items-center">
                                                <div class="tp-shop-widget-product-thumb">
                                                    <a href="{{ route('chitietsanpham', $product->id) }}">
                                                        <img src="{{ asset($product->anh_san_pham) }}" alt="{{ $product->ten_san_pham }}">
                                                    </a>
                                                </div>

                                                <div class="tp-shop-widget-product-content">
                                                    <div class="tp-shop-widget-product-rating-wrapper d-flex align-items-center">
                                                        <div class="tp-shop-widget-product-rating">
                                                            @for($i = 0; $i < 5; $i++)
                                                                <span>
                                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z" fill="{{ $i < round($product->danhGias->avg('diem_so') ?? 0) ? 'currentColor' : '#ccc' }}"/>
                                                                    </svg>
                                                                </span>
                                                            @endfor
                                                        </div>
                                                        <div class="tp-shop-widget-product-rating-number">
                                                            <span>({{ number_format($product->danhGias->avg('diem_so') ?? 0, 1) }})</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="tp-shop-widget-product-title">
                                                        <a href="{{ route('chitietsanpham', $product->id) }}">{{ $product->ten_san_pham }}</a>
                                                    </h4>
                                                    <div class="tp-shop-widget-product-price-wrapper">
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
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>                                                               
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="tp-shop-main-wrapper">

                        <div class="tp-shop-top mb-45">
                            <div class="row">
                                <div class="col-xl-6">
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
                                    <div class="tp-shop-top-right d-sm-flex align-items-center justify-content-xl-end">
                                        <div class="tp-sidebar-widget mb-35">
                                            <div class="tp-sidebar-search">
                                                {{-- Hiển thị form tìm kiếm --}}
                                                <form action="{{ route('trangsanpham') }}" method="GET">
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
                                <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel"
                                    aria-labelledby="grid-tab" tabindex="0">
                                    <div class="row infinite-container">
                                        {{-- Hiển thị danh sách sản phẩm --}}
                                        @if ($listSanPham->isEmpty())                                    
                                            <p>Không có sản phẩm nào.</p>
                                        @endif
                                        @foreach ($listSanPham as $item)
                                            <div class="col-xl-4 col-md-6 col-sm-6 infinite-item">
                                                <div class="tp-product-item-2 mb-40">
                                                    <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                                                        <a href="{{ route('chitietsanpham', ['id'=>$item->id]) }}">
                                                            <img src="{{ asset($item->anh_san_pham) }}" alt="">
                                                        </a>                                             
                                                    </div>
                                                    <div class="tp-product-content-2 pt-15">
                                                        <div class="tp-product-tag-2">
                                                            <a href="#">{{ $item->danhMuc->ten_danh_muc }}</a>
                                                        </div>
                                                        <h3 class="tp-product-title-2">
                                                            <a href="{{ route('chitietsanpham', $item->id) }}">{{ $item->ten_san_pham }}</a>
                                                        </h3>
                                                        <div class="tp-product-rating-icon tp-product-rating-icon-2">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <span>
                                                                    <i class="fa-solid fa-star" style="color: {{ $i < round($item->avg_rating) ? 'gold' : 'lightgray' }}"></i>
                                                                </span>
                                                            @endfor
                                                        </div>                                  
                                                        @if ($item->bienTheSanPhams->isNotEmpty())
                                                            <span class="tp-product-price-2 new-price">
                                                                {{ number_format($item->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ
                                                            </span>
                                                            @if (isset($item->bienTheSanPhams->first()->gia_cu) && $item->bienTheSanPhams->first()->gia_cu > $item->bienTheSanPhams->first()->gia_moi)
                                                                <span class="tp-product-price-2 old-price">
                                                                    {{ number_format($item->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ
                                                                </span>
                                                            @endif
                                                        @endif
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab"
                                    tabindex="0">
                                    <div class="tp-shop-list-wrapper tp-shop-item-primary mb-70">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                @foreach ($listSanPham as $item)
                                                    <div class="tp-product-list-item d-md-flex">
                                                        <div class="tp-product-list-thumb p-relative fix">
                                                            <a href="#">
                                                                <img src="{{ asset($item->anh_san_pham) }}"
                                                                    alt="">
                                                            </a>
                                        
                                                        </div>
                                                        <div class="tp-product-list-content">
                                                            <div class="tp-product-content-2 pt-15">
                                                                <div class="tp-product-tag-2">
                                                                    <a href="#">{{ $item->danhMuc->ten_danh_muc }}</a>
                                                                </div>
                                                                <h3 class="tp-product-title-2">
                                                                    <a href="{{ route('chitietsanpham', $item->id) }}">{{ $item->ten_san_pham }}</a>
                                                                </h3>
                                                                <div class="tp-product-rating-icon tp-product-rating-icon-2">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        <span>
                                                                            <i class="fa-solid fa-star" style="color: {{ $i < round($item->avg_rating) ? 'gold' : 'lightgray' }}"></i>
                                                                        </span>
                                                                    @endfor
                                                                </div>
                                                                @if ($item->bienTheSanPhams->isNotEmpty())
                                                                    <span class="tp-product-price-2 new-price">
                                                                        {{ number_format($item->bienTheSanPhams->first()->gia_moi, 0, ',', '.') }}đ
                                                                    </span>
                                                                    @if (isset($item->bienTheSanPhams->first()->gia_cu))
                                                                        <span class="tp-product-price-2 old-price">
                                                                            {{ number_format($item->bienTheSanPhams->first()->gia_cu, 0, ',', '.') }}đ
                                                                        </span>
                                                                    @endif
                                                                @endif
                                                                <p>{{ Str::limit(strip_tags($item->mo_ta), 100) }}</p>
                                                                <div class="tp-product-list-add-to-cart">
                                                                    <button class="tp-product-list-add-to-cart-btn">Thêm vào giỏ hàng</button>
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
                       
                        <div class="tp-shop-pagination mt-20">
                            <div class="tp-pagination">
                                <nav>
                                    {{ $listSanPham->links() }} 
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

@section('js')
<script>
    function submitFilterForm() {
        document.getElementById('filterForm').submit();
    }

    function filterByColor(colorId, checked) {
        const filterForm = document.getElementById('filterForm');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'mau_sac[]';
        input.value = colorId;
        if (checked) {
            filterForm.appendChild(input);
        } else {
            // Xóa màu sắc khỏi form nếu không được chọn
            const existingInput = [...filterForm.querySelectorAll('input[name="mau_sac[]"]')]
                .find(i => i.value === colorId);
            if (existingInput) {
                filterForm.removeChild(existingInput);
            }
        }
        filterForm.submit();
    }

    function selectCategory(categoryId) {
        // Xử lý chọn danh mục
        const filterForm = document.getElementById('filterForm');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'danh_muc';
        input.value = categoryId;
        filterForm.appendChild(input);
        filterForm.submit();
    }
</script>
@endsection

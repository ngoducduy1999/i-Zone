@extends('layouts.client')

@section('content')
    <!-- section title area start -->
    <section class="tp-section-title-area pt-95 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="tp-section-title-wrapper-7">
                        <h3 class="tp-section-title-7">Tin tức</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('trangchu') }}">Trang chủ</a></span>
                            <span>Tin tức</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section title area end -->

    <!-- blog grid area start -->
    <section class="tp-blog-grid-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="tp-blog-grid-wrapper">

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-list" role="tabpanel"
                                aria-labelledby="nav-list-tab" tabindex="0">
                                <!-- blog list wrapper -->
                                <div class="tp-blog-list-item-wrapper">
                                    @if($baiViet->isEmpty() && request('search'))
                                        <p>Không tìm thấy bài viết nào phù hợp với tìm kiếm của bạn.</p>
                                    @endif
                                    @foreach ($baiViet as $baiviet)
                                        <div class="tp-blog-list-item d-md-flex d-lg-block d-xl-flex">
                                            <div class="tp-blog-list-thumb">                                           
                                                <a href="{{ route('chitietbaiviet', ['id' => $baiviet->id]) }}">
                                                    <img src="{{ $baiviet->anh_bai_viet ? asset('storage/' . $baiviet->anh_bai_viet) : 'assets/img/blog/grid/blog-grid-1.jpg' }}"
                                                        alt="{{ $baiviet->tieu_de }}">
                                                </a>
                                            </div>
                                            <div class="tp-blog-list-content">
                                                <div class="tp-blog-grid-content">
                                                    <div class="tp-blog-grid-meta">
                                                        <span>
                                                            <span>
                                                                <svg width="16" height="17" viewBox="0 0 16 17"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path
                                                                        d="M10.5972 10.7259L8.42715 9.43093C8.04915 9.20693 7.74115 8.66793 7.74115 8.22693V5.35693"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                            {{ $baiviet->created_at->format('d/m/Y') }}
                                                        </span>                                                      
                                                    </div>
                                                    <h3 class="tp-blog-grid-title">
                                                        <a
                                                            href="{{ route('chitietsanpham', ['id' => $baiviet->id]) }}">{{ $baiviet->tieu_de }}</a>
                                                    </h3>
                                                    <p>{{ Str::limit(strip_tags($baiviet->noi_dung), 100) }}</p>

                                                    <div class="tp-blog-grid-btn">
                                                        <a href="{{ route('chitietbaiviet', ['id' => $baiviet->id]) }}"
                                                            class="tp-link-btn-3">
                                                            Đọc thêm
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
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="tp-shop-pagination mt-30">
                                        <div class="tp-pagination">
                                            <nav>
                                                <ul class="pagination">
                                                    <!-- Nút trang trước -->
                                                    @if ($baiViet->onFirstPage())
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
                                                            <a href="{{ $baiViet->previousPageUrl() }}" class="tp-pagination-prev prev page-numbers">
                                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    @endif
                                    
                                                    <!-- Các số trang -->
                                                    @foreach ($baiViet->getUrlRange(1, $baiViet->lastPage()) as $page => $url)
                                                        @if ($page == $baiViet->currentPage())
                                                            <li><span class="current">{{ $page }}</span></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
                                    
                                                    <!-- Nút trang sau -->
                                                    @if ($baiViet->hasMorePages())
                                                        <li>
                                                            <a href="{{ $baiViet->nextPageUrl() }}" class="next page-numbers">
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
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="tp-sidebar-wrapper tp-sidebar-ml--24">
                        <div class="tp-sidebar-widget mb-35">
                            <div class="tp-sidebar-search">
                                <form action="{{ route('bai-viet') }}" method="GET">
                                    <div class="tp-sidebar-search-input">
                                        <input type="text" name="search" placeholder="Tìm kiếm bài viết..." value="{{ request('search') }}">
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

                        <!-- about -->
                        <div class="tp-sidebar-widget mb-35">
                            <h3 class="tp-sidebar-widget-title">Tài khoản</h3>
                            <div class="tp-sidebar-widget-content">
                                <div class="tp-sidebar-about">
                                    <div class="tp-sidebar-about-thumb mb-25">
                                        <a href="#">
                                            <img src="{{ isset($user) && $user->anh_dai_dien ? Storage::url($user->anh_dai_dien) : asset('path/to/default/image.jpg') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="tp-sidebar-about-content">
                                        <h3 class="tp-sidebar-about-title">
                                            <a href="#">{{ isset($user) ? $user->ten : 'Chưa đăng nhập' }}</a>
                                        </h3>
                                        <span class="tp-sidebar-about-designation">
                                            {{ isset($user) ? $user->vai_tro : 'Vai trò không xác định' }}
                                        </span>                                        
                                        
                                        <div class="tp-sidebar-about-signature">
                                            <img src="assets/img/blog/signature/signature.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- about end -->

                        <!-- latest post start -->
                        <div class="tp-sidebar-widget mb-35">
                            <h3 class="tp-sidebar-widget-title">Tin tức mới nhất</h3>
                            <div class="tp-sidebar-widget-content">
                                <div class="tp-sidebar-blog-item-wrapper">
                                    @foreach ($latestPosts as $bai_viet)
                                        <div class="tp-sidebar-blog-item d-flex align-items-center">
                                            <div class="tp-sidebar-blog-thumb">
                                                <a href="{{ route('chitietbaiviet', ['id' => $bai_viet->id]) }}">
                                                    <img src="{{ $bai_viet->anh_bai_viet ? asset('storage/' . $bai_viet->anh_bai_viet) : 'assets/img/blog/sidebar/blog-sidebar-1.jpg' }}"
                                                        alt="{{ $bai_viet->tieu_de }}">
                                                </a>
                                            </div>
                                            <div class="tp-sidebar-blog-content">
                                                <div class="tp-sidebar-blog-meta">
                                                    <span>{{ $bai_viet->created_at->format('d/m/Y') }}</span>
                                                </div>
                                                <h3 class="tp-sidebar-blog-title">
                                                    <a
                                                        href="{{ route('chitietbaiviet', ['id' => $bai_viet->id]) }}">{{ $bai_viet->tieu_de }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- latest post end -->

                        <!-- categories start -->
                        <div class="tp-sidebar-widget widget_categories mb-35">
                            <h3 class="tp-sidebar-widget-title">Danh mục</h3>
                            <div class="tp-sidebar-widget-content">
                                <ul>
                                    @foreach ($danhMucs as $danhMuc)
                                        <li>
                                            <a href="{{ route('bai-viet', ['danh_muc' => $danhMuc->id]) }}">
                                                {{ $danhMuc->ten_danh_muc }}
                                                <span>({{ $danhMuc->bai_viets_count }})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- categories end -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog grid area end -->
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.filter-category');

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); // Ngăn chặn hành động mặc định

                    const categoryId = this.getAttribute('data-id'); // Lấy ID danh mục
                    fetchArticlesByCategory(categoryId);
                });
            });

            function fetchArticlesByCategory(categoryId) {
                fetch(`/baiviet/${categoryId}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('articles-list').innerHTML =
                        data; // Cập nhật danh sách bài viết
                    })
                    .catch(error => console.error('Error fetching articles:', error));
            }
        });
    </script>
@endsection

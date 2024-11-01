@extends('layouts.client')

@section('content')
    <!-- section title area start -->
    <section class="tp-section-title-area pt-95 pb-80">
        <div class="container">
           <div class="row">
              <div class="col-xl-8">
                 <div class="tp-section-title-wrapper-7">
                    <h3 class="tp-section-title-7">Bài viết</h3>
                    <div class="breadcrumb__list">
                        <span><a href="#">Trang chủ</a></span>
                        <span>Bài viết</span>
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
                       <div class="tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab" tabindex="0">
                          <!-- blog list wrapper -->
                          <div class="tp-blog-list-item-wrapper">
                            @foreach ($baiViet as $baiviet)
                            <div class="tp-blog-list-item d-md-flex d-lg-block d-xl-flex">
                                <div class="tp-blog-list-thumb">
                                    <a href="{{ route('chitietsanpham', ['id' => $baiviet->id]) }}">
                                        <img src="{{ $baiviet->anh_bai_viet ? asset('storage/' . $baiviet->anh_bai_viet) : 'assets/img/blog/grid/blog-grid-1.jpg' }}" alt="{{ $baiviet->tieu_de }}">
                                    </a>
                                </div>
                                <div class="tp-blog-list-content">
                                    <div class="tp-blog-grid-content">
                                        <div class="tp-blog-grid-meta">
                                            <span>
                                                <span>
                                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10.5972 10.7259L8.42715 9.43093C8.04915 9.20693 7.74115 8.66793 7.74115 8.22693V5.35693" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                {{ $baiviet->created_at->format('d/m/Y') }}
                                            </span>
                                            <span>
                                                <span>
                                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.5289 11.881L12.8019 14.093C12.8719 14.674 12.2489 15.08 11.7519 14.779L8.81888 13.036C8.49688 13.036 8.18189 13.015 7.87389 12.973C8.39189 12.364 8.69988 11.594 8.69988 10.761C8.69988 8.77299 6.97788 7.16302 4.84988 7.16302C4.03788 7.16302 3.28888 7.394 2.66588 7.8C2.64488 7.625 2.63788 7.44999 2.63788 7.26799C2.63788 4.08299 5.40288 1.5 8.81888 1.5C12.2349 1.5 14.9999 4.08299 14.9999 7.26799C14.9999 9.15799 14.0269 10.831 12.5289 11.881Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M8.7 10.7611C8.7 11.5941 8.39201 12.3641 7.87401 12.9731C7.18101 13.8131 6.082 14.3521 4.85 14.3521L3.023 15.437C2.715 15.626 2.323 15.3671 2.365 15.0101L2.54 13.6311C1.602 12.9801 1 11.9371 1 10.7611C1 9.52905 1.658 8.44407 2.666 7.80007C3.289 7.39407 4.038 7.16309 4.85 7.16309C6.978 7.16309 8.7 8.77305 8.7 10.7611Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                Bình luận ({{ $baiviet->comments ? $baiviet->comments->count() : 0 }})
                                            </span>
                                        </div>
                                        <h3 class="tp-blog-grid-title">
                                            <a href="{{ route('chitietsanpham', ['id' => $baiviet->id]) }}">{{ $baiviet->tieu_de }}</a>
                                        </h3>
                                        <p>{{ Str::limit($baiviet->noi_dung, 100) }}</p>
                        
                                        <div class="tp-blog-grid-btn">
                                            <a href="{{ route('chitietsanpham', ['id' => $baiviet->id]) }}" class="tp-link-btn-3">
                                                Đọc thêm
                                                <span>
                                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 7.5L1 7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
                             <div class="tp-blog-pagination mt-30">
                                <div class="tp-pagination">                                  
                                    {{ $baiViet->links() }}                                  
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
                          <form action="#">
                             <div class="tp-sidebar-search-input">
                                <input type="text" placeholder="Search...">
                                <button type="submit">
                                   <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                      <path d="M16.9995 17L13.1328 13.1333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                                        <img src="{{ Storage::url($user->anh_dai_dien) }}" alt="">
                                    </a>       
                                </div>
                                <div class="tp-sidebar-about-content">
                                    <h3 class="tp-sidebar-about-title">
                                        <a href="#">{{ $user->ten }}</a>
                                    </h3>
                                    <span class="tp-sidebar-about-designation">{{ $user->vai_tro }}</span>
                                    <p>Lorem ligula eget dolor. Aenean massa. Cum sociis que penatibus magnis dis parturient</p>
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
                       <h3 class="tp-sidebar-widget-title">Bài viết mới nhất</h3>
                       <div class="tp-sidebar-widget-content">
                          <div class="tp-sidebar-blog-item-wrapper">
                            @foreach($latestPosts as $bai_viet)
                            <div class="tp-sidebar-blog-item d-flex align-items-center">
                                <div class="tp-sidebar-blog-thumb">
                                    <a href="{{ route('chitietsanpham', ['id' => $bai_viet->id]) }}">
                                        <img src="{{ $bai_viet->anh_bai_viet ? asset('storage/' . $bai_viet->anh_bai_viet) : 'assets/img/blog/sidebar/blog-sidebar-1.jpg' }}" alt="{{ $bai_viet->tieu_de }}">
                                    </a>
                                </div>
                                <div class="tp-sidebar-blog-content">
                                    <div class="tp-sidebar-blog-meta">
                                        <span>{{ $bai_viet->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <h3 class="tp-sidebar-blog-title">
                                        <a href="{{ route('chitietsanpham', ['id' => $bai_viet->id]) }}">{{ $bai_viet->tieu_de }}</a>
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
                                        <a href="{{ route('trangbaiviet', ['danh_muc' => $danhMuc->id]) }}">
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
    document.addEventListener('DOMContentLoaded', function () {
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
                    document.getElementById('articles-list').innerHTML = data; // Cập nhật danh sách bài viết
                })
                .catch(error => console.error('Error fetching articles:', error));
        }
    });
</script>
@endsection
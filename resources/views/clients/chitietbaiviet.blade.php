
@extends('layouts.client') 

@section('content')
<section class="tp-postbox-details-area pb-120 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-postbox-details-top">
                    <div class="tp-postbox-details-category">
                        <span>
                            <i class="fa-light fa-tag"></i>
                            @if($post->danhMuc) 
                                <a href="{{ route('bai-viet', ['danh_muc' => $post->danhMuc->id]) }}">
                                    {{ $post->danhMuc->ten_danh_muc }}
                                </a>
                            @else
                                <span>Không có danh mục</span>
                            @endif
                        </span>
                    </div>
                    <h4 class="tp-postbox-details-title">{{ $post->tieu_de }}</h4>
                    <div class="tp-postbox-details-meta mb-50">
                        <span data-meta="author">
                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.4104 8C9.33922 8 10.9028 6.433 10.9028 4.5C10.9028 2.567 9.33922 1 7.4104 1C5.48159 1 3.91797 2.567 3.91797 4.5C3.91797 6.433 5.48159 8 7.4104 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.4102 15.0001C13.4102 12.2911 10.721 10.1001 7.41016 10.1001C4.09933 10.1001 1.41016 12.2911 1.41016 15.0001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                           <a href="#">{{ $post->user->ten }}</a>
                        </span>
                        <span>
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.5972 10.7259L8.42721 9.43093C8.04921 9.20693 7.74121 8.66793 7.74121 8.22693V5.35693" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="tp-postbox-details-thumb">
                    <img src="{{ Storage::url($post->anh_bai_viet) }}" alt="{{ $post->tieu_de }}" style="width: 100%; height: 600px; object-fit: cover;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="tp-postbox-details-main-wrapper">
                    <div class="tp-postbox-details-content" style="overflow: hidden;">                      
                        {!! $post->noi_dung !!} 
                        <div class="tp-postbox-details-share-wrapper">
                            <div class="row">
                                <div class="col-xl-8 col-lg-6">
                                    <div class="tp-postbox-details-tags tagcloud">
                                        <!-- Add tags if applicable -->
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="tp-postbox-details-share text-md-end">
                                        <span>Share:</span>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
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
                                        <img src="{{ isset($user) && $user->anh_dai_dien ? Storage::url($user->anh_dai_dien) : asset('assets/client/img/about/anhchuadangnhap.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="tp-sidebar-about-content">
                                    <h3 class="tp-sidebar-about-title">
                                        <a href="#">{{ isset($user) ? $user->ten : 'Chưa đăng nhập' }}</a>
                                    </h3>
                                    <span class="tp-sidebar-about-designation">
                                        {{ isset($user) ? $user->vai_tro : 'Khách' }}
                                    </span>
                                    <div class="tp-sidebar-about-signature">
                                        <img src="assets/img/blog/signature/signature.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- latest post start -->
                    <div class="tp-sidebar-widget mb-35">
                        <h3 class="tp-sidebar-widget-title">Tin tức mới nhất</h3>
                        <div class="tp-sidebar-widget-content">
                            <div class="tp-sidebar-blog-item-wrapper">
                                @foreach ($latestPosts as $bai_viet)
                                    <div class="tp-sidebar-blog-item d-flex align-items-center">
                                        <div class="tp-sidebar-blog-thumb">
                                            <a href="{{ route('chitietbaiviet', ['id' => $bai_viet->id]) }}">
                                                <img src="{{ $bai_viet->anh_bai_viet ? asset('storage/' . $bai_viet->anh_bai_viet) : 'assets/img/blog/sidebar/blog-sidebar-1.jpg' }}" alt="{{ $bai_viet->tieu_de }}">
                                            </a>
                                        </div>
                                        <div class="tp-sidebar-blog-content">
                                            <div class="tp-sidebar-blog-meta">
                                                <span>{{ $bai_viet->created_at->format('d/m/Y') }}</span>
                                            </div>
                                            <h3 class="tp-sidebar-blog-title">
                                                <a href="{{ route('chitietbaiviet', ['id' => $bai_viet->id]) }}">{{ Str::limit($bai_viet->tieu_de, 50) }}</a>
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



@endsection

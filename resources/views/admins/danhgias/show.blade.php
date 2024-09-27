@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('css')
    <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-title {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .product-details {
            display: flex;
            gap: 20px;
        }

        .product-image {
            flex: 1;
        }

        .product-image img {
            width: 100%;
            border-radius: 8px;
        }

        .product-info {
            flex: 2;
        }

        .product-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .product-info p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 22px;
            font-weight: bold;
            color: #E74C3C;
            margin-bottom: 20px;
        }

        .add-to-cart-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498DB;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background-color: #2980B9;
        }

        .product-description {
            margin-top: 30px;
        }

        .product-description h3 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .product-description p {
            font-size: 16px;
        }

        /* Đánh giá sản phẩm */
        .review-section {
            margin-top: 40px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .review-section h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .rating {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
        }

        .rating input:checked ~ label,
        .rating label:hover,
        .rating label {
            color: #FFD700;
        }

        .rating input:checked ~ label:hover,
        .rating input:checked ~ label:hover ~ label {
            color: #FFD700;
        }

        .comment-form {
            display: flex;
            flex-direction: column;
        }

        .comment-form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .comment-form button {
            padding: 10px 20px;
            background-color: #3498DB;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .comment-form button:hover {
            background-color: #2980B9;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="product-title">Chi Tiết Sản Phẩm</div>
    
    <div class="product-details">
        <div class="product-image">
            <img src="{{ asset($sanPham->anh_san_pham) }}" alt="{{ $sanPham->ten_san_pham }}"
                width="200px">
        </div>
        <div class="product-info">
            <h2>Tên sản phẩm: {{$sanPham->ten_san_pham}}</h2>
            <p>Mã sản phẩm: {{$sanPham->ma_san_pham}}</p>
            @foreach($sanPham->bienTheSanPhams as $bienThe)
                <p>Số lượng: {{$bienThe->so_luong}}</p>
                <p>Giá cũ: {{$bienThe->gia_cu}} VND</p>
                <p class="price">Giá mới: {{$bienThe->gia_moi}} VND</p>
            @endforeach
        </div>
    </div>

    <!-- Phần đánh giá và nhận xét -->
    <div class="row">
        <div class="col-12">
            <div class="card px-5">
                <div class="card-header">
                    <h5 class="card-title mb-0 fs-2">Đánh giá sản phẩm</h5>
                </div>
                <div class="card-body">
                    {{-- <div id="stacked_area_chart" class="apex-charts d-flex align-items-center">
                        <h1 class="m-0">4.5</h1>
                        <h5 class="m-0 ml-2">trên 5 sao</h5>
                    </div> --}}
                    <div class="bg-light">
                        @if ($soluotdanhgia > 0)
                            <div id="area_chart-years"
                                class="apex-charts px-5 py-3 d-flex justify-content-between align-items-center">
                                <div class="">
                                    <div class="text-danger">
                                        <span class="m-0 fs-1">{{ number_format($diemtrungbinh, 1) }}</span>

                                        <span class="m-0">trên 5</span>
                                    </div>
                                    <div class="">
                                        <p class="m-0 fs-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($diemtrungbinh) && $diemtrungbinh < 5)
                                                    <span class="star text-warning">★</span> <!-- Sao vàng -->
                                                @elseif ($i == ceil($diemtrungbinh))
                                                    @if ($diemtrungbinh - floor($diemtrungbinh) >= 0.3 && $diemtrungbinh - floor($diemtrungbinh) < 0.8)
                                                        <span class="star text-warning">☆</span> <!-- Sao rưỡi -->
                                                    @else
                                                        <span class="star text-muted">★</span> <!-- Sao xám -->
                                                    @endif
                                                @else
                                                    <span class="star text-muted">★</span> <!-- Sao xám -->
                                                @endif
                                            @endfor
                                        </p>
                                    </div>
                                </div>
                                <p class="text-black">{{ $soluotdanhgia }} lượt đánh giá</p>
                            </div>
                        @else
                            <div id="area_chart-years"
                                class="apex-charts px-5 py-3 d-flex justify-content-between align-items-center">
                                <div class="">
                                    <div class="text-danger">
                                        <span class="m-0 fs-1">Chưa có đánh giá</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    @foreach ($danhgias as $danhgia)
                        <div class="github-style d-flex my-2">
                            <div class="flex-shrink-0 me-2">
                                <img src="{{ asset($danhgia->user->anh_dai_dien) }}" alt="" height="32"
                                    width="32" class="avatar-sm rounded-pill"
                                    style="object-fit: cover; object-position: center;">
                            </div>
                            <div class="flex-grow-1">
                                <a class="font-size-14 text-body fw-medium">{{ $danhgia->user->ten }}</a>
                                <div class="cmeta text-muted font-size-11">
                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $danhgia->diem_so)
                                                <span class="star text-warning">★</span>
                                            @else
                                                <span class="star text-muted">★</span>
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="m-0">{{ $danhgia->created_at }}</p>
                                    <span
                                        class="commits text-body fw-medium text-black">{{ $danhgia->nhan_xet }}</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $danhgias->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $danhgias->previousPageUrl() }}">Previous</a>
                            </li>

                            @foreach ($danhgias->getUrlRange(1, $danhgias->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $danhgias->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $danhgias->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $danhgias->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>



    </div>
</div>
@endsection

@section('js')
  
@endsection
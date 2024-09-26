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

    <!-- Phần đánh giá và bình luận -->
    <div class="review-section">
        <h3>Đánh giá sản phẩm</h3>
        
        <!-- Nhận xét -->
        <form class="comment-form">
            @foreach($listDanhGia as $danhGia)
        <div class="review">
            <div class="rating">
                @for($i = 0; $i < $danhGia->rating; $i++)
                    <span>&#9733;</span> <!-- Sao vàng -->
                @endfor
            </div>  
            <div class="d-flex">
                <img src="{{ asset('storage/' .Auth::user()->anh_dai_dien) }}" alt="{{ $danhGia->user->ten }}" class="rounded-circle" width="40px" height="40px"> 
                <h5>{{ $danhGia->user->ten }}</h5>
            </div>  
            
            {{-- <div class="rating">
                @for($i = 0; $i < $danhGia->rating; $i++)
                    <span>&#9733;</span> <!-- Sao vàng -->
                @endfor
            </div> --}}
         
            <!-- Đánh giá sao -->
        <div class="rating">
            <input type="radio" name="rating" id="star5" value="5">
            <label for="star5">&#9733;</label>

            <input type="radio" name="rating" id="star4" value="4">
            <label for="star4">&#9733;</label>

            <input type="radio" name="rating" id="star3" value="3">
            <label for="star3">&#9733;</label>

            <input type="radio" name="rating" id="star2" value="2">
            <label for="star2">&#9733;</label>

            <input type="radio" name="rating" id="star1" value="1">
            <label for="star1">&#9733;</label>
        </div>
            <p>{{ $danhGia->nhan_xet }}</p>
        </div>
    @endforeach
        </form>
    </div>
</div>
@endsection

@section('js')
  
@endsection
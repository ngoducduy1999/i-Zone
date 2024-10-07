@extends('layouts.admin')

@section('title', 'Chi tiết sản phẩm ')

@section('content')

    <style>
#view_dgia {
    min-height: 500px; /* Chỉnh lại độ cao tối thiểu theo nhu cầu */
    transition: min-height 0.3s ease; /* Thêm transition để mượt mà hơn */
}

.kk {
    font-size: 1.2rem;
    color: #333;
    font-weight: 600;
}
.stars {
    font-size: 1.2rem; /* Kích thước ngôi sao */
}

.border {
    border: 1px solid #e0e0e0; /* Màu viền */
}

.rounded {
    border-radius: 0.25rem; /* Bo góc */
}

.shadow-sm {
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
}

    .rating-filter {
    background-color: #fff; /* Nền trắng */
    border: 1px solid #6c757d; /* Màu khung */
    border-radius: 0.25rem; /* Bo góc */
    padding: 15px; /* Thêm khoảng cách bên trong */
}

.rating-filter .filter-btn {
    display: inline-flex; /* Dùng inline-flex để nút không chiếm toàn bộ dòng */
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: center; /* Căn giữa theo chiều ngang */
    margin: 5px; /* Khoảng cách giữa các nút */
    padding: 10px 15px; /* Kích thước nút */
    color: orange; /* Màu chữ mặc định */
    border: 1px solid #bababa; /* Khung nút */
    transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Hiệu ứng chuyển đổi */
    text-decoration: none; /* Bỏ gạch chân */
}

.rating-filter .filter-btn:hover {
    border: 1px solid #000000; /* Màu nền khi hover */
}

.rating-filter .filter-btn.active {
    border-color: #0056b3; /* Viền màu khác khi nút được chọn */
}

.star {
    margin-left: 5px; /* Khoảng cách giữa số và ngôi sao */
    font-size: 1.2rem; /* Kích thước ngôi sao */
    color: orange; /* Màu vàng cho ngôi sao */
}

.offset-md-3 ul.list-unstyled {
    padding-left: 0; /* Xóa padding bên trái */
    margin: 0; /* Đảm bảo không có khoảng cách bên ngoài */
}

.offset-md-3 li {
    display: flex; /* Đảm bảo li là flex container */
    align-items: center; /* Căn giữa theo chiều dọc */
}

.progress {
    height: 1.2rem;
    background-color: #e9ecef;
    border-radius: 5px;
    overflow: hidden;
}

.progress-bar {
    background-color: #ffc107;
}

.star {
    font-size: 1.5rem; /* Kích thước ngôi sao */
    line-height: 1.5; /* Căn chỉnh sao với thanh tiến độ */
}

span {
    line-height: 1.5rem; /* Đảm bảo phần trăm căn giữa với thanh tiến độ */
}


        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .text-black img {
            width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
      
        .preview-item {
            position: relative;
            border: 1px solid #ccc;
            padding: 10px;
            max-width: 200px;
        }

        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            background-color: #fff;
            border: none;
            color: red;
            font-weight: bold;
            padding: 0;
        }

        .delete-button:hover {
            color: darkred;
        }

        /* Thêm CSS cho nút */
        #scrollToReviews,
        #scrollToTop {
            position: fixed;
            bottom: 60px;
            right: 20px;
            margin: 10px;
            z-index: 1000; /* Đặt nút lên trên các phần tử khác */
        }
        #quaylai,
        #quaylai {
            position: fixed;
            bottom: 0px;
            right: 20px;
            margin: 10px;
            z-index: 1000; /* Đặt nút lên trên các phần tử khác */
        }
    </style>

    <div class="container-xxl">
        <div class="d-flex justify-content-between py-3">
            <h4 class="fs-18 fw-semibold m-0">Chi tiết sản phẩm</h4>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset($sanpham->anh_san_pham) }}" class="img-fluid rounded-4 mb-3" alt="Sản phẩm">
                        <label class="form-label">Album ảnh:</label>
                        <div class="d-flex gap-2">
                            @foreach ($anhsanphams as $anhsanpham)
                                <img src="{{ asset($anhsanpham->hinh_anh) }}" class="img-thumbnail" width="50px" alt="Ảnh sản phẩm">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Chi tiết sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Mã sản phẩm:</strong> {{ $sanpham->ma_san_pham }}</p>
                        <p><strong>Tên sản phẩm:</strong> {{ $sanpham->ten_san_pham }}</p>
                        <p><strong>Danh mục:</strong> {{ $sanpham->danhMuc ? $sanpham->danhMuc->ten_danh_muc : '' }}</p>
                        <p><strong>Tags:</strong> 
                            @foreach ($tagsanphams as $tag)
                                <span class="badge bg-primary">#{{ $tag->tag->ten_tag }}</span>
                            @endforeach
                        </p>

                        <h5 class="card-title">Biến thể sản phẩm:</h5>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dung lượng</th>
                                    <th>Màu sắc</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bienthesanphams as $bienthesanpham)
                                    <tr>
                                        <td>{{ $bienthesanpham->id }}</td>
                                        <td>{{ $bienthesanpham->dungLuong->ten_dung_luong }}</td>
                                        <td>{{ $bienthesanpham->mauSac->ten_mau_sac }}</td>
                                        <td>
                                            <del class="text-danger">{{ number_format($bienthesanpham->gia_cu, 0, ',', '.') }}đ</del>
                                           - {{ number_format($bienthesanpham->gia_moi, 0, ',', '.') }}đ
                                        </td>
                                        <td>{{ number_format($bienthesanpham->so_luong, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h5 class="card-title">Mô tả sản phẩm:</h5>
                        <div class="text-black">{!! $sanpham->mo_ta !!}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h2>Đánh giá {{$sanpham->ten_san_pham}}</h2>
            </div>
            <div class="card-body">
                @if ($soluotdanhgia > 0)
                    <div class="d-flex align-items-center">
                        <div class="text-danger me-3">
                            <span class="fs-1">{{ number_format($diemtrungbinh, 1) }}</span> trên 5
                        </div>
                        <div class="star_warning">
                            <p class="fs-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($diemtrungbinh))
                                        <span class="star text-warning">★</span>
                                    @elseif ($i == ceil($diemtrungbinh))
                                        @if ($diemtrungbinh - floor($diemtrungbinh) >= 0.3)
                                            <span class="star text-warning">☆</span>
                                        @else
                                            <span class="star text-warning">☆</span>
                                        @endif
                                    @else
                                        <span class="star text-warning">☆</span>
                                    @endif
                                @endfor
                            </p>
                        </div>
                        <p class="ms-auto">{{ $soluotdanhgia }} lượt đánh giá</p>
                    </div>
                @else
                    <div class="text-center">
                        <span class="text-danger fs-1">Chưa có đánh giá</span>
                    </div>
                @endif
            </div>
            <div class="card-body mb-3">
                <div class="col-md-6 offset-md-3">
                    <ul class="list-unstyled">
                        @foreach ($starPercentage as $star => $percentage)
                            <li class="d-flex align-items-center mb-2">
                                <span class="kk me-2">{{ $star }} ★</span> 
                                <div class="progress flex-grow-1">
                                    <div class="progress-bar bg-warning" style="width: {{ number_format($percentage) }}%;"></div>
                                </div>
                                <span class="ms-2">{{ number_format($percentage) }}%</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            
            <div class="card-body  mb-4 text-center">
                <h5>Lọc đánh giá</h5>
                <div class="rating-filter bg-white border rounded p-3">
                    <a href="#" class="btn filter-btn" data-url="{{ route('admin.sanphams.filterDanhGia', ['id' => $sanpham->id, 'star' => 'all']) }}">
                        Tất cả<span class="star text-warning">★</span>
                    </a>
                    @foreach (range(5, 1) as $star)
                        <a href="#" class="btn filter-btn" data-url="{{ route('admin.sanphams.filterDanhGia', ['id' => $sanpham->id, 'star' => $star]) }}">
                            {{ $star }} sao <span class="star text-warning">★</span>
                        </a>
                    @endforeach
                </div>
            </div>
            
            <div id="view_dgia">
                @include('admins.sanphams.danh_gia_list', ['danhgias' => $danhgias])
            </div>   
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
        
        <!-- Nút "Xem đánh giá" -->
        <button id="scrollToReviews" class="btn btn-primary">Xem đánh giá</button>
        <button id="scrollToTop" class="btn btn-secondary d-none">Lên đầu trang</button>
        
        <button id="quaylai" class="btn btn-danger btn-quay-lai" onclick="window.location.href='{{ route('admin.sanphams.index') }}'">
            <i class="fas fa-arrow-left"></i>Danh sách sản phẩm
        </button>
        
        <!-- JavaScript -->
        <script>
         // Hàm thêm và gỡ lớp d-none
function toggleVisibility(elementToShow, elementToHide) {
    elementToShow.classList.remove('d-none');
    elementToHide.classList.add('d-none');
}

// Xử lý scroll đến phần đánh giá
document.getElementById('scrollToReviews').addEventListener('click', function () {
    document.querySelector('.card.mt-4').scrollIntoView({ behavior: 'smooth' });
    toggleVisibility(document.getElementById('scrollToTop'), this);
});

// Xử lý scroll lên đầu trang
document.getElementById('scrollToTop').addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    toggleVisibility(document.getElementById('scrollToReviews'), this);
});

// Xử lý lọc đánh giá
function handleFilterClick(filterButton) {
    filterButton.addEventListener('click', function (e) {
        e.preventDefault();
        let url = this.getAttribute('data-url');
        fetch(url)
            .then(response => response.ok ? response.text() : Promise.reject('Network error'))
            .then(html => {
                const danhgiasContainer = document.getElementById('view_dgia');
                if (danhgiasContainer) {
                    danhgiasContainer.innerHTML = html;
                }
            })
            .catch(error => console.error('Error:', error));
    });
}

// Áp dụng sự kiện cho tất cả nút lọc
document.querySelectorAll('.filter-btn').forEach(handleFilterClick);

// Đánh dấu nút lọc đang được chọn
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            filterButtons.forEach(button => button.classList.remove('active'));
            this.classList.add('active');
        });
    });
});

        </script>
        


@endsection

@extends('layouts.client')

@section('content')
    <div class="container-xl mb-4">
        <div class="">
            <h4>Chi tiết đơn hàng</h4>
        </div>
        <div class="mt-3 mb-4">
            <h6 class="text-dark">Thông tin người đặt hàng</h6>

            <ul class="list-unstyled">
                <div class="row ">
                    <div class="col-lg-6">
                        <li>Mã đơn hàng: <b>{{$hoaDon->ma_hoa_don}}</b></li>
                        <li>Tên người nhận: <b class="text-dark">{{ $hoaDon->ten_nguoi_nhan }}</b></li>
                        <li>Email người nhận: <b class="text-dark">{{ $hoaDon->email }}</b></li>
                        <li>Số điện thoại người nhận: <b class="text-dark">{{ $hoaDon->so_dien_thoai }}</b></li>
                        <li>Địa chỉ người nhận: <b class="text-dark">{{ $hoaDon->dia_chi_nhan_hang }}</b></li>
                    </div>
                    <div class="col">
                        <li>Ghi chú: <b class="text-dark">{{ $hoaDon->ghi_chu }}</b></li>
                        <li>Trạng thái đơn hàng: <b class="text-dark">{{ $trangThaiHoaDon[$hoaDon->trang_thai] }}</b></li>
                        <li>Phương thức thanh toán: <b
                                class="text-dark">{{ $phuongThucThanhToan[$hoaDon->phuong_thuc_thanh_toan] }}</b>
                        </li>
                        <li>Trạng thái thanh toán <b class="text-dark">{{$trangThaiThanhToan[$hoaDon->trang_thai_thanh_toan]}}</b></li>
                        <li class="fw-bold ">Tổng tiền: <b class="fs-5 text-danger">{{ number_format($hoaDon->tong_tien, 0, '', '.') }}
                            đ</b></li>
                    </div>
                </div>
            </ul>
        </div>
        <div class="mt-2">
            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Sản phẩm của đơn hàng</h5>
                        </div><!-- end card header -->

                        <div class="card-body table-responsive">
                            <table class="table ">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th>Thao tác </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chiTietHoaDons as $chiTiet)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($chiTiet->bienTheSanPham->sanPham->anh_san_pham) }}"
                                                    alt="Sản phẩm" width="75px">
                                            </td>
                                            <td>{{ $chiTiet->bienTheSanPham->sanPham->ma_san_pham }}</td>
                                            <td>{{ $chiTiet->bienTheSanPham->sanPham->ten_san_pham }}</td>
                                            <td>{{ number_format($chiTiet->don_gia, 0, '', '.') }} đ</td>
                                            <td>{{ $chiTiet->so_luong }}</td>
                                            <td>{{ number_format($chiTiet->thanh_tien, 0, '', '.') }} đ</td>
                                            <td>
                                                @if ($hoaDon->trang_thai == 7) <!-- Kiểm tra trạng thái -->
                                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#reviewModal" data-san-pham-id="{{ $chiTiet->bienTheSanPham->sanPham->id }}">Đánh giá</a>
                                                @else
                                                    <span class="text-muted">Không thể đánh giá</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Đánh Giá -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Đánh giá sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Hiển thị các đánh giá trước đó -->
                <div id="existingReviews" class="mb-4">
                    <h6>Đánh giá trước đó:</h6>
                    <div id="reviewsSummary">
                        <!-- Tổng đánh giá trung bình -->
                        <div class="average-rating">
                            <span id="avgRatingStars"></span>
                            <span id="avgRatingText"></span>
                        </div>
                    </div>
                    <div id="reviewsList">
                        <!-- Hiển thị tối đa 2-3 đánh giá qua JavaScript -->
                    </div>
                </div>
                

                <!-- Form đánh giá -->
                <form id="reviewForm" method="POST"action="{{ route('reviews.store') }}">
                    @csrf
                    <input type="hidden" name="san_pham_id" id="sanPhamId" value="{{$chiTiet->bienTheSanPham->sanPham->id}}">
                    <div class="mb-3">
                        <label for="diemSo" class="form-label">Đánh giá:</label>
                        <div class="star-rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="diem_so" value="{{ $i }}" />
                                <label for="star{{ $i }}" title="{{ $i }} sao">&#9733;</label>
                            @endfor
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nhanXet" class="form-label">Nhận xét:</label>
                        <textarea class="form-control" id="nhanXet" name="nhan_xet" rows="3" placeholder="Viết nhận xét tại đây..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const reviewModal = document.getElementById('reviewModal');
    reviewModal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget;
        const sanPhamId = button.getAttribute('data-san-pham-id');
        const reviewsList = document.getElementById('reviewsList');
        const avgRatingStars = document.getElementById('avgRatingStars');
        const avgRatingText = document.getElementById('avgRatingText');
        
        // Đặt ID sản phẩm vào input ẩn
        document.getElementById('sanPhamId').value = sanPhamId;

        // Load đánh giá qua AJAX
        reviewsList.innerHTML = '<p class="text-muted">Đang tải đánh giá...</p>';
        fetch(`/api/reviews/${sanPhamId}`)
            .then(response => response.json())
            .then(data => {
                if (data.length) {
                    // Tính điểm trung bình
                    const totalRating = data.reduce((sum, review) => sum + review.diem_so, 0);
                    const avgRating = (totalRating / data.length).toFixed(1);

                    // Hiển thị tổng điểm trung bình
                    avgRatingStars.innerHTML = 
                        `${'★'.repeat(Math.round(avgRating))}${'☆'.repeat(5 - Math.round(avgRating))}`;
                    avgRatingText.textContent = `Trung bình: ${avgRating} / 5 (${data.length} đánh giá)`;

                    // Lấy 2-3 đánh giá mới nhất
                    const latestReviews = data.slice(0, 3);
                    reviewsList.innerHTML = latestReviews.map(review => `
<div class="review-item mb-2">
    <div class="review-header">
        <strong class="review-user">${review.user.ten}</strong>
        <small class="review-date">${new Date(review.created_at).toLocaleDateString()}</small>
    </div>
    <p class="review-comment">${review.nhan_xet}</p>
    <div class="review-stars">
        ${'★'.repeat(review.diem_so)}${'☆'.repeat(5 - review.diem_so)}
    </div>
</div>
                    `).join('');
                } else {
                    reviewsList.innerHTML = '<p class="text-muted">Chưa có đánh giá nào.</p>';
                }
            })
            .catch(() => reviewsList.innerHTML = '<p class="text-danger">Không thể tải đánh giá.</p>');
    });
});

   
</script>
<style>
    /* Tổng thể đánh giá */
.review-item {
    padding: 10px;
    margin-bottom: 15px;
    border-bottom: 1px solid #ddd;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề đánh giá */
.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 5px;
}

.review-user {
    font-size: 14px;
    font-weight: bold;
    color: #333;
}

.review-date {
    font-size: 12px;
    color: #999;
}

/* Nhận xét */
.review-comment {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}

/* Ngôi sao */
.review-stars {
    color: #fbc02d; /* Màu vàng cho sao */
    font-size: 16px;
}
.review-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.review-user-info {
    display: flex;
    align-items: center;
}
/* Tổng đánh giá trung bình */
.average-rating {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
}

#avgRatingStars {
    color: #fbc02d; /* Màu vàng cho sao */
    margin-right: 10px;
}
</style>
@endsection


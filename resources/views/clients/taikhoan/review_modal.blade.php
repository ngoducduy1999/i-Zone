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
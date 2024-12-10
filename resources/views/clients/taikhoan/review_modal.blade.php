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
                    <div id="reviewsCheck">
                        <!-- Hiển thị check -->
                    </div>
                </div>

                <!-- Form đánh giá -->
                <form id="reviewForm" method="POST">
                    @csrf
                    <input type="hidden" name="san_pham_id" id="sanPhamId" value="">
                    <input type="hidden" name="user_id" id="userId" value="{{ auth()->user()->id ?? '' }}"> <!-- Thêm user_id -->
                    
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

<script>
 document.addEventListener('DOMContentLoaded', () => {
    const reviewModal = document.getElementById('reviewModal');
    reviewModal.addEventListener('show.bs.modal', async (event) => {
        const button = event.relatedTarget;
        const sanPhamId = button.getAttribute('data-san-pham-id');
        const reviewsList = document.getElementById('reviewsList');
        const reviewsCheck = document.getElementById('reviewsCheck');
        const avgRatingStars = document.getElementById('avgRatingStars');
        const avgRatingText = document.getElementById('avgRatingText');

        // Đặt san_pham_id vào input ẩn
        document.getElementById('sanPhamId').value = sanPhamId;

        // Lấy user_id từ session (bằng cách gọi auth())
        const userId = {{ auth()->user()->id ?? 'null' }};
        document.getElementById('userId').value = userId;

       

        try {
            const reviewsResponse = await fetch(`/api/reviews/${sanPhamId}`);
            const reviewsData = await reviewsResponse.json();

            if (reviewsData.length) {
                const avgRating = (reviewsData.reduce((sum, r) => sum + r.diem_so, 0) / reviewsData.length).toFixed(1);
                avgRatingStars.innerHTML = `${'★'.repeat(Math.round(avgRating))}${'☆'.repeat(5 - Math.round(avgRating))}`;
                avgRatingText.textContent = `Trung bình: ${avgRating} / 5 (${reviewsData.length} đánh giá)`;

                reviewsList.innerHTML = reviewsData.slice(0, 3).map(review => `
                    <div class="review-item p-3 mb-3 border rounded shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                    <strong class="text-primary">${review.user.ten}</strong>
                    <span class="badge bg-warning text-dark">${review.diem_so} ★</span>
                    </div>
                    <p class="text-muted mt-2">${review.nhan_xet || '<em>Không có nhận xét</em>'}</p>
                    </div>

                `).join('');
            } else {
                reviewsList.innerHTML = '<p>Chưa có đánh giá nào.</p>';
            }
        } catch {
            reviewsList.innerHTML = '<p class="text-danger">Không thể tải đánh giá.</p>';
        }
        
        try {
            const eligibilityResponse = await fetch(`/api/reviews/check-eligibility/${sanPhamId}?user_id=${userId}`);

            const eligibilityData = await eligibilityResponse.json();

            if (eligibilityData.eligible) {
                document.getElementById('reviewForm').style.display = 'block';
                reviewsCheck.innerHTML = '';
            } else {
                document.getElementById('reviewForm').style.display = 'none';
                reviewsCheck.innerHTML = `<div class="alert alert-warning">Bạn không đủ điều kiện để đánh giá (${eligibilityData.remainingReviews} lượt còn lại).</div>`;
                return;
            }
        } catch {
            reviewsCheck.innerHTML = '<p class="text-danger">Không thể kiểm tra điều kiện đánh giá.</p>';
            return;
        }
    });

    document.getElementById('reviewForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        try {
            const response = await fetch('/api/reviews', {
                method: 'POST',
                body: formData,
            });

            if (response.ok) {
                alert('Đánh giá đã được gửi!');
                reviewModal.dispatchEvent(new Event('hide.bs.modal'));
            } else {
                const errorData = await response.json();
                alert(errorData.error || 'Lỗi khi gửi đánh giá.'); // Hiển thị lỗi từ server nếu có
            }
        } catch {
            alert('Lỗi khi gửi đánh giá.');
        }
    });
});


</script>

<style>
    .review-item {
    background-color: #f9f9f9;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 15px;
    transition: all 0.3s ease-in-out;
}

.review-item strong {
    font-size: 1.1rem;
    color: #333;
}

.review-item .badge {
    font-size: 0.9rem;
    padding: 5px 10px;
    border-radius: 12px;
}

.review-item p {
    margin: 0;
    color: #555;
    font-size: 0.95rem;
    line-height: 1.5;
}

.review-item:hover {
    background-color: #f1f1f1;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transform: scale(1.02);
}

    .review-item {
        padding: 10px;
        margin-bottom: 15px;
        border-bottom: 1px solid #ddd;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .review-user {
        font-weight: bold;
    }

    .review-date {
        font-size: 12px;
        color: #999;
    }

    .review-comment {
        margin: 5px 0;
        color: #555;
    }

    .review-stars {
        color: #fbc02d;
        font-size: 16px;
    }

    .average-rating {
        font-size: 16px;
        margin-bottom: 10px;
    }

    #avgRatingStars {
        color: #fbc02d;
        margin-right: 10px;
    }
</style>

@extends('layouts.client')

@section('content')
    <div class="container p-5 ">
            <h3 class="profile__info-title">Lịch sử đơn hàng</h3>
        
            <!-- Thanh trạng thái -->
            <nav class="nav nav-pills nav-fill mb-4">
                <a class="nav-link filter-link active" data-status="1" href="javascript:void(0)">
                    <i class="fas fa-hourglass-start"></i> Chờ xác nhận ({{ $counts[1] ?? 0 }})
                </a>
                <a class="nav-link filter-link" data-status="2" href="javascript:void(0)">
                    <i class="fas fa-box"></i> Chờ lấy hàng ({{ $counts[2] ?? 0 }})
                </a>
                <a class="nav-link filter-link" data-status="4" href="javascript:void(0)">
                    <i class="fas fa-truck"></i> Đang giao ({{ $counts[4] ?? 0 }})
                </a>
                <a class="nav-link filter-link" data-status="5" href="javascript:void(0)">
                    <i class="fas fa-check-circle"></i> Đã giao ({{ $counts[5] ?? 0 }})
                </a>
                <a class="nav-link filter-link" data-status="6" href="javascript:void(0)">
                    <i class="fas fa-times-circle"></i> Đã hủy ({{ $counts[6] ?? 0 }})
                </a>
                
                
            </nav>
        
            <!-- Khu vực hiển thị đơn hàng -->
            <div id="order-list">
                @include('clients.taikhoan.list', ['donHangs' => $donHangs])
            </div>
        </div>
@endsection

@section('js')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
    <script>
        
        $(document).ready(function () {
            // Gửi AJAX tự động cho trạng thái mặc định (Chờ xác nhận - status = 1)
            loadOrders(1);
    
            $('.filter-link').on('click', function () {
                let status = $(this).data('status');
    
                // Đổi active class
                $('.filter-link').removeClass('active');
                $(this).addClass('active');
    
                // Gửi yêu cầu AJAX
                loadOrders(status);
            });
    
            // Hàm dùng chung để load dữ liệu đơn hàng
            function loadOrders(status) {
                $.ajax({
                    url: '/customer/orders/filter',
                    method: 'GET',
                    data: { status: status },
                    success: function (response) {
                        // Cập nhật danh sách đơn hàng
                        $('#order-list').html(response.html);
    
                        // Cập nhật số lượng trên các nút
                        Object.keys(response.counts).forEach(function (key) {
                            const $link = $(`.filter-link[data-status="${key}"]`);
                            if ($link.length) {
                                // Lấy text gốc (tránh thay đổi không mong muốn)
                                const text = $link.text().split(' (')[0].trim();
                                const iconHTML = $link.find('i').prop('outerHTML'); // Giữ nguyên icon
                                $link.html(`${iconHTML} ${text} (${response.counts[key]})`);
                            }
                        });
                    },
                    error: function () {
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            }
        });
    </script>
    
@endsection

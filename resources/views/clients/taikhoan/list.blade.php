<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Mã đơn</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Trạng thái đơn hàng</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($donHangs as $ord)
            <tr>
                <td>{{ $ord->ma_hoa_don }}</td>
                <td>{{ number_format($ord->tong_tien, 0, ',', '.') }} đ</td>
                <td>{{ $ord->ngay_dat_hang }}</td>
                <td>
                    @if ($ord->trang_thai == 1)
                        <span class="text-danger">Chờ xác nhận</span>
                    @elseif ($ord->trang_thai == 2)
                        <span class="text-warning">Đã xác nhận</span>
                    @elseif ($ord->trang_thai == 3)
                        <span class="text-info">Đang chuẩn bị</span>
                    @elseif ($ord->trang_thai == 4)
                        <span class="text-primary">Đang vận chuyển</span>
                    @elseif ($ord->trang_thai == 5)
                        <span class="badge bg-success">Đã giao hàng</span>
                    @elseif ($ord->trang_thai == 6)
                        <span class="badge bg-danger">Đã hủy</span>
                    @elseif ($ord->trang_thai == 7)
                        <span class="badge bg-success">Đã nhận hàng</span>
                    @endif
                </td>
                <td>
                    <!-- Thao tác tương ứng với từng trạng thái -->
                    @if ($ord->trang_thai == 1)
                        <!-- Chờ xác nhận -->
                        <form action="{{ route('customer.cancelOrder', $ord->id) }}" method="POST" class="d-inline" onsubmit="return confirmCancel();">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Hủy</button>
                        </form>
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}" class="btn btn-sm btn-primary">Xem</a>
                        @if (
                            $ord->phuong_thuc_thanh_toan == 'Thanh toán qua chuyển khoản ngân hàng' && 
                            $ord->trang_thai_thanh_toan == 'Chưa thanh toán' &&
                            $ord->trang_thai == 1 // Chờ xác nhận
                        )
                        @php
                            $thoiGianConLai = $ord->thoi_gian_het_han ? \Carbon\Carbon::parse($ord->thoi_gian_het_han)->diffForHumans(now(), ['parts' => 2]) : null;
                        @endphp
                        
                        @if($ord->trang_thai_thanh_toan === App\Models\HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán'] && $ord->thoi_gian_het_han > now())
     <form action="{{ route('customer.retryPayment', $ord->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-sm btn-danger">Thanh toán lại</button>
    </form>
    @if($thoiGianConLai)
        <small class="text-warning d-block">Thời gian còn lại: {{ $thoiGianConLai }}</small>
    @endif
@else
    <span class="text-danger">Đơn hàng đã hết hạn thanh toán.</span>
    <form id="cancel-order-form-{{ $ord->id }}" 
        action="{{ route('customer.cancelOrder', $ord->id) }}" 
        method="POST" 
        class="d-inline auto-cancel-form" 
        data-expiration-time="{{ $ord->thoi_gian_het_han }}">
      @csrf
      <button type="submit" class="btn btn-sm btn-danger">Hủy</button>
  </form>
  
@endif
<script>
     function confirmCancel() {
        return confirm("Bạn có chắc chắn muốn hủy đơn hàng này không?");
    }
    document.addEventListener('DOMContentLoaded', function () {
        // Tìm tất cả các form hủy đơn tự động
        const autoCancelForms = document.querySelectorAll('.auto-cancel-form');

        autoCancelForms.forEach(form => {
            // Lấy thời gian hết hạn từ dataset hoặc kiểm tra điều kiện (cần truyền vào từ server)
            const expirationTime = form.getAttribute('data-expiration-time'); // Giả sử bạn truyền thời gian này qua attribute

            if (expirationTime) {
                const expirationDate = new Date(expirationTime).getTime();
                const currentTime = new Date().getTime();

                if (expirationDate < currentTime) {
                    // Nếu hết hạn, tự động submit form
                    form.submit();
                }
            }
        });
    });
</script>

                        
                        @endif                        
                    @elseif (in_array($ord->trang_thai, [2, 3, 4]))
                        <!-- Đang giao -->
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}" class="btn btn-sm btn-primary">Xem</a>
                    @elseif ($ord->trang_thai == 5)
                        <!-- Đã giao -->
                        <form id="confirm-receive-form-{{ $ord->id }}" action="{{ route('customer.getOrder', $ord->id) }}" method="POST" class="d-inline auto-confirm-form" data-delivery-time="{{ $ord->updated_at }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Đã nhận hàng</button>
                        </form>                        
                        </form>
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}" class="btn btn-sm btn-primary">Xem</a>
                    @elseif ($ord->trang_thai == 7)
                        <!-- Đã nhận hàng -->
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}" class="btn btn-sm btn-primary">Xem</a>
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}" class="btn btn-sm btn-warning">Đánh giá</a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Không có đơn hàng nào</td>
            </tr>
        @endforelse
    </tbody>
</table>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả form xác nhận tự động
    const autoConfirmForms = document.querySelectorAll('.auto-confirm-form');

    autoConfirmForms.forEach(form => {
        const deliveryTime = form.getAttribute('data-delivery-time');

        if (deliveryTime) {
            // Chuyển đổi deliveryTime từ server sang thời gian JavaScript
            const deliveryDate = new Date(deliveryTime);
            const currentDate = new Date();

            // Thời gian 15 phút sau khi giao
            const fifteenMinutesAfterDelivery = new Date(deliveryDate);
            fifteenMinutesAfterDelivery.setMinutes(deliveryDate.getMinutes() + 15);

            // Kiểm tra nếu thời gian hiện tại >= thời gian 15 phút sau giao
            if (currentDate >= fifteenMinutesAfterDelivery) {
                // Submit form tự động
                form.submit();
            }
        }
    });
});

</script>

@if (isset($message))
    <script>
        alert('Thông báo: ' + @json($message));
    </script>
@endif
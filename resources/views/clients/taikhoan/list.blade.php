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
                        <form action="{{ route('customer.cancelOrder', $ord->id) }}" method="POST" class="d-inline">
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
                        @endif
                        
                        @endif                        
                    @elseif (in_array($ord->trang_thai, [2, 3, 4]))
                        <!-- Đang giao -->
                        <a href="{{ route('customer.donhang.chitiet', $ord->id) }}" class="btn btn-sm btn-primary">Xem</a>
                    @elseif ($ord->trang_thai == 5)
                        <!-- Đã giao -->
                        <form action="{{ route('customer.getOrder', $ord->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Đã nhận hàng</button>
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

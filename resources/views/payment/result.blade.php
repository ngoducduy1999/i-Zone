<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thanh toán</title>
    <link href="{{ asset('vnpay_php/assets/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vnpay_php/assets/jumbotron-narrow.css') }}" rel="stylesheet">
    <script src="{{ asset('vnpay_php/assets/jquery-1.11.3.min.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">Kết quả thanh toán</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>
                <label>{{ $ma_hoa_don }}</label>
            </div>
            <div class="form-group">
                <label>Số tiền:</label>
                <label>{{ $so_tien }}</label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label>{{ $noi_dung }}</label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label>{{ $ma_phan_hoi }}</label>
            </div>
            <div class="form-group">
                <label>Mã GD tại VNPAY:</label>
                <label>{{ $ma_giao_dich }}</label>
            </div>
            <div class="form-group">
                <label>Mã ngân hàng:</label>
                <label>{{ $ngan_hang }}</label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label>{{ $thoi_gian }}</label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    @if ($ket_qua === 'Giao dịch thành công')
                        <span style="color:blue">{{ $ket_qua }}</span>
                    @else
                        <span style="color:red">{{ $ket_qua }}</span>
                    @endif
                </label>
            </div>
        </div>
        <footer class="footer">
            <p>&copy; VNPAY {{ date('Y') }}</p>
        </footer>
    </div>
</body>
</html>

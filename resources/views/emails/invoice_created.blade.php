<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Created</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px solid #007BFF;
        }
        .header img {
            max-width: 100px;
        }
        .content {
            margin: 20px 0;
        }
        .content h2 {
            color: #007BFF;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table th {
            background: #007BFF;
            color: #fff;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/client/img/logo/favicon.png') }}" alt="Logo">
            <h1>Cảm ơn bạn đã đặt hàng!</h1>
        </div>
        <div class="content">
            <h2>Thông tin hóa đơn</h2>
            <p><strong>Mã hóa đơn:</strong> {{ $hoaDon->ma_hoa_don }}</p>
            <p><strong>Người nhận:</strong> {{ $hoaDon->ten_nguoi_nhan }}</p>
            <p><strong>Email:</strong> {{ $hoaDon->email }}</p>
            <p><strong>Địa chỉ nhận hàng:</strong> {{ $hoaDon->dia_chi_nhan_hang }}</p>
            <p><strong>Phương thức thanh toán:</strong> {{ $hoaDon->phuong_thuc_thanh_toan }}</p>
        </div>
        <h2>Chi tiết sản phẩm</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hoaDon->chiTietHoaDons as $chiTiet)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $chiTiet->bienTheSanPham->sanPham->hinh_anh) }}" 
                                 alt="Ảnh sản phẩm" 
                                 style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>{{ $chiTiet->bienTheSanPham->sanPham->ten_san_pham }}</td>
                        <td>{{ $chiTiet->so_luong }}</td>
                        <td>{{ number_format($chiTiet->don_gia, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($chiTiet->thanh_tien, 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Tổng cộng:</strong></td>
                    <td><strong>{{ number_format($hoaDon->tong_tien, 0, ',', '.') }} VND</strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="footer">
            <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
            <p>Mọi thắc mắc xin vui lòng liên hệ <a href="mailto:loviongs@gmai.com">loviongs@gmai.com</a>.</p>
        </div>
    </div>
</body>
</html>

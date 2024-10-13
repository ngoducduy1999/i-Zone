@extends('layouts.client')

@section('content')
    <div class="container  m-3">
        <div class="">
            <h5>Chi tiết đơn hàng</h5>
        </div>
        <div class="mt-3">
            <table>
                <tr>
                    <th class="text-dark">Thông tin người đặt hàng</th>
                </tr>
                <tr>
                    <td>
                        <ul class="list-unstyled">

                            <li>Tên người nhận: <b class="text-dark">{{ $hoaDon->ten_nguoi_nhan }}</b></li>
                            <li>Email người nhận: <b class="text-dark">{{ $hoaDon->email }}</b></li>
                            <li>Số điện thoại người nhận: <b class="text-dark">{{ $hoaDon->so_dien_thoai }}</b></li>
                            <li>Địa chỉ người nhận: <b class="text-dark">{{ $hoaDon->dia_chi_nhan_hang }}</b></li>
                            <li>Ghi chú: <b class="text-dark">{{ $hoaDon->ghi_chu }}</b></li>
                            <li>Trạng thái đơn hàng: <b class="text-dark">{{ $trangThaiHoaDon[$hoaDon->trang_thai] }}</b></li>
                            <li>Trạng thái thanh toán: <b class="text-dark">{{ $phuongThucThanhToan[$hoaDon->phuong_thuc_thanh_toan] }}</b>
                            </li>
                            <li>Tổng tiền: <b class="fs-5 text-danger">{{ number_format($hoaDon->tong_tien, 0, '', '.') }}
                                    đ</b></li>
                        </ul>

                    </td>
                </tr>
            </table>

        </div>
        <div>
            
        </div>
    </div>
@endsection

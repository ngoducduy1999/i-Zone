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
@endsection

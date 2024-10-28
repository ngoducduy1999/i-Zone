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
        <div class="mt-2">
            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Sản phẩm của đơn hàng</h5>
                        </div><!-- end card header -->

                        <div class="card-body table-responsive">
                            <table class="table table-bordered text-center">
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
                                                <img src="{{ asset( $chiTiet->bienTheSanPham->sanPham->anh_san_pham) }}" alt="Sản phẩm" width="75px">
                                            </td>
                                            <td>{{ $chiTiet->bienTheSanPham->sanPham->ma_san_pham }}</td>
                                            <td>{{  $chiTiet->bienTheSanPham->sanPham->ten_san_pham  }}</td>
                                            <td>{{ number_format( $chiTiet->don_gia, 0, '', '.') }} đ</td>
                                            <td>{{  $chiTiet->so_luong }}</td>
                                            <td>{{ number_format( $chiTiet->thanh_tien, 0, '', '.') }} đ</td>
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

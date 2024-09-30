@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('css')

@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý chi tiết hóa đơn</h4>
            </div>
        </div>

        <div class="row">
            <!-- Striped Rows -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table class="table table-striped mb-0">
                            <thead>
                                <th>Thông tin tài khoản đặt hàng:</th>
                                <th>Thông tin người nhận hàng:</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>Tên tài khoản: <b>{{ $hoaDon->user->ten }}</b></li>
                                            <li>Email tài khoản: <b>{{ $hoaDon->user->email }}</b></li>
                                            <li>Số điện thoại tài khoản: <b>{{ $hoaDon->user->so_dien_thoai }}</b></li>
                                            <li>Địa chỉ tài khoản: <b>{{ $hoaDon->user->dia_chi }}</b></li>
                                            <li>Vai trò tài khoản: <b>{{ $hoaDon->user->vai_tro }}</b></li>
                                        </ul>
                                    </td>                                  
                                    <td>
                                        <ul>
                                            <li>Tên người nhận: <b>{{ $hoaDon->ten_nguoi_nhan }}</b></li>
                                            <li>Email người nhận: <b>{{ $hoaDon->email }}</b></li>
                                            <li>Số điện thoại người nhận: <b>{{ $hoaDon->so_dien_thoai }}</b></li>
                                            <li>Địa chỉ người nhận: <b>{{ $hoaDon->dia_chi_nhan_hang }}</b></li>
                                            <li>Ghi chú: <b>{{ $hoaDon->ghi_chu }}</b></li>
                                            <li>Trạng thái đơn hàng: <b>{{ $trangThaiHoaDon[$hoaDon->trang_thai] }}</b></li>
                                            <li>Trạng thái thanh toán: <b>{{ $phuongThucThanhToan[$hoaDon->phuong_thuc_thanh_toan] }}</b></li>                                      
                                            <li>Tổng tiền: <b class="fs-5 text-danger">{{ number_format($hoaDon->tong_tien, 0, '', '.') }} đ</b></li>   
                                        </ul>                       
                                    </td>
                                </tr>
                            </tbody>
                        </table>               
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Striped Rows -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sản phẩm của đơn hàng</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table class="table table-bordered">
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
                                @foreach ($hoaDon->chiTietHoaDons as $item)
                                @php
                                    $sanPham = $item->sanPham;
                                @endphp
                                    <tr>
                                        <td>
                                            <img src="{{ asset($sanPham->anh_san_pham) }}" alt="Sản phẩm" width="75px">
                                        </td>
                                        <td>{{ $sanPham->ma_san_pham }}</td>
                                        <td>{{ $sanPham->ten_san_pham }}</td>
                                        <td>{{ number_format($item->don_gia, 0, '', '.') }} đ</td>
                                        <td>{{ $item->so_luong }}</td>
                                        <td>{{ number_format($item->thanh_tien, 0, '', '.') }} đ</td>         
                                    </tr>
                                @endforeach                                
                            </tbody>
                        </table>                 
                    </div>
                </div>
            </div>
        </div>
        
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')

@endsection
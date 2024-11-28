@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý chi tiết đơn hàng</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-body">
                            <div class="clearfix">
                                <h5 class="card-title mb-0">{{ $title }}</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
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
                                                        <li>Số điện thoại tài khoản:
                                                            <b>{{ $hoaDon->user->so_dien_thoai }}</b>
                                                        </li>
                                                        <li>Địa chỉ tài khoản: <b>{{ $hoaDon->user->dia_chi }}</b></li>
                                                        <li>Vai trò tài khoản: <b>{{ $hoaDon->user->vai_tro }}</b></li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            Tên người nhận: <b>{{ $hoaDon->ten_nguoi_nhan }}</b>
                                                        </li>
                                                      
                                                                                                                <li>Email người nhận: <b>{{ $hoaDon->email }}</b></li>
                                                        <li>Số điện thoại người nhận: <b>{{ $hoaDon->so_dien_thoai }}</b>
                                                        </li>
                                                        <li>Địa chỉ người nhận: <b>{{ $hoaDon->dia_chi_nhan_hang }}</b>
                                                        </li>
                                                        <li>Ngày đặt hàng:
                                                            <b>{{ \Carbon\Carbon::parse($hoaDon->ngay_dat_hang)->format('d-m-Y') }}</b>
                                                        </li>
                                                        <li>Ghi chú: <b>{{ $hoaDon->ghi_chu }}</b></li>
                                                        <li>Trạng thái đơn hàng:
                                                            <b>{{ $trangThaiHoaDon[$hoaDon->trang_thai] }}</b>
                                                        </li>

                                                        <li>Phương thức thanh toán:
                                                            <b>{{ $phuongThucThanhToan[$hoaDon->phuong_thuc_thanh_toan] }}</b>
                                                        </li>
                                                        <li>
                                                            Mã giao dịch thanh toán: 
                                                            <b>{{ $hoaDon->ma_hoa_don }}</b>
                                                            @if ($hoaDon->phuong_thuc_thanh_toan === 'Thanh toán qua chuyển khoản ngân hàng')
                                                            <form action="{{ route('admin.transactions.query') }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                <input type="hidden" name="txnRef" value="{{ $hoaDon->ma_hoa_don }}">
                                                                
                                                                <!-- Sửa đây: Chuyển thời gian từ 'ngay_dat_hang' sang định dạng 'YmdHis' -->
                                                                <input type="hidden" name="transactionDate" value="{{ \Carbon\Carbon::parse($hoaDon->thoi_gian_giao_dich)->format('YmdHis') }}">
                                                                
                                                                <button type="submit" class="btn btn-sm btn-info">Tra cứu</button>
                                                            </form>
                                                            @endif
                                                        </li>
                                                        
                                                        <li>
                                                            Trạng thái thanh toán:
                                                            <b class="badge text-white
                                                                @if ($hoaDon->trang_thai_thanh_toan === 'Chưa thanh toán') bg-danger 
                                                                @elseif ($hoaDon->trang_thai_thanh_toan === 'Đã thanh toán') bg-success 
                                                                @elseif ($hoaDon->trang_thai_thanh_toan === 'Thanh toán thất bại') bg-secondary 
                                                                @endif">
                                                                {{ $trangThaiThanhToan[$hoaDon->trang_thai_thanh_toan] }}
                                                            </b>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Sản phẩm của đơn hàng</h5>
                                </div><!-- end card header -->
                                <div class="col-md-12">
                                    <div class="table-responsive rounded-2">
                                        <table class="table mt-4 mb-4 table-centered border">
                                            <thead class="rounded-2">
                                                <tr>
                                                    <th>Hình ảnh</th>
                                                    <th>Mã sản phẩm</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($chiTietHoaDons as $chiTiet)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset($chiTiet->bienTheSanPham->sanPham->anh_san_pham) }}" alt="Sản phẩm" width="75px">
                                                        </td>
                                                        <td>{{ $chiTiet->bienTheSanPham->sanPham->ma_san_pham }}</td>
                                                        <td>
                                                            {{ $chiTiet->bienTheSanPham->sanPham->ten_san_pham }}
                                                            <br>
                                                            <small class="text-muted">
                                                                <!-- Kiểm tra sự tồn tại của biến thể -->
                                                                @if(isset($chiTiet->bienTheSanPham->dungLuong))
                                                                    Dung lượng: {{ $chiTiet->bienTheSanPham->dungLuong->ten_dung_luong }}
                                                                @else
                                                                    Dung lượng: Không có
                                                                @endif
                                                                <br>
                                                                @if(isset($chiTiet->bienTheSanPham->mauSac))
                                                                    Màu sắc: {{ $chiTiet->bienTheSanPham->mauSac->ten_mau_sac }}
                                                                @else
                                                                    Màu sắc: Không có
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>{{ number_format($chiTiet->don_gia, 0, '', '.') }} đ</td>
                                                        <td>{{ $chiTiet->so_luong }}</td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td colspan="5">
                                                        <table class="table table-sm text-nowrap mb-0 table-borderless" style="width: auto; margin-left: auto;">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <p class="mb-0">Thành tiền :</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0 fw-medium fs-15">{{ number_format($tongThanhTien, 0, '', '.') }} đ</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">
                                                                        <p class="mb-0">Tiền ship :</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0 fw-medium fs-15">{{ number_format($tienShip, 0, '', '.') }} đ</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">
                                                                        <p class="mb-0">Giảm giá :</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0 fw-medium fs-15">
                                                                            <span class="text-danger">-{{ number_format($giamGia, 0, '', '.') }} đ</span>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">
                                                                        <p class="mb-0 fs-14">Tổng tiền :</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0 fw-medium fs-16 text-success">
                                                                            {{ number_format($tongTienCuoi, 0, '', '.') }} đ
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                                                                       
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="d-print-none">
                                <div class="float-end">
                                    <a href="{{ route('admin.hoadons.index') }}" class="btn btn-dark">Quay lại</a>
                                    <a href="javascript:window.print()" class="btn btn-primary border-0"><i
                                            class="mdi mdi-printer me-1"></i>In</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
    
    </div> <!-- content -->
@endsection

@section('js')
@endsection

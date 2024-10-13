@extends('layouts.client')

@section('content')
    <div class="container p-5 ">
        <h3 class="profile__info-title">Lịch sử đơn hàng</h3>
        <div class="profile__ticket table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trang thai</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row"> #IZD{{ $order->id }}</th>
                            <td data-info="title">{{ $order->tong_tien }}</td>
                            <td data-info="status pending">
                                @if ($order->trang_thai == 1)
                                    <p class=""><b>Chờ xác nhận</b></p>
                                @elseif($oder->trang_thai == 2)
                                    <p><b>Đã xác nhận</b></p>
                                @elseif($oder->trang_thai == 3)
                                    <p><b>Đang chuẩn bị hàng</b></p>
                                @elseif($oder->trang_thai == 4)
                                    <p><b>Đang giao hàng</b></p>
                                @elseif($oder->trang_thai == 5)
                                    <p><b>Đã giao hàng</b></p>
                                    @elseif($oder->trang_thai==6)
                                    <p><b>Đã hủy đơn hàng</b></p>

                                @endif

                            </td>
                            <td><a href="{{route('customer.donhang.chitiet',$order->id)}}" class="tp-logout-btn">Chi tiết</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>


        </div>
        <div class="pt-3">
            <button onclick="goBack()" class="btn btn-secondary">Quay lại</button>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection

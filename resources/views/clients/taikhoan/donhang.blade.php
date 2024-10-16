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
                                @elseif($order->trang_thai == 2)
                                    <p><b>Đã xác nhận</b></p>
                                @elseif($order->trang_thai == 3)
                                    <p><b>Đang chuẩn bị hàng</b></p>
                                @elseif($order->trang_thai == 4)
                                    <p><b>Đang giao hàng</b></p>
                                @elseif($order->trang_thai == 5)
                                    <p><b>Đã giao hàng</b></p>
                                @elseif($order->trang_thai == 6)
                                    <p><b>Đã hủy đơn hàng</b></p>
                                @elseif($order->trang_thai == 7)
                                    <p><b>Đã nhận đơn hàng</b></p>
                                @endif

                            </td>
                            <td>

                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Thao tác
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li> <a href="{{ route('customer.donhang.chitiet', $order->id) }}"
                                                class="dropdown-item">Chi tiết</a></li>
                                        <li>
                                            @if ($order->trang_thai != 6 && $order->trang_thai !=7)
                                                <form action="{{ route('customer.cancelOrder', $order->id) }}"
                                                    method="post" onsubmit="return confirm('Bạn có chắc muốn hủy không?')">
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">Hủy đơn hàng</button>
                                                </form>
                                            @endif

                                        </li>
                                        <li>
                                            @if ($order->trang_thai != 7 && $order->trang_thai != 6)
                                                <form action="{{ route('customer.getOrder', $order->id) }}" method="post"
                                                    onsubmit="return confirm('Bạn chắc chắn đã nhận được hàng?')">
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">Đã nhận hàng</button>
                                                </form>
                                            @endif
                                        </li>

                                    </ul>
                                </div>
        </div>

        </td>
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

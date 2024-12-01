@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Kết quả tra cứu giao dịch</h3>

    @if($response['vnp_ResponseCode'] == '00')
        <div class="alert alert-success">
            <strong>Thông báo:</strong> Tra cứu thành công!
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Thông tin</th>
                        <th>Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mã giao dịch</td>
                        <td>{{ $response['vnp_TxnRef'] }}</td>
                    </tr>
                    <tr>
                        <td>Thông tin đơn hàng</td>
                        <td>{{ $response['vnp_OrderInfo'] }}</td>
                    </tr>
                    <tr>
                        <td>Số tiền</td>
                        <td>{{ number_format($response['vnp_Amount'] / 100, 0, ',', '.') }} VND</td>
                    </tr>
                    <tr>
                        <td>Ngày thanh toán</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('YmdHis', $response['vnp_PayDate'])->format('d/m/Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>Mã ngân hàng</td>
                        <td>{{ $response['vnp_BankCode'] }}</td>
                    </tr>
                    <tr>
                        <td>Trạng thái giao dịch</td>
                        <td>{{ $response['vnp_TransactionStatus'] == '00' ? 'Thành công' : 'Thất bại' }}</td>
                    </tr>
                    <tr>
                        <td>Số giao dịch</td>
                        <td>{{ $response['vnp_TransactionNo'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @elseif($response['vnp_ResponseCode'] == '94')
        <div class="alert alert-warning">
            <strong>Thông báo:</strong> Thao tác quá nhanh, vui lòng thử lại sau!
        </div>
    @else
        <div class="alert alert-danger">
            <strong>Thông báo:</strong> Lỗi khi tra cứu giao dịch. Mã lỗi: {{ $response['vnp_ResponseCode'] }}
        </div>
    @endif

   
</div>
@endsection

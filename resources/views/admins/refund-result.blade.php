@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Kết Quả Hoàn Tiền</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Phản Hồi Từ VNPay</h5>
            <pre>{{ json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('refundForm') }}" class="btn btn-secondary">Quay Lại Form Hoàn Tiền</a>
    </div>
</div>
@endsection
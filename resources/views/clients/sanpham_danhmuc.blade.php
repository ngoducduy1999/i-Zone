@extends('layouts.client')

@section('content')
<h1>Sản phẩm theo danh mục</h1>

@if($sanPhams->isEmpty())
    <p>Không có sản phẩm nào trong danh mục này.</p>
@else
    <ul>
        @foreach($sanPhams as $sanPham)
            <li>{{ $sanPham->ten_san_pham }}</li>
        @endforeach
    </ul>
@endif
@endsection
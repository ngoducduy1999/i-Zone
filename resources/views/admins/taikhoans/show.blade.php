@extends('layouts.admin')

@section('title')

@endsection

@section('css')

@endsection

@section('content')

<div class="container card m-3">
<div class="mt-3 text-center">
    <h4>Chi Tiết Tài Khoản</h4>
</div>
<div>
    <div class="row">
        <div class="col-6">
            <form action="">
                <div class="mb-3">
                    <label for="" class="form-label">Tên tài khoản:</label>
                    <input type="text" class="form-control" value="{{$user->ten}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email:</label>
                    <input type="email" class="form-control" value="{{$user->email}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mật Khẩu:</label>
                    <input type="password" class="form-control" value="{{$user->mat_khau}}" disabled>
                </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" value="{{$user->so_dien_thoai}}" disabled>
                </div>
            </form>
        </div>
        <div class="col-6">
            <form action="">
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh đại diện:</label>
                    <img src="{{Storage::url($user->anh_dai_dien)}}" alt="ảnh đại diện" width="80px" class="rounded-circle">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Vai trò:</label>
                    <input type="text" class="form-control" value="{{$user->vai_tro}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">ngày sinh:</label>
                    <input type="text" class="form-control" value="{{$user->ngay_sinh}}" disabled>
                </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" value="{{$user->dia_chi}}" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="text-center mb-3">
        <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Quay lại</a>
    </div>

</div>
@endsection

@section('js')

@endsection

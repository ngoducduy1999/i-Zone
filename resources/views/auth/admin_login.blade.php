@extends('layouts.base')

@section('title', 'Đăng Nhập quản lý')

@section('content')
<div class="pt-0">
    <form action="{{ route('admin.login.post') }}" method="POST" class="my-4">
        @csrf
        <!-- Hiển thị lỗi xác thực -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group mb-3">
            <label for="emailaddress" class="form-label">Địa chỉ email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" name="email" required placeholder="Nhập email của bạn" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input class="form-control @error('mat_khau') is-invalid @enderror" type="password" id="password" name="mat_khau" required placeholder="Nhập mật khẩu của bạn">
            @error('mat_khau')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group d-flex mb-3">
            <div class="col-sm-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                    <label class="form-check-label" for="checkbox-signin">Ghi nhớ tôi</label>
                </div>
            </div>
            <div class="col-sm-6 text-end">
                <a class='text-muted fs-14' href='{{route('admin.password.request')}}'>Quên mật khẩu?</a>
            </div>
        </div>

        <div class="form-group mb-0 row">
            <div class="col-12">
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Đăng Nhập</button>
                </div>
            </div>
        </div>
        @if (Auth::check() && Auth::user()->vai_tro == 'staff')
            <div class="form-group mb-0 row pt-1">
                <div class="col-12">
                    <div class="d-grid">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" type="submit">Quay lại</a>
                    </div>
                </div>
            </div>
        @endif
    </form>
 </div>
@endsection

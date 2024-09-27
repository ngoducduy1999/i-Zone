@extends('layouts.base')

@section('title', 'Đặt lại mật khẩu')

@section('content')
    <div class="pt-0">
        {{-- Hiển thị thông báo thành công --}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        {{-- Hiển thị lỗi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form đặt lại mật khẩu -->
        <form method="POST" action="{{ route('admin.password.update') }}" class="my-4">
            @csrf

            {{-- Thêm token reset --}}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group mb-3">
                <label for="email" class="form-label">Địa chỉ email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email', request()->email) }}" required autofocus placeholder="Nhập email của bạn">
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Mật khẩu mới</label>
                <input class="form-control" type="password" id="password" name="password" required placeholder="Nhập mật khẩu mới">
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required placeholder="Nhập lại mật khẩu mới">
            </div>

            <div class="form-group mb-0 row">
                <div class="col-12">
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Đặt lại mật khẩu</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

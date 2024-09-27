@extends('layouts.base')

@section('title', 'Quên mật khẩu')

@section('content')
    <div class="pt-0">
        <form action="{{ route('admin.password.email') }}" method="POST" class="my-4">
            @csrf
            <div class="form-group mb-3">
                <label for="emailaddress" class="form-label">Địa chỉ email</label>
                <input class="form-control" type="email" name="email" id="emailaddress" required placeholder="Nhập email của bạn">
            </div>

            <div class="form-group mb-0 row">
                <div class="col-12">
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Khôi phục mật khẩu</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="text-center text-muted">
            <p class="mb-0">Đổi ý? 
                <a class="text-primary ms-2 fw-medium" href="{{ route('admin.login') }}">Quay lại đăng nhập</a>
            </p>
        </div>
    </div>
@endsection

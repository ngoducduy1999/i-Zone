@extends('layouts.base')

@section('title', 'Đăng Nhập')

@section('content')
<div class="pt-0">
    <form action="{{ route('login') }}" method="POST" class="my-4">
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
                <a class='text-muted fs-14' href='auth-recoverpw.html'>Quên mật khẩu?</a>
            </div>
        </div>

        <div class="form-group mb-0 row">
            <div class="col-12">
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Đăng Nhập</button>
                </div>
            </div>
        </div>
    </form>

    <div class="saprator my-4"><span>hoặc đăng nhập bằng</span></div>

    <div class="text-center text-muted mb-4">
        <p class="mb-0">Chưa có tài khoản? <a class='text-primary ms-2 fw-medium' href='{{ route('register') }}'>Đăng ký</a></p>
    </div>

    <div class="row">
        <div class="col-12">
            <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48" class="me-2">
                    <path fill="#ffc107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917"/><path fill="#ff3d00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691"/><path fill="#4caf50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44"/>
                    <path fill="#1976d2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917"/>
                </svg>
                <span>Đăng nhập với Google</span>
            </a>
        </div>

        <div class="col-12">
            <a class="btn btn-primary fw-normal d-flex align-items-center justify-content-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2">
                    <path fill="#ffffff" d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396z"/>
                </svg>
                <span>Đăng nhập với Facebook</span>
            </a>
        </div>

       
    </div>
</div>
@endsection

@extends('layouts.base')

@section('title', 'Đăng ký')

@section('page-title', 'Tạo Tài Khoản')

@section('content')
    <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
        <div class="pt-0">
            <form method="POST" action="{{ route('register') }}" class="my-4">
                @csrf
                <div class="form-group mb-3">
                    <label for="username" class="form-label">Tên người dùng</label>
                    <input class="form-control" name="ten" type="text" id="username" required="" placeholder="Nhập tên người dùng" value="{{ old('ten') }}">
                    @error('ten')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="emailaddress" class="form-label">Địa chỉ email</label>
                    <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Nhập địa chỉ email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input class="form-control" type="password" name="mat_khau" required="" id="password" placeholder="Nhập mật khẩu">
                    @error('mat_khau')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input class="form-control" type="tel" name="so_dien_thoai" id="phone" required="" placeholder="Nhập số điện thoại" value="{{ old('so_dien_thoai') }}">
                    @error('so_dien_thoai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="dob" class="form-label">Ngày sinh</label>
                    <input class="form-control" type="date" name="ngay_sinh" id="dob" required="" value="{{ old('ngay_sinh') }}">
                    @error('ngay_sinh')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group d-flex mb-3">
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Tôi đồng ý với <a href="#" class="text-primary fw-medium">Điều khoản và Điều kiện</a></label>
                        </div>
                    </div><!--end col-->
                </div>

                <div class="form-group mb-0 row">
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="saprator my-4"><span>hoặc đăng nhập với</span></div>

            <div class="text-center text-muted mb-4">
                <p class="mb-0">Đã có tài khoản? <a class='text-primary ms-2 fw-medium' href='{{ route('login') }}'>Đăng nhập tại đây</a></p>
            </div>
        </div>
    </div>

    <!-- Initialize intl-tel-input -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                // options here
                initialCountry: "VN",
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.min.js" // just for formatting/placeholders etc
            });
        });
    </script>
@endsection

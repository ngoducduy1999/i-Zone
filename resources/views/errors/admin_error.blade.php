@extends('layouts.base')

@section('title', 'Lỗi 404 ')

@section('content')
<!-- Bắt đầu trang -->
<div class="maintenance-pages">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center">
                    <div class="mb-5 text-center">
                        <a class='auth-logo' href='index.html'>
                            <img src="{{asset('assets/admin/images/logo-dark.png')}}" alt="logo-dark" class="mx-auto" height="28" />
                        </a>
                    </div>

                    <div class="maintenance-img">
                        <img src="{{asset('assets/admin/images/svg/404-error.svg')}}" class="img-fluid" alt="Không tìm thấy">
                    </div>
                    
                    <div class="text-center">
                        <h3 class="mt-5 fw-semibold text-black text-capitalize">Ôi! Không tìm thấy trang</h3>
                        <p class="text-muted">Trang bạn đang cố gắng truy cập không tồn tại hoặc đã được di chuyển. <br> Hãy thử quay lại trang chủ của chúng tôi.</p>
                    </div>

                    <a class='btn btn-primary mt-3 me-1' href='{{ route('admin.login') }}'>Quay về trang chủ</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

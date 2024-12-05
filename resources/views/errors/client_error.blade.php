@extends('layouts.client')

@section('content')
<main>
    <section class="tp-error-area pt-110 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="tp-error-content text-center">
                        <div class="tp-error-thumb">
                            <img src="{{ asset('assets/client/img/error/error.png') }}" alt="Lỗi">
                        </div>
                        <h3 class="tp-error-title">Ôi! Không tìm thấy trang</h3>
                        <p>Rất tiếc, có vẻ như trang bạn đang tìm kiếm không tồn tại.</p>
                        <a href="{{ route('trangchu') }}" class="tp-error-btn">Quay về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

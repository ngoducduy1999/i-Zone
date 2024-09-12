@extends('layouts.admin')
@section('title')
@section('content')
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">General Elements</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Floating Labels</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="ten_banner" class="form-label">Tên Banner</label>
                                    <input class="form-control" type="text" id="ten_banner" name="ten_banner" placeholder="Tên banner">
                                </div>
                                <div class="mb-3">
                                    <label for="anh_banner" class="form-label">Banner</label>
                                    <input class="form-control" type="file" id="anh_banner" name="anh_banner">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <h6 class="fs-15 mb-3">Selects</h6>
                                <img src="" alt="" id="banner" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        var anh_banner = document.querySelector('#anh_banner');
        var banner = document.querySelector('#banner');
        anh_banner.addEventListener('change', function(e) {
            e.preventDefault();
            banner.src = URL.createObjectURL(this.files[0])
        })
    </script>
@endsection

@extends('layouts.admin')

@section('content')
<div class="content">
        <!-- Bắt đầu nội dung -->
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Hồ sơ cá nhân</h4>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="align-items-center">
                            <div class="d-flex align-items-center">
                                @if ($profile->anh_dai_dien != '')
                                <img src="{{ asset('storage/' .$profile->anh_dai_dien) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="Ảnh đại diện">
                                @else
                                <img src="{{ asset('assets/admin/images/profiles/profile-11.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="Ảnh đại diện">
                                @endif

                                <div class="overflow-hidden ms-4">
                                    <h4 class="m-0 text-dark fs-20">{{ $profile->ten }}</h4>
                                    <p class="my-1 text-muted fs-16">{{ $profile->vai_tro }}</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="profile_about_tab" data-bs-toggle="tab" href="#profile_about" role="tab">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">Thông tin</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="setting_tab" data-bs-toggle="tab" href="#profile_setting" role="tab">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-school"></i></span>
                                    <span id="settingsTitle" class="d-none d-sm-block">Cài đặt</span> </a>
                            </li>
                        </ul>

                        <div class="tab-content text-muted bg-white">
                            <div class="tab-pane active show pt-4" id="profile_about" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-md-6 mb-4">
                                        <div class="">
                                            <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Giới thiệu</h5>
                                            <p>
                                                Họ và tên: {{$profile->ten}}
                                            </p>
                                            <p>
                                                Ngày sinh: {{$profile->ngay_sinh}}
                                            </p>
                                            <p>
                                                Chức vụ: {{$profile->vai_tro}}
                                            </p>
                                        </div>

                                        <div class="skills-details mt-3">
                                            <h6 class="text-uppercase fs-13">Các chức năng:</h6>

                                            <div class="d-flex flex-wrap gap-2">
                                                <span class="badge bg-light px-3 text-dark py-2 fw-semibold">Quản lý nhân viên</span>
                                                <span class="badge bg-light px-3 text-dark py-2 fw-semibold">Quản lý khách hàng</span>
                                                <span class="badge bg-light px-3 text-dark py-2 fw-semibold">Quản lý sản phẩm</span>
                                                <span class="badge bg-light px-3 text-dark py-2 fw-semibold">Quản lý đơn hàng</span>
                                                <span class="badge bg-light px-3 text-dark py-2 fw-semibold">Quản lý khuyến mãi</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-md-6 mb-4">
                                        <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Liên hệ</h5>

                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-lg-4">
                                                <div class="profile-email">
                                                    <h6 class="text-uppercase fs-13">Email</h6>
                                                    <a href="https://mail.google.com/mail/u/0/?pli=1&view=cm&fs=1&tf=1&to={{ $profile->email }}" class="text-primary fs-14 text-decoration-underline" target="_blank">
                                                        {{ $profile->email }}
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-lg-4">
                                                <div class="profile-email">
                                                    <h6 class="text-uppercase fs-13">Địa chỉ</h6>
                                                    <a href="#" class="fs-14">{{ $profile->dia_chi }}</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="skills-details mt-3">
                                            <h6 class="text-uppercase fs-13">Số điện thoại</h6>

                                            <div class="d-flex flex-wrap gap-2">
                                                <span class="badge bg-light px-3 py-2 text-dark fw-semibold">{{ $profile->so_dien_thoai }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane pt-4" id="profile_setting" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card border mb-0">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h4 class="card-title mb-0">Thông tin cá nhân</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="form-group mb-3 row">
                                                    <form action="{{ route('admin.updateProfile', $profile->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <label class="form-label">Họ và tên</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input type="text" name="ten" id="ten" class="form-control" value="{{ old('ten', $profile->ten) }}">
                                                        </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Số điện thoại</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="mdi mdi-phone-outline"></i></span>
                                                            <input class="form-control" type="text" name="so_dien_thoai" id="so_dien_thoai" placeholder="Số điện thoại" value="{{ old('so_dien_thoai', $profile->so_dien_thoai) }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Địa chỉ email</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $profile->email) }}" placeholder="Email" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="anh_dai_dien">Ảnh đại diện</label>
                                                    <input type="file" name="anh_dai_dien" id="anh_dai_dien" class="form-control" onchange="previewImage(event)">
                                                    @if ($profile->anh_dai_dien)
                                                    <div class="current-image mt-2">
                                                        <img src="{{ asset('storage/' . $profile->anh_dai_dien) }}" alt="Ảnh đại diện" style="width: 100px;  margin-top: 10px;" id="current-image">
                                                    </div>
                                                    @endif
                                                    <div id="image-preview" class="mt-2"></div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tinh">Tỉnh/Thành phố</label>
                                                    <select name="tinh" id="tinh" class="form-control">
                                                        <option value="">Chọn tỉnh/thành phố</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="huyen">Huyện/Quận</label>
                                                    <select name="huyen" id="huyen" class="form-control">
                                                        <option value="">Chọn huyện/quận</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="xa">Xã/Phường</label>
                                                    <select name="xa" id="xa" class="form-control">
                                                        <option value="">Chọn xã/phường</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="so_nha">Số nhà</label>
                                                    <input type="text" name="so_nha" id="so_nha" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="dia_chi">Địa chỉ</label>
                                                    <textarea name="dia_chi" id="dia_chi" class="form-control">{{ old('dia_chi', $profile->dia_chi) }}</textarea>
                                                </div>
                                                <button type="submit" id="updateProfileBtn" class="btn btn-primary mt-2">Cập nhật</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card border mb-0">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Đổi mật khẩu</h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('admin.profile.updatePassword') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Mật khẩu cũ</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input type="password" name="current_password" id="current_password" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Mật khẩu mới</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input type="password" name="new_password" id="new_password" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Xác nhận mật khẩu mới</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                                                        </div>
                                                    </div>

                                                    <button type="submit" id="changePasswordBtn" class="btn btn-primary">Đổi mật khẩu</button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- kết thúc tab-pane -->
                        </div>
                    </div> <!-- kết thúc card-body -->
                </div> <!-- kết thúc card -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Fetch tỉnh
        fetch("https://provinces.open-api.vn/api/p")
            .then(response => response.json())
            .then(data => {
                const tinhSelect = document.getElementById("tinh");
                data.forEach(tinh => {
                    const option = document.createElement("option");
                    option.value = tinh.code;
                    option.textContent = tinh.name;
                    tinhSelect.appendChild(option);
                });

                // Chọn tỉnh mặc định
                tinhSelect.value = "{{ old('tinh', $profile->tinh) }}";
                tinhSelect.dispatchEvent(new Event('change'));
            })
            .catch(error => console.error("Error fetching provinces:", error));

        // Fetch huyện dựa trên tỉnh đã chọn
        document.getElementById('tinh').addEventListener('change', function() {
            const tinhCode = this.value;
            fetch(`https://provinces.open-api.vn/api/p/${tinhCode}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    const huyenSelect = document.getElementById("huyen");
                    huyenSelect.innerHTML = '<option value="">Chọn huyện/quận</option>';
                    data.districts.forEach(huyen => {
                        const option = document.createElement("option");
                        option.value = huyen.code;
                        option.textContent = huyen.name;
                        huyenSelect.appendChild(option);
                    });

                    // Chọn huyện mặc định
                    huyenSelect.value = "{{ old('huyen', $profile->huyen) }}";
                    huyenSelect.dispatchEvent(new Event('change'));
                })
                .catch(error => console.error("Error fetching districts:", error));
        });

        // Fetch xã dựa trên huyện đã chọn
        document.getElementById('huyen').addEventListener('change', function() {
            const huyenCode = this.value;
            fetch(`https://provinces.open-api.vn/api/d/${huyenCode}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    const xaSelect = document.getElementById("xa");
                    xaSelect.innerHTML = '<option value="">Chọn xã/phường</option>';
                    data.wards.forEach(xa => {
                        const option = document.createElement("option");
                        option.value = xa.code;
                        option.textContent = xa.name;
                        xaSelect.appendChild(option);
                    });

                    // Chọn xã mặc định
                    xaSelect.value = "{{ old('xa', $profile->xa) }}";
                })
                .catch(error => console.error("Error fetching wards:", error));
        });

        // Cập nhật địa chỉ hoàn chỉnh
        function capNhatDiaChi() {
            const soNha = document.getElementById("so_nha").value;
            const tinh = document.getElementById("tinh");
            const huyen = document.getElementById("huyen");
            const xa = document.getElementById("xa");

            const diaChi = `${soNha ? soNha + ', ' : ''}${xa.options[xa.selectedIndex].text}, ${huyen.options[huyen.selectedIndex].text}, ${tinh.options[tinh.selectedIndex].text}`;
            document.getElementById("dia_chi").value = diaChi;
        }

        document.getElementById('so_nha').addEventListener('input', capNhatDiaChi);
        document.getElementById('xa').addEventListener('change', capNhatDiaChi);
    });
    $(document).ready(function() {
        // Khi nhấn nút "Đổi mật khẩu"
        $('#changePasswordBtn').click(function() {
            // Hiển thị phần "Cài đặt"
            $('#settingsTitle').removeClass('d-none');

            // Ẩn phần cập nhật thông tin và hiển thị phần đổi mật khẩu
            $('#profileUpdateSection').addClass('d-none');
            $('#passwordChangeSection').removeClass('d-none');
        });

        // Khi nhấn nút "Cập nhật"
        $('#updateProfileBtn').click(function() {
            // Hiển thị phần "Cài đặt"
            $('#settingsTitle').removeClass('d-none');

            // Ẩn phần đổi mật khẩu và hiển thị phần cập nhật thông tin
            $('#passwordChangeSection').addClass('d-none');
            $('#profileUpdateSection').removeClass('d-none');
        });
    });
</script>
@endsection
@extends('layouts.admin')

@section('title')
    Thêm nhân viên
@endsection

@section('css')
    <!-- Thêm CSS nếu cần -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Tạo tài khoản mới</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <!-- Form tạo tài khoản -->
            <form class="row g-3" action="{{ route('admin.nhanviens.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Tên -->
                <div class="col-md-6">
                    <label for="ten" class="form-label">Tên</label>
                    <input type="text" name="ten" class="form-control @error('ten') is-invalid @enderror" id="ten" value="{{ old('ten') }}" required>
                    @error('ten')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Mật khẩu -->
                <div class="col-md-6">
                    <label for="mat_khau" class="form-label">Mật khẩu</label>
                    <input type="password" name="mat_khau" class="form-control @error('mat_khau') is-invalid @enderror" id="mat_khau" required>
                    @error('mat_khau')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="col-md-6">
                    <label for="mat_khau_confirmation" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="mat_khau_confirmation" class="form-control" id="mat_khau_confirmation" required>
                </div>

                <!-- Ngày sinh -->
                <div class="col-md-6">
                    <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                    <input type="date" name="ngay_sinh" class="form-control @error('ngay_sinh') is-invalid @enderror" id="ngay_sinh" value="{{ old('ngay_sinh') }}" required>
                    @error('ngay_sinh')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Số điện thoại -->
                <div class="col-md-6">
                    <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                    <input type="text" name="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" id="so_dien_thoai" value="{{ old('so_dien_thoai') }}">
                    @error('so_dien_thoai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Ảnh đại diện -->
                <div class="col-md-6">
                    <label for="anh_dai_dien" class="form-label">Ảnh đại diện</label>
                    <input type="file" name="anh_dai_dien" class="form-control @error('anh_dai_dien') is-invalid @enderror" id="anh_dai_dien" accept="image/*">
                    @error('anh_dai_dien')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="vai_tro" class="form-label">Vai trò</label>
                    <select name="vai_tro" class="form-select @error('vai_tro') is-invalid @enderror" id="vai_tro" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ old('vai_tro') == $role->name ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </select>
                    @error('vai_tro')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                

                <!-- Tỉnh thành -->
                <div class="col-md-6">
                    <label for="tinh" class="form-label">Tỉnh</label>
                    <select name="tinh" id="tinh" class="form-select">
                        <option value="">Chọn tỉnh</option>
                    </select>
                </div>

                <!-- Huyện -->
                <div class="col-md-6">
                    <label for="huyen" class="form-label">Huyện</label>
                    <select name="huyen" id="huyen" class="form-select">
                        <option value="">Chọn huyện</option>
                    </select>
                </div>

                <!-- Xã -->
                <div class="col-md-6">
                    <label for="xa" class="form-label">Xã</label>
                    <select name="xa" id="xa" class="form-select">
                        <option value="">Chọn xã</option>
                    </select>
                </div>

                <!-- Số nhà -->
                <div class="col-md-6">
                    <label for="so_nha" class="form-label">Số nhà</label>
                    <input type="text" name="so_nha" class="form-control @error('so_nha') is-invalid @enderror" id="so_nha" value="{{ old('so_nha') }}">
                    @error('so_nha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Địa chỉ -->
                <div class="col-md-12">
                    <label for="dia_chi" class="form-label">Địa chỉ</label>
                    <input type="text" name="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" id="dia_chi" value="{{ old('dia_chi') }}">
                    @error('dia_chi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Tạo tài khoản</button>
                </div>
            </form>
        </div> <!-- end card-body -->
    </div> <!-- end card-->
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
            })
            .catch(error => console.error("Error fetching provinces:", error));

            // Fetch huyện dựa trên tỉnh đã chọn
            document.getElementById('tinh').addEventListener('change', function() {
                const tinhCode = this.value;
                fetch(`https://provinces.open-api.vn/api/p/${tinhCode}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    const huyenSelect = document.getElementById("huyen");
                    huyenSelect.innerHTML = '<option value="">Chọn huyện</option>';
                    data.districts.forEach(huyen => {
                        const option = document.createElement("option");
                        option.value = huyen.code;
                        option.textContent = huyen.name;
                        huyenSelect.appendChild(option);
                    });
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
                    xaSelect.innerHTML = '<option value="">Chọn xã</option>';
                    data.wards.forEach(xa => {
                        const option = document.createElement("option");
                        option.value = xa.code;
                        option.textContent = xa.name;
                        xaSelect.appendChild(option);
                    });
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
    </script>
@endsection

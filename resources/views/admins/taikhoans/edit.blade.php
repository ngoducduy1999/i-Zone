@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Chỉnh Sửa Người Dùng</h1>

    <form action="{{ route('admin.taikhoans.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ten">Tên</label>
            <input type="text" name="ten" id="ten" class="form-control" value="{{ old('ten', $user->ten) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="mat_khau">Mật khẩu (để trống nếu không thay đổi)</label>
            <input type="password" name="mat_khau" id="mat_khau" class="form-control">
        </div>

        <div class="form-group">
            <label for="so_dien_thoai">Số điện thoại</label>
            <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}">
        </div>

        <div class="form-group">
            <label for="anh_dai_dien">Ảnh đại diện</label>
            <input type="file" name="anh_dai_dien" id="anh_dai_dien" class="form-control" onchange="previewImage(event)">
            @if ($user->anh_dai_dien)
                <div class="current-image mt-2">
                    <img src="{{ asset('storage/' . $user->anh_dai_dien) }}" alt="Ảnh đại diện" style="width: 100px; height: 100px; margin-top: 10px;" id="current-image">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeCurrentImage()">X</button>
                </div>
            @endif
            <div id="image-preview" class="mt-2"></div>
        </div>

        <div class="form-group">
            <label for="so_nha">Số nhà</label>
            <input type="text" name="so_nha" id="so_nha" class="form-control" value="{{ old('so_nha') }}">
        </div>

        <div class="form-group">
            <label for="tinh">Tỉnh/Thành phố</label>
            <select name="tinh" id="tinh" class="form-control">
                <option value="">Chọn tỉnh/thành phố</option>
                <!-- Options will be filled dynamically -->
            </select>
        </div>

        <div class="form-group">
            <label for="huyen">Huyện/Quận</label>
            <select name="huyen" id="huyen" class="form-control">
                <option value="">Chọn huyện/quận</option>
                <!-- Options will be filled dynamically -->
            </select>
        </div>

        <div class="form-group">
            <label for="xa">Xã/Phường</label>
            <select name="xa" id="xa" class="form-control">
                <option value="">Chọn xã/phường</option>
                <!-- Options will be filled dynamically -->
            </select>
        </div>

        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <textarea name="dia_chi" id="dia_chi" class="form-control">{{ old('dia_chi', $user->dia_chi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật Người Dùng</button>
    </form>
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
            tinhSelect.value = "{{ old('tinh', $user->tinh) }}";
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
                huyenSelect.value = "{{ old('huyen', $user->huyen) }}";
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
                xaSelect.value = "{{ old('xa', $user->xa) }}";
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

    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('image-preview');
        preview.innerHTML = ''; // Clear previous preview

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.marginTop = '10px';
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    }

    function removeCurrentImage() {
        const currentImage = document.getElementById('current-image');
        currentImage.style.display = 'none';
        document.querySelector('input[name="remove_anh_dai_dien"]').value = '1';
    }
</script>
@endsection

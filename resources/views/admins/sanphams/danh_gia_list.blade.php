<div class="row mb-4">
    <h5 class="text-center">Danh sách đánh giá</h5> <!-- Tiêu đề cho phần đánh giá -->
    <div class="col-12">
        @if ($danhgias->isEmpty()) <!-- Kiểm tra nếu danh sách đánh giá trống -->
            <p class="text-center text-muted">Không có đánh giá nào</p>
        @else
            @foreach ($danhgias as $danhgia)
                @if ($danhgia->user)
                    <div class="d-flex align-items-start my-3 border p-3 rounded shadow-sm">
                        <img src="{{ asset('storage/' . $danhgia->user->anh_dai_dien) }}" class="rounded-pill me-3" alt="Avatar của {{ $danhgia->user->ten }}" width="40" height="40">
                        <div class="flex-grow-1">
                            <strong>{{ $danhgia->user->ten }}</strong>
                            <p class="m-0 text-muted">
                                {{ $danhgia->created_at ? $danhgia->created_at->format('H:i d/m/Y') : 'Chưa xác định' }}
                            </p>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= $danhgia->diem_so ? 'text-warning' : 'text-muted' }}">★</span>
                                @endfor
                            </div>
                            <p class="mt-2">{{ $danhgia->nhan_xet }}</p>
                        </div>
                    </div>
                @else
                <div class="d-flex align-items-start my-3 border p-3 rounded shadow-sm">
                    <img src="" class="rounded-pill me-3" alt="Avatar của " width="40" height="40">
                    <div class="flex-grow-1">
                        <strong>Người dùng không còn hoạt động</strong>
                        <p class="m-0 text-muted">
                            {{ $danhgia->created_at ? $danhgia->created_at->format('H:i d/m/Y') : 'Chưa xác định' }}
                        </p>
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $danhgia->diem_so ? 'text-warning' : 'text-muted' }}">★</span>
                            @endfor
                        </div>
                        <p class="mt-2">{{ $danhgia->nhan_xet }}</p>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
    </div>
  
</div>
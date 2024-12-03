@if (Auth::user() && Auth::user()->sanPhamYeuThichs())
    @foreach (Auth::user()->sanPhamYeuThichs()->get() as $love)
        @if ($love)
            <tr>
                <!-- img -->
                <td class="tp-cart-img"><a href="{{ route('chitietsanpham', $love->id) }}">
                        <img src="{{ asset($love->anh_san_pham) }}" alt="{{ $love->ten_san_pham ?? '...' }}"></a></td>
                <!-- title -->
                <td class="tp-cart-title"
                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50px;">
                    <a href="{{ route('chitietsanpham', $love->id) }}"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50px;">{{ $love->ten_san_pham ?? '...' }}</a>
                </td>
                <!-- price -->
                <td class="tp-cart-price">
                </td>
                <td class="tp-cart-price">
                    @foreach ($danhMucs as $danhMuc)
                        @if ($love->danh_muc_id == $danhMuc->id)
                            <a href="">
                                <span>
                                    {{ $danhMuc->ten_danh_muc ?? '...' }}
                                </span>
                            </a>
                        @endif
                    @endforeach
                </td>

                <!-- action -->
                <td class="tp-cart-action">
                    <button class="tp-cart-action-btn" onclick="deleteLove({{ $love->id }})">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                fill="currentColor" />
                        </svg>
                        <span>Xóa</span>
                    </button>
                </td>
            </tr>
        @endif
    @endforeach
@endif

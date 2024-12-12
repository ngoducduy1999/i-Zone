<div class="col-xl-9 col-lg-8">
    <div class="tp-cart-list mb-25 mr-30">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2" class="tp-cart-header-product">Sản phẩm</th>
                    <th class="tp-cart-header-price">Loại sản phẩm</th>
                    <th class="tp-cart-header-price">Giá</th>
                    <th class="tp-cart-header-quantity">Số lượng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (Session::has('cart') != null)
                    @foreach (Session::get('cart')->products as $idbt => $product)
                        <tr data-id="{{ $idbt }}">
                            <!-- img -->
                            <td class="tp-cart-img">
                                <a href="{{ route('chitietsanpham', $product['productInfo']->id) }}">
                                    <img src="{{ asset($product['productInfo']->anh_san_pham) }}"
                                        alt="{{ $product['productInfo']->ten_san_pham ?? 'Product Image' }}">
                                </a>
                            </td>
                            <!-- title -->
                            <td class="tp-cart-title"
                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
                                <a
                                    href="{{ route('chitietsanpham', $product['productInfo']->id) }}">{{ isset($product['productInfo']->ten_san_pham) ? $product['productInfo']->ten_san_pham : 'Tên sản phẩm không có' }}</a>
                            </td>
                            <!-- type -->
                            <td class="tp-cart-price">
                                <span class="text-primary">
                                    {{ isset($product['bienthe']->dungLuong) ? $product['bienthe']->dungLuong->ten_dung_luong : '...' }}
                                </span>
                                <span class="cartmini__quantity">
                                    x
                                    {{ isset($product['bienthe']->mauSac) ? $product['bienthe']->mauSac->ten_mau_sac : '...' }}
                                </span>
                            </td>
                            <!-- price -->
                            <td class="tp-cart-price">
                                <span>{{ isset($product['bienthe']->gia_moi)
                                    ? number_format($product['bienthe']->gia_moi, 0, ',', '.') . ' VNĐ'
                                    : 'Chưa có giá' }}</span>
                            </td>
                            <!-- quantity -->
                            <td class="tp-cart-quantity">
                                <div class="tp-product-quantity mt-10 mb-10">
                                    <span class="tp-cart-minus cart-minus">
                                        <svg width="10" height="2" viewBox="0 0 10 2" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1H9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    {{-- <input class="tp-cart-input" type="text"
                                        value="{{ isset($product['quantity']) ? $product['quantity'] : 0 }}"> --}}
                                    <input class="tp-cart-input cart-quantity" type="text"
                                        value="{{ isset($product['quantity']) ? $product['quantity'] : 0 }}"
                                        data-max-quantity="{{ $product['bienthe']->so_luong }}">
                                    <span class="tp-cart-plus cart-plus">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 1V9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 5H9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </td>
                            <!-- action -->
                            <td class="tp-cart-action">
                                <button class="tp-cart-action-btn" onclick="DeleteItemCart({{ $idbt }})">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                            fill="currentColor" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="tp-cart-bottom">
        <div class="row align-items-end">
            <div class="col-xl-6 col-md-8">
                <div class="tp-cart-coupon">
                    {{-- <form action="#"> --}}
                    <div class="tp-cart-coupon-input-box">
                        <label>Mã khuyễn mãi:</label>
                        <div class="tp-cart-coupon-input d-flex align-items-center">
                            <input type="text" id="discount-code" placeholder="Nhập mã khuyến mãi">
                            <button onclick="discount()" style="font-size: 15px">Áp dụng</button>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
            <div class="col-xl-6 col-md-4">
                <div class="tp-cart-update text-md-end">
                    {{-- <button type="button" class="tp-cart-update-btn">Update Cart</button> --}}
                    <a href="{{ route('trangchu') }}" type="button" class="tp-cart-update-btn">Đi đến mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-4 col-md-6">
    <div class="tp-cart-checkout-wrapper">
        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
            <span class="tp-cart-checkout-top-title">Tổng phụ</span>
            <span class="tp-cart-checkout-top-price" style="font-size: 16px">
                {{ isset(Session::get('cart')->totalPrice) ? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : '0' }}
                VNĐ
            </span>
        </div>
        <div class="tp-cart-checkout-shipping">
            {{-- <h4 class="tp-cart-checkout-shipping-title">Shipping</h4> --}}

            <div class="tp-cart-checkout-shipping-option-wrapper">
                <div class="tp-cart-checkout-shipping-option text-black">
                    Mã giảm giá:
                    @if (Session::get('discount_code'))
                        <span class="text-dark">
                            {{ Session::get('discount_code') }}
                        </span>
                        <button onclick="DeleteDiscount()">x</button>
                    @endif
                </div>
                <div class="tp-cart-checkout-shipping-option text-black">
                    Giảm giá:
                    @if (Session::get('discount_code'))
                        @php
                            $discountCode = Session::get('discount_code');
                            $discount = Session::get('discount_percentage');
                            $maxDiscount = Session::get('maxDiscount');
                            $discountAmount = Session::get('cart')->totalPrice * ($discount / 100);
                            if ($maxDiscount > 0 && $maxDiscount != null && $maxDiscount <= $discountAmount) {
                                $discountAmount = $maxDiscount;
                            } elseif ($maxDiscount <= 0) {
                                $discountAmount = 0;
                            }
                        @endphp
                        <span class="text-danger">
                            {{ number_format($discountAmount, 0, ',', '.') }} VNĐ
                        </span>
                    @else
                        <span class="text-danger">
                            0 đ
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
            <span>Còn lại</span>
            @if (isset($discount))
                <span>
                    @php
                        $total = Session::get('cart')->totalPrice - $discountAmount;
                        $total = $total > 0 ? number_format($total, 2, ',', '.') : 0;
                    @endphp
                    {{ isset($total) ? $total : 0 }}
                    VNĐ
                </span>
            @else
                <span>
                    {{ isset(Session::get('cart')->totalPrice) ? number_format(Session::get('cart')->totalPrice, 2, ',', '.') : 0 }}
                    VNĐ
                </span>
            @endif

        </div>
        <div class="tp-cart-checkout-proceed">
            <a href="{{ route('thanhtoan') }}" class="tp-cart-checkout-btn w-100">Tiến hành thanh toán</a>
        </div>
    </div>
</div>
<input type="hidden" name="" id="total-quantity-list-cart"
    value="{{ isset(Session::get('cart')->totalProduct) ? Session::get('cart')->totalProduct : 0 }}">
<script src="{{ asset('assets/client/js/main.js') }}"></script>

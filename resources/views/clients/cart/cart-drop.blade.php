@if (Session::has('cart') != null)
    <div class="cartmini__top-wrapper">
        <div class="cartmini__top p-relative">
            <div class="cartmini__top-title">
                <h4>Shopping cart</h4>
            </div>
            <div class="cartmini__close">
                <button type="button" class="cartmini__close-btn cartmini-close-btn"><i class="fal fa-times"></i></button>
            </div>
        </div>
        <div class="cartmini__widget">
            @foreach (Session::get('cart')->products as $idbt => $product)
                <div class="cartmini__widget-item">
                    <div class="cartmini__thumb">
                        <a href="{{ route('chitietsanpham', $product['productInfo']->id) }}">
                            <img src="{{ asset($product['productInfo']->anh_san_pham) }}"
                                alt="{{ $product['productInfo']->ten_san_pham ?? 'Product Image' }}">
                        </a>
                    </div>
                    <div class="cartmini__content">
                        <h5 class="cartmini__title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                            <a href="{{ route('chitietsanpham', $product['productInfo']->id) }}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                {{ isset($product['productInfo']->ten_san_pham) ? $product['productInfo']->ten_san_pham : 'Tên sản phẩm không có' }}
                            </a>
                        </h5>
                        <div class="cartmini__price-wrapper">
                            <span class="cartmini__price">
                                {{ isset($product['bienthe']->gia_moi)
                                    ? number_format($product['bienthe']->gia_moi, 0, ',', '.') . ' VNĐ'
                                    : 'Chưa có giá' }}
                            </span>
                            <span class="cartmini__quantity">
                                x {{ isset($product['quantity']) ? $product['quantity'] : '...' }}
                            </span>
                        </div>
                        <div class="cartmini__price-wrapper">
                            <span>
                                {{ isset($product['bienthe']->dungLuong) ? $product['bienthe']->dungLuong->ten_dung_luong : '...' }}
                            </span>

                            <span class="cartmini__quantity">
                                x
                                {{ isset($product['bienthe']->mauSac) ? $product['bienthe']->mauSac->ten_mau_sac : '...' }}
                            </span>
                        </div>
                    </div>
                    <button class="cartmini__del"><i class="fa-regular fa-xmark"
                            data-idbt="{{ $idbt }}"></i></button>
                </div>
            @endforeach
        </div>
    </div>
    <div class="cartmini__checkout">
        <div class="cartmini__checkout-title mb-30">
            <h4>Total price:</h4>
            <span>
                {{ isset(Session::get('cart')->totalPrice) ? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : '0' }}
                VNĐ
            </span>
            <input type="number" hidden name="" id="total-quantity-cart"
                value="{{ isset(Session::get('cart')->totalProduct) ? Session::get('cart')->totalProduct : 0 }}">
        </div>
        <div class="cartmini__checkout-title mb-30">
            <h4>Total product:</h4>
            <span>
                {{ isset(Session::get('cart')->totalProduct) ? Session::get('cart')->totalProduct : 0 }}
            </span>
        </div>
        <div class="cartmini__checkout-btn">
            <a href="#" class="tp-btn mb-10 w-100"> view cart</a>
            <a href="checkout.html" class="tp-btn tp-btn-border w-100"> checkout</a>
        </div>
    </div>
@else
    <div class="cartmini__empty text-center">
        <img src="{{ asset('assets/client/img/product/cartmini/empty-cart.png') }}" alt="">
        <p>Your Cart is empty</p>
        <a href="{{ route('trangchu') }}" class="tp-btn">Go to Shop</a>
        <input type="number" hidden name="" id="total-quantity-cart"
            value="{{ isset(Session::get('cart')->totalProduct) ? Session::get('cart')->totalProduct : 0 }}">
    </div>
@endif

<script src="{{ asset('assets/client/js/main.js') }}"></script>

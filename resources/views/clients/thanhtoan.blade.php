@extends('layouts.client')

@section('content')
    <!-- khu vực breadcrumb bắt đầu -->
    <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
        <div class="container">
           <div class="row">
              <div class="col-xxl-12">
                 <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Thanh toán</h3>
                    <div class="breadcrumb__list">
                       <span><a href="#">Trang chủ</a></span>
                       <span>Thanh toán</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- khu vực breadcrumb kết thúc -->

     <!-- khu vực thanh toán bắt đầu -->
     <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
        <div class="container">
           <div class="row">
              <div class="col-xl-7 col-lg-7">
                 <div class="tp-checkout-verify">
                    <div class="tp-checkout-verify-item">
                       <p class="tp-checkout-verify-reveal">Khách hàng quay lại? <button type="button" class="tp-checkout-login-form-reveal-btn">Nhấn vào đây để đăng nhập</button></p>

                       <div id="tpReturnCustomerLoginForm" class="tp-return-customer">
                          <form action="#">
                             <div class="tp-return-customer-input">
                                <label>Email</label>
                                <input type="text" placeholder="Email của bạn">
                             </div>
                             <div class="tp-return-customer-input">
                                <label>Mật khẩu</label>
                                <input type="password" placeholder="Mật khẩu">
                             </div>

                             <div class="tp-return-customer-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                                <div class="tp-return-customer-remeber">
                                   <input id="remeber" type="checkbox">
                                   <label for="remeber">Ghi nhớ tôi</label>
                                </div>
                                <div class="tp-return-customer-forgot">
                                   <a href="forgot.html">Quên mật khẩu?</a>
                                </div>
                             </div>
                             <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Đăng nhập</button>
                          </form>
                       </div>
                    </div>
                    <div class="tp-checkout-verify-item">
                       <p class="tp-checkout-verify-reveal">Có mã giảm giá? <button type="button" class="tp-checkout-coupon-form-reveal-btn">Nhấn vào đây để nhập mã</button></p>

                       <div id="tpCheckoutCouponForm" class="tp-return-customer">
                        <form action="{{ route('applyDiscount') }}" method="POST">
                           @csrf
                           <div class="tp-return-customer-input">
                               <label>Mã giảm giá:</label>
                               <input type="text" name="discount_code" placeholder="Mã giảm giá" required>
                           </div>
                           <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Áp dụng</button>
                       </form>
                       
                       @if (session('success'))
                           <div class="alert alert-success">
                               {{ session('success') }}
                           </div>
                       @endif
                       
                       @if (session('error'))
                           <div class="alert alert-danger">
                               {{ session('error') }}
                           </div>
                       @endif
                       
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-lg-7">
                 <div class="tp-checkout-bill-area">
                    <h3 class="tp-checkout-bill-title">Chi tiết thanh toán</h3>

                    <div class="tp-checkout-bill-form">
                       <form id="orderForm">
                          <div class="tp-checkout-bill-inner">
                             <div class="row">
                                <div class="col-md-12">
                                   <div class="tp-checkout-input">
                                      <label>Liên hệ <span>*</span></label>
                                      <input type="text" id="name" placeholder="Họ và tên" required>
                                   </div>
                                   <div class="tp-checkout-input">
                                      <input type="text" id="phone" placeholder="Số điện thoại" required>
                                   </div>
                                </div>
                                <div class="col-md-12">
                                 <div class="tp-checkout-input">
                                    <input type="text" id="email" placeholder="Email" required>
                                 </div>
                              </div>
                                <div class="col-md-12">
                                   <div class="tp-checkout-input">
                                      <label>Địa chỉ </label>
                                      <input type="text" id="address" placeholder="Tỉnh/Thành phố, Quận/Huyện, Phường/Xã" required>
                                   </div>
                                   <div class="tp-checkout-input">
                                      <input type="text" id="street" placeholder="Tên đường, Tòa nhà, Số nhà." required>
                                   </div>
                                </div>

                                <div class="col-md-12">
                                   <div class="tp-checkout-input">
                                      <label>Ghi chú đơn hàng (tùy chọn)</label>
                                      <textarea id="note" placeholder="Ghi chú về đơn hàng của bạn, ví dụ như các yêu cầu đặc biệt khi giao hàng."></textarea>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </form>
                    </div>
                 </div>
              </div>
              <div class="col-lg-5">
                 <div class="tp-checkout-place white-bg">
                    <h3 class="tp-checkout-place-title">Đơn hàng của bạn</h3>

                    <div class="tp-order-info-list">
                       <ul>
                          <li class="tp-order-info-list-header">
                             <h4>Sản phẩm</h4>
                             <h4>Tổng</h4>
                          </li>
                          @foreach($cart->products as $product)
                          <li class="tp-order-info-list-desc">
                             <p>{{ $product['productInfo']->ten_san_pham }}  <span> x  {{ $product['quantity'] }}</span></p>
                             <span>{{ number_format($product['quantity'] * $product['bienthe']->gia_moi) }} VND</span>
                          </li>
                          @endforeach
                          <li class="tp-order-info-list-subtotal">
                             <span>Tổng phụ</span>
                             <span>{{ number_format($cart->totalPrice) }} VND</span>
                          </li>
                          <li class="tp-order-info-list-discount">
                             <span>Mã giảm giá</span>
                             <span>- {{ number_format($discountAmount, 0, ',', '.') }} VND</span>
                          </li>
                          <li class="tp-order-info-list-shipping">
                             <span>Vận chuyển</span>
                             <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                <span>
                                   <input id="flat_rate" type="radio" name="shipping">
                                   <label for="flat_rate">Giao hàng tận nơi: 50.000 VNĐ</label>
                                </span>
                                <span>
                                   <input id="free_shipping" type="radio" name="shipping">
                                   <label for="free_shipping">Miễn phí vận chuyển</label>
                                </span>
                             </div>
                          </li>
                          <li class="tp-order-info-list-total">
                             <span>Tổng đơn hàng</span>
                             <span>{{ number_format($discountedTotal, 0, ',', '.') }} VND</span>
                          </li>
                       </ul>
                    </div>

                    <div class="tp-checkout-payment">
                       <h3 class="tp-checkout-payment-title">Phương thức thanh toán</h3>

                       <div class="tp-checkout-payment-item">
                        <input id="direct-bank-transfer" type="radio" name="payment" value="online" required>
                        <label for="direct-bank-transfer">Chuyển khoản ngân hàng</label>
                        <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn như một mã tham chiếu thanh toán.</p>
                     </div>

                     <div class="tp-checkout-payment-item">
                        <input id="cash-on-delivery" type="radio" name="payment" value="offline" required>
                        <label for="cash-on-delivery">Thanh toán khi nhận hàng</label>
                     </div>
                    </div>
                    <button type="button" class="tp-checkout-btn" id="submitOrder">Đặt hàng</button>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- khu vực thanh toán kết thúc -->

     <script>
      document.getElementById('submitOrder').addEventListener('click', function(event) {
          event.preventDefault();
  
          const name = document.getElementById('name').value;
          const phone = document.getElementById('phone').value;
          const address = document.getElementById('address').value;
          const street = document.getElementById('street').value;
          const note = document.getElementById('note').value;
          const email = document.getElementById('email').value;
          const paymentMethod = document.querySelector('input[name="payment"]:checked').value;
  
          fetch('{{ route("placeOrder") }}', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify({
                  name: name,
                  phone: phone,
                  address: address,
                  street: street,
                  email: email,
                  payment_method: paymentMethod,
                  note: note
              })
          })
          .then(response => response.json())
          .then(data => {
    console.log(data); // Ghi log để kiểm tra phản hồi
    if (data.success) {
        if (data.order_url) {
            window.location.href = data.order_url; // Chuyển hướng đến ZaloPay
        } else {
            window.location.href = '/thank-you';
            alert('Đặt hàng thành công!');
        }
    } else {
        alert('Có lỗi xảy ra: ' + data.message);
    }
})

          .catch(error => {
              console.error('Error:', error);
          });
      });
  </script>
  
    
  
@endsection

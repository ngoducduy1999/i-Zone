@extends('layouts.client')

@section('content')

<!-- Preloader Area Start -->
<div id="loadingSpinner" class="d-none text-center">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="tp-preloader-content">
                <div class="tp-preloader-logo">
                    <div class="tp-preloader-circle">
                        <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                stroke-linecap="round"></circle>
                            <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6"
                                stroke-linecap="round"></circle>
                        </svg>
                    </div>
                    <img src="{{ asset('assets/client/img/logo/preloader/preloader-icon.png') }}" alt=""
                        style="width: 50px;">
                </div>
                <p class="tp-preloader-subtitle">Đang xử lý...</p>
            </div>
        </div>
    </div>
</div>

    <!-- khu vực breadcrumb bắt đầu -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toastMessage" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastBody">
                    <!-- Nội dung thông báo sẽ được cập nhật động -->
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
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
                     @guest

                       <p class="tp-checkout-verify-reveal">Khách hàng quay lại? <button type="button" class="tp-checkout-login-form-reveal-btn">Nhấn vào đây để đăng nhập</button></p>
                     @endguest

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
                    
                 </div>
              </div>
              <div class="col-lg-7">
                 <div class="tp-checkout-bill-area">
                    <h3 class="tp-checkout-bill-title">Chi tiết thanh toán</h3>

                    <div class="tp-checkout-bill-form">
                     <form id="orderForm"> 
                        <div class="tp-checkout-bill-inner">
                            <div class="row">
                                <!-- Họ tên và Số điện thoại -->
                                <div class="col-md-12">
                                    <div class="tp-checkout-input">
                                        <label>Liên hệ <span>*</span></label>
                                        <input type="text" id="name" placeholder="Họ và tên" value="{{ Auth::user()->ten ?? '' }}" required>
                                    </div>
                                    <div class="tp-checkout-input">
                                        <input type="text" id="phone" placeholder="Số điện thoại" value="{{ Auth::user()->so_dien_thoai ?? '' }}" required>
                                    </div>
                                </div>
                    
                                <!-- Email -->
                                <div class="col-md-12">
                                    <div class="tp-checkout-input">
                                        <input type="text" id="email" placeholder="Email" value="{{ Auth::user()->email ?? '' }}" required>
                                    </div>
                                </div>
                    
                                <!-- Địa chỉ -->
                                <div class="tp-checkout-input">
                                 <label>Địa chỉ</label>
                                 <select id="addressSelect" onchange="updateAddressField()" required>
                                     <option value="">-- Chọn địa chỉ --</option>
                        <!-- Loại 2: Địa chỉ đã đăng ký -->
@if(Auth::check() && Auth::user()->dia_chi)
<optgroup label="Địa chỉ đã đăng ký">
    <option disabled>--- Địa chỉ đã đăng ký ---</option>
    <option value="{{ Auth::user()->dia_chi }}">{{ Auth::user()->dia_chi }}</option>
</optgroup>
@endif

                                     <!-- Loại 1: Địa chỉ đã sử dụng trước đó -->
                                     @if($diaChiDaSuDung->isNotEmpty())
                                     <option disabled>--- Địa chỉ đã sử dụng ---</option>
                                     @foreach($diaChiDaSuDung as $diaChi)
                                                 <option value="{{ $diaChi }}">{{ $diaChi }}</option>
                                             @endforeach
                                         </optgroup>
                                     @endif
                         
                                     
                         
                                     <!-- Loại 3: Nhập địa chỉ mới -->
                                     <optgroup label="Địa chỉ mới">
                                       <option disabled>--- Địa chỉ mới ---</option>

                                         <option value="new">Nhập địa chỉ mới</option>
                                     </optgroup>
                                 </select>
                         
                                 <!-- Trường nhập địa chỉ mới -->
                                 <input type="text" id="address" placeholder="Tỉnh/Thành phố, Quận/Huyện, Phường/Xã" 
                                        style="display: none;" required>
                             </div>
                                <!-- Ghi chú đơn hàng -->
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
                          <li class="tp-order-info-list-subtotal">
                            <span>Giảm giá</span>
                          
                                <span class="text-danger" id="giamgia">
                                    -{{ number_format($discountAmount, 0, ',', '.') }} VNĐ
                                </span>
                            
                        
                         </li>
                          <li >
                             <span>Vận chuyển</span>
                             <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                <span>
                                  {{--  <input id="flat_rate" type="radio" name="shipping"> --}}
                                   <label for="flat_rate">Phí vận chuyển: 50.000 VNĐ</label>
                                </span>
                                <span>
                                 {{--   <input id="free_shipping" type="radio" name="shipping">
                                   <label for="free_shipping">Miễn phí vận chuyển</label> --}}
                                </span>
                             </div>
                          </li>
                          <li class="tp-checkout-verify-item">
                           <span id="discountApplySection" class="tp-checkout-verify-reveal">
                               Có mã giảm giá? <button type="button" id="showCouponForm" class="tp-checkout-coupon-form-reveal-btn">Nhập mã</button>
                           </span>
                           
                           <span id="tpCheckoutCouponForm" class="tp-return-customer" style="display: none;">
                               <form id="discountForm" onsubmit="return false;">
                                   @csrf
                                   <div class="tp-return-customer-input">
                                       <label>Mã giảm giá:</label>
                                       <input type="text" name="discount_code" placeholder="Mã giảm giá" required>
                                   </div>
                                   <button type="button" id="applyDiscountButton" class="tp-return-customer-btn tp-checkout-btn">Áp dụng</button>
                               </form>
                           </span>
                       </li>
                       
                       <li id="discountAppliedMessage" style="display: none;">
                        Mã giảm giá: <span id="appliedDiscountCode">{{$discountCode}}</span>
                        <button type="button" id="removeDiscountButton"style="width: 50px;" class="btn-remove-discount" aria-label="Hủy giảm giá" title="Hủy mã giảm giá">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" width="20" height="20">
                                <line x1="18" y1="6" x2="6" y2="18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="6" y1="6" x2="18" y2="18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                      </li>                      
                          <li class="tp-order-info-list-total">
                             <span>Tổng đơn hàng</span>
                             <span id="totalPrice">{{ number_format($discountedTotal, 0, ',', '.') }} VND</span>
                           </li>
                       </ul>
                    </div>

                    <div class="tp-checkout-payment">
                       <h3 class="tp-checkout-payment-title">Phương thức thanh toán</h3>

                       <div class="tp-checkout-payment-item">
                        <input id="direct-bank-transfer" type="radio" name="payment" value="Thanh toán qua chuyển khoản ngân hàng" required>
                        <label for="direct-bank-transfer">Chuyển khoản ngân hàng</label>
                        <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn như một mã tham chiếu thanh toán.</p>
                     </div>

                     <div class="tp-checkout-payment-item">
                        <input id="cash-on-delivery" type="radio" name="payment" value="Thanh toán khi nhận hàng" required>
                        <label for="cash-on-delivery">Thanh toán khi nhận hàng</label>
                     </div>
                    </div>
                    <button type="button" class="tp-checkout-btn" id="submitOrder">Đặt hàng</button>
                 </div>
              </div>
           </div>
        </div>
        
        <div class="modal fade" id="stockWarningModal" tabindex="-1" aria-labelledby="stockWarningModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stockWarningModalLabel">Cảnh báo tồn kho</h5>
                    </div>
                    <div class="modal-body" id="stockWarningModalBody">
                        <!-- Nội dung cảnh báo sẽ được cập nhật động -->
                    </div>
                    <div class="modal-footer">
                        <button id="cancelOrderButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button id="confirmOrderButton" type="button" class="btn btn-primary">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
       
        
     </section>
     <!-- khu vực thanh toán kết thúc -->
     <style>.btn-remove-discount {
        background-color: transparent;
        border: none;
        color: #d9534f;
        cursor: pointer;
        padding: 5px;
        transition: color 0.2s ease;
    }
    
    .btn-remove-discount:hover {
        color: #ff4d4d;
    }
    <style>
    #loadingSpinner {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1050; /* Đảm bảo nó nằm trên các phần tử khác */
    }

    .d-none {
        display: none;
    }
</style>

    </style>
     <script>
        function updateAddressField() {
        const addressSelect = document.getElementById('addressSelect');
        const addressField = document.getElementById('address');

        if (addressSelect.value === "new") {
            // Hiển thị trường nhập địa chỉ mới nếu chọn "Nhập địa chỉ mới"
            addressField.style.display = 'block';
            addressField.value = '';
            addressField.required = true;
        } else {
            // Ẩn trường nhập và tự động điền địa chỉ nếu chọn từ các tùy chọn sẵn có
            addressField.style.display = 'none';
            addressField.value = addressSelect.value;
            addressField.required = false;
        }
    }
      document.getElementById('submitOrder').addEventListener('click', function(event) {
          event.preventDefault();
          loading.classList.remove('d-none');

          const name = document.getElementById('name').value;
          const phone = document.getElementById('phone').value;
          const address = document.getElementById('address').value;
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
        name,
        phone,
        address,
        email,
        payment_method: paymentMethod,
        note
    })
})
.then(response => response.json())
.then(data => {
    if (data.success) {
    if (data.url) {
        window.location.href = data.url; // Chuyển hướng đến ZaloPay
    } else {
        // Thêm thông báo đặt hàng thành công
        const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent = 'Đặt hàng thành công! Bạn sẽ được chuyển hướng đến đơn hàng.';
        toast.show();

        // Sau một khoảng thời gian, chuyển hướng
        setTimeout(() => {
    sessionStorage.setItem('orderMessage', 'Đặt hàng thành công!');
    window.location.href = '/customer/donhang';
}, 3000);

    }
} else {
    loading.classList.add('d-none');

    // Kiểm tra và xử lý các trường hợp lỗi
    if (data.not_found) {
        let message = '<strong>Một số sản phẩm không tồn tại:</strong><ul>';
        data.not_found.forEach(item => {
            message += `<li>${item.product_name}: ${item.message}</li>`;
        });
        message += '</ul>';

        // Hiển thị modal thông báo lỗi
        const notFoundModal = new bootstrap.Modal(document.getElementById('errorModal'));
        document.getElementById('errorModalBody').innerHTML = message;
        notFoundModal.show();

        return; // Không tiếp tục xử lý các lỗi khác
    }

    if (data.out_of_stock) {
        let message = '<strong>Một số sản phẩm đã hết hàng:</strong><ul>';
        data.out_of_stock.forEach(item => {
            message += `<li>${item.product_name}: ${item.message}</li>`;
        });
        message += '</ul>';

        // Hiển thị modal thông báo hết hàng
        const outOfStockModal = new bootstrap.Modal(document.getElementById('errorModal'));
        document.getElementById('errorModalBody').innerHTML = message;
        outOfStockModal.show();

        return; // Không tiếp tục xử lý các lỗi khác
    }

    if (data.insufficient_stock) {
        // Tạo danh sách thông báo sản phẩm tồn kho không đủ
        let message = '<strong>Một số sản phẩm không đủ tồn kho:</strong><ul>';
        data.insufficient_stock.forEach(item => {
            message += `<li>${item.product_name}: Còn lại ${item.available_quantity} sản phẩm.</li>`;
        });
        message += '</ul>';
        message += '<p>Bạn có muốn đặt hàng với số lượng khả dụng không?</p>';

        // Hiển thị modal cảnh báo tồn kho
        const stockModal = new bootstrap.Modal(document.getElementById('stockWarningModal'));
        document.getElementById('stockWarningModalBody').innerHTML = message;
        stockModal.show();

        // Xử lý sự kiện của các nút trong modal
        document.getElementById('confirmOrderButton').onclick = function () {
            stockModal.hide();
            document.getElementById('submitOrder').click(); // Thực hiện đặt hàng lại
        };

        document.getElementById('cancelOrderButton').onclick = function () {
            stockModal.hide();
            window.location.href = '/Cart-Index'; // Người dùng từ chối, quay lại giỏ hàng
        };

        return; // Không tiếp tục xử lý thêm
    }

    // Thêm thông báo lỗi khác (nếu không có lỗi nào phù hợp ở trên)
    const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
    document.getElementById('toastBody').textContent = 'Có lỗi xảy ra: ' + data.message;
    toast.show();
}

})
.catch(error => {
    console.error('Error:', error);
});
      });
//them mã
document.addEventListener('DOMContentLoaded', function() {
        let discountCode = "{{$discountCode}}";

        // Kiểm tra mã giảm giá từ đầu, nếu có mã đã áp dụng
        if (discountCode) {
            document.getElementById('discountAppliedMessage').style.display = 'block';
            document.getElementById('discountApplySection').style.display = 'none';
        } else {
            document.getElementById('discountApplySection').style.display = 'block';
            document.getElementById('tpCheckoutCouponForm').style.display = 'none';
        }

        // Mở form nhập mã khi nhấn "Nhập mã"
        document.getElementById('showCouponForm').addEventListener('click', function() {
            document.getElementById('tpCheckoutCouponForm').style.display = 'block';
            document.getElementById('discountApplySection').style.display = 'none';
        });

        // Áp dụng mã giảm giá
        document.getElementById('applyDiscountButton').addEventListener('click', function() {
            let discountCodeInput = document.querySelector('input[name="discount_code"]').value;

            fetch('{{ route('applyDiscount') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ discount_code: discountCodeInput })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('totalPrice').innerText = new Intl.NumberFormat('vi-VN').format(data.new_total) + ' VND';
                    document.getElementById('giamgia').innerText = new Intl.NumberFormat('vi-VN').format(-data.new_giamgia) + ' VND';
                    document.getElementById('discountApplySection').style.display = 'none';
                    document.getElementById('tpCheckoutCouponForm').style.display = 'none';
                    document.getElementById('discountAppliedMessage').style.display = 'block';
                    document.getElementById('appliedDiscountCode').innerText = discountCodeInput;

        const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent =  data.message;
        toast.show();
                } else {
        const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent =  data.message;
        toast.show();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Thêm thông báo lỗi
        const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent = 'Có lỗi xảy ra. Vui lòng thử lại';
        toast.show();

            });
        });

        // Xóa mã giảm giá
        document.getElementById('removeDiscountButton').addEventListener('click', function() {
            fetch('{{ route('removeDiscount') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('totalPrice').innerText = new Intl.NumberFormat('vi-VN').format(data.new_total) + ' VND';
                    document.getElementById('giamgia').innerText = new Intl.NumberFormat('vi-VN').format(-data.new_giamgia) + ' VND'; 
                    document.getElementById('discountAppliedMessage').style.display = 'none';
                    document.getElementById('discountApplySection').style.display = 'block';
        const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent =  data.message;
        toast.show();
                } else {
        const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent =  'Có lỗi khi xóa mã giảm giá.';
        toast.show();
                }
            })
            .catch(error => {
                console.error('Error:', error);
        const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
        document.getElementById('toastBody').textContent = 'Có lỗi xảy ra. Vui lòng thử lại';
        toast.show();            });
        });
    });

  </script>
  
    
  
@endsection

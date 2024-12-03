@extends('layouts.client')

@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
           <div class="row">
              <div class="col-xxl-12">
                 <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Giữ liên lạc với chúng tôi</h3>
                    <div class="breadcrumb__list">
                       <span><a href="#">Trang chủ</a></span>
                       <span>Liên hệ</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- breadcrumb area end -->


     <!-- contact area start -->
     

<section class="tp-contact-area pb-100">
<div class="container">
<div class="tp-contact-inner">
<div class="row">
<div  class="col-xl-9 col-lg-8">
<div class="tp-contact-wrapper">
   <h3 class="tp-contact-title">Thông tin và tin nhắn liên hệ</h3>
<div class="tp-contact-form">
   @if(auth()->check())
   <form action="{{ route('lienhe.store') }}" id="contact-form" method="POST">
      @csrf
      <div class="tp-contact-input-wrapper">
<div class="tp-contact-input-box">

<div class="tp-contact-input">
<input type="text" name="ten_nguoi_gui" placeholder="Tên người gửi" required>
</div>

<div class="tp-contact-input-title">
   <label for="ten_nguoi_gui">Tên của bạn</label>
</div>

</div>


<div class="tp-contact-input-box">
   <div class="tp-contact-input">
<textarea name="tin_nhan" placeholder="Tin nhắn" required></textarea>
   </div>
   <div class="tp-contact-input-title">
      <label for="tin_nhan">Tin nhắn của bạn</label>
   </div>
</div>
      
<div class="tp-contact-btn">
    <button type="submit">Gửi</button>
</div>
      
  
      </div>
      
  </form>
@else
   <p class="fs-5">Bạn cần <a class="text-decoration-underline text-danger" href="{{ route('customer.login') }}">đăng nhập</a> để gửi form!</p>
@endif
</div>


</div>
</div>
</div>
</div>
</div>






</section>



     <!-- contact area end -->

     <!-- map area start -->
     <section class="tp-map-area pb-120">
        <div class="container">
           <div class="row">
              <div class="col-xl-12">
                 <div class="tp-map-wrapper">
                    <div class="tp-map-hotspot">
                       <span class="tp-hotspot tp-pulse-border">
                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <circle cx="6" cy="6" r="6" fill="#821F40"/>
                          </svg>
                       </span>
                    </div>
                    <div class="tp-map-iframe">
                       {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830894612!2d-74.11976383964465!3d40.69766374865766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1678114595329!5m2!1sen!2sbd"></iframe> --}}
                       <iframe src="https://www.google.com/maps/d/embed?mid=1Ze-c34plHg2ZM1HWUhm6gS2o-ykmEwY&ehbc=2E312F"></iframe>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- map area end -->
@endsection
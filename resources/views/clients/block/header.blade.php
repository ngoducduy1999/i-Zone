<div class="tp-header-area p-relative z-index-11">
    <!-- header top start  -->
    <div class="tp-header-top black-bg p-relative z-index-1 d-none d-md-block">
       <div class="container">
          <div class="row align-items-center">
             <div class="col-md-6">
                <div class="tp-header-welcome d-flex align-items-center">
                   <span>
                      <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M14.6364 1H1V12.8182H14.6364V1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                         <path d="M14.6364 5.54545H18.2727L21 8.27273V12.8182H14.6364V5.54545Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                         <path d="M5.0909 17.3636C6.3461 17.3636 7.36363 16.3461 7.36363 15.0909C7.36363 13.8357 6.3461 12.8182 5.0909 12.8182C3.83571 12.8182 2.81818 13.8357 2.81818 15.0909C2.81818 16.3461 3.83571 17.3636 5.0909 17.3636Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                         <path d="M16.9091 17.3636C18.1643 17.3636 19.1818 16.3461 19.1818 15.0909C19.1818 13.8357 18.1643 12.8182 16.9091 12.8182C15.6539 12.8182 14.6364 13.8357 14.6364 15.0909C14.6364 16.3461 15.6539 17.3636 16.9091 17.3636Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>                                 
                   </span>
                   <p>FREE Express Shipping On Orders $570+</p>
                </div>
             </div>
             <div class="col-md-6">
                <div class="tp-header-top-right d-flex align-items-center justify-content-end">
                   <div class="tp-header-top-menu d-flex align-items-center justify-content-end">
                      <div class="tp-header-top-menu-item tp-header-lang">
                         <span class="tp-header-lang-toggle" id="tp-header-lang-toggle">English</span>
                         <ul>
                            <li>
                               <a href="#">Spanish</a>
                            </li>
                            <li>
                               <a href="#">Russian</a>
                            </li>
                            <li>
                               <a href="#">Portuguese</a>
                            </li>
                         </ul>
                      </div>
                      <div class="tp-header-top-menu-item tp-header-currency">
                         <span class="tp-header-currency-toggle" id="tp-header-currency-toggle">USD</span>
                         <ul>
                            <li>
                               <a href="#">EUR</a>
                            </li>
                            <li>
                               <a href="#">CHF</a>
                            </li>
                            <li>
                               <a href="#">GBP</a>
                            </li>
                            <li>
                               <a href="#">KWD</a>
                            </li>
                         </ul>
                      </div>
                      <div class="tp-header-top-menu-item tp-header-setting">
                         <span class="tp-header-setting-toggle" id="tp-header-setting-toggle">Setting</span>
                         <ul>
                            <li>
                               <a href="profile.html">My Profile</a>
                            </li>
                            <li>
                               <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                               <a href="cart.html">Cart</a>
                            </li>
                            <li>
                               <a href="login.html">Logout</a>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>

    <!-- header main start -->
    <div class="tp-header-main tp-header-sticky">
       <div class="container">
          <div class="row align-items-center">
             <div class="col-xl-2 col-lg-2 col-md-4 col-6">
                <div class="logo">
                   <a href="{{ route('trangchu') }}">
                      <img src="{{ asset('assets/client/img/logo/logo.svg') }}" alt="logo">
                   </a>
                </div>
             </div>
             <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                <div class="tp-header-search pl-70">
                   <form action="#">
                      <div class="tp-header-search-wrapper d-flex align-items-center">
                         <div class="tp-header-search-box">
                            <input type="text" placeholder="Search for Products...">
                         </div>
                         <div class="tp-header-search-category">
                            <select>
                               <option>Select Category</option>
                               <option>Mobile</option>
                               <option>Digital Watch</option>
                               <option>Computer</option>
                               <option>Watch</option>
                            </select>
                         </div>
                         <div class="tp-header-search-btn">
                            <button type="submit">
                               <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M19 19L14.65 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                               </svg>                                          
                            </button>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
             <div class="col-xl-4 col-lg-3 col-md-8 col-6">
                <div class="tp-header-main-right d-flex align-items-center justify-content-end">
                   <div class="tp-header-login d-none d-lg-block">
                      <a href="profile.html" class="d-flex align-items-center">
                         <div class="tp-header-login-icon">
                            <span>
                               <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="8.57894" cy="5.77803" r="4.77803" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.00002 17.2014C0.998732 16.8655 1.07385 16.5337 1.2197 16.2311C1.67736 15.3158 2.96798 14.8307 4.03892 14.611C4.81128 14.4462 5.59431 14.336 6.38217 14.2815C7.84084 14.1533 9.30793 14.1533 10.7666 14.2815C11.5544 14.3367 12.3374 14.4468 13.1099 14.611C14.1808 14.8307 15.4714 15.27 15.9291 16.2311C16.2224 16.8479 16.2224 17.564 15.9291 18.1808C15.4714 19.1419 14.1808 19.5812 13.1099 19.7918C12.3384 19.9634 11.5551 20.0766 10.7666 20.1304C9.57937 20.2311 8.38659 20.2494 7.19681 20.1854C6.92221 20.1854 6.65677 20.1854 6.38217 20.1304C5.59663 20.0773 4.81632 19.9641 4.04807 19.7918C2.96798 19.5812 1.68652 19.1419 1.2197 18.1808C1.0746 17.8747 0.999552 17.5401 1.00002 17.2014Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                               </svg>                                       
                            </span>
                         </div>
                         <div class="tp-header-login-content d-none d-xl-block">
                            <span>Hello, Sign In</span>
                            <h5 class="tp-header-login-title">Your Account</h5>
                         </div>
                      </a>
                   </div>
                   <div class="tp-header-action d-flex align-items-center ml-50">
                      <div class="tp-header-action-item d-none d-lg-block">
                         <a href="compare.html"  class="tp-header-action-btn">
                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M14.8396 17.3319V3.71411" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M19.1556 13L15.0778 17.0967L11 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M4.91115 1.00056V14.6183" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M0.833496 5.09667L4.91127 1L8.98905 5.09667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                       
                         </a>
                      </div>
                      <div class="tp-header-action-item d-none d-lg-block">
                         <a href="{{ route('yeuthich') }}" class="tp-header-action-btn">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd" clip-rule="evenodd" d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg> 
                            <span class="tp-header-action-badge">4</span>                          
                         </a>
                      </div>
                      <div class="tp-header-action-item">
                         <button type="button" class="tp-header-action-btn cartmini-open-btn">
                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>    
                            <span class="tp-header-action-badge">13</span>                                                                          
                         </button>
                      </div>
                      <div class="tp-header-action-item d-lg-none">
                         <button type="button" class="tp-header-action-btn tp-offcanvas-open-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                               <rect x="10" width="20" height="2" fill="currentColor"/>
                               <rect x="5" y="7" width="25" height="2" fill="currentColor"/>
                               <rect x="10" y="14" width="20" height="2" fill="currentColor"/>
                            </svg>
                         </button>
                      </div>
                      
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>

    <!-- header bottom start -->
    <div class="tp-header-bottom tp-header-bottom-border d-none d-lg-block">
       <div class="container">
          <div class="tp-mega-menu-wrapper p-relative">
             <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3">
                   <div class="tp-header-category tp-category-menu tp-header-category-toggle">
                      <button class="tp-category-menu-btn tp-category-menu-toggle">
                         <span>
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H15C15.5523 0 16 0.447715 16 1C16 1.55228 15.5523 2 15 2H1C0.447715 2 0 1.55228 0 1ZM0 7C0 6.44772 0.447715 6 1 6H17C17.5523 6 18 6.44772 18 7C18 7.55228 17.5523 8 17 8H1C0.447715 8 0 7.55228 0 7ZM1 12C0.447715 12 0 12.4477 0 13C0 13.5523 0.447715 14 1 14H11C11.5523 14 12 13.5523 12 13C12 12.4477 11.5523 12 11 12H1Z" fill="currentColor"/>
                            </svg>
                         </span>     
                         All Departments                            
                      </button>
                      <nav class="tp-category-menu-content">
                       <ul>
                           <li>
                              <a href="shop.html">
                                 <span>
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M5.90532 14.8316V12.5719C5.9053 11.9971 6.37388 11.5301 6.95443 11.5262H9.08101C9.66434 11.5262 10.1372 11.9944 10.1372 12.5719V12.5719V14.8386C10.1371 15.3266 10.5305 15.7254 11.0233 15.7368H12.441C13.8543 15.7368 15 14.6026 15 13.2035V13.2035V6.77525C14.9925 6.22482 14.7314 5.70794 14.2911 5.37171L9.44253 1.50496C8.59311 0.83168 7.38562 0.83168 6.5362 1.50496L1.70886 5.37873C1.26693 5.7136 1.00544 6.23133 1 6.78227V13.2035C1 14.6026 2.1457 15.7368 3.55899 15.7368H4.97671C5.48173 15.7368 5.89114 15.3315 5.89114 14.8316V14.8316" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 New Arrivals</a>
                           </li>
                           <li class="has-dropdown">
                              <a href="shop.html" class="has-mega-menu">
                                 <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M2.6856 4.54975C2.6856 3.52014 3.51984 2.6859 4.54945 2.68508H5.3977C5.88984 2.68508 6.36136 2.48971 6.71089 2.14348L7.30359 1.54995C8.02984 0.819578 9.21031 0.816281 9.94068 1.54253L9.9415 1.54336L9.94892 1.54995L10.5425 2.14348C10.892 2.49053 11.3635 2.68508 11.8556 2.68508H12.7031C13.7327 2.68508 14.5677 3.51932 14.5677 4.54975V5.39636C14.5677 5.88849 14.7623 6.36084 15.1093 6.71037L15.7029 7.3039C16.4332 8.03015 16.4374 9.21061 15.7111 9.94098L15.7103 9.94181L15.7029 9.94923L15.1093 10.5428C14.7623 10.8915 14.5677 11.363 14.5677 11.8551V12.7034C14.5677 13.733 13.7335 14.5672 12.7039 14.5672H12.7031H11.854C11.3619 14.5672 10.8895 14.7626 10.5408 15.1096L9.94727 15.7024C9.22185 16.4327 8.04221 16.4368 7.31183 15.7122C7.31101 15.7114 7.31019 15.7106 7.30936 15.7098L7.30194 15.7024L6.70924 15.1096C6.36054 14.7626 5.88819 14.568 5.39605 14.5672H4.54945C3.51984 14.5672 2.6856 13.733 2.6856 12.7034V11.8535C2.6856 11.3613 2.49023 10.8898 2.14318 10.5411L1.55047 9.94758C0.820097 9.22215 0.815976 8.04251 1.5414 7.31214C1.5414 7.31132 1.54223 7.31049 1.54305 7.30967L1.55047 7.30225L2.14318 6.70872C2.49023 6.35919 2.6856 5.88767 2.6856 5.39471V4.54975" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M6.50787 10.7453L10.745 6.50812" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M10.6823 10.6862H10.6897" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M6.56053 6.56446H6.56795" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 Electronics</a>

                                 <ul class="mega-menu tp-submenu">
                                    <li>
                                       <a href="shop.html" class="mega-menu-title">Featured</a>
                                       <ul>
                                          <li>
                                             <a href="shop.html"><img src="{{ asset('assets/client/img/header/menu/menu-1.jpg') }}" alt=""></a>
                                          </li>
                                          <li>
                                             <a href="shop.html">New Arrivals</a>
                                          </li>
                                          <li>
                                             <a href="shop.html">Best Seller</a>
                                          </li>
                                          <li>
                                             <a href="shop.html">Top Rated</a>
                                          </li>
                                       </ul>
                                    </li>

                                    <li>
                                       <a href="shop.html" class="mega-menu-title">Computer & Laptops</a>
                                       <ul>
                                          <li>
                                           <a href="shop.html"><img src="{{ asset('assets/client/img/header/menu/menu-2.jpg') }}" alt=""></a>
                                          </li>
                                          <li>
                                             <a href="shop.html">Top Brands</a>
                                          </li>
                                          <li>
                                             <a href="shop.html">Weekly Best Selling</a>
                                          </li>
                                          <li>
                                             <a href="shop.html">Most Viewed</a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a href="shop.html" class="mega-menu-title">Accessories</a>
                                       <ul>
                                          <li>
                                           <a href="shop.html"><img src="{{ asset('assets/client/img/header/menu/menu-3.jpg') }}" alt=""></a>
                                          </li>
                                          <li>
                                             <a href="shop.html">Headphones</a>
                                          </li>
                                          <li>
                                             <a href="shop.html">TWS Earphone</a>
                                          </li>
                                          <li>
                                             <a href="shop.html">Gaming Headset</a>
                                          </li>
                                       </ul>
                                    </li>

                                 </ul>
                           </li>
                           <li>
                              <a href="shop.html">
                                 <span>
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M14.5 8.5V16H2.50003V8.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M16 4.75H1V8.5H16V4.75Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M8.5 16V4.75" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M8.49997 4.75H5.12497C4.62769 4.75 4.15077 4.55246 3.79914 4.20083C3.44751 3.84919 3.24997 3.37228 3.24997 2.875C3.24997 2.37772 3.44751 1.90081 3.79914 1.54917C4.15077 1.19754 4.62769 1 5.12497 1C7.74997 1 8.49997 4.75 8.49997 4.75Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M8.5 4.75H11.875C12.3723 4.75 12.8492 4.55246 13.2008 4.20083C13.5525 3.84919 13.75 3.37228 13.75 2.875C13.75 2.37772 13.5525 1.90081 13.2008 1.54917C12.8492 1.19754 12.3723 1 11.875 1C9.25 1 8.5 4.75 8.5 4.75Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 Gifts</a>
                           </li>
                           <li class="has-dropdown">
                              <a href="shop.html">
                                 <span>
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M14.5 1H2.5C1.67157 1 1 1.67157 1 2.5V10C1 10.8284 1.67157 11.5 2.5 11.5H14.5C15.3284 11.5 16 10.8284 16 10V2.5C16 1.67157 15.3284 1 14.5 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M5.5 14.5H11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M8.5 11.5V14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 Computers</a>

                                 <ul class="tp-submenu">
                                    <li class="has-dropdown">
                                       <a href="shop.html">Desktop</a>
                                       <ul class="tp-submenu">
                                          <li><a href="shop.html">Gaming</a></li>
                                          <li><a href="shop.html">WorkSpace</a></li>
                                          <li><a href="shop.html">Customize</a></li>
                                          <li><a href="shop.html">Luxury</a></li>
                                       </ul>
                                    </li>
                                    <li><a href="shop.html">Laptop</a></li>
                                    <li><a href="shop.html">Console</a></li>
                                    <li><a href="shop.html">Top Rated</a></li>
                                 </ul>
                           </li>
                           <li>
                              <a href="shop.html">
                                 <span>
                                    <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M12.375 1H2.625C1.72754 1 1 1.72754 1 2.625V15.625C1 16.5225 1.72754 17.25 2.625 17.25H12.375C13.2725 17.25 14 16.5225 14 15.625V2.625C14 1.72754 13.2725 1 12.375 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M7.5 14H7.50875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 Smartphones & Tablets</a>
                           </li>
                           <li>
                              <a href="shop.html">
                                 <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1C13.4176 1 17 4.5816 17 9C17 13.4184 13.4176 17 9 17C4.5816 17 1 13.4184 1 9C1 4.5816 4.5816 1 9 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5263 8.99592C11.5263 8.31286 8.02529 6.12769 7.62814 6.5206C7.23099 6.9135 7.19281 11.0413 7.62814 11.4712C8.06348 11.9027 11.5263 9.67898 11.5263 8.99592Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 TV, Video & Musice</a>
                           </li>
                           <li>
                              <a href="shop.html">
                                 <span>
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6292 1.26076C12.5027 1.60843 12.7699 2.81924 13.1271 3.20843C13.4843 3.59762 13.9955 3.72995 14.2783 3.72995C15.7814 3.72995 17 4.94854 17 6.45081V11.4627C17 13.4778 15.3654 15.1124 13.3503 15.1124H4.64973C2.63373 15.1124 1 13.4778 1 11.4627V6.45081C1 4.94854 2.21859 3.72995 3.72173 3.72995C4.00368 3.72995 4.51481 3.59762 4.87287 3.20843C5.23005 2.81924 5.49643 1.60843 6.36995 1.26076C7.24432 0.913081 10.7557 0.913081 11.6292 1.26076Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M13.7527 5.97314H13.7605" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7491 9.11086C11.7491 7.59215 10.5184 6.36145 8.99974 6.36145C7.48104 6.36145 6.25034 7.59215 6.25034 9.11086C6.25034 10.6296 7.48104 11.8603 8.99974 11.8603C10.5184 11.8603 11.7491 10.6296 11.7491 9.11086Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 Cameras</a>
                           </li>
                           <li>
                              <a href="shop.html">
                                 <span>
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M2.30431 1C1.58423 1 1 1.59405 1 2.32534V3.10537C1 3.64706 1.20599 4.16798 1.57446 4.55981L5.61258 8.8536L5.61436 8.8509C6.39393 9.64899 6.83254 10.7279 6.83254 11.8528V15.6626C6.83254 15.9172 7.09891 16.0798 7.32 15.9597L9.61963 14.7066C9.96679 14.517 10.1834 14.1486 10.1834 13.7487V11.8428C10.1834 10.7242 10.6158 9.64989 11.3883 8.8536L15.4264 4.55981C15.794 4.16798 16 3.64706 16 3.10537V2.32534C16 1.59405 15.4167 1 14.6966 1H2.30431Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 Cooking</a>
                           </li>
                           <li>
                              <a href="shop.html">
                                 <span>
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M15.7462 7.16473V13.167C15.7462 13.6457 15.556 14.1049 15.2175 14.4434C14.8789 14.782 14.4197 14.9722 13.941 14.9722H4.3058C3.82703 14.9722 3.3679 14.782 3.02936 14.4434C2.69083 14.1049 2.50061 13.6457 2.50061 13.167V9.36255" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M3.46186 1.00001C3.18176 0.999863 2.90854 1.08659 2.6798 1.24825C2.45106 1.4099 2.27807 1.63852 2.18471 1.9026L1.11062 5.01655C0.713475 6.15382 1.41752 7.16021 2.71274 7.16021C3.18296 7.14863 3.64325 7.02257 4.05374 6.79294C4.46424 6.56331 4.81255 6.23705 5.0685 5.84243C5.20151 6.24071 5.46067 6.58479 5.80676 6.82258C6.15285 7.06036 6.56702 7.17889 6.98651 7.16021C7.18566 6.7642 7.4909 6.43132 7.86823 6.19871C8.24556 5.96611 8.68013 5.84294 9.1234 5.84294C9.56666 5.84294 10.0012 5.96611 10.3785 6.19871C10.7558 6.43132 11.0611 6.7642 11.2603 7.16021V7.16021C11.679 7.17789 12.0922 7.0589 12.4373 6.82119C12.7825 6.58348 13.041 6.23994 13.1738 5.84243C13.431 6.23686 13.7802 6.56288 14.1914 6.79243C14.6026 7.02199 15.0633 7.1482 15.5341 7.16021C16.8293 7.16021 17.5288 6.15382 17.1362 5.01655L16.0621 1.9026C15.9685 1.6378 15.7948 1.40866 15.5652 1.24694C15.3355 1.08522 15.0613 0.998927 14.7804 1.00001H3.46186Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M11.0707 14.9722H7.19861V11.4701C7.19861 10.983 7.3921 10.5158 7.73656 10.1713C8.08102 9.82685 8.54822 9.63333 9.03536 9.63333H9.22041C9.70755 9.63333 10.1747 9.82685 10.5192 10.1713C10.8637 10.5158 11.0572 10.983 11.0572 11.4701L11.0707 14.9722Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 Accessories</a>
                           </li>
                           <li>
                              <a href="shop.html">
                                 <span>
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M6.92384 11.3525C10.1178 11.3525 12.8477 11.8365 12.8477 13.7698C12.8477 15.7032 10.136 16.201 6.92384 16.201C3.72902 16.201 1 15.7213 1 13.7871C1 11.8529 3.71084 11.3525 6.92384 11.3525Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M6.92383 8.59311C4.82685 8.59311 3.1264 6.89354 3.1264 4.79656C3.1264 2.69958 4.82685 1 6.92383 1C9.01994 1 10.7204 2.69958 10.7204 4.79656C10.7282 6.88575 9.03986 8.58532 6.95067 8.59311H6.92383Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M12.8906 7.60761C14.2768 7.41281 15.3443 6.22319 15.3469 4.78336C15.3469 3.3643 14.3123 2.18681 12.9556 1.96429" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M14.7195 10.9416C16.0623 11.1416 17 11.6126 17 12.5823C17 13.2498 16.5584 13.6827 15.845 13.9537" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                 </span>
                                 Sports</a>
                           </li>
                        </ul>
                      </nav>
                   </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                   <div class="main-menu menu-style-1">
                      <nav class="tp-main-menu-content">
                         <ul>
                            <li class="has-mega-menu">
                               <a href="{{ route('trangchu') }}">Home</a>                              
                            </li>
                            <li  class="has-dropdown has-mega-menu">
                               <a href="shop.html">Shop</a>
                               <div class="shop-mega-menu tp-submenu tp-mega-menu">
                                  <div class="row">
                                     <div class="col-lg-2">
                                        <div class="shop-mega-menu-list">
                                              <a href="shop.html" class="shop-mega-menu-title">Shop Pages</a>
                                              <ul>
                                                  <li><a href="shop-category.html">Grid Category</a></li>
                                                  <li><a href="shop.html">Grid Layout</a></li>
                                                  <li><a href="shop-list.html">List Layout</a></li>
                                                  <li><a href="shop-masonary.html">Masonary Layout</a></li>
                                                  <li><a href="shop-full-width.html">Full width Layout</a></li>
                                                  <li><a href="shop-1600.html">1600px Layout</a></li>
                                                  <li><a href="shop.html">Left Sidebar</a></li>
                                                  <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                  <li><a href="shop-no-sidebar.html">Hidden Sidebar</a></li>
                                              </ul>
                                        </div>
                                     </div>
                                     <div class="col-lg-2">
                                        <div class="shop-mega-menu-list">
                                              <a href="shop.html" class="shop-mega-menu-title">Features</a>
                                              <ul>
                                                 <li><a href="shop-filter-dropdown.html">Filter Dropdown</a></li>
                                                 <li><a href="shop-filter-offcanvas.html">Filters Offcanvas</a></li>
                                                 <li><a href="shop.html">Filters Sidebar</a></li>
                                                 <li><a href="shop-load-more.html">Load More button</a></li>
                                                 <li><a href="shop-infinite-scroll.html">Infinit scrolling</a></li>
                                                 <li><a href="shop-list.html">Collections list</a></li>
                                                 <li><a href="shop.html">Hidden search</a></li>
                                                 <li><a href="shop.html">Search Full screen</a></li>
                                              </ul>
                                        </div>
                                     </div>
                                     <div class="col-lg-2">
                                        <div class="shop-mega-menu-list">
                                              <a href="shop.html" class="shop-mega-menu-title">Hover Style</a>
                                              <ul>
                                                 <li><a href="shop.html">Hover Style 1</a></li>
                                                 <li><a href="shop.html">Hover Style 2</a></li>
                                                 <li><a href="shop.html">Hover Style 3</a></li>
                                                 <li><a href="shop.html">Hover Style 4</a></li>
                                              </ul>
                                        </div>
                                     </div>
                                     <div class="col-lg-3">
                                        <div class="shop-mega-menu-img">
                                           <img src="{{ asset('assets/client/img/menu/product/menu-product-img-1.jpg') }}" alt="">
                                           <div class="shop-mega-menu-btn">
                                              <a href="shop-category.html" class="tp-menu-showcase-btn tp-menu-showcase-btn-2">Phones</a>
                                           </div>
                                        </div>
                                     </div>
                                     <div class="col-lg-3">
                                        <div class="shop-mega-menu-img">
                                           <img src="{{ asset('assets/client/img/menu/product/menu-product-img-2.jpg') }}" alt="">
                                           <div class="shop-mega-menu-btn">
                                              <a href="shop-category.html" class="tp-menu-showcase-btn tp-menu-showcase-btn-2">Cameras</a>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                           </li>
                            <li class="has-dropdown has-mega-menu ">
                               
                               <a href="{{ route('san-pham') }}">Products</a>
                               <ul class="tp-submenu tp-mega-menu mega-menu-style-2">
                                  <!-- first col -->
                                  <li class="has-dropdown">
                                     <a href="shop.html" class="mega-menu-title">Shop Page</a>
                                     <ul class="tp-submenu">
                                        <li><a href="shop-category.html">Only Categories</a></li>
                                        <li><a href="shop-filter-offcanvas.html">Shop Grid</a></li>
                                        <li><a href="shop.html">Shop Grid with Sideber</a></li>
                                        <li><a href="shop-list.html">Shop List</a></li>
                                        <li><a href="shop-category.html">Categories</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="product-details-progress.html">Product Details Progress</a></li>
                                     </ul>
                                  </li>
                                  <!-- third col -->
                                  <li  class="has-dropdown">
                                     <a href="product-details.html" class="mega-menu-title">Products</a>
                                     <ul class="tp-submenu">
                                        
                                        <li><a href="product-details.html">Product Simple</a></li>
                                        <li><a href="product-details-video.html">With Video</a></li>
                                        <li><a href="product-details-countdown.html">With Countdown Timer</a></li>
                                        <li><a href="product-details-presentation.html">Product Presentation</a></li>
                                        <li><a href="product-details-swatches.html">Variations Swatches</a></li>
                                        <li><a href="product-details-list.html">List View</a></li>
                                        <li><a href="product-details-gallery.html">Details Gallery</a></li>
                                        <li><a href="product-details-slider.html">With Slider</a></li>
                                     </ul>
                                  </li>
                                  <!-- third col -->
                                  <li  class="has-dropdown">
                                     <a href="shop.html" class="mega-menu-title">eCommerce</a>
                                     <ul class="tp-submenu">
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="order.html">Track Your Order</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="profile.html">My account</a></li>
                                     </ul>
                                  </li>

                                  <!-- second col -->
                                  <li  class="has-dropdown">
                                     <a href="shop.html" class="mega-menu-title">More Pages</a>
                                     <ul class="tp-submenu">
                                        
                                       
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="forgot.html">Forgot Password</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                     </ul>
                                  </li>

                               </ul>
                            </li>
                            <li><a href="coupon.html">Coupons</a></li>
                            <li class="has-dropdown">
                               <a href="blog.html">Blog</a>
                               <ul class="tp-submenu">
                                  <li><a href="blog.html">Blog Standard</a></li>
                                  <li><a href="blog-grid.html">Blog Grid</a></li>
                                  <li><a href="blog-list.html">Blog List</a></li>
                                  <li><a href="blog-details-2.html">Blog Details Full Width</a></li>
                                  <li><a href="blog-details.html">Blog Details</a></li>
                               </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                         </ul>
                      </nav>
                   </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                   <div class="tp-header-contact d-flex align-items-center justify-content-end">
                      <div class="tp-header-contact-icon">
                         <span>
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd" clip-rule="evenodd" d="M1.96977 3.24859C2.26945 2.75144 3.92158 0.946726 5.09889 1.00121C5.45111 1.03137 5.76246 1.24346 6.01544 1.49057H6.01641C6.59631 2.05874 8.26011 4.203 8.35352 4.65442C8.58411 5.76158 7.26378 6.39979 7.66756 7.5157C8.69698 10.0345 10.4707 11.8081 12.9908 12.8365C14.1058 13.2412 14.7441 11.9219 15.8513 12.1515C16.3028 12.2459 18.4482 13.9086 19.0155 14.4894V14.4894C19.2616 14.7414 19.4757 15.0537 19.5049 15.4059C19.5487 16.6463 17.6319 18.3207 17.2583 18.5347C16.3767 19.1661 15.2267 19.1544 13.8246 18.5026C9.91224 16.8749 3.65985 10.7408 2.00188 6.68096C1.3675 5.2868 1.32469 4.12906 1.96977 3.24859Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M12.936 1.23685C16.4432 1.62622 19.2124 4.39253 19.6065 7.89874" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M12.936 4.59337C14.6129 4.92021 15.9231 6.23042 16.2499 7.90726" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                    
                         </span>
                      </div>
                      <div class="tp-header-contact-content">
                         <h5>Hotline:</h5>
                         <p><a href="tel:402-763-282-46">+(402) 763 282 46</a></p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
<?php

use App\Http\Controllers\Admin\BaiVietController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\MauSacController;
use App\Http\Controllers\admin\DanhMucController;
use App\Http\Controllers\admin\SanPhamController;
use App\Http\Controllers\Client\GioHangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DungLuongController;
use App\Http\Controllers\admin\KhuyenMaiController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Client\TrangChuController;
use App\Http\Controllers\Auth\ClientLoginController;
use App\Http\Controllers\Client\ThanhToanController;
use App\Http\Controllers\Auth\ClientForgotController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\ClientRegisterController;
use App\Http\Controllers\admin\BienTheSanPhamController;
use App\Http\Controllers\Admin\StaffDashboardController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Client\ChiTietSanPhamController;
use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Client\TrangSanPhamController;
use App\Http\Controllers\Client\YeuThichController;



// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.post');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [AdminForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [AdminForgotPasswordController::class, 'reset'])->name('password.update');
});



// Routes for authenticated users with 'admin' role
Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD routes for User management
    Route::get('/khachhangs', [UserController::class, 'khachhangs'])->name('khachhangs'); // Display users list
    Route::get('/nhanviens', [UserController::class, 'nhanviens'])->name('nhanviens'); // Display users list
    Route::get('/taikhoans/create', [UserController::class, 'create'])->name('taikhoans.create'); // Create new user
    Route::post('/taikhoans', [UserController::class, 'store'])->name('taikhoans.store'); // Store new user
    Route::get('/taikhoans/{id}', [UserController::class, 'show'])->name('taikhoans.show'); // Show user details
    Route::get('/taikhoans/{id}/edit', [UserController::class, 'edit'])->name('taikhoans.edit'); // Edit user
    Route::put('/taikhoans/{id}', [UserController::class, 'update'])->name('taikhoans.update'); // Update user
    Route::delete('/taikhoans/{id}', [UserController::class, 'destroy'])->name('taikhoans.destroy'); // Delete user
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/update/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::put('/profile/updatePassword', [UserController::class, 'updatePassword'])->name('profile.updatePassword');

    // Banner management
    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('create', [BannerController::class, 'create'])->name('create');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::get('/{id}', [BannerController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [BannerController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BannerController::class, 'update'])->name('update');
        Route::post('/{id}/onOffBanner', [BannerController::class, 'onOffBanner'])->name('onOffBanner');
        Route::delete('/{id}', [BannerController::class, 'destroy'])->name('destroy');
    });

    // Promotion management
    Route::prefix('khuyen_mais')->name('khuyen_mais.')->group(function () {
        Route::get('/', [KhuyenMaiController::class, 'index'])->name('index');
        Route::get('create', [KhuyenMaiController::class, 'create'])->name('create');
        Route::post('store', [KhuyenMaiController::class, 'store'])->name('store');
        Route::get('/{id}', [KhuyenMaiController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [KhuyenMaiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KhuyenMaiController::class, 'update'])->name('update');
        Route::get('/update-expired', [KhuyenMaiController::class, 'updateExpiredKhuyenMai'])->name('updateExpired');
        Route::post('/{id}/onOffKhuyenMai', [KhuyenMaiController::class, 'onOffKhuyenMai'])->name('onOffKhuyenMai');
        Route::delete('/{id}', [KhuyenMaiController::class, 'destroy'])->name('destroy');
    });



    // Route the-tag
    Route::prefix('tag')->name('tag.')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('create', [TagController::class, 'create'])->name('create');
        Route::post('store', [TagController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TagController::class, 'update'])->name('update');
        Route::post('/{id}/onOffTag', [TagController::class, 'onOffTag'])->name('onOffTag');
        Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
    });
    // danhmucs
    Route::prefix('danhmucs')->name('danhmucs.')->group(function () {
        Route::get('/', [DanhMucController::class, 'index'])->name('index');
        Route::get('create', [DanhMucController::class, 'create'])->name('create');
        Route::post('store', [DanhMucController::class, 'store'])->name('store');
        Route::get('/{id}/show', [DanhMucController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [DanhMucController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [DanhMucController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');
    });
    // Route hóa đơn
    Route::prefix('hoadons')->name('hoadons.')->group(function () {
        Route::get('/', [HoaDonController::class, 'index'])->name('index');
        Route::get('/{id}/show', [HoaDonController::class, 'show'])->name('show');
        Route::put('/{id}/update', [HoaDonController::class, 'update'])->name('update');
    });

    // sản phẩm
    Route::prefix('sanphams')->name('sanphams.')->group(function () {
        Route::get('/', [SanPhamController::class, 'index'])->name('index');
        Route::get('create', [SanPhamController::class, 'create'])->name('create');
        Route::post('store', [SanPhamController::class, 'store'])->name('store');
        Route::get('/{id}/show', [SanPhamController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SanPhamController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [SanPhamController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/restore', [SanPhamController::class, 'restore'])->name('restore');
        Route::get('/sanpham/{id}/filterDanhGia/{star}', [SanPhamController::class, 'filterDanhGia'])->name('filterDanhGia');
    });

    Route::prefix('mausacs')->name('mausacs.')->group(function(){
        Route::get('/',[MauSacController::class,'index'])->name('index');
        Route::get('create',[MauSacController::class,'create'])->name('create');
        Route::post('store',[MauSacController::class,'store'])->name('store');
        Route::get('/{id}/edit',[MauSacController::class,'edit'])->name('edit');
        Route::put('/{id}/update',[MauSacController::class,'update'])->name('update');
        Route::post('/{id}/onOffMauSac', [MauSacController::class, 'onOffMauSac'])->name('onOffMauSac');
        Route::delete('/{id}/destroy',[MauSacController::class,'destroy'])->name('destroy');
    });

    Route::prefix('dungluongs')->name('dungluongs.')->group(function(){
        Route::get('/',[DungLuongController::class,'index'])->name('index');
        Route::get('create',[DungLuongController::class,'create'])->name('create');
        Route::post('store',[DungLuongController::class,'store'])->name('store');
        Route::get('/{id}/edit',[DungLuongController::class,'edit'])->name('edit');
        Route::put('/{id}/update',[DungLuongController::class,'update'])->name('update');
        Route::post('/{id}/onOffDungLuong', [DungLuongController::class, 'onOffDungLuong'])->name('onOffDungLuong');
        Route::delete('/{id}/destroy',[DungLuongController::class,'destroy'])->name('destroy');
    });

    // Bài viết
    Route::prefix('baiviets')->name('baiviets.')->group(function () {
        Route::get('/', [BaiVietController::class, 'index'])->name('index');
        Route::get('create', [BaiVietController::class, 'create'])->name('create');
        Route::post('store', [BaiVietController::class, 'store'])->name('store');
        Route::get('/{id}', [BaiVietController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [BaiVietController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BaiVietController::class, 'update'])->name('update');
        Route::post('/{id}/onOffKhuyenMai', [BaiVietController::class, 'onOffBaiViet'])->name('onOffBaiViet');
        Route::delete('/{id}', [BaiVietController::class, 'destroy'])->name('destroy');
    });

});

// Routes for authenticated users with 'staff' role
Route::prefix('staff')->name('staff.')->middleware('auth', 'role:staff')->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    Route::get('/khachhangs', [UserController::class, 'khachhangs'])->name('khachhangs'); // Display users list
    Route::get('/khachhang/{id}', [UserController::class, 'show'])->name('taikhoans.show'); // Show user details
    
    
});
// Routes for unauthenticated users
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('login', [CustomerLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [CustomerLoginController::class, 'login'])->name('login.post');
    Route::get('register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [CustomerRegisterController::class, 'register'])->name('register.post');
    Route::post('logout', [CustomerRegisterController::class, 'logout'])->name('logout');
  });


Route::get('/', [TrangChuController::class, 'index'])->name('trangchu');
Route::get('/san-pham', [TrangSanPhamController::class, 'index'])->name('san-pham');
Route::get('/san-pham/danh-muc/{id}', [TrangSanPhamController::class, 'index'])->name('san-pham.danh-muc');
Route::get('/chitietsanpham', [ChiTietSanPhamController::class, 'index'])->name('chitietsanpham');
Route::get('/giohang', [GioHangController::class, 'index'])->name('giohang');
Route::get('/thanhtoan', [ThanhToanController::class, 'index'])->name('thanhtoan');
Route::get('/yeuthich', [YeuThichController::class, 'index'])->name('yeuthich');

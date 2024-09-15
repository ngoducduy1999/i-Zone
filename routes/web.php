<?php

use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\KhuyenMaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

// chưa đăng nhập hoặc không có quyền truy cập
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('login', [LoginController::class, 'showLogin'])->name('showLogin');
//     Route::get('register', [LoginController::class, 'showRegister'])->name('showRegister');
//     Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
//     Route::post('register', [LoginController::class, 'postRegister'])->name('postRegister');
// });

// Route::prefix('admin')->name('admin.')->middleware('role:admin,staff')->group(function () {
Route::prefix('admin')->name('admin.')->group(function () {
    //     Route::get('/', [DanhMucController::class, 'index'])->name('index');
    //     //  staff và admin mới có thể làm việc

    //     // categories
    //     Route::prefix('categories')->name('categories.')->group(function () {
    //         Route::get('/', [DanhMucController::class, 'index'])->name('index');
    //         Route::get('create', [DanhMucController::class, 'create'])->name('create');
    //         Route::post('store', [DanhMucController::class, 'store'])->name('store');
    //         Route::get('/{category}/show', [DanhMucController::class, 'show'])->name('show');
    //         Route::get('/{category}/edit', [DanhMucController::class, 'edit'])->name('edit');
    //         Route::put('/{category}/update', [DanhMucController::class, 'update'])->name('update');
    //         Route::delete('/{category}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');
    //     });

    //     // products
    //     Route::prefix('products')->name('products.')->group(function () {
    //         Route::get('/', [SanPhamController::class, 'index'])->name('index');
    //         Route::get('create', [SanPhamController::class, 'create'])->name('create');
    //         Route::post('store', [SanPhamController::class, 'store'])->name('store');
    //         Route::get('/{product}/show', [SanPhamController::class, 'show'])->name('show');
    //         Route::get('/{product}/edit', [SanPhamController::class, 'edit'])->name('edit');
    //         Route::put('/{product}/update', [SanPhamController::class, 'update'])->name('update');
    //         Route::delete('/{product}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');
    //     });

    //     //  chỉ admin mới có thể làm việc
    //     // Route::prefix('users')->name('users.')->middleware('role:admin')->group(function () {
    //     //     Route::get('/', [UserController::class, 'index'])->name('index');
    //     //     Route::get('create', [UserController::class, 'create'])->name('create');
    //     //     Route::post('store', [UserController::class, 'store'])->name('store');
    //     //     Route::get('/{user}/show', [UserController::class, 'show'])->name('show');
    //     //     Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    //     //     Route::put('/{user}/update', [UserController::class, 'update'])->name('update');
    //     //     Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('destroy');
    //     // });

    // banner
    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('create', [BannerController::class, 'create'])->name('create');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::get('/{id}/show', [BannerController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [BannerController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [BannerController::class, 'update'])->name('update');
        Route::post('/{id}/onOffBanner', [BannerController::class, 'onOffBanner'])->name('onOffBanner');
        Route::delete('/{id}/destroy', [BannerController::class, 'destroy'])->name('destroy');
    });

    // khuyến mãi
    Route::prefix('khuyen_mais')->name('khuyen_mais.')->group(function () {
        Route::get('/', [KhuyenMaiController::class, 'index'])->name('index');
        Route::get('create', [KhuyenMaiController::class, 'create'])->name('create');
        Route::post('store', [KhuyenMaiController::class, 'store'])->name('store');
        Route::get('/{id}/show', [KhuyenMaiController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [KhuyenMaiController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [KhuyenMaiController::class, 'update'])->name('update');
        Route::get('/update-expired-khuyen-mai', [KhuyenMaiController::class, 'updateExpiredKhuyenMai'])->name('khuyenmai.updateExpired');
        Route::post('/{id}/onOffKhuyenMai', [KhuyenMaiController::class, 'onOffKhuyenMai'])->name('onOffKhuyenMai');
        Route::DELETE('/{id}/destroy', [KhuyenMaiController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::DELETE('/{id}/destroy',[UserController::class,'destroy'])->name('destroy');
        Route::get('/{id}/show',[UserController::class,'show'])->name('show');
    });
});
Route::get('/admin', function () {
    return view('admins.dashboard');
})->name('admin');

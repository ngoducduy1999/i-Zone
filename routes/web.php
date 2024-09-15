<?php
use App\Http\Controllers\Admin\DanhgiaController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\KhuyenMaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
/* use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\CustomerRegisterController; */
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\admin\TagController;


// Routes for unauthenticated users
/* Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('login', [CustomerLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [CustomerLoginController::class, 'login'])->name('login.post');
    Route::get('register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [CustomerRegisterController::class, 'register'])->name('register.post');
    Route::post('logout', [CustomerRegisterController::class, 'logout'])->name('logout');
});
 */
// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.post');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
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
   Route::get('/profile/updatePassword', [UserController::class, 'profile'])->name('profile.updatePassword');
   Route::put('/update/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');

   // Đánh giá sản phẩm
   Route::prefix('danhgias')->name('danhgias.')->group(function () {
   Route::get('/', [DanhgiaController::class, 'index'])->name('index');
   Route::get('create', [DanhgiaController::class, 'create'])->name('create');
   Route::post('store', [DanhgiaController::class, 'store'])->name('store');
   Route::delete('/{id}/destroy', [DanhgiaController::class, 'destroy'])->name('destroy');  
    });

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
});

// Routes for authenticated users with 'staff' role
Route::prefix('staff')->name('staff.')->middleware('auth', 'role:staff')->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    Route::get('/khachhangs', [UserController::class, 'khachhangs'])->name('khachhangs'); // Display users list
    Route::get('/khachhang/{id}', [UserController::class, 'show'])->name('taikhoans.show'); // Show user details

});



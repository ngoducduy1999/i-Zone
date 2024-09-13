<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffDashboardController;
use App\Http\Controllers\Admin\UserController;

// Routes for admin with auth and admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin');

    // CRUD routes for User management
    Route::get('/admin/khachhangs', [UserController::class, 'khachhangs'])->name('admin.khachhangs'); // Display users list
    Route::get('/admin/nhanviens', [UserController::class, 'nhanviens'])->name('admin.nhanviens'); // Display users list
    Route::get('/admin/taikhoans/create', [UserController::class, 'create'])->name('taikhoans.create'); // Create new user
    Route::post('/admin/taikhoans', [UserController::class, 'store'])->name('taikhoans.store'); // Store new user
    Route::get('/admin/taikhoans/{id}', [UserController::class, 'show'])->name('taikhoans.show'); // Show user details
    Route::get('/admin/taikhoans/{id}/edit', [UserController::class, 'edit'])->name('taikhoans.edit'); // Edit user
    Route::put('/admin/taikhoans/{id}', [UserController::class, 'update'])->name('taikhoans.update'); // Update user
    Route::delete('/admin/taikhoans/{id}', [UserController::class, 'destroy'])->name('taikhoans.destroy'); // Delete user
});

// Routes for login and register
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Routes for staff with auth and staff middleware
Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffDashboardController::class, 'index'])->name('staff');
    Route::get('/staff/khachhangs', [UserController::class, 'khachhangs'])->name('staff.khachhangs'); // Display users list

});

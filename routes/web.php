<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::resource('users', UserController::class);

Route::get('/admin', function () {
    return view('admins.dashboard');
})->name('admin');
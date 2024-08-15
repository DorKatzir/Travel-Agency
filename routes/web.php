<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});



// Admin
Route::middleware('admin')->prefix('admin')->group( function () {
    Route::get('/profile', [AdminAuthController::class, 'profile'])->name('admin_profile');
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard');
});


Route::prefix('admin')->group( function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
    Route::post('/login', [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');

    Route::get('/forget_password', [AdminAuthController::class, 'forget_password'])->name('admin_forget_password');
    Route::get('/reset_password', [AdminAuthController::class, 'reset_password'])->name('admin_reset_password');
});



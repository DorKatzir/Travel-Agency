<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;

Route::get('/', function () {
    return view('welcome');
});



// Admin
Route::prefix('admin')->group( function () {
    Route::get('/login', [AdminLoginController::class, 'login'])->name('admin_login');

});



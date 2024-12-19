<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/dashboard');

Route::middleware('auth:admin')->group(function () {

    Route::view('/dashboard', 'admin.dashboard.index')->name('dashboard');

});

Route::middleware('guest')->prefix('login')->as('login.')->group(function () {

    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('/store', [LoginController::class, 'store'])->name('store');

});

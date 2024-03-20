<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\SettingsController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/registration');

Route::middleware('guest')->group(function () {

    Route::view('/registration', 'registration.index')->name('registration');

    Route::post('/registration', RegistrationController::class)->name('registration.store');

    Route::view('/login', 'login.index')->name('login');

    Route::post('/login', LoginController::class)->name('login.store');

});

Route::middleware('auth')->group(function () {

    Route::redirect('/user', '/user/settings')->name('user');

    Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');

    Route::post('/logout', LogoutController::class)->name('logout');

});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\SettingsController;

Route::redirect('/', '/registration');

Route::middleware('guest')->group(function () {

    Route::view('/registration', 'registration.index')->name('registration');

    Route::post('/registration', RegistrationController::class)->name('registration.store');

    Route::view('/login', 'login.index')->name('login');

    Route::post('/login', LoginController::class)->name('login.store');

});

Route::middleware(['auth', 'online'])->group(function () {

    Route::redirect('/user', '/user/settings')->name('user');

    Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');

    Route::get('/user/settings/profile', [ProfileController::class, 'edit'])
        ->name('user.settings.profile.edit');

    Route::post('/user/settings/profile', [ProfileController::class, 'update'])
        ->name('user.settings.profile.update');

    Route::get('/user/settings/password', [PasswordController::class, 'edit'])
        ->name('user.settings.password.edit');

    Route::post('/user/settings/password', [PasswordController::class, 'update'])
        ->name('user.settings.password.update');


    Route::post('/logout', LogoutController::class)->name('logout');

});

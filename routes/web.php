<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/registration');

Route::view('/registration', 'registration.index')->name('registration');

Route::post('/registration', RegistrationController::class)->name('registration.store');

Route::view('/login', 'login.index')->name('login');

Route::post('/login', LoginController::class)->name('login.store');

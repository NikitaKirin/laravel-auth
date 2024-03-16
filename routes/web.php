<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/registration');

Route::view('/registration', 'registration.index')->name('registration');

Route::post('/registration', RegistrationController::class)->name('registration.store');

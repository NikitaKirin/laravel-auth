<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\User\PasswordController as UserPasswordController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\TwoFAController;
use App\Http\Middleware\EmailConfirmedMiddleware;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/registration');

Route::middleware('guest')->group(function () {
    Route::view('/registration', 'registration.index')->name('registration');

    Route::post('/registration', RegistrationController::class)->name('registration.store');

    Route::view('/login', 'login.index')->name('login');

    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::view('/login/{loginAttempt:uuid}/confirmation', 'login.confirmation')
        ->name('login.confirmation')
        ->whereUuid('loginAttempt');
    Route::post('/login/{loginAttempt:uuid}/confirm', [LoginController::class, 'confirm'])
        ->name('login.confirm')
        ->whereUuid('loginAttempt');

    Route::get('/auth/social/{driver}/redirect', [SocialController::class, 'redirect'])
        ->name('auth.social.redirect');
    Route::get('/auth/social/{driver}/callback', [SocialController::class, 'callback'])
        ->name('auth.social.callback');

    Route::view('/password', 'password.index')->name('password');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
    Route::view('/password/confirm', 'password.confirm')->name('password.confirm');
    Route::get('/password/{password:uuid}', [PasswordController::class, 'edit'])
        ->name('password.edit')
        ->whereUuid('password');
    Route::post('/password/{password:uuid}', [PasswordController::class, 'update'])
        ->name('password.update')
        ->whereUuid('password');
});

Route::middleware('auth')->prefix('/email')->as('email.')->group(function () {
    Route::get('/confirmation', [EmailController::class, 'index'])->name('confirmation');
    Route::post('/{email:uuid}/send', [EmailController::class, 'send'])
        ->name('confirmation.send')
        ->whereUuid('email');
    Route::match(['get', 'post'], '/{email:uuid}/confirm', [EmailController::class, 'confirm'])
        ->name('confirm')
        ->withoutMiddleware('auth')
        ->whereUuid('email');
});

Route::middleware(['auth', 'online'])->group(function () {
    Route::redirect('/user', '/user/settings')->name('user');

    Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');

    Route::get('/user/settings/profile', [ProfileController::class, 'edit'])
        ->name('user.settings.profile.edit')->middleware(EmailConfirmedMiddleware::class);

    Route::post('/user/settings/profile', [ProfileController::class, 'update'])
        ->name('user.settings.profile.update')->middleware(EmailConfirmedMiddleware::class);

    Route::get('/user/settings/password', [UserPasswordController::class, 'edit'])
        ->name('user.settings.password.edit');

    Route::post('/user/settings/password', [UserPasswordController::class, 'update'])
        ->name('user.settings.password.update');

    Route::view('/user/settings/email/edit', 'user.settings.email.edit')
        ->name('user.settings.email.edit');

    Route::get('/user/settings/two-fa', [TwoFAController::class, 'index'])
        ->name('user.settings.two-fa.index');
    Route::post('/user/settings/two-fa/enable', [TwoFAController::class, 'enable'])
        ->name('user.settings.two-fa.enable');
    Route::post('/user/settings/two-fa/disable', [TwoFAController::class, 'disable'])
        ->name('user.settings.two-fa.disable');

    Route::post('/logout', LogoutController::class)->name('logout');
});

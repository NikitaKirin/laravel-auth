<?php

use App\Http\Middleware\OnlineMiddleware;
use App\Http\Middleware\SetAdminSessionCookieNameMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('admin')
                ->middleware(['web'])
                ->as('admin.')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(
            fn (Request $request) => $request->is('admin*') ? route('admin.login.index') : route('login'),
        );
        $middleware->redirectUsersTo(
            fn (Request $request) => $request->is('admin*') ? '/admin' : '/user',
        );
        $middleware->alias([
            'online' => OnlineMiddleware::class,
        ]);
        $middleware->web(prepend: [
           SetAdminSessionCookieNameMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class SetAdminSessionCookieNameMiddleware
{
    public const string COOKIE_NAME = 'admin_session';

    public function handle(Request $request, Closure $next)
    {
        if ($request->is('admin*')) {
            Session::setName(self::COOKIE_NAME);
            Config::set('session.cookie', self::COOKIE_NAME);
        }
        return $next($request);
    }
}

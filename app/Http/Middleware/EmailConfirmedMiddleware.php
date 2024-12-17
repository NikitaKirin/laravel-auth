<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailConfirmedMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!is_null($user->email) && !$user->isEmailConfirmed()) {
            return redirect()->guest(route('email.confirmation'));
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailConfirmedMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User */
        $user = $request->user();

        if (!$user->isEmailConfirmed()) {
            return redirect()->guest(route('email.confirmation'));
        }

        return $next($request);
    }
}

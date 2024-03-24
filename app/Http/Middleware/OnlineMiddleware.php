<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlineMiddleware
{
    /**
     * Updated the online status of auth user every 5 minutes
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$user = $request->user()) {
            return $next($request);
        }

        if ($user->online_at < now()->subMinutes(5)) {
            $user->update(['online_at' => now()]);
        }

        return $next($request);
    }
}

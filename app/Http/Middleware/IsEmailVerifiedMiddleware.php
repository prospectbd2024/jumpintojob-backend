<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsEmailVerifiedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!\Auth::user()->email_verified_at) {
            return response()->json([
                'message' => 'Please verify your email address to access this feature'
            ], 403);
        }
        return $next($request);
    }
}

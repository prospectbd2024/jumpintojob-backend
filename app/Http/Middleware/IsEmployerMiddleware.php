<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsEmployerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::user()->user_type != 'employer') {
            return response()->json([
                'message' => 'you have no permission to access this feature'
            ], 403);
        }

        return $next($request);
    }
}

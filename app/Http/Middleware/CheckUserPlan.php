<?php

namespace App\Http\Middleware;

use App\Services\UserPlanService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserPlan
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        $userPlanService = app(UserPlanService::class);

        if ($userPlanService->getUserPlan($user)->name == 'Free') {
            return response()->json([
                'message' => 'You have to switch free to pro plan to use this feature'
            ], 403);
        }

        return $next($request);
    }
}

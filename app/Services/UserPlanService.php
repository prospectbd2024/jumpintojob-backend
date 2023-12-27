<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPlanService
{

    public static function getUserPlan(): \Illuminate\Database\Eloquent\Relations\BelongsTo|null
    {
        return auth()->user()->userPlan->first();
    }

    public static function isFreePlan(): bool
    {
        return auth()->user()->userPlan->where('name', 'Free')->exists();
    }

    public static function isProPlan(): bool
    {
        return auth()->user()->userPlan->where('name', 'Pro')->exists();
    }

    public static function hasReachedCvPlanLimit(): bool
    {
        return Auth::user()->cvs->count() >= 1;
    }
}

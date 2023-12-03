<?php

namespace App\Services;

use App\Models\User;

class UserPlanService
{

    public function getUserPlan(): \Illuminate\Database\Eloquent\Relations\BelongsTo|null


    {
        return auth()->user()->userPlan->first();
    }

    public function isFreePlan(): bool
    {
        return auth()->user()->userPlan->where('name', 'Free')->exists();
    }

    public function isProPlan(): bool
    {
        return auth()->user()->userPlan->where('name', 'Pro')->exists();
    }

    public function hasReachedCvPlanLimit(): bool
    {
        return auth()->user()->cvs->count() >= 1;
    }
}

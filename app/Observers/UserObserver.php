<?php

namespace App\Observers;

use App\Models\User;
use App\Services\AuthService;

class UserObserver
{
    public function created(User $user): void
    {
        cache()->forget('user_' . $user->id);
        AuthService::sendWelcomeEmailToUser($user);
    }
    public function updated(User $user): void
    {
        cache()->forget('user_' . $user->id);
    }
}

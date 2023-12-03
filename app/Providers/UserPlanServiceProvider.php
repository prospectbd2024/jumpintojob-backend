<?php

namespace App\Providers;

use App\Services\UserPlanService;
use Illuminate\Support\ServiceProvider;

class UserPlanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
      $this->app->singleton(UserPlanService::class, function () {
            return new UserPlanService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

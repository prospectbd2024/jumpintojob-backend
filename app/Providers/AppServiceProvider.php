<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\SanctumServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FileUploadService::class, function ($app) {
            return new FileUploadService();
        });
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        User::observe(UserObserver::class);

        // password validation rules
        Password::defaults(function () {
            return Password::min(6);
//                ->letters()
//                ->numbers()
//                ->symbols()
//                ->mixedCase()
//                ->uncompromised();
        });
    }
}

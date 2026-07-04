<?php

namespace App\Providers;

use App\Models\User;
use App\Enums\LevelUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Gate::define('superadmin', function (User $user) {
            return $user->level === LevelUser::SuperAdmin;
        });
    }
}

<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\ProjectPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update_project', [ProjectPolicy::class, 'update']);
        Gate::define('is_admin', [UserPolicy::class, 'isAdmin']);
        Gate::define('update_user', [UserPolicy::class, 'update']);
        Gate::define('profile_user', [UserPolicy::class, 'profile']);
    }
}

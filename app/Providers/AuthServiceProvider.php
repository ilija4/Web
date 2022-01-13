<?php

namespace App\Providers;

use App\Models\DoctorWhoSeason;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-or-delete', function (User $user, DoctorWhoSeason $season) {
            return intval($user->id) === intval($season->user_id) || $user->is_admin;
        });

        Gate::define('add', function (User $user, $user_id) {
            return intval($user->id) === intval($user_id);
        });

        Gate::define('restore-or-full-delete', function (User $user) {
            return $user->is_admin;
        });
    }
}

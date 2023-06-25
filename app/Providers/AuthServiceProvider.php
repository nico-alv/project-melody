<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user, $ability) {
            switch ($user->role) {
                case 'Usuario':
                    if ($ability !== 'viewUserDashboard') {
                        return false;
                    }
                    return true;
                case 'Administrador':
                    if ($ability !== 'viewAdminDashboard') {
                        return false;
                    }
                    return true;
                default:
                    return false;
            }
        });
    }
}

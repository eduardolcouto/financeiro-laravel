<?php

namespace Finlaravel\Providers;

use Finlaravel\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Finlaravel\Model' => 'Finlaravel\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-admin',function($user){
            return $user->role == User::ROLE_ADMIN;
        });
    }
}

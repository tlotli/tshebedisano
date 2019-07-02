<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('users' , 'App\Policies\UserPolicy');
        Gate::resource('repository' , 'App\Policies\RepositoryPolicy');
        Gate::resource('files' , 'App\Policies\FilePolicy');
        Gate::resource('roles' , 'App\Policies\RolePolicy');
        Gate::resource('logs' , 'App\Policies\LogsPolicy');
	    Gate::define('users.reset' , 'App\Policies\UserPolicy@reset');
	    Gate::define('files.restore' , 'App\Policies\FilePolicy@restore');
    }
}

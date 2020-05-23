<?php

namespace App\Providers;

use App\Permission;
use Gate;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //this function is action to know what can user do!
        Permission::get()->map(function ($permission)
        {
            Gate::define($permission->name, function ($user) use ($permission)
            {
                return $user->hasPermissionTo($permission);
            });
        });
    }
}

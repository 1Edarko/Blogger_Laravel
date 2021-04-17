<?php

namespace App\Providers;

use App\Policies\AdminPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
       ' App\Models\Post' => 'App\Policies\PostPolicy',
       ' App\Models\admin\Admin' => 'App\Policies\AdminPolicy',
       ' App\Models\admin\Permission' => 'App\Policies\PermissionPolicy',


    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('posts',PostPolicy::class);
        Gate::define('tags',[PostPolicy::class , 'Tags']);
        Gate::define('cats',[PostPolicy::class , 'cats']);
        Gate::define('users',[AdminPolicy::class , 'users']);
        Gate::define('user.roles',[AdminPolicy::class , 'user_roles']);
        Gate::define('permissions',[PermissionPolicy::class , 'permissions']);
        Gate::define('assign.permissions' ,[PermissionPolicy::class , 'assign_permissions']);







    }
}

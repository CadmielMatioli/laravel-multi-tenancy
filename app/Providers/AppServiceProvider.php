<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void {}

    public function boot(): void {
        if ($this->app->runningInConsole()) return;

        $currentCompanyId = 1;
//        $currentCompanyId = session('company_id');


        $roles = Role::where('company_id', $currentCompanyId)->with('permissions')->get();

        $permissions = $roles->flatMap(function ($role) {
            return $role->permissions;
        })->unique('id');

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function ($user) use ($permission, $currentCompanyId) {
                return $user->hasPermissionForCompany($permission->name, $currentCompanyId);
            });
        }
    }
}

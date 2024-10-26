<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LoadPermissions {

    public function handle(Request $request, Closure $next): Response
    {
        $currentCompanyId = session('company_id');
        if($currentCompanyId){
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
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Services\CompanyService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LoadPermissions {

    public function __construct(private readonly CompanyService $companyService){}

    public function handle(Request $request, Closure $next): Response
    {
        $currentCompanyUuid = session('company_uuid');
        if($currentCompanyUuid){
            $currentCompanyId = $this->companyService->getByUuid($currentCompanyUuid)->id;
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

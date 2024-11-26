<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Str;

class RoleService {

    public function __construct(private readonly Role $role, private readonly PermissionService $permissionService, private readonly CompanyService $companyService) {}

    public function getByUuid($uuid = null){
        return $this->role->where('uuid', $uuid ?? request()->uuid)->firstOrFail();
    }

    public function get(){
        $roles = $this->role->when(request()->name, fn($query) => $query->where('name', 'like', '%' . request()->name . '%'));
        if (auth()->user()->isSuperAdmin() || auth()->user()->isMaster()) {
            $roles = $roles->with('permissions');
        }
        if(session()->has('company_uuid')){
            $roles = $roles->where('company_id', auth()->user()->currentCompany()->id)->with('permissions');
        }
        return $roles->paginate(config('pagination.per_page'));
    }

    public function create(): void {
        $role = $this->role->create([
            'name' => request()->name,
            'company_id' => $this->companyService->getByUuid(session()->get('company_uuid'))->id
        ]);
        $permissions = collect(request()->permissions)->map(fn($permission) => $this->permissionService->getByUuid($permission)->id);
        $role->permissions()->attach($permissions);
    }

    public function update($role): void {
        $role = $this->getByUuid($role);
        $role->update([
            'name' => request()->name,
            'company_id' => $this->companyService->getByUuid(session()->get('company_uuid'))->id,
        ]);
        $permissions = collect(request()->permissions)->map(fn($permissionUuid) => $this->permissionService->getByUuid($permissionUuid)->id);
        $role->permissions()->sync($permissions);
    }

    public function delete($role){
        $this->getbyUuid($role)->delete();
    }
}

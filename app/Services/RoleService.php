<?php

namespace App\Services;

use App\Models\Role;
use App\Utils\Utils;
use Illuminate\Support\Str;

class RoleService {

    private readonly Role $role;
    private readonly Utils $utils;
    private readonly PermissionService $permissionService;
    private readonly CompanyService $companyService;

    public function __construct() {
       $this->role = new Role();
       $this->utils = new Utils();
       $this->permissionService = new PermissionService();
       $this->companyService = new CompanyService();
    }

    public function getByUuid($uuid = null){
        return $this->role->where('uuid', $uuid ?? request()->uuid)->firstOrFail();
    }

    public function getBaseQuery(){
        $roles = $this->role
            ->when(request()->name, fn($query) => $query->where('name', 'like', '%' . request()->name . '%'))
            ->with('company');
        if (auth()->user()->isSuperAdmin()) {
            $roles = $roles->with('permissions');
        }
        if(session()->has('company_uuid')){
            $roles = $roles->where('company_id', auth()->user()->currentCompany()->id)->with('permissions');
        }
        return $roles;
    }


    public function get(){
        return $this->utils->pagination($this->getBaseQuery());
    }

    public function getUserUpdate($user){
        $roles = $this->getBaseQuery()->orWhereIn('company_id', $user->companies->pluck('id')->toArray());
        if (auth()->user()->isSuperAdmin()) {
            $roles = $roles->orWhereNull('company_id');
        }
        return $roles;
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

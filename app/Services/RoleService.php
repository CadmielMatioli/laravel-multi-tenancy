<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Str;

class RoleService {

    public function __construct(private readonly Role $role) {}

    public function getByUuid($uuid = null){
        return $this->role->where('uuid', $uuid ?? request()->uuid)->first();
    }

    public function get(){
        $roles = $this->role;
        if (auth()->user()->isSuperAdmin() || auth()->user()->isMaster()) {
            $roles = $this->role->with('permissions');
        }
        if(session()->has('company_uuid')){
            $roles = $this->role->where('company_id', session()->get('company_id'))->with('permissions');
        }
        return $roles->paginate(config('pagination.per_page'));
    }

    public function create($request){
        $existingCompany = $this->role->withTrashed()->where('cnpj', $request->cnpj)->first();
        if ($existingCompany && $existingCompany->trashed()) {
            $existingCompany->restore();
            $existingCompany->update($request->validated());
            return true;
        }

        return $this->role->create([
            'name' => $request->name,
            'uuid' => (string) Str::uuid(),
            'cnpj' => $request->cnpj
        ]);

    }

    public function update($request, $company){
        $company->update([
            'name' => $request->name,
            'uuid' => (string) Str::uuid(),
            'cnpj' => $request->cnpj
        ]);
    }
}

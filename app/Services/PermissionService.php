<?php

namespace App\Services;

use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionService {

    public function __construct(private readonly Permission $permission) {}

    public function getByUuid($uuid = null){
        return $this->permission->where('uuid', $uuid ?? request()->uuid)->first();
    }

    public function get(){
        $permissions = $this->permission->when(request()->filled('name'), fn($query) => $query->where('name', 'like', '%' . request()->input('nome') . '%'))
            ->when(request()->filled('description'), fn($query) => $query->where('description', 'like', '%' . request()->input('description') . '%'));

        if (auth()->user()->isSuperAdmin() || auth()->user()->isMaster()) {
            $permissions = $permissions->with('categories');
        }
        if(session()->has('company_uuid')){
            $permissions = $permissions->whereHas('categories', fn($query) => $query->whereIn('name', ['company']))->with('categories');
        }
        return $permissions->orderBy('name', 'asc')->paginate(config('pagination.per_page'));
    }

}

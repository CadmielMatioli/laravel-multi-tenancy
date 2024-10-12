<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;

class PermissionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct() {}

    public function hasPermission(User $user, string $permissionName): bool {
        $permission = Permission::where('name', $permissionName)->first();

        if (!$permission)
            abort(403);

        $hasPermission = $user->roles->filter(function ($role) use ($permission) {
            return $this->roleHasPermission($role, $permission);
        });

        return count($hasPermission) > 0;
    }

    public function roleHasPermission($role, $permission) {
        return $role->permissions->contains('id', $permission->id);
    }
}

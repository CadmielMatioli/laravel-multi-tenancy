<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable {
    use Notifiable, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companies(): BelongsToMany {
        return $this->belongsToMany(Company::class)
            ->withTimestamps()
            ->withPivot('deleted_at')
            ->using(CompanyUser::class);
    }

    public function roles(): BelongsToMany {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function isMaster(): bool {
        return $this->roles()->where('name', 'master')->exists();
    }

    public function isSuperAdmin() {
        return auth()->user()->in_admin;
    }

    public function userRolesCompany($companyId): BelongsToMany {
        return $this->roles()->where('company_id', $companyId);
    }

    public function rolesByCompany($companyId): Collection {
        return $this->userRolesCompany($companyId)->get();
    }

    public function hasRoleForCompany($roleName, $companyId): bool {
        return $this->rolesByCompany($companyId)->where('name', $roleName)->exists();
    }

    public function hasPermissionForCompany($permissionName, $companyId): bool {
        foreach ($this->rolesByCompany($companyId) as $role) {
            if ($role->permissions()->where('name', $permissionName)->exists()) {
                return true;
            }
        }
        return false;
    }

    public function getAllPermissions(): array {
        $roles = $this->roles()->where('company_id', 1)->get();
        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                if (!in_array($permission->name, $permissions)) {
                    $permissions[] = $permission->name;
                }
            }
        }
        return $permissions;
    }


}

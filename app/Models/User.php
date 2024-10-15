<?php

namespace App\Models;

use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ScopedBy([TenantScope::class])]
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
        return $this->belongsToMany(Company::class, 'companies_users')
            ->withTimestamps()
            ->withPivot('deleted_at')
            ->using(CompanyUser::class);
    }

    public function roles(): BelongsToMany {
        return $this->belongsToMany(Role::class, 'roles_users');
    }

    public function isMaster(): bool {
        return $this->roles()->where('name', 'master')->exists();
    }

    public function isSuperAdmin() {
        return auth()->user()->in_admin;
    }


}

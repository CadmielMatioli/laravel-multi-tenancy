<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status'];

    public function permissions(): BelongsToMany {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'roles_users');
    }
}

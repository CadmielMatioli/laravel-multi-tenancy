<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model {
    protected $fillable = ['name'];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'companies_users')
            ->withTimestamps()
            ->withPivot('deleted_at')
            ->using(CompanyUser::class);
    }

    public function roles(): HasMany {
        return $this->hasMany(Role::class);
    }
}

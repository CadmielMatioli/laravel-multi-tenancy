<?php

namespace App\Models;

use App\Models\Scopes\CompanyTenantScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ScopedBy([CompanyTenantScope::class])]
class Company extends Model {
    protected $fillable = ['name'];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'companies_users')
            ->withTimestamps()
            ->withPivot('deleted_at')
            ->using(CompanyUser::class);
    }
}

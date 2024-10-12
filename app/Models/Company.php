<?php

namespace App\Models;

use App\Models\Scopes\CompanyTenantScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy([CompanyTenantScope::class])]
class Company extends Model
{
    protected $fillable = ['name'];

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
}

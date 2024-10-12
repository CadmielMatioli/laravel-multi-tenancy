<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CompanyTenantScope implements Scope
{

    public function apply(Builder $builder, Model $model): void {
        $user = auth()->user();
        if ($user && !$user->is_admin) {
            $builder->where('id', $user->company_id);
        }
    }
}

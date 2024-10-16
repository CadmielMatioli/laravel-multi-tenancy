<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePermission extends Pivot {
    use SoftDeletes;

    protected $table = 'permission_role';
}

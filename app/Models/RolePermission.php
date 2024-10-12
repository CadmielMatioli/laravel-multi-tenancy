<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePermission extends Model {
    use SoftDeletes;

    protected $table = 'roles_permissions';
}

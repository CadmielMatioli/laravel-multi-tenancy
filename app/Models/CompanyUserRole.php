<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUserRole extends Model {
    use SoftDeletes;

    protected $table = 'company_user_role';
}

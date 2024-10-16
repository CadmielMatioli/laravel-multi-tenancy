<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUser extends Pivot {
    use SoftDeletes;

    protected $table = 'company_user';
}

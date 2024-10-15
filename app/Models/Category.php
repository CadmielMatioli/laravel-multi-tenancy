<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Category extends Model {
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    public function permissions(): BelongsToMany {
        return $this->belongsToMany(Permission::class, 'categories_permissions', 'category_id', 'permission_id');
    }

}

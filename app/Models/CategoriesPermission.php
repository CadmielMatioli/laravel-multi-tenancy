<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesPermission extends Pivot {

    use SoftDeletes;
    protected $fillable = [
        'category_id',
        'permission_id',
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function permission(): BelongsTo {
        return $this->belongsTo(Permission::class);
    }
}

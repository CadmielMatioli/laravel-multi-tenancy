<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoriesPermission extends Pivot {
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

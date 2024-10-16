<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status', 'company_id'];

    public function permissions(): BelongsToMany {
        return $this->belongsToMany(Permission::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function company(): BelongsTo {
        return $this->belongsTo(Company::class);
    }
}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\Absence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'id_used_by'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function absence(): HasMany
    {
        return $this->hasMany(Absence::class);
    }
}

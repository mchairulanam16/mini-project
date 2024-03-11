<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'id_user_get'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use App\Models\Absence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function absence(): HasMany
    {
        return $this->hasMany(Absence::class);
    }
}

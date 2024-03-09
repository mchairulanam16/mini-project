<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_class', 'id_subject', 'id_user', 'id_code', 'teaching_role', 'date', 'start', 'end', 'duration'
    ];

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }

    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function code(): HasMany
    {
        return $this->hasMany(Code::class);
    }

}

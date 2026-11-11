<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relasi: 1 Mata Pelajaran hanya diajar oleh 1 Guru.
     */
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }
}

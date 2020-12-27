<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'days','from','to'
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}

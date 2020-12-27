<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'type' , 'fee'
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}

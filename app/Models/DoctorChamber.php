<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorChamber extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id','name','name_bn','division_id','city_id','area_id','phone','lat','lng','image'
    ];
}

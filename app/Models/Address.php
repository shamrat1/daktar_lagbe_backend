<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id','city_id','address_line_1','address_line_2','area_id'
    ];

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}

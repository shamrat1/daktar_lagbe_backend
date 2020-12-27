<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'division_id','city_id','address_line_1','address_line_2'
    ];
    
    use HasFactory;
}

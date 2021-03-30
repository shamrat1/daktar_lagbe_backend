<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestFacility extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_bn','price','features','extra'];

}

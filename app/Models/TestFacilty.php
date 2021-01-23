<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestFacilty extends Model
{
    use HasFactory;

    protected $table = "test_facilities";

    protected $fillable = ['name','name_bn','price','features','extra'];
}

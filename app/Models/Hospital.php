<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_bn',
        'branch_name',
        'address_id',
        'image',
        'image_thumb',
        'reception_phone',
        'location_lat',
        'localtion_lng'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function services()
    {
        return $this->hasMany(Services::class);
    }

    public function surguries()
    {
        return $this->hasMany(Surgery::class);
    }

    public function test_facilities()
    {
        return $this->hasMany(TestFacilty::class);
    }

}

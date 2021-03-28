<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
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
        'location_lng',
    ];
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function services()
    {
        return $this->belongsToMany(Services::class,'clinic_service','service_id','clinic_id');
    }

    public function surguries()
    {
        return $this->belongsToMany(Surgery::class,'clinic_surgery','surgery_id','clinic_id');
    }

    public function test_facilities()
    {
        return $this->belongsToMany(TestFacilty::class,'clinic_test_facility','test_facility_id','clinic_id');
    }

    // Attributes start here
    public function getCompleteAddressAttribute(){
        $address = $this->address;
        return $address->address_line_1.", ".$address->address_line_2.", ".$address->city->name.", ".$address->division->name;
    }
}

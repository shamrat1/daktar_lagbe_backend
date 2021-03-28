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
        return $this->belongsTo(Address::class);
    }

    public function services()
    {
        return $this->belongsToMany(Services::class,'hospital_service','service_id','hospital_id');
    }

    public function surguries()
    {
        return $this->belongsToMany(Surgery::class,'hospital_surgery','surgery_id','hospital_id');
    }

    public function test_facilities()
    {
        return $this->belongsToMany(TestFacilty::class,'hospital_test_facility','test_facility_id','hospital_id');
    }

    // Attributes start here
    public function getCompleteAddressAttribute(){
        $address = $this->address;
        return $address->address_line_1 ?? ''.", ".$address->address_line_1 ?? ''.", ".$address->city->name.", ".$address->division->name;
    }

}

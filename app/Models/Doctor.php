<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id','name','name_bn','bmdc_code','department_id','expertise_id','designation_id','extra_fee','phone','note'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    
    public function department()
    {
        return $this->hasOne(Department::class,'department_id');
    }

    public function designation()
    {
        return $this->hasOne(Designation::class,'designation_id');
    }

    public function expertise()
    {
        return $this->hasOne(Expertise::class,'expertise_id');
    }

    public function visit_fees()
    {
        return $this->belongsToMany(VisitFee::class);
    }

    public function visit_hours()
    {
        return $this->belongsToMany(VisitHour::class);
    }

    // Attributes start here
    public function getCompleteAddressAttribute(){
        $address = $this->address;
        return $address->address_line_1 ?? ''.", ".$address->address_line_1 ?? ''.", ".$address->city->name.", ".$address->division->name;
    }
}

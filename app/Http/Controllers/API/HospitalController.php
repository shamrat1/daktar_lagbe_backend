<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalStoreRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function store(HospitalStoreRequest $request)
    {
        // 'name' => 'required|string|min:6',
        // 'name_bn' => 'required',
        // 'branch_name' => 'nullable',
        // 'division_id' => 'required|numeric',
        // 'city_id' => 'required|numeric',
        // 'address_line_1' => 'required|string|max:191',
        // 'address_line_2' => 'nullable|string|max:191',
        // 'image' => 'required|image',
        // 'reception_phone' => 'required|string',
        // 'location_lat' => 'required|string',
        // 'location_lng' => 'required|string'
        $data = $request->validated();
        $address = Address::create([
            'division_id' => $request->division_id,
            'city_id' => $request->city_id,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
        ]);
        $data->merge('address_id',$address->id);
        $hospital = Hospital::create();
        
    }
}

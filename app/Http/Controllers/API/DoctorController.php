<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorStoreRequest;
use App\Models\Address;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function store(DoctorStoreRequest $request)
    {
        $data = $request->validated();
        $address = Address::create([
            'division_id' => $request->division_id,
            'city_id' => $request->city_id,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
        ]);
        $data->merge('address_id',$address->id);
        $hospital = Doctor::create();
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClinicStoreRequest;
use App\Models\Address;
use App\Models\Clinic;
use App\Traits\ImageOperations;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;
use Exception;

class ClinicController extends Controller
{
    use ImageOperations;
    
    public function store(ClinicStoreRequest $request)
    {
        $data = $request->validated();
        try{
            $image = $this->saveImage(
                "Hospitals",
                Image::make($request->image),
                'hospital',
                false,
                'other'
            );
        }catch (Exception $e){
            $image = 'default.jpg';
        }
        $data['image'] = $image;
        try {
            DB::beginTransaction();
            $address = Address::create([
                'division_id' => $request->division_id,
                'city_id' => $request->city_id,
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
            ]);
            $data['address_id'] = $address->id;
            $clinic = Clinic::create($data);
            $clinic->test_facilites()->sync($request->test_facilites);
            $clinic->services()->sync($request->services);
            $clinic->surgeries()->sync($request->surgeries);

            $clinic->load(['test_facilities','services','surgeries']);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }


        return response()->json($clinic);
    }
}

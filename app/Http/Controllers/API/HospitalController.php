<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalStoreRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Traits\ImageOperations;
use App\Traits\JsonResponse;
use Exception;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class HospitalController extends Controller
{
    use JsonResponse, ImageOperations;
    
    public function store(HospitalStoreRequest $request)
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
            $hospital = Hospital::create($data);
            if ($request->has('services')) {
                $hospital->services()->sync(is_array($request->services) ? $request->services : explode(",",$request->services));
            }
            if ($request->has('surgeries')) {
                $hospital->surgeries()->sync(is_array($request->surgeries) ? $request->surgeries : explode(",",$request->surgeries));
            }
            if ($request->has('test_facilities')) {
                $hospital->test_facilities()->sync(is_array($request->test_facilities) ? $request->test_facilities : explode(",",$request->test_facilities));
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return $this->errorResponse("error","Failed to add Hospital. Try Again!",[$e]);
        }
        return $this->responseBody("success","New Hospital Created Successfully.",$hospital);
    }
}

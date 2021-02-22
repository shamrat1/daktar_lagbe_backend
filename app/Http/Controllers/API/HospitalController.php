<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalStoreRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Traits\JsonResponse;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    use JsonResponse;
    
    public function store(HospitalStoreRequest $request)
    {
        $data = $request->validated();
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
                $hospital->services()->sync($request->services);
            }
            if ($request->has('surgeries')) {
                $hospital->surgeries()->sync($request->surgeries);
            }
            if ($request->has('test_facilites')) {
                $hospital->test_facilities()->sync($request->test_facilities);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse("error","Failed to add Hospital. Try Again!",[$e]);
        }
        return $this->responseBody("success","New Hospital Created Successfully.",$hospital);
    }
}

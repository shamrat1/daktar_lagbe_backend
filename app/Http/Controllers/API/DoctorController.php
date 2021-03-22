<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorStoreRequest;
use App\Models\Address;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Doctor;
use App\Models\Expertise;
use App\Models\VisitFee;
use App\Models\VisitHour;
use App\Traits\ImageOperations;
use App\Traits\JsonResponse;
use Exception;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;

class DoctorController extends Controller
{
    use JsonResponse, ImageOperations;

    public function store(DoctorStoreRequest $request)
    {
        $this->validate($request,[
            'division_id' => 'required',
            'city_id' => 'required',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'name' => 'required|string|min:4',
            'visiting_hours' => 'required',
            'visiting_fees' => 'required',
        ]);

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
        $address = Address::create([
            'division_id' => $request->division_id,
            'city_id' => $request->city_id,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
        ]);
        $data['address_id'] = $address->id;
        $doctor = Doctor::create($data);
        $hours = explode(',',$request->visiting_hours);
        $fees = explode(',',$request->visiting_fees);
        $doctor->visit_hours()->sync($hours);
        $doctor->visit_fees()->sync($fees);

        return $this->responseBody("success","Doctor Created SuccessFully",$doctor);
    }

    public function getEssentials()
    {
        $departments = Department::get();
        $designations = Designation::get();
        $expertises = Expertise::get();
        return response()->json([
            'status' => 'success',
            'msg' => 'Departments, designations and expertises are fetched.',
            'data' => [
                'departments' => $departments,
                "designations" => $designations,
                'expertises' => $expertises
                ]
        ]);
    }

//    public function store(DoctorStoreRequest $request)
//    {
//        $data = $request->validated();
//        try{
//            DB::beginTransaction();
//            $address = Address::create([
//                'division_id' => $request->division_id,
//                'city_id' => $request->city_id,
//                'address_line_1' => $request->address_line_1,
//                'address_line_2' => $request->address_line_2,
//            ]);
//            $data['address_id'] = $address->id;
//            $doctor = Doctor::create($data);
//            $hours = explode(',',$request->visiting_hours);
//            $fees = explode(',',$request->visiting_fees);
//            $doctor->visit_hours()->sync($hours);
//            $doctor->visit_fees()->sync($fees);
//            DB::commit();
//            return $this->responseBody("success","Doctor Created SuccessFully",$doctor);
//        }catch(Exception $e){
//            DB::rollBack();
//            return $this->responseBody("error","Doctor creation failed",$e);
//        }
//
//    }
}

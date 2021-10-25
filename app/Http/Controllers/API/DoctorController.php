<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorStoreRequest;
use App\Models\Address;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Doctor;
use App\Models\DoctorChamber;
use App\Models\Experience;
use App\Models\Expertise;
use App\Models\Qualification;
use App\Models\User;
use App\Models\VisitFee;
use App\Models\VisitHour;
use App\Traits\ImageOperations;
use App\Traits\JsonResponse;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class DoctorController extends Controller
{
    use JsonResponse, ImageOperations;

    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $image = $this->saveImage(
                "doctors",
                Image::make($request->image),
                'doctor',
                false,
                'other'
            );
        }catch (Exception $e){
            $image = 'default.jpg';
        }
        try{
            DB::beginTransaction();
            $data['image'] = $image;
            // $address = Address::create([
            //     'division_id' => $request->division_id,
            //     'city_id' => $request->city_id,
            //     'area_id' => $request->area_id,
            //     'address_line_1' => $request->address_line_1,
            //     'address_line_2' => $request->address_line_2,
            // ]);
            // $data['address_id'] = $address->id;
            // create User

            // $user = User::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            //     'mobile' => $request->phone,
            // ]);

            // // create Doctor

            // $doctor = Doctor::create($data);

            // create qualifications

            // foreach($request->qualification_name ?? [] as $index => $qualification){
            //     Qualification::create([
            //         'name' => $qualification ?? '',
            //         'doctor_id' => $doctor->id,
            //         'inistitue' => $request->institute[$index],
            //         'country' => $request->country[$index],
            //         'passing_year' => $request->passing_year[$index],
            //         'duration' => $request->duration[$index]
            //     ]);
            // }

            // create experience
            // foreach($request->exp_name ?? [] as $index => $exp){
            //     Experience::create([
            //         'name' => $exp ?? '',
            //         'doctor_id' => $doctor->id,
            //         'designation' => $request->exp_designation[$index],
            //         'department' => $request->exp_department[$index],
            //         'exp_from' => $request->exp_from[$index],
            //         'exp_to' => $request->exp_to[$index],
            //     ]);
            // }
            // chamber address entry
            // $chamberImage = 'default-chamber.jpg';
            // if($request->has('doctor_chamber_image')){
            //     $chamberImage = $this->saveImage("chambers",$request->doctor_chamber_image,'chamber');
            // }
            // DoctorChamber::create([
            //     'doctor_id' => $doctor->id,
            //     'name' => $request->chamber_name,
            //     'name_bn' => $request->chamber_name_bn,
            //     'division_id' => $request->division_id,
            //     'city_id' => $request->city_id,
            //     'area_id' => $request->area_id,
            //     'phone' => $request->chamber_phone,
            //     'lat' => $request->chamber_lat,
            //     'lng' => $request->chamber_lng,
            //     'image' => $chamberImage,
            // ]);

            // add doctor misc features
            // $doctor->video_calling = $request->video_calling ?? false;
            // $doctor->voice_calling = $request->voice_calling ?? false;
            // $doctor->chat = $request->chat ?? false;

            // visiting hour & fees entry

            // $hours = explode(',',$request->visiting_hours);
            // $fees = explode(',',$request->visiting_fees);
            // $doctor->visit_hours()->sync($hours);
            // $doctor->visit_fees()->sync($fees);

            // nid photo front & back
            // if($request->has('nid_front')){
            //     $doctor->nid_front = $this->saveImage(
            //         "doctor",
            //         Image::make($request->nid_front),
            //         'nid-front',
            //         false,
            //         'other'
            //     );
                
            // }
            // if($request->has('nid_back')){
            //     $doctor->nid_back = $this->saveImage(
            //         "doctor",
            //         Image::make($request->nid_back),
            //         'nid-back',
            //         false,
            //         'other'
            //     );
            // }
            // $doctor->update();
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            return response()->json([
                'status' => 'failed',
                'msg' => 'failed to add doctor',
                'data' => $e->getMessage()
            ]);
        }
        

        return $this->responseBody("success","Doctor Created SuccessFully",[
            "doctor" => $doctor,
            "otp" => "123456",
        ]);
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

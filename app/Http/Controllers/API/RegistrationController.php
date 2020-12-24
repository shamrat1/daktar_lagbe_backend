<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Division;
use App\Models\Expertise;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    use JsonResponse;
    public function helper(String $type)
    {
        switch ($$type) {
            case 'doctor':
                $data["departments"] = Department::get();
                $data["expertises"] = Expertise::get();
                $data["designations"] = Designation::get();
                $data["divisions"] = Division::with('cities')->get();

                return $this->responseBody("success","Essentials for doctor registration fetched.",$data);
                break;
            case 'hospital':
                # code...
                break;
            case 'clinic':
                # code...
                break;
            default:
                # code...
                break;
        }
    }

}


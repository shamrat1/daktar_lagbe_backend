<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Division;
use App\Models\Expertise;
use App\Models\Services;
use App\Models\Surgery;
use App\Models\TestFacilty;
use App\Models\VisitHour;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    use JsonResponse;

    public function helper(String $type)
    {
        switch ($type) {
            case 'doctor':
                $data["departments"] = Department::get(['id','name']);
                $data["expertises"] = Expertise::get(['id', 'name']);
                $data["designations"] = Designation::get(['id', 'name']);
                $data["divisions"] = Division::with('cities')->get(['id', 'name']);
                $data["visit_hours"] = VisitHour::get(['id', 'name']);
                
                return $this->responseBody("success","Essentials for doctor registration fetched.",$data);
            case 'hospital':
                $data["services"] = Services::get(['id', 'name']);
                $data["surguries"] = Surgery::get(['id', 'name']);
                $data["test_facilities"] = TestFacilty::get(['id', 'name']);
                $data["divisions"] = Division::with('cities')->get(['id', 'name']);
                return $this->responseBody("success","Essentials for Hospital Registration fetched",$data);
            case 'clinic':
                $data["services"] = Services::get(['id', 'name']);
                $data["surguries"] = Surgery::get(['id', 'name']);
                $data["test_facilities"] = TestFacilty::get(['id', 'name']);
                $data["divisions"] = Division::with('cities')->get(['id', 'name']);
                return $this->responseBody("success", "Essentials for Hospital Registration fetched", $data);
            default:
                return $this->responseBody("Error", "Essentials Type not defined", []);
        }
    }

}


<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use JsonResponse;
    public function index()
    {
        $departments = Department::get();
        return $this->responseBody("success","All departments are fetched.",$departments);
    }

    public function store(Request $request)
    {
        
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Designation\StoreRequest;

class DesignationController extends Controller
{
    use JsonResponse;
    public function index()
    {
        $designations = Designation::get();
        return $this->responseBody("success","all designations fetched.",$designations);
    }

    public function store(StoreRequest $request)
    {
        $designation = Designation::create($request->validated());
        return $this->responseBody("success","New Designation Created successfully",$designation);
    }
}

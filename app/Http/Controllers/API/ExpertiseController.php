<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Expertise\StoreRequest;

class ExpertiseController extends Controller
{
    use JsonResponse;
    public function index()
    {
        $departments = Expertise::get();
        return $this->responseBody("success","All Expertises are fetched.",$departments);
    }

    public function store(StoreRequest $request)
    {
        $data = Expertise::create($request->validated());
        return $this->responseBody("success","New Expertise Created",$data);
    }
}

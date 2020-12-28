<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VisitFee;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VisitFee\StoreRequest;

class VisitFeeController extends Controller
{
    use JsonResponse;
    public function index()
    {
        $departments = VisitFee::get();
        return $this->responseBody("success","All Expertises are fetched.",$departments);
    }

    public function store(StoreRequest $request)
    {
        $data = VisitFee::create($request->validated());
        return $this->responseBody("success","New Visiting Fee Created",$data);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VisitHour;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VisitHour\StoreRequest;

class VisitHourController extends Controller
{
    use JsonResponse;
    public function index()
    {
        $departments = VisitHour::get();
        return $this->responseBody("success","All Visiting Hours are fetched.",$departments);
    }

    public function store(StoreRequest $request)
    {
        $data = VisitHour::create($request->validated());
        return $this->responseBody("success","New Visiting Hours Created",$data);
    }
}

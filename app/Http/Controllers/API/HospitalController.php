<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalStoreRequest;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function store(HospitalStoreRequest $request)
    {
        dd($request->all());
    }
}

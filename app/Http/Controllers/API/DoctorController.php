<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorStoreRequest;
class DoctorController extends Controller
{
    public function store(DoctorStoreRequest $request)
    {
        dd($request->all());
    }
}

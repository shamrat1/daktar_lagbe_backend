<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClinicStoreRequest;

class ClinicController extends Controller
{
    public function store(ClinicStoreRequest $request)
    {
        dd($request->all());
    }
}

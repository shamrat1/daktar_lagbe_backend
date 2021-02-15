<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index(){
        $clinics = Clinic::latest()->paginate(20);
        return view('admin.clinic.index',compact('clinics'));
    }

    public function show(Clinic $clinic){

    }

    public function edit(Clinic $clinic){

    }

    public function update(Clinic $clinic,Request $request){

    }

    public function delete(Clinic $clinic){

    }
}

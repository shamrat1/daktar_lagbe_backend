<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(){
        $hospitals = Hospital::latest()->paginate(20);
        return view('admin.hospital.index',compact('hospitals'));
    }

    public function show(Hospital $hospital){

    }

    public function edit(Hospital $hospital){

    }

    public function update(Hospital $hospital,Request $request){

    }

    public function delete(Hospital $hospital){

    }
}

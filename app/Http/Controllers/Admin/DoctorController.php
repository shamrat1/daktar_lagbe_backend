<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::latest()->paginate(20);
        return view('admin.doctor.index',compact('doctors'));
    }

    public function show(Doctor $doctor){

    }

    public function edit(Doctor $doctor){

    }

    public function update(Doctor $doctor,Request $request){

    }

    public function delete(Doctor $doctor){

    }
}

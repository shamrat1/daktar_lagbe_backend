<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestFacilityController extends Controller
{
    public function index()
    {
        return view('admin.test_facility.index');
    }
    public function store()
    {
        # code...
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitingHourController extends Controller
{
    public function index()
    {
        return view('admin.visiting_hours.index');
    }
}

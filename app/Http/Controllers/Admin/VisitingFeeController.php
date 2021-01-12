<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitingFeeController extends Controller
{
    public function index()
    {
        return view('admin.visiting_fees.index');
    }
}

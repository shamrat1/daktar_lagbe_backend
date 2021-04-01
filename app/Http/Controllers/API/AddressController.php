<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Division;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAddressFields()
    {
        $divisions = Division::with('cities')->get();
        return response()->json([
            'status' => 'success',
            'msg' => 'Address related Divisions with cities and areas are fetched.',
            'data' => $divisions
        ]);
    }

    public function getDivisions()
    {
        return response()->json([
            'status' => 'success',
            'msg' => 'Address related Divisions with cities and areas are fetched.',
            'data' => Division::orderBy('name')->get()
        ]);
    }

    public function getCities($id)
    {
        return response()->json([
            'status' => 'success',
            'msg' => 'Address related Divisions with cities and areas are fetched.',
            'data' => City::where('division_id',$id)->orderBy('name')->get()
        ]);
    }
}

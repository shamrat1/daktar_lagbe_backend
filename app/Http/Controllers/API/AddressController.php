<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
}

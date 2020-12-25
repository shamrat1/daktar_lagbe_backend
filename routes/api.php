<?php

use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\AddressController;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'registration','namespace' => 'API'],function(){
    // address helper
    Route::get('/address',[AddressController::class,'getAddressFields']);

    Route::post('/hospital/store',[HospitalController::class,'store']);

    // doctor essentials
    Route::get('/doctor/essentials',[DoctorController::class,'getEssentials']);
    Route::post('/doctor/store',[DoctorController::class,'store']);

    // doctor essentials end
    Route::post('/clinic/store',[ClinicController::class,'store']);
});

Route::group(['prefix' => 'departments'],function(){
    Route::post('/store',[DepartmentController::class,'store']);
    Route::get('/',[DepartmentController::class,'index']);
});

Route::group(['prefix' => 'designations'],function(){
    Route::post('/store',[DesginationController::class,'store']);
    Route::get('/',[DesginationController::class,'index']);
});

Route::group(['prefix' => 'expertises'],function(){
    Route::post('/store',[ExpertiseController::class,'store']);
    Route::get('/',[ExpertiseController::class,'index']);
});

// Route::post('/hospital',[])

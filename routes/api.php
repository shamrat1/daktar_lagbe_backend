<?php

use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\RegistrationController;
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

    Route::get('/helper/{type}', [RegistrationController::class, 'helper']);

    Route::post('/hospital/store',[HospitalController::class,'store']);
    Route::post('/doctor/store',[DoctorController::class,'store']);
    Route::post('/clinic/store',[ClinicController::class,'store']);
});

Route::group(['namespace'=>'API'],function(){

    Route::get('/departments',[DepartmentController::class,'index']);
    Route::get('/departments/store',[DepartmentController::class,'store']);

    Route::get('/designations', [DesignationController::class, 'index']);
    Route::get('/designations/store', [DesignationController::class, 'store']);

    Route::get('/expertises', [DesignationController::class, 'index']);
    Route::get('/designations/store', [DesignationController::class, 'store']);
});

// Route::post('/hospital',[])

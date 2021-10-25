<?php

use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\DesignationController;
use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\ExpertiseController;
use App\Http\Controllers\API\ClinicController;
use App\Models\Department;
use App\Http\Controllers\API\RegistrationController;
use App\Http\Controllers\API\VisitFeeController;
use App\Http\Controllers\API\VisitHourController;
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



Route::group(['namespace'=>'API'],function(){

    Route::post('/login',[AuthenticationController::class,'login']);
    Route::post('/forgot',[AuthenticationController::class,'forgot']);

    Route::group(['prefix' => 'otp'],function(){
        Route::post('/verify',[AuthenticationController::class,'verify']);
        Route::post('/resend',[AuthenticationController::class,'resend']);
    });

    Route::group(['prefix' => 'registration'],function(){
        // address helper
        Route::get('/address',[AddressController::class,'getAddressFields']);

        Route::get('/helper/{type}', [RegistrationController::class, 'helper']);

        Route::post('/hospital',[HospitalController::class,'store']);

        Route::post('/doctor',[DoctorController::class,'store']);

        // doctor essentials end
        Route::post('/clinic',[ClinicController::class,'store']);
    });
    
    Route::group(['prefix' => 'departments'],function(){
        Route::get('/',[DepartmentController::class,'index']);
        Route::post('/store',[DepartmentController::class,'store']);
    });

    Route::group(['prefix' => 'designations'],function(){
        Route::get('/', [DesignationController::class, 'index']);
        Route::post('/store', [DesignationController::class, 'store']);
    });


    Route::group(['prefix' => 'expertises'],function(){
        Route::get('/', [ExpertiseController::class, 'index']);
        Route::post('/store', [ExpertiseController::class, 'store']);
    });

    Route::group(['prefix' => 'visit_hour'],function(){
        Route::get('/', [VisitHourController::class, 'index']);
        Route::post('/store', [VisitHourController::class, 'store']);
    });

    Route::group(['prefix' => 'visit_fee'],function(){
        Route::get('/', [VisitFeeController::class, 'index']);
        Route::post('/store', [VisitFeeController::class, 'store']);
    });


    Route::get('/helper/division',[AddressController::class,'getDivisions']);
    Route::get('/helper/city/{id}',[AddressController::class,'getCities']);
});

// Route::post('/hospital',[])

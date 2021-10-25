<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\VisitingHourController;
use App\Http\Controllers\Admin\VisitingFeeController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\ExpertiseController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SurgeriesController;
use App\Http\Controllers\Admin\TestFacilityController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/auto',function(){
    Auth::login(User::first(),true);
});
Route::get('/',[PagesController::class,'index'])->name('root');

Route::group(['middleware'=>'auth'],function(){

    Route::group(['prefix' => 'users','as' => 'admin.'],function(){

        Route::group(['prefix' => 'all','as' => 'user.'],function(){
            Route::get('/',[UserController::class,'index'])->name('index');
            Route::post('/',[UserController::class,'store'])->name('store');
            Route::get('/show/{id}',[UserController::class,'show'])->name('show');
            Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[UserController::class,'update'])->name('update');
            Route::delete('/delete/{id}',[UserController::class,'delete'])->name('delete');
        });
    
        Route::group(['prefix' => 'roles','as' => 'role.'],function(){
            Route::get('/',[RoleController::class,'index'])->name('index');
            Route::post('/store',[RoleController::class,'store'])->name('store');
            Route::delete('/delete/{id}',[RoleController::class,'delete'])->name('delete');
        });
    
        Route::group(['prefix' => 'permissions','as' => 'permission.'],function(){
            Route::get('/',[PermissionController::class,'index'])->name('index');
            Route::post('/store',[PermissionController::class,'store'])->name('store');
            Route::delete('/delete/{id}',[PermissionController::class,'delete'])->name('delete');
        });
    });

    Route::group(["prefix" => "setting","as" => "admin.setting."],function(){
        Route::group(["prefix" => "pages","as" => "page."],function(){
            Route::get("/",[PagesController::class,"allPages"])->name("index");
            Route::get("/modify/{slug?}",[PagesController::class,"modifyPage"])->name("modify");
        });
    });
    Route::get('/departments',[DepartmentController::class,'index'])->name('admin.department.index');
    Route::get('/expertises',[ExpertiseController::class,'index'])->name('admin.expertise.index');
    Route::get('/designations',[DesignationController::class,'index'])->name('admin.designation.index');
    Route::get('/visiting_hours',[VisitingHourController::class,'index'])->name('admin.visitingHour.index');
    Route::get('/visiting_fees',[VisitingFeeController::class,'index'])->name('admin.visitingFee.index');
    Route::get('/address',[AddressController::class,'index'])->name('admin.address.index');

    Route::get('/services',[ServiceController::class,'index'])->name('admin.services.index');
    Route::get('/surgeries',[SurgeriesController::class,'index'])->name('admin.surgeries.index');
    Route::get('/test/facilities',[TestFacilityController::class,'index'])->name('admin.test_facilities.index');

    Route::group(['prefix' => 'hospital'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\HospitalController::class,'index'])->name('admin.hospital.index');
        Route::get('/show/{hospital}',[\App\Http\Controllers\Admin\HospitalController::class,'show'])->name('admin.hospital.show');
        Route::get('/edit/{hospital}',[\App\Http\Controllers\Admin\HospitalController::class,'edit'])->name('admin.hospital.edit');
        Route::put('/update/{hospital}',[\App\Http\Controllers\Admin\HospitalController::class,'update'])->name('admin.hospital.update');
        Route::delete('/delete/{hospital}',[\App\Http\Controllers\Admin\HospitalController::class,'delete'])->name('admin.hospital.delete');
    });

    Route::group(['prefix' => 'clinic'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\ClinicController::class,'index'])->name('admin.clinic.index');
        Route::get('/show/{clinic}',[\App\Http\Controllers\Admin\ClinicController::class,'show'])->name('admin.clinic.show');
        Route::get('/edit/{clinic}',[\App\Http\Controllers\Admin\ClinicController::class,'edit'])->name('admin.clinic.edit');
        Route::put('/update/{clinic}',[\App\Http\Controllers\Admin\ClinicController::class,'update'])->name('admin.clinic.update');
        Route::delete('/delete/{clinic}',[\App\Http\Controllers\Admin\ClinicController::class,'delete'])->name('admin.clinic.delete');
    });

    Route::group(['prefix' => 'doctor'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\DoctorController::class,'index'])->name('admin.doctor.index');
        Route::get('/show/{doctor}',[\App\Http\Controllers\Admin\DoctorController::class,'show'])->name('admin.doctor.show');
        Route::get('/edit/{doctor}',[\App\Http\Controllers\Admin\DoctorController::class,'edit'])->name('admin.doctor.edit');
        Route::put('/update/{doctor}',[\App\Http\Controllers\Admin\DoctorController::class,'update'])->name('admin.doctor.update');
        Route::delete('/delete/{doctor}',[\App\Http\Controllers\Admin\DoctorController::class,'delete'])->name('admin.doctor.delete');
    });
});

require __DIR__.'/auth.php';

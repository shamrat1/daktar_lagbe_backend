<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\VisitingHourController;
use App\Http\Controllers\Admin\VisitingFeeController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SurgeriesController;
use App\Http\Controllers\Admin\TestFacilityController;
use App\Http\Livewire\Admin\Department as AdminDepartment;
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

Route::get('/',[PagesController::class,'index'])->name('root');

Route::get('/departments',[DepartmentController::class,'index'])->name('admin.department.index');
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

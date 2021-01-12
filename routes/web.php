<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
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

Route::get('/', function () {
    return view('admin_layout.dashboard.index');
});
Route::get('/departments',[DepartmentController::class,'index'])->name('admin.department.index');
Route::get('/designations',[DesignationController::class,'index'])->name('admin.designation.index');


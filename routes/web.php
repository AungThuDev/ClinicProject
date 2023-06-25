<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\DepartmentController;
use App\Http\Controllers\WEB\DoctorController;
use App\Http\Controllers\WEB\DoctorScheduleController;

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

// Route::get('/', function () {
//     return view('admin.departments');
// });

Route::resource('/departments', DepartmentController::class)->middleware('auth');
Route::get('/doctors/add_schedule/{doctor_id}', [DoctorScheduleController::class,'create'])->name('doctors.addSchedule');
Route::post('/doctors/add_schedule',[DoctorScheduleController::class,'store'])->name('doctors.storeSchedule');
Route::resource('/doctors', DoctorController::class)->middleware('auth');
Auth::routes([
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

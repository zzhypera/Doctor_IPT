<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Doctors
|--------------------------------------------------------------------------
*/

Route::resource('doctors', DoctorController::class);


/*
|--------------------------------------------------------------------------
| Patients
|--------------------------------------------------------------------------
*/

Route::resource('patients', PatientController::class);


/*
|--------------------------------------------------------------------------
| Appointments
|--------------------------------------------------------------------------
*/

Route::resource('appointments', AppointmentController::class);

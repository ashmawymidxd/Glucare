<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard_Doctor\DoctorController;
use App\Http\Controllers\Dashboard_Doctor\AppointmentsController;
use App\Http\Controllers\Dashboard_Doctor\DoctorPatientController;
use App\Http\Controllers\Dashboard_Doctor\AppointmentReport;
use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_Doctor\PatientDetailsController;

use App\Http\Controllers\patientDoctorMessageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['CheckDoctorStatus','auth:doctor'])->group(function(){
    Route::get('/dashboard/doctor', [DoctorController::class, 'index'])->name('dashboard.doctor');

    // route resorces for appointments
    Route::resource('appointments', AppointmentsController::class);
    Route::post('Appointment_update_status',[AppointmentsController::class,'update_status'])->name('Appointment_update_status');
    Route::get('un_confirmed_appointments',[AppointmentsController::class,'un_confirmed_appointments'])->name('un_confirmed_appointments');
    Route::get('confirmed_appointments',[AppointmentsController::class,'confirmed_appointments'])->name('confirmed_appointments');
    Route::get('completed_appointments',[AppointmentsController::class,'completed_appointments'])->name('completed_appointments');
    Route::get('archived_appointments',[AppointmentsController::class,'archived_appointments'])->name('archived_appointments');
    Route::get('DoctorPatient',[DoctorPatientController::class,'DoctorPatient'])->name('DoctorPatient');
    Route::get('ratings',[DoctorPatientController::class,'ratings'])->name('ratings');
    Route::get('getAppointmentReport',[AppointmentReport::class,'getAppointmentReport'])->name('getAppointmentReport');
    Route::post('getAppointmentReport',[AppointmentReport::class,'searchAppointment'])->name('getAppointmentReport');
    Route::resource('Diagnostics', DiagnosticController::class);
    Route::get('patient_details/{id}', [PatientDetailsController::class,'index'])->name('patient_details');

    Route::get('/doctor_patient_message/{id}',[patientDoctorMessageController::class,'doctor']);
});

// require __DIR__.'/auth.php';
 // route get for video_call view
 Route::get('video_call', function(){
    return view('video_call');
})->name('video_call');

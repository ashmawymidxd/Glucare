<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\RoleReportController;
use App\Http\Controllers\Dashboard\AppointmentsAdminController;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::middleware('auth:admin')->group(function(){
            Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('dashboard.admin');

            // section routs
            Route::resource('section', SectionController::class);

            // settings routs
            Route::resource('setting', SettingController::class);

            // doctors routs
            Route::resource('Doctors', DoctorController::class);
            Route::post('Doctors_update_password', [DoctorController::class, 'update_password'])->name('Doctors_update_password');
            Route::post('Doctors_update_status', [DoctorController::class, 'update_status'])->name('Doctors_update_status');

            // patients routs
            Route::resource('Patients', PatientController::class);
            Route::post('Patients_update_password', [PatientController::class, 'update_password'])->name('Patients_update_password');
            Route::post('Patients_update_status', [PatientController::class, 'update_status'])->name('Patients_update_status');

            // employees routs
            Route::resource('Employees', EmployeeController::class);
            Route::post('Employees_update_password', [EmployeeController::class, 'update_password'])->name('Employees_update_password');
            Route::post('Employees_update_status', [EmployeeController::class, 'update_status'])->name('Employees_update_status');

            // reports routs
            Route::get('role_reports',[RoleReportController::class,'index'])->name('Reports.index');
            Route::post('role_reports', [RoleReportController::class, 'search_role_reports'])->name('role_reports');

            // appointments
            Route::resource('appointments_admin', AppointmentsAdminController::class);
            Route::post('Appointment_update_status',[AppointmentsAdminController::class,'update_status'])->name('Appointment_update_status_admin');
            Route::get('un_confirmed_appointments',[AppointmentsAdminController::class,'un_confirmed_appointments'])->name('un_confirmed_appointments_admin');
            Route::get('confirmed_appointments',[AppointmentsAdminController::class,'confirmed_appointments'])->name('confirmed_appointments_admin');
            Route::get('completed_appointments',[AppointmentsAdminController::class,'completed_appointments'])->name('completed_appointments_admin');
            Route::get('archived_appointments',[AppointmentsAdminController::class,'archived_appointments'])->name('archived_appointments_admin');

        });

        require __DIR__.'/auth.php';
    });



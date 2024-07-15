<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard_Employee\EmployeeController;
use App\Http\Controllers\Dashboard_Employee\ReportsController;
use App\Http\Controllers\Dashboard_Employee\PatientLogs;

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

Route::middleware(['CheckEmployeeStatus','auth:employee'])->group(function(){
    Route::get('/dashboard/employee', [EmployeeController::class, 'index'])->name('dashboard.employee');
    Route::view('invoices_livewire','livewire.invoices_livewire.index')->name('invoices_livewire');
    Route::view('Print_invoices','livewire.invoices_livewire.print')->name('Print_invoices');
    Route::get('patients_reports',[ReportsController::class, 'index'])->name('patients_reports');
    Route::get('doctors_reports',[ReportsController::class, 'doctors_reports'])->name('doctors_reports');
    Route::resource('patient_logs',PatientLogs::class);
    Route::get('/createDietary',function(){
        return view('livewire.dietary.create');
    })->name('createDietary');
    Route::get('/createActivity',function(){
        return view('livewire.activity.create');
    })->name('createActivity');
});

// require __DIR__.'/auth.php';

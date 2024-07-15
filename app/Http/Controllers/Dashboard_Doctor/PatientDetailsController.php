<?php

namespace App\Http\Controllers\Dashboard_Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnostic;
class PatientDetailsController extends Controller
{
    public function index($id){

        $patient_records = Diagnostic::where('patient_id',$id)->get();
        return view('Dashboard.doctor_dashboard.patients.patient_details',compact('patient_records'));
    }
}

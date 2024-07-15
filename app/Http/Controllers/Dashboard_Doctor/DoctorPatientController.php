<?php

namespace App\Http\Controllers\Dashboard_Doctor;
use App\Http\Controllers\Controller;
use App\Models\PatientRatingDoctors;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAppointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;


class DoctorPatientController extends Controller
{
    public function DoctorPatient(){

        $doctorId = Auth::user()->id; // Assuming the current logged-in user is a doctor
        $patients = User::whereHas('appointment', function ($query) use ($doctorId) {
            $query->where('doctor_id', $doctorId);
        })->get();
        return view('Dashboard.doctor_dashboard.patients.index',compact('patients'));

    }
    public function ratings(){
        $doctorId = Auth::user()->id;
        // doctor ratings
        $doctorRatings = PatientRatingDoctors::where('doctor_id',$doctorId)->get();
        // count doctor ratings
        $doctorRatingsCount = PatientRatingDoctors::where('doctor_id',$doctorId)->count();
        // get last 5 ratings
        $doctorRatings_last5 = PatientRatingDoctors::where('doctor_id',$doctorId)->orderBy('id','desc')->take(5)->get();
        // get the avarage of doctor ratings
        $doctorRatingsAvg = PatientRatingDoctors::where('doctor_id',$doctorId)->avg('user_rating');
        return view('Dashboard.doctor_dashboard.rating.index',compact('doctorRatings','doctorRatingsCount','doctorRatingsAvg','doctorRatings_last5'));
    }
}

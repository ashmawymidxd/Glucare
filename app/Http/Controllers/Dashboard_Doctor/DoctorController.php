<?php

namespace App\Http\Controllers\Dashboard_Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAppointment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DoctorController extends Controller
{
    public function index(){
        $current_doctor_id = auth()->user()->id;
        $allAppointments = UserAppointment::where('doctor_id', $current_doctor_id)->count();
        // today appointments
        $todayAppointmentsCount = UserAppointment::where('doctor_id', $current_doctor_id)
            ->whereDate('created_at', Carbon::today())
            ->count();
        $unconfirmedAppointments = UserAppointment::where('doctor_id', $current_doctor_id)
            ->where('type', 'un confirmed')
            ->count();
        $confirmedAppointments = UserAppointment::where('doctor_id', $current_doctor_id)
            ->where('type', 'confirmed')
            ->count();
        $endAppointments = UserAppointment::where('doctor_id', $current_doctor_id)
            ->where('type', 'end')
            ->count();

        return view('Dashboard.doctor_dashboard.dashboard',compact('allAppointments','todayAppointmentsCount','unconfirmedAppointments','confirmedAppointments','endAppointments'));
    }
}


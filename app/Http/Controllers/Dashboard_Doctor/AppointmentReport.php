<?php

namespace App\Http\Controllers\Dashboard_Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAppointment;
use Illuminate\Support\Facades\Auth;
class AppointmentReport extends Controller
{
    public function getAppointmentReport()
    {
        $appointment = UserAppointment::get();
        return view("Dashboard.doctor_dashboard.reports.index",compact('appointment'));
    }
    public function searchAppointment(Request $request){
        $repoType = $request->repoType;
        if ($repoType == 'appointment') {

            if ($request->appointment_type && $request->startDate =='' && $request->endDate =='') {
                // return the appointment by requested type
                $current_doctor_id = auth()->user()->id;
                $appointments = UserAppointment::where('doctor_id',$current_doctor_id)
                                ->where('type', $request->appointment_type)
                                ->get();
                return view('Dashboard.doctor_dashboard.reports.index',compact('appointments'));
            }

            else {
                // return the appointment by requested startDate and endData
                $current_doctor_id = auth()->user()->id;
                $startDate = date('Y-m-d', strtotime($request->startDate));
                $endDate = date('Y-m-d', strtotime($request->endDate));
                $appointments = UserAppointment::whereBetween('created_at', [$startDate, $endDate])
                                ->where('doctor_id', $current_doctor_id)
                                ->get();
                return view('Dashboard.doctor_dashboard.reports.index', compact('appointments'));
            }
        }
    }
}

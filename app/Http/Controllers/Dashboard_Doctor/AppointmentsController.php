<?php

namespace App\Http\Controllers\Dashboard_Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserAppointment;
use App\Models\Doctor;
use App\Models\User;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_doctor_id = auth()->user()->id;
        $appointments = UserAppointment::where('doctor_id',$current_doctor_id)->get();
        return view("Dashboard.doctor_dashboard.appointments.index",compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // soft delete the appointment
        if($request->delete_type == 0){
            UserAppointment::where('id',$request->id)->delete();
            return response()->json(['message' => 'Appointment archived successfully']);
        }
        // forceDelete the appointment
        elseif($request->delete_type == 1){
            UserAppointment::where('id',$request->id)->forceDelete();
            return response()->json(['message' => 'Appointment deleted successfully']);
        }
        // unarchive the appointment
        elseif($request->delete_type == 2){
            UserAppointment::withTrashed()->where('id',$request->id)->restore();
            return response()->json(['message' => 'Appointment unarchived successfully']);
        }
        // force delete selected appointments
        elseif($request->delete_type == 3){
            $delete_select_id = explode(",", $request->delete_select_id);
            foreach ($delete_select_id as $ids_appoints){
                $doctor = UserAppointment::findorfail($ids_appoints);
            }
            UserAppointment::whereIn('id',$delete_select_id)->forceDelete();
            // redirect to back with success message no json
            return redirect()->back()->with('success','Appointments deleted successfully');
        }
    }

    public function update_status(Request $request){
        UserAppointment::where('id',$request->id)->update(['type' => $request->type]);
        return response()->json(['message' => 'Appointment status updated successfully']);
    }

    public function un_confirmed_appointments(){
        $current_doctor_id = auth()->user()->id;
        $appointments = UserAppointment::where('type','un confirmed')->where('doctor_id',$current_doctor_id)->get();
        return view("Dashboard.doctor_dashboard.appointments.un_confirmed_appointments",compact('appointments'));
    }

    public function confirmed_appointments(){
        $current_doctor_id = auth()->user()->id;
        $appointments = UserAppointment::where('type','confirmed')->where('doctor_id',$current_doctor_id)->get();
        return view("Dashboard.doctor_dashboard.appointments.confirmed_appointments",compact('appointments'));
    }

    public function completed_appointments(){
        $current_doctor_id = auth()->user()->id;
        $appointments = UserAppointment::where('type','end')->where('doctor_id',$current_doctor_id)->get();
        return view("Dashboard.doctor_dashboard.appointments.completed_appointments",compact('appointments'));
    }

    public function archived_appointments(){
        $current_doctor_id = auth()->user()->id;
        $appointments = UserAppointment::onlyTrashed()->where('doctor_id',$current_doctor_id)->get();
        return view("Dashboard.doctor_dashboard.appointments.archived_appointments",compact('appointments'));
    }

}

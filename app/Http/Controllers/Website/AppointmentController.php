<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Section;
use App\Models\Doctor;
use App\Models\UserAppointment;
use App\Models\PatientRatingDoctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ZoomController;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Section::all();
        $doctors = Doctor::with('doctorappointments')->get();
        return view('Website.appointment.index',compact('departments','doctors'));
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
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        // validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'doctor_id' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
        ]);
        // store the data
        $userAppointment = UserAppointment::create($request->all());

        // Generate Zoom meeting link
        $zoomController = new ZoomController();
        $start_date_time = date('Y-m-d H:i:s', strtotime($request->input('appointment_date') . ' ' . $request->input('appointment_time')));

        $zoomMeetingData = [
            'title' => 'Appointment with doctor',
            'start_date_time' => $start_date_time,
            // 'start_date_time' => '2024-02-15 16:45:04',
            'duration_in_minute' => '30',
        ];

        try {
            $zoomMeetingUrl = $zoomController->createMeeting($zoomMeetingData);
            $userAppointment->zoom_meeting_url = $zoomMeetingUrl;
            $userAppointment->save();

            return response()->json(['message' => 'appintment data added successfully']);
        } catch (\Exception $e) {
            // Handle error if Zoom meeting creation fails
            return response()->json([
                'message' => 'Failed to create Zoom meeting. Error: ' . $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            // validate the request
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'doctor_id' => 'required',
                'section_id' => 'required',
                'appointment_date' => 'required',
                'appointment_time' => 'required',
            ]);
            // update the data
            UserAppointment::where('id',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'doctor_id' => $request->doctor_id,
                'section_id' => $request->section_id,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
            ]);
            return response()->json(['message' => 'Appointment updated successfully']);
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // forceDelete the appointment
        UserAppointment::where('id',$request->id)->forceDelete();
        return response()->json(['message' => 'Appointment deleted successfully']);
    }

    public function getUserAppointments()
    {
        $current_user = auth()->user()->id;
        $departments = Section::all();
        $appointments = UserAppointment::where('patient_id',$current_user)->get();
        return view('Website.appointment.myappointment',compact('appointments','departments'));
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAppointment;
use App\Http\Controllers\Api\ZoomController;

class UserAppointmentsController extends Controller
{
    // get all userAppointment data
    public function index()
    {
        $userAppointment = UserAppointment::all();
        if($userAppointment->count() > 0){
            return response()->json([
                'status' => true,
                'message'=>'userAppointment data',
                'data' => $userAppointment
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'no userAppointment data',
            'data' => $userAppointment
        ]);
    }

    // store new userAppointment data
    public function store(StoreAppointmentRequest $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'doctor_id' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        // Store the data
        $userAppointment = UserAppointment::create($request->all());

        // Generate Zoom meeting link
        $zoomController = new ZoomController();
        $start_date_time = date('Y-m-d H:i:s', strtotime($request->input('appointment_date') . ' ' . $request->input('appointment_time')));

        $zoomMeetingData = [
            'title' => 'Appointment with doctor',
            'start_date_time' => $start_date_time,
            'duration_in_minute' => '30',
        ];

        try {
            $zoomMeetingUrl = $zoomController->createMeeting($zoomMeetingData);
            $userAppointment->zoom_meeting_url = $zoomMeetingUrl;
            $userAppointment->save();

            return response()->json(['message' => 'Appointment data added successfully']);
        } catch (\Exception $e) {
            // Handle error if Zoom meeting creation fails
            return response()->json([
                'message' => 'Failed to create Zoom meeting. Error: ' . $e->getMessage(),
            ]);
        }
    }


    // get userAppointment data by id
    public function show($id)
    {
        $userAppointment = UserAppointment::find($id);
        if($userAppointment){
            return response()->json([
                'status' => true,
                'message'=>'userAppointment data founded',
                'data' => $userAppointment
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'userAppointment data not founded',
            'data' => $userAppointment
        ]);
    }

    // update userAppointment data by id
    public function update(Request $request, $id)
    {
        $userAppointment = UserAppointment::find($id);
        if($userAppointment){
            $userAppointment->update($request->all());
            return response()->json([
                'status' => true,
                'message'=>'userAppointment data updated',
                'data' => $userAppointment
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'userAppointment data not founded',
            'data' => $userAppointment
        ]);
    }

    // delete userAppointment data by id
    public function destroy($id)
    {
        $userAppointment = UserAppointment::find($id);
        if($userAppointment){
            $userAppointment->delete();
            return response()->json([
                'status' => true,
                'message'=>'userAppointment data deleted',
                'data' => $userAppointment
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'userAppointment data not founded',
            'data' => $userAppointment
        ]);
    }
}

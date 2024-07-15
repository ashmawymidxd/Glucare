<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientDataRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PatientDiabetes;
use App\Models\PatientData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailContact;

class PatientDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth('web')->user()->id;
        $PatientData = PatientData::where('user_id',$id)->first();
        $PatientDiabetes = PatientDiabetes::where('user_id', $id)->first();

        // if ($PatientData) {
        //     return view('Website.report.index',compact('PatientData','PatientDiabetes'));
        // }
        return view('Website.getstart.index');
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
    public function store(StorePatientDataRequest $request)
    {
        $id = auth('web')->user()->id;
        $PatientData = PatientData::where('user_id',$id)->first();

        if ($PatientData) {
            return response()->json(['message' => 'User Data Arady Added']);
        }
        else {
            // 1)- add the user data
            PatientData::create($request->all());

            // 2)- send mail notification
            $data_id = PatientData::latest()->first()->id;
            $user = user::first();
            Notification::send($user, new EmailContact($data_id));

            // 3)- send database notification
            $user = User::find(auth('web')->user()->id);
            $patientData = PatientData::latest()->first();
            Notification::send($user, new \App\Notifications\AddPatientData($patientData));

            // 4)- return json response
            return response()->json(['message' => 'Patient data added successfully add email sent']);
        }

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
    public function destroy($id)
    {
        //
    }
     //this function to read all notification
     public function MarkAsRead_all (Request $request)
     {
         $userUnreadNotification = auth()->user()->unreadNotifications;

         if($userUnreadNotification) {
             $userUnreadNotification->markAsRead();
             return back();
         }

     }
}

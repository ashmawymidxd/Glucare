<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\PatientRatingDoctors;
class DoctorsController extends Controller
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
        return view('Website.appointment.doctors',compact('doctors','departments'));
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
        $doctor = Doctor::where('id',$id)->first();
        // doctor ratings
        $doctorRatings = PatientRatingDoctors::where('doctor_id',$id)->get();
        // count doctor ratings
        $doctorRatingsCount = PatientRatingDoctors::where('doctor_id',$id)->count();
        // get last 5 ratings
        $doctorRatings_last5 = PatientRatingDoctors::where('doctor_id',$id)->orderBy('id','desc')->take(5)->get();
        // get the avarage of doctor ratings
        $doctorRatingsAvg = PatientRatingDoctors::where('doctor_id',$id)->avg('user_rating');
        $departments = Section::all();
        return view('Website.appointment.about',compact('departments','doctor','doctorRatings','doctorRatingsCount','doctorRatingsAvg','doctorRatings_last5'));
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

    public function getDoctorsByDepartment($departmentId) {
        $doctors = Doctor::where('section_id', $departmentId)->get();
        return response()->json($doctors);
    }
}

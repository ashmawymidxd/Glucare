<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorsController extends Controller
{
    // get all doctors data with messages succuees and data
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json([
            'status' => true,
            'message'=>'doctors data',
            'data' => $doctors
        ]);
    }

    // store new doctor data
    public function store(Request $request)
    {
        $doctors = Doctor::create($request->all());
        return response()->json([
            'status' => true,
            'message'=>'doctor data created',
            'data' => $doctors
        ]);
    }

    // get doctor data by id
    public function show($id)
    {
        $doctors = Doctor::find($id);
        return response()->json([
            'status' => true,
            'message'=>'doctor data founded',
            'data' => $doctors
        ]);
    }

    // update doctor data by id
    public function update(Request $request, $id)
    {
        $doctors = Doctor::find($id);
        $doctors->update($request->all());
        return response()->json([
            'status' => true,
            'message'=>'doctor data updated',
            'data' => $doctors
        ]);
    }

    // delete doctor data by id
    public function destroy($id)
    {
        $doctors = Doctor::find($id);
        $doctors->delete();
        return response()->json([
            'status' => true,
            'message'=>'doctor data deleted',
            'data' => $doctors
        ]);
    }
}

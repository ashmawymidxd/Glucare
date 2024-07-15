<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientDiabetes;
use App\Http\Resources\PatientDiabetesResource;
use Illuminate\Support\Facades\Validator;

class PatientDiabetesController extends Controller
{
    // get all patient diabete dat
    public function index()
    {
        // $patientdiabetes = PatientDiabetes::all();
        $patientdiabetes = PatientDiabetesResource::collection(PatientDiabetes::all());
        if($patientdiabetes->count() > 0){
            return response()->json([
                'status' => true,
                'message'=>'patient diabetes data',
                'data' => $patientdiabetes
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'no patient diabetes data',
            'data' => $patientdiabetes
        ]);
    }

    // store new patient diabetes data
    public function store(Request $request)
    {
        // validation
        $validation = Validator::make($request->all(),[
            'user_id' => 'required',
            'diabetes_type' => 'required',
            'diabetes_status' => 'required'
        ]);

        if($validation->fails()){
            return response()->json([
                'status' => false,
                'message'=>'validation error',
                'data' => $validation->errors()
            ]);
        }

        $patientdiabetes = PatientDiabetes::create($request->all());
        return response()->json([
            'status' => true,
            'message'=>'patient diabetes data created',
            'data' => $patientdiabetes
        ]);
    }

    // get patient diabetes data by id
    public function show($id)
    {
        $patientdiabetes = PatientDiabetes::find($id);
        if($patientdiabetes){
            $patientdiabetes = new PatientDiabetesResource(PatientDiabetes::find($id));
            return response()->json([
                'status' => true,
                'message'=>'patient diabetes data',
                'data' => $patientdiabetes
            ]);
        }
        return response()->json([
            'status' => 404,
            'message'=>'no patient diabetes data',
            'data' => $patientdiabetes
        ]);
    }

    // update patient diabetes data by id
    public function update(Request $request, $id)
    {
        $patientdiabetes = PatientDiabetes::find($id);
        if($patientdiabetes){
            $patientdiabetes->update($request->all());
            return response()->json([
                'status' => true,
                'message'=>'patient diabetes data updated',
                'data' => $patientdiabetes
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'no patient diabetes data',
            'data' => $patientdiabetes
        ]);
    }

    // delete patient diabetes data by id
    public function destroy($id)
    {
        $patientdiabetes = PatientDiabetes::find($id);
        if($patientdiabetes){
            $patientdiabetes->delete();
            return response()->json([
                'status' => true,
                'message'=>'patient diabetes data deleted',
                'data' => $patientdiabetes
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'no patient diabetes data',
            'data' => $patientdiabetes
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;

class patientDoctorMessageController extends Controller
{
    public function doctor($id) {
        $user = User::find($id);
        $doctor = Doctor::find(auth()->user()->id);
        return view('livewire.p-d-m.doctor_patient_message', compact('user', 'doctor'));
    }

    public function patient($id) {
        $user = User::find(auth()->user()->id);
        $doctor = Doctor::find($id);
        return view('livewire.p-d-m.patient_doctor_message', compact('user', 'doctor'));
    }

}

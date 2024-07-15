<?php
namespace App\Http\Livewire\PDM;

use Livewire\Component;
use App\Models\PatientsDoctorsMessage;
use Illuminate\Support\Facades\Auth;

class PatientDoctorMessageList extends Component
{
    public $user;
    public $doctor;
    public $messages;

    public function render()
    {
        $this->messages = PatientsDoctorsMessage::where('patient_id', $this->user->id)
            ->where('doctor_id', $this->doctor->id)
            ->orWhere(function($query) {
                $query->where('patient_id', $this->doctor->id)
                      ->where('doctor_id', $this->user->id);
            })
            ->get();

        return view('livewire.p-d-m.patient-doctor-message-list', ['messages' => $this->messages, 'user' => $this->user, 'doctor' => $this->doctor]);
    }

}

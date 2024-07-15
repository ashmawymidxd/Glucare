<?php
namespace App\Http\Livewire\PDM;

use Livewire\Component;
use App\Models\PatientsDoctorsMessage;
use Illuminate\Support\Facades\Auth;

class PatientDoctorMessage extends Component
{
    public $user;
    public $doctor;
    public $messages;
    public $newMessage;
    public $type = false;
    public $lastMessage;

    protected $listeners = ['messageSent' => 'render']; // Listen for 'messageSent' event

    public function render()
    {
        $this->messages = PatientsDoctorsMessage::where('patient_id', $this->user->id)
            ->where('doctor_id', $this->doctor->id)
            ->orWhere(function($query) {
                $query->where('patient_id', $this->doctor->id)
                      ->where('doctor_id', $this->user->id);
            })
            ->get();

        $this->lastMessage = PatientsDoctorsMessage::where('patient_id', $this->user->id)
            ->where('doctor_id', $this->doctor->id)
            ->orWhere(function($query) {
                $query->where('patient_id', $this->doctor->id)
                      ->where('doctor_id', $this->user->id);
            })
            ->latest()
            ->first();

        return view('livewire.p-d-m.patient-doctor-message', ['messages' => $this->messages, 'user' => $this->user, 'doctor' => $this->doctor, 'lastMessage' => $this->lastMessage]);
    }

    public function sendMessage()
    {
        PatientsDoctorsMessage::create([
            'patient_id' => $this->user->id,
            'doctor_id' => $this->doctor->id,
            'message' => $this->newMessage,
            'type' => Auth::user()->id,
        ]);

        $this->newMessage = '';
        $this->emit('messageSent'); // Emit an event named 'messageSent'
    }

    public function typeVideo(){
        $this->type = true;
        PatientsDoctorsMessage::create([
            'patient_id' => $this->user->id,
            'doctor_id' => $this->doctor->id,
            'message' => 'http://127.0.0.1:8000/video_call',
            'type' => Auth::user()->id,
        ]);
    }


}

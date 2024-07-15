<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsDoctorsMessage extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'doctor_id', 'message', 'type'];

    public function patient() {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

}

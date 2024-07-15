<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAppointment extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'doctor_id',
        'section_id',
        'patient_id',
        'appointment_date',
        'appointment_time',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class,'patient_id');
    }
}

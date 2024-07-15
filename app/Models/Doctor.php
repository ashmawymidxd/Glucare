<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'phone',
        'section_id',
        'speciality',
        'qualification',
        'experience',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function doctorappointments()
    {
        return $this->belongsToMany(Appointment::class,'appointment_doctor');
    }

    public function appointments()
    {
        return $this->hasMany(UserAppointment::class);
    }

    public function appointment()
    {
        return $this->hasMany(UserAppointment::class, 'doctor_id');
    }

    public function ratings()
    {
        return $this->hasMany(PatientRatingDoctors::class, 'doctor_id')
                    ->selectRaw('avg(user_rating) as average_rating')
                    ->groupBy('doctor_id');
    }

    public function messages() {
        return $this->hasMany(PatientDoctorMessage::class, 'doctor_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

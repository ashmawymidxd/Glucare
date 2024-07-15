<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

// class User extends Authenticatable
// class User extends Authenticatable implements MustVerifyEmail , JWTSubject
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'phone',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function patientDiabetes()
    {
        return $this->hasMany(PatientDiabetes::class);
    }

    public function patientData()
    {
        return $this->hasOne(PatientData::class);
    }

    public function favoriteFood(){
        return $this->hasOne(PatientFavoriteFood::class);
    }

    public function favoriteActivity(){
        return $this->hasOne(PatientFavoriteActivity::class);
    }

    public function appointment()
    {
        return $this->hasMany(UserAppointment::class, 'patient_id');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class,'sender_id')->orWhere('receiver_id',$this->id)->whereNotDeleted();
    }

    public function receivesBroadcastNotificationsOn(): string
    {
        return 'users.'.$this->id;
    }

    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    public function messages() {
        return $this->hasMany(PatientDoctorMessage::class, 'patient_id');
    }
}

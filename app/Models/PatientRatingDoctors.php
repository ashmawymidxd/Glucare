<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRatingDoctors extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','doctor_id','user_name','user_rating','user_review'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'imageable_id', 'user_id');
    }
}

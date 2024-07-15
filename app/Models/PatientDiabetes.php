<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientDiabetes extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'user_id','diabetes_type','diabetes_status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

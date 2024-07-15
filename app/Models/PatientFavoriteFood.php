<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFavoriteFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'favorite_food',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

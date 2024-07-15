<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRecommendation extends Model
{
    use HasFactory;
    protected $fillable =['morning','noon','night','image'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['level', 'message', 'context'];

    public function userLog(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'invoice_date', 'patient_id', 'doctor_id', 'section_id', 'price', 'discount_value', 'tax_rate', 'tax_value', 'total_with_tax', 'created_at', 'updated_at'];

    public function Patient()
    {
        return $this->belongsTo(User::class,'patient_id');
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}

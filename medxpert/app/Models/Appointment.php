<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'status',
        'notes',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'user_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Appointment extends Model
{

    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    // Define the relationship to the doctor
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}

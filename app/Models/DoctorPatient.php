<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DoctorPatient extends Pivot
{
    protected $table = 'doctor_patient';

    protected $fillable = ['doctor_id', 'patient_id', 'status'];
}

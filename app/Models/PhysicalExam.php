<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalExam extends Model
{
    protected $guarded = [];
    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

    public function physicalExam()
    {
        return $this->hasOne(PhysicalExam::class);
    }

    public function skinExam()
    {
        return $this->hasOne(SkinExam::class);
    }

    public function medicalHistory()
    {
        return $this->hasOne(MedicalRecordHistory::class);
    }
    public function general()
    {
        return $this->hasOne(General::class);
    }

    public function diagnoses()
    {
        return $this->hasOne(Diagnostic::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}

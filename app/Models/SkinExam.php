<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkinExam extends Model
{
    protected $guarded = [];
    protected $casts = [
        'images' => 'array',  // Automatically cast JSON to an array
    ];
    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected static function booted()
    {
        static::deleting(function ($user) {
            // If the user is being soft-deleted, soft delete related appointments
            if ($user->isForceDeleting() === false) {
                $user->appointmentsAsPatient()->delete();
                $user->patient()->delete();
            }
        });
    }

    public function creatorDoctor()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function createdPatients()
    {
        return $this->hasMany(User::class, 'created_by');
    }

    public function appointmentsAsPatient()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    // Define the relationship for doctors
    public function appointmentsAsDoctor()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function medicalHistory()
    {
        return $this->hasMany(MedicalHistory::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'patient_id');
    }

    public function patientRecord()
    {
        return $this->hasMany(MedicalRecord::class, 'patient_id');
    }
    public function recordByDoctor()
    {
        return $this->hasMany(MedicalRecord::class, 'doctor_id');
    }
}

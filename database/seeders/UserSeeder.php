<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Kashif',
            'last_name' => 'Khan',
            'username' => 'mka',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'role' => 'Admin'
        ]);

        $user = User::create([
            'first_name' => 'Dr.',
            'last_name' => 'Smith',
            'username' => 'Smith',
            'email' => 'doctor@example.com',
            'password' => Hash::make('1234'),
            'role' => 'doctor',
        ]);

        Doctor::create([
            'doctor_id' => $user->id,
            'fees' => 100,
            'specialization' => 'ENT'
        ]);

        $patient = User::create([
            'first_name' => 'Rose',
            'last_name' => 'Some',
            'username' => 'Rose',
            'email' => 'patient1@example.com',
            'password' => Hash::make('1234'),
            'role' => 'patient',
            // Fees can be omitted
        ]);

        Patient::create([
            'patient_id' => $patient->id,
            'full_name' => 'Rose Some',
        ]);

        $patient2 = User::create([
            'first_name' => 'John ',
            'last_name' => 'Doe',
            'username' => 'JohnDoe',
            'email' => 'patient@example.com',
            'password' => Hash::make('1234'),
            'role' => 'patient',
            // Fees can be omitted
        ]);
        Patient::create([
            'patient_id' => $patient2->id,
            'full_name' => 'John Doe'
        ]);
    }
}

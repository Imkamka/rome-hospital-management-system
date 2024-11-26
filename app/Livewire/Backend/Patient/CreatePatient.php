<?php

namespace App\Livewire\Backend\Patient;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class CreatePatient extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Add Patient')]

    public $full_name;
    public $phone;
    public $email;
    public $gender;
    public $address;
    public $age;
    public $emergency_contact;
    public $emergency_contact_phone;
    public $emergency_contact_relationship;

    public $first_name, $last_name, $username, $password;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'full_name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'required|min:4',
        'phone' => 'required|numeric', // Assuming a 10-digit mobile number
        'email' => 'required|email|unique:users,email', // Assuming you're using the "users" table
        'gender' => 'required|in:Male,Female,Other', // You can expand this with other genders if needed
        'address' => 'nullable|string|max:500', // Optional address
        'age' => 'required|integer', // Assuming a valid age between 18 and 100
        'emergency_contact' => 'nullable|string|max:255',
        'emergency_contact_phone' => 'nullable|numeric',
        'emergency_contact_relationship' => 'nullable|max:255'
    ];

    protected $messages = [
        'first_name.required' => 'Please enter your first name.',
        'last_name.required' => 'Please enter your last name.',
        'full_name.required' => 'Please enter your full name.',
        'username.required' => 'Please enter your username.',
        'phone.required' => 'Please provide mobile number.',
        'phone.numeric' => 'The mobile number must be a valid number.',
        'phone.digits' => 'The mobile number must be exactly 10 digits.',
        'email.required' => 'Email address is required.',
        'email.email' => 'Please provide a valid email address.',
        'age.required' => 'Please provide your age.',
        'age.integer' => 'Age must be an integer.',
    ];


    public function create()
    {
        $this->validate();

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'created_by' => auth()->id()
        ]);

        Patient::create([
            'patient_id' => $user->id,
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'gender' =>  $this->gender,
            'address' =>  $this->address,
            'age' => $this->age,
            'emergency_contact' => $this->emergency_contact,
            'emergency_contact_phone' => $this->emergency_contact_phone,
            'emergency_contact_relationship' => $this->emergency_contact_relationship
        ]);

        flash()->success('Patient successfully Created');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.backend.patient.create-patient');
    }
}

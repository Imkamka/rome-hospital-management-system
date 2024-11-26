<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewUserRegistered;

class PatientRegister extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $full_name;
    public $email;
    public $username;
    public $password;
    public $gender;
    public $phone;
    public $address;
    public $image;

    protected $rules = [
        'first_name'       => 'required|string|max:255',
        'last_name'        => 'required|string|max:255',
        'full_name'        => 'required|string|max:255',
        'email'            => 'required|email|unique:users,email|max:255',
        'username'         => 'required|string|unique:users,username|max:255',
        'password'         => 'required|string|min:4',
        'gender'           => 'nullable|string|in:male,female,other',
        'phone'            => 'nullable|string|max:15',
        'address'          => 'nullable|string|max:255',
        'image'            => 'nullable|image|max:2048', // Max size 2MB
    ];

    public function signup()
    {
        $this->validate();
        if ($this->image) {
            $this->image->store('images/', 'public');
        }
        $user = User::create([
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $this->image
        ]);
        Patient::create([
            'patient_id' => $user->id,
            'full_name' => $this->full_name,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'address' => $this->address,

        ]);
        // Send a notification to the new user and to the admin
        $user->notify(new NewUserRegistered($user));
        // Notify the admin (using a different method, e.g., email or system notification)
        $admin = User::where('role', 'Admin')->first();

        if ($admin) {
            $admin->notify(new NewUserRegistered($user));
        }

        Session::flash('success', 'You are successfully registered as a patient!');
        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.patient-register')
            ->layout('components.layouts.auth')
            ->title('Patient SignUp');
    }
}

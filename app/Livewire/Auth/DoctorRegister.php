<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Specialization;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewUserRegistered;

class DoctorRegister extends Component
{

    use WithFileUploads;

    #[Validate('nullable|image')]
    public $image;

    #[Validate('required|string|max:255')]
    public $first_name;

    #[Validate('required|string|max:255')]
    public $last_name;

    #[Validate('required|email|max:255')]
    public $email;

    #[Validate('required|string|max:255|unique:users,username')]
    public $username;

    #[Validate('required|string|min:4')]
    public $password;

    #[Validate('required|string|max:15')]
    public $phone;

    #[Validate('required|numeric|min:0')]
    public $fees;

    #[Validate('required')]
    public $gender;

    #[Validate('required|string|max:255')]
    public $specialization;


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
            'role' => 'Doctor',
            'image' => $this->image
        ]);
        Doctor::create([
            'doctor_id' => $user->id,
            'specialization' => $this->specialization,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'fees' => $this->fees,

        ]);
        $user->notify(new NewUserRegistered($user));
        // Notify the admin (using a different method, e.g., email or system notification)
        $admin = User::where('role', 'Admin')->first();

        if ($admin) {
            $admin->notify(new NewUserRegistered($user));
        }
        Session::flash('success', 'Doctor registered successfully');
        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.doctor-register')
            ->layout('components.layouts.auth')
            ->title('Doctor SignUp')
            ->with([
                'specs' => Specialization::orderBy('name', 'asc')
                    ->get()
            ]);
    }
}

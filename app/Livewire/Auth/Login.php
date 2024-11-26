<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $validatedData = $this->validate();

        if (!auth()->attempt($validatedData)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credientials do not match'
            ]);
        }
        return $this->redirect('/dashboard', navigate: true);
    }
    public function mount()
    {
        if (auth()->check()) {
            return $this->redirect('/dashboard', navigate: true);
        }
    }


    public function render()
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.auth')
            ->title('Login');
    }
}

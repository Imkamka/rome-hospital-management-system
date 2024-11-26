<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    #[Layout("components.layouts.auth")]
    #[Title("Forgot Password")]
    public $email;

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', __('A reset link has been sent to your email.'));
        } else {
            session()->flash('error', __('Something went wrong. Please try again.'));
        }
    }
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}

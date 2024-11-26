<?php

namespace App\Livewire\Backend\Profile;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordUpdate extends Component
{
    #[Layout('components.layouts.admin')]
    #[Title('Change Password')]

    public $current_password, $password, $password_confirmation;

    public function update()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:4',
        ]);
        if (!Hash::check($this->current_password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Current password is incorrect!'
            ]);
        }
        $user = auth()->user();
        $user->password = Hash::make($this->password); // Hash the new password
        $user->save();

        flash()->success('Password updated successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.backend.profile.password-update');
    }
}

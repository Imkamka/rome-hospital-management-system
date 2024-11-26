<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

    public function logout()
    {
        Auth::logout();
        return $this->redirect('/login', navigate: true);
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.auth.logout');
    }
}

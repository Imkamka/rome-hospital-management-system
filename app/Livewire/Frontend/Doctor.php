<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;

class Doctor extends Component
{
    #[Title("Doctors")]
    public function render()
    {
        return view('livewire.frontend.doctor')
            ->with([
                "doctors" => User::where("role", "Doctor")
                    ->latest()
                    ->get()
            ]);
    }
}

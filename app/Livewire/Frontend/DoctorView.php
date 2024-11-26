<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;

class DoctorView extends Component
{
    #[Title("Doctor Profile")]

    public $doctor;

    public function mount(int $id)
    {
        $this->doctor = User::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.frontend.doctor-view');
    }
}

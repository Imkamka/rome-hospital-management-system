<?php

namespace App\Livewire\Backend\Admin\Doctors;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class DoctorList extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Doctors List')]

    public $search = '';

    public function render()
    {
        return view('livewire.backend.admin.doctors.doctor-list')
            ->with([
                'doctors_list' => User::where('role', 'Doctor')
                    ->where('first_name', 'LIKE', '%' . $this->search . '%')
                    ->latest()
                    ->paginate(10)
            ]);
    }
}

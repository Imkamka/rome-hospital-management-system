<?php

namespace App\Livewire\Backend\Admin\Doctors;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class DoctorPatients extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Doctors Patient List')]

    public $search = '';
    public $doctorId;

    public function mount(int $id)
    {
        $this->doctorId = $id;
    }
    public function render()
    {
        return view('livewire.backend.admin.doctors.doctor-patients')
            ->with([
                'patient_list' => User::whereHas('patient', function ($query) {
                    $query->where('full_name', 'LIKE', '%' . $this->search . '%');
                })
                    ->where('created_by', $this->doctorId)
                    ->latest()
                    ->paginate(10)
            ]);
    }
}

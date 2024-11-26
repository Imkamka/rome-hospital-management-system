<?php

namespace App\Livewire\Backend\Search;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class AppointmentSearch extends Component
{
    use WithPagination;

    #[Layout('components.layouts.admin')]
    #[Title('Appointment Search')]

    public $search_query;

    public function render()
    {

        return view('livewire.backend.search.appointment-search', [

            'appointments' => Appointment::whereHas('patient', function ($query) {
                $query->where('first_name', 'LIKE', '%' . $this->search_query . '%')
                    ->orWhere('appointment_number', 'LIKE', '%' . $this->search_query . '%');
            })->where('doctor_id', auth()->id())->paginate(10)

        ]);
    }
}

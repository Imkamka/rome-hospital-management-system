<?php

namespace App\Livewire\Backend;

use App\Models\Appointment;
use App\Models\MedicalHistory;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.backend.dashboard')
            ->layout('components.layouts.admin')
            ->title('Dashboard')
            ->with([
                //Doctor's dashboard access
                'appointments' => Appointment::where('doctor_id', auth()->id())
                    ->get(),
                'pendingCount' => Appointment::where('doctor_id', auth()->id())
                    ->where('status', 'Pending')
                    ->count(),
                'approved' => Appointment::where('doctor_id', auth()->id())
                    ->where('status', 'Approved')
                    ->get(),
                'cancelled' => Appointment::where('doctor_id', auth()->id())
                    ->where('status', 'Cancelled')
                    ->count(),
                'completed' => Appointment::where('doctor_id', auth()->id())
                    ->where('status', 'Completed')
                    ->count(),
                'followupCount' => Appointment::where('doctor_id', auth()->id())
                    ->where('status', 'Follow-Up')
                    ->count(),
                'upnext' => Appointment::where('doctor_id', auth()->id())
                    ->where('status', 'Approved')
                    ->orderBy('appointment_date', 'asc')
                    ->orderBy('appointment_time', 'asc')
                    ->paginate(1),
                'pending' => Appointment::where('doctor_id', auth()->id())
                    ->where('status', 'Pending')
                    ->paginate(1),
                //Patient's Dashboard Access
                'upcomming' => Appointment::where('patient_id', auth()->id())
                    ->where('status', 'Approved')
                    ->orderBy('appointment_date', 'asc')
                    ->paginate(2),
                'followup' => Appointment::where('patient_id', auth()->id())
                    ->where('status', 'Follow-Up')
                    ->orderBy('follow_up_date', 'asc')
                    ->paginate(2),
                'health_records' => MedicalHistory::where('patient_id', auth()->id())
                    ->latest()
                    ->paginate(2),

                //Admin's Dashboard access
                'total_admin' => User::where('role', 'Admin')
                    ->count(),
                'total_doctor' => User::where('role', 'Doctor')
                    ->count(),
                'total_patient' => User::where('role', 'Patient')
                    ->count(),
                'total_spec' => Specialization::count(),

            ]);
    }
}

<?php

namespace App\Livewire\Backend\Patient;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditPatient extends Component
{

    #[Layout('components.layouts.admin')]
    #[Title('Patient Edit')]

    public $id;
    public $full_name;
    public $phone;
    public $gender;
    public $address;
    public $age;
    public $email;
    public $emergency_contact, $emergency_contact_phone, $emergency_contact_relationship;

    public function mount($id)
    {
        $patient = User::findOrFail($id);
        $this->id = $patient->id;
        $this->full_name = $patient->patient->full_name;
        $this->email = $patient->email;
        $this->phone = $patient->patient->phone;
        $this->gender = $patient->patient->gender;
        $this->address = $patient->patient->address;
        $this->age = $patient->patient->age;
        $this->emergency_contact = $patient->patient->emergency_contact;
        $this->emergency_contact_phone = $patient->patient->emergency_contact_phone;
        $this->emergency_contact_relationship = $patient->patient->emergency_contact_relationship;
    }


    public function update(User $patient)
    {
        $validatedData = $this->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'gender' => 'required|in:Male,Female,Others',
            'address' => 'nullable|string|max:500',
            'age' => 'required|integer|min:1',
            'emergency_contact' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|numeric',
            'emergency_contact_relationship' => 'nullable|max:255'
        ]);

        $patient->patient()->update($validatedData);

        flash()->success('Patient successfully updated');
        return $this->redirect('/patient/edit/' . $patient->id, navigate: true);
    }


    public function render()
    {
        return view('livewire.backend.patient.edit-patient')
            ->with([
                'patient' => User::findOrFail($this->id)
            ]);
    }
}

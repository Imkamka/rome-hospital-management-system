<?php

namespace App\Livewire\Backend\Admin\Doctors;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Specialization;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DoctorDetail extends Component
{
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    #[Title('Doctors List')]

    public $doctor;
    public $isEditing = false;

    public $image;
    public $first_name;
    public $last_name;
    public $phone;
    public $specialization;
    public $email;

    protected $rules = [
        'image' => 'nullable|image',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'required|numeric',
        'specialization' => 'required',
    ];


    public function mount(int $id)
    {
        $this->doctor = User::findOrFail($id);
        // $this->image = $this->doctor->image;
        $this->first_name = $this->doctor->first_name;
        $this->last_name = $this->doctor->last_name;
        $this->email = $this->doctor->email;
        $this->specialization = $this->doctor->doctor->specialization;
        $this->phone = $this->doctor->doctor->phone;
    }

    public function update()
    {
        // Validate input data
        $this->validate();

        // Handle image upload
        $imageTempName = $this->doctor->image; // Keep the old image as default
        if ($this->image) {
            $extention = $this->image->getClientOriginalExtension();
            $imageTempName = $this->doctor->id . time() . "." . $extention;
            $this->image->storeAs('images', $imageTempName, 'public');
        }

        // Update doctor main model
        $this->doctor->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'image' => $imageTempName,
        ]);

        // Update or create related doctor details
        $this->doctor->doctor()->updateOrCreate(
            [], // No condition needed, as the relationship already exists for a `hasOne`
            [
                'specialization' => $this->specialization,
                'phone' => $this->phone,
            ]
        );

        // Send a single success message
        Session::flash("message", "Data successfully changed");
    }


    public function isUpdate()
    {
        $this->isEditing = !$this->isEditing;
    }

    public function render()
    {
        return view('livewire.backend.admin.doctors.doctor-detail')
            ->with([
                'dr_specializations' => Specialization::orderBy('name', 'asc')
                    ->get()
            ]);
    }
}

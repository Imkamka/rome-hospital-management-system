<?php

namespace App\Livewire\Backend\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\File;


class ProfileUpdate extends Component
{
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    #[Title('Profile Update')]

    public $first_name, $last_name, $email, $username, $bio, $image;

    public function mount(int $id): void
    {
        $user = User::findOrFail($id);
        $this->first_name  = $user->first_name;
        $this->last_name  = $user->last_name;
        $this->email  = $user->email;
        $this->username = $user->username;
        $this->bio = $user->bio;
        // $this->image = $user->image;
    }


    public function update()
    {
        // dd($this->all());
        $this->validate([
            'image' => 'nullable|image',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'bio' => 'nullable|min:4|max:2000',

        ]);

        $user = User::findOrFail(auth()->id());

        if ($this->image) {
            $extention = $this->image->getClientOriginalExtension();
            $imageTempName = $user->id . time() . "." . $extention;

            $this->image->storeAs('images', $imageTempName, 'public');

            File::delete(public_path('storage/images/' . auth()->user()->image));
            $user->image = $imageTempName;
        }

        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->bio = $this->bio;
        $user->save();
        flash()->success('Profile updated successfully!');
    }



    public function render()
    {
        return view('livewire.backend.profile.profile-update');
    }
}

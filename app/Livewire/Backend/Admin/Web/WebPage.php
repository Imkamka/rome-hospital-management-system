<?php

namespace App\Livewire\Backend\Admin\Web;

use App\Models\WebsiteDetail;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class WebPage extends Component
{
    use WithPagination;
    #[Layout('components.layouts.admin')]
    #[Title('Update Web Page')]
    public $page_title, $address, $about_us, $email, $mobile_number;
    public $web;

    protected $rules = [
        'page_title' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'about_us' => 'required|string',
        'email' => 'required|string|max:255',
        'mobile_number' => 'required|string|max:15',
    ];

    public function mount()
    {
        $this->web = WebsiteDetail::first();
        $this->page_title = $this->web->page_title;
        $this->address = $this->web->address;
        $this->about_us = $this->web->about_us;
        $this->email = $this->web->email;
        $this->mobile_number = $this->web->mobile_number;
    }

    public function updateDetails()
    {
        $validatedData = $this->validate();

        $this->web->update($validatedData);

        flash()->success('Website details updated successfully.');
    }


    public function render()
    {
        return view('livewire.backend.admin.web.web-page');
    }
}

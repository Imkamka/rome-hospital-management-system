<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\WebsiteDetail;
use Livewire\Attributes\Title;

class Contact extends Component
{
    #[Title("Contact us")]
    public function render()
    {
        return view('livewire.frontend.contact')
            ->with([
                "about_us" => WebsiteDetail::first()
            ]);
    }
}

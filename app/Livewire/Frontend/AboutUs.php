<?php

namespace App\Livewire\Frontend;

use App\Models\WebsiteDetail;
use Livewire\Component;
use Livewire\Attributes\Title;

class AboutUs extends Component
{
    #[Title("About us")]
    public function render()
    {
        return view('livewire.frontend.about-us')
            ->with([
                "about_us" => WebsiteDetail::first()
            ]);
    }
}

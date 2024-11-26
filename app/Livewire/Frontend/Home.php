<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Title;

class Home extends Component
{
    #[Title("Home")]

    public function render()
    {
        return view('livewire.frontend.home');
    }
}

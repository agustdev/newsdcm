<?php

namespace App\Http\Livewire;

use App\Models\Destinos;
use Livewire\Component;

class EntradasinternacionalesStepPost extends Component
{
    public function render()
    {
        $destinos = Destinos::all();
        return view('livewire.entradasinternacionales-step-post', compact('destinos'));
    }
}

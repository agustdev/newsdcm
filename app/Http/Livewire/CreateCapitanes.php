<?php

namespace App\Http\Livewire;

use App\Models\Nacionalidades;
use Livewire\Component;

class CreateCapitanes extends Component
{
    public $open = true;
    public $tipo_documento, $documento, $nombre, $nacionalidad, $contacto;
    public function render()
    {
        $nacionalidades = Nacionalidades::all();
        return view('livewire.create-capitanes', compact('nacionalidades'));
    }

    public function update() {}
}

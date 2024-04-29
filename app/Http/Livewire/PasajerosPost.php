<?php

namespace App\Http\Livewire;

use App\Models\Pasajeros;
use Livewire\Component;

class PasajerosPost extends Component
{
    public $nombre, $nacionalidad, $documnto;
    public function save()
    {
        Pasajeros::create([
            'nombre' => $this->nombre,
            'nacionalidad' => $this->nacionalidad,
            'documento' => $this->documento
        ]);
    }
    public function render()
    {
        $pasajeros = Pasajeros::where('userid', auth()->user()->id)->paginate();
        return view('livewire.pasajeros-post', compact('pasajeros'));
    }
}

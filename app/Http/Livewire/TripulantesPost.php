<?php

namespace App\Http\Livewire;

use App\Models\Tripulantes;
use Livewire\Component;

class TripulantesPost extends Component
{
    public $nombre, $nacionalidad, $documnto;
    public function save()
    {
        Tripulantes::create([
            'nombre' => $this->nombre,
            'nacionalidad' => $this->nacionalidad,
            'documento' => $this->documento
        ]);
    }
    public function render()
    {
        $tripulantes = Tripulantes::where('userid', auth()->user()->id)->where('mov_id', 0)->get();
        return view('livewire.tripulantes-post', compact('tripulantes'));
    }
}

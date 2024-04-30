<?php

namespace App\Http\Livewire;

use App\Models\Tripulantes;
use Livewire\Component;

class TripulantesPost extends Component
{
    public $nombre, $nacionalidad, $documento;
    protected $listeners = ['delete'];

    public function save()
    {
        Tripulantes::create([
            'nombre' => $this->nombre,
            'nacionalidad' => $this->nacionalidad,
            'documento' => $this->documento,
            'userid' => auth()->user()->id,
            'mov_id' => 0
        ]);

        $this->reset(['nombre', 'nacionalidad', 'documento']);
    }

    public function delete(Tripulantes $tripulante)
    {
        $tripulante->delete();
    }
    public function render()
    {
        $tripulantes = Tripulantes::where('userid', auth()->user()->id)->where('mov_id', 0)->orderBy('id', 'desc')->get();
        return view('livewire.tripulantes-post', compact('tripulantes'));
    }
}

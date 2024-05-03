<?php

namespace App\Http\Livewire;

use App\Models\Pasajeros;
use Livewire\Component;

class PasajerosPost extends Component
{
    public $nombre, $nacionalidad, $documento;
    // protected $listeners = ['render' => 'render'];
    protected $listeners = ['delete'];
    protected $rules = [
        'nombre' => 'required',
        'nacionalidad' => 'required',
        'documento' => 'required'
    ];
    public function save()
    {
        $this->validate();
        Pasajeros::create([
            'nombre' => $this->nombre,
            'nacionalidad' => $this->nacionalidad,
            'documento' => $this->documento,
            'userid' => auth()->user()->id,
            'mov_id' => 0
        ]);

        // $this->emit('render');
    }

    public function delete(Pasajeros $tripulante)
    {
        $tripulante->delete();
    }

    public function render()
    {
        $pasajeros = Pasajeros::where('userid', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('livewire.pasajeros-post', compact('pasajeros'));
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Nacionalidades;
use App\Models\CapitanesRegistrados;
use App\Models\CapitanesRegUsuarios;

class CreateCapitanes extends Component
{
    public $open = false;
    public $tipo_documento = 'cedula', $documento, $nombre, $nacionalidad, $telefono;

    protected $rules = [
        'nombre' => 'required',
        'nacionalidad' => 'required',
        'documento' => 'required',
        'telefono' => 'required'
    ];
    public function update()
    {
        $this->validate();
        $capitan = CapitanesRegistrados::create([
            'nombre' => Str::upper($this->nombre),
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'telefono' => $this->telefono,
            'nacionalidad' => Str::upper($this->nacionalidad)
        ]);

        CapitanesRegUsuarios::create([
            'cap_id' => $capitan->id,
            'user_id' => auth()->user()->id
        ]);

        $this->reset([
            'open',
            'nombre',
            'tipo_documento',
            'documento',
            'nacionalidad',
            'telefono'
        ]);
        $this->emitTo('mis-capitanes', 'render');
        $this->emit('alert', 'Capitan agregado con exito');
    }
    public function render()
    {
        $nacionalidades = Nacionalidades::all();
        return view('livewire.create-capitanes', compact('nacionalidades'));
    }
}

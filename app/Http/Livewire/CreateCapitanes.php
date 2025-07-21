<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Nacionalidades;
use App\Models\CapitanesRegistrados;
use App\Models\CapitanesRegUsuarios;
use Illuminate\Validation\Rule;

class CreateCapitanes extends Component
{
    public $open = false;
    public $tipo_documento = 'cedula', $documento, $nombre, $nacionalidad, $telefono;
    protected $listeners = ['setNombreCapitan', 'setNacionalidades'];
    public $messages = [
        'nombre.required' => 'El nombre es obligatorio.',
        'documento.required' => 'El documento es obligatorio.',
        'documento.unique' => 'El número de documento de identidad ya está registrado para este usuario.',
    ];
    protected function rules()
    {
        return [
            'nombre' => 'required',
            'nacionalidad' => 'required',
            'documento' => [
                'required',
                Rule::unique('capitanes_registrados')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
            'telefono' => 'required',
        ];
    }

    public function setNombreCapitan($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setNacionalidades($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

    public function updatedDocumento()
    {
        $this->emit('consultarCapitan');
    }

    public function update()
    {
        $this->validate();
        $capitan = CapitanesRegistrados::create([
            'nombre' => Str::upper($this->nombre),
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'telefono' => $this->telefono,
            'nacionalidad' => Str::upper($this->nacionalidad),
            'user_id' => auth()->user()->id
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

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Nacionalidades;
use App\Models\CapitanesRegistrados;
use App\Models\CapitanesRegUsuarios;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class CreateCapitanes extends Component
{
    public $open = false;
    public $tipo_documento = 'cedula', $documento, $nombre, $nacionalidad, $telefono, $fecha_expira;
    protected $listeners = ['setNombreCapitan', 'setNacionalidades', 'setFechaExpira'];
    public $messages = [
        'nombre.required' => 'El nombre es obligatorio.',
        'documento.required' => 'El documento es obligatorio.',
        'documento.unique' => 'El número de documento de identidad ya está registrado para este usuario.',
        'fecha_expira.after' => 'Este documento está vencido, favor renovar y volver a intentarlo.'
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
            'fecha_expira' => 'required|date',
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

    public function setFechaExpira($fecha_expira)
    {
        $this->fecha_expira = Carbon::parse($fecha_expira)->format('Y-m-d');
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
            'fecha_expira' => $this->fecha_expira,
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
            'telefono',
            'fecha_expira'
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

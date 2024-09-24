<?php

namespace App\Http\Livewire;

use App\Models\CapitanesRegistrados;
use App\Models\Nacionalidades;
use Livewire\Component;

class EditCapitanes extends Component
{
    public $open = false;
    public $capitan;
    protected $rules = [
        'capitan.nombre' => 'required',
        'capitan.nacionalidad' => 'required',
        'capitan.documento' => 'required',
        'capitan.telefono' => 'required'
    ];
    public function mount(CapitanesRegistrados $capitan)
    {
        $this->capitan = $capitan;
    }

    public function save()
    {
        $this->validate();
        $this->capitan->save();

        $this->reset([
            'open'
        ]);
        $this->emitTo('mis-capitanes', 'render');
        $this->emit('alert', 'Capitan modificado con exito');
    }
    public function render()
    {
        $nacionalidades = Nacionalidades::all();
        return view('livewire.edit-capitanes', compact('nacionalidades'));
    }
}

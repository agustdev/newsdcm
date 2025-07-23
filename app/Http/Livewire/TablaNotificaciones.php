<?php

namespace App\Http\Livewire;

use App\Models\Embarcaciones;
use Livewire\Component;

class TablaNotificaciones extends Component
{
    protected $listeners = ['render' => 'render', 'notificar'];
    public function render()
    {
        return view('livewire.tabla-notificaciones');
    }

    public function notificar(Embarcaciones $embarcacion)
    {
        $embarcacion->update([
            'estado_movimiento' => 3
        ]);
        $this->emit('render');
    }
}

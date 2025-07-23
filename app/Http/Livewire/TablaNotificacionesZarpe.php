<?php

namespace App\Http\Livewire;

use App\Models\Embarcaciones;
use Livewire\Component;

class TablaNotificacionesZarpe extends Component
{
    protected $listeners = ['render' => 'render', 'notificar'];
    public function render()
    {
        return view('livewire.tabla-notificaciones-zarpe');
    }

    public function notificar(Embarcaciones $embarcacion)
    {
        $embarcacion->update([
            'estado_movimiento' => 2
        ]);
        $this->emit('render');
    }
}

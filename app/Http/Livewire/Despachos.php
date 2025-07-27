<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Despachos extends Component
{
    public function render()
    {
        $despachos = auth()->user()->movimientos()->where('tipo_movimiento', 'D')->orderBy('id', 'desc')->get();
        return view('livewire.despachos', compact('despachos'));
    }
}

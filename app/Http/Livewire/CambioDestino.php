<?php

namespace App\Http\Livewire;

use App\Models\CambiosDestinosMovimientos;
use App\Models\Movimientos;
use App\Models\PerimetroCostero;
use Livewire\Component;

class CambioDestino extends Component
{
    public $openEdit = false;
    public $despacho;
    public $destino;
    protected $listeners = ['abrirModal'];
    public function mount(Movimientos $despacho)
    {
        $this->despacho = $despacho;
    }
    public function save()
    {
        $capitan = CambiosDestinosMovimientos::create([
            'mov_id' => $this->despacho->id,
            'emb_id' => $this->despacho->emb_id,
            'idsalida' => $this->despacho->idsalida,
            'idllegada' => $this->despacho->idllegada,
            'nuevo_destino' => $this->destino
        ]);

        $this->reset([
            'openEdit',
            'destino'
        ]);
        $this->emitTo('despachos', 'render');
    }
    public function abrirModal($id)
    {
        // Puedes cargar los datos aquí si hace falta
        $this->openEdit = true;
    }
    public function render()
    {
        $perimetros = PerimetroCostero::where('salida_id', $this->despacho->idsalida)->get();
        return view('livewire.cambio-destino', compact('perimetros'));
    }
}

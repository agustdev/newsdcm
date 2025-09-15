<?php

namespace App\Http\Livewire;

use App\Models\Embarcaciones;
use Livewire\Component;

class ShowEmbarcaciones extends Component
{
    protected $listeners = ['setSelectedEmb'];
    public $search;
    // Selección de embarcaciones
    public $selectedEmb = [];
    public function mount($selectedEmb = [])
    {
        $this->selectedEmb = $selectedEmb;
    }
    public function setSelectedEmb($registros)
    {
        $this->selectedEmb = $registros;
    }

    public function updatedSelectedEmb()
    {
        // Emitimos un evento global con la lista de registros seleccionados
        $this->emit('registrosSeleccionados', $this->selectedEmb);
    }
    public function render()
    {

        $user = auth()->user();
        $embarcaciones = Embarcaciones::where('no_documento', $user->documento)
            ->when($this->search, function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%');
            })
            ->get();
        return view('livewire.show-embarcaciones', compact('embarcaciones'));
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Representantes;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MisRepresentantes extends Component
{
    protected $listeners = ['render' => 'render', 'delete'];
    public function render()
    {
        $representantes = auth()->user()->representantes;
        return view('livewire.mis-representantes', compact('representantes'));
    }

    public function delete(Representantes $representante)
    {
        if ($representante->imagen_documento && Storage::disk('public')->exists($representante->imagen_documento)) {
            Storage::disk('public')->delete($representante->imagen_documento);
        }
        $representante->delete();
        $this->emit('render');
    }
}

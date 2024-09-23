<?php

namespace App\Http\Livewire;

use App\Models\CapitanesRegistrados;
use App\Models\CapitanesRegUsuarios;
use Livewire\Component;

class MisCapitanes extends Component
{
    protected $listeners = ['render' => 'render', 'delete'];
    public function render()
    {
        $capitanes = CapitanesRegistrados::all();
        return view('livewire.mis-capitanes', compact('capitanes'));
    }

    public function delete(CapitanesRegistrados $capitan)
    {
        $rela = CapitanesRegUsuarios::where('cap_id', $capitan->id)->first();
        $rela->delete();
        $capitan->delete();

        $this->emit('render');
    }
}

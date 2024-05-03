<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TerminosModal extends Component
{
    public $terminoModal = false;
    public $check = true;
    public bool $checkTerm = false;
    public function processMark()
    {
        if ($this->checked) {
            $this->mark();
        } else {
            $this->unMark();
        }
    }
    public function render()
    {
        return view('livewire.terminos-modal');
    }
}

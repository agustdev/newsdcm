<?php

namespace App\Http\Livewire;

use App\Models\Destinos;
use Livewire\Component;

class EntradasinternacionalesStepPost extends Component
{
    public $matricula;
    public $nombre;
    public $numero_casco;
    public $color;
    public $material_casco;
    public $eslora;
    public $manga;
    public $puntal;
    public $tipo_embarcacion;
    public $tipo_uso;
    public $tipo_motor;
    public $marca_modelo_motor;
    public $caballos_fuerza_motor;
    public $no_motor;
    public $tipo_documento;
    public $documento_cap;
    public $nombre_capitan;
    public $nacionalidad_cap;
    public $telefono;
    public $motivo_viaje;
    public $fecha_llegada;
    public $pais_procedencia;
    public $puerto_salida;
    public $puerto_llegada;
    public $cantidad_tripulantes;
    public $cantidad_pasajeros;

    public $totalSteps = 3;
    public $currentStep = 1;
    public function mount()
    {
        $this->currentStep = 1;
    }
    public function render()
    {
        $destinos = Destinos::all();
        return view('livewire.entradasinternacionales-step-post', compact('destinos'));
    }

    public function increaseStep()
    {
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }



    public function registerEntradasI()
    {
    }
}

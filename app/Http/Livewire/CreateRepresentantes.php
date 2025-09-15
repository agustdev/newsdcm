<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use App\Models\Nacionalidades;
use App\Models\Representantes;
use Livewire\Component;
use Illuminate\Validation\Rule;

class CreateRepresentantes extends Component
{
    use WithFileUploads;

    protected $listeners = ['setNombreRepresentante', 'registrosSeleccionados'];
    public $open = false;
    public $step = 1;
    public $tipo_documento = 'cedula', $imagen_documento, $representanteId, $nombre, $documento, $nacionalidad = 'DOMINICANA';
    public $nombreReadonly = false;
    // Selección de embarcaciones
    public $selectedEmb = [];
    // Condiciones
    public $aceptoCondiciones = false;

    public $messages = [
        'nombre.required' => 'El nombre es obligatorio.',
        'documento.required' => 'El documento es obligatorio.',
        'documento.unique' => 'El número de documento de identidad ya está registrado para este usuario.'
    ];

    protected function rules()
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'tipo_documento' => 'required|in:cedula,pasaporte',
            'documento' => [
                'required',
                Rule::unique('representantes')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
        ];

        // Validar archivo solo si es pasaporte
        if ($this->tipo_documento === 'pasaporte') {
            $rules['imagen_documento'] = 'required|file|mimes:jpg,png,pdf|max:2048';
        }

        return $rules;
    }

    public function registrosSeleccionados($registros)
    {
        $this->selectedEmb = $registros;
    }

    public function updatedTipoDocumento()
    {
        // Resetear archivo cuando cambia el tipo
        $this->imagen_documento = null;
        $this->nombre = null;
        $this->documento = null;
    }
    public function render()
    {
        $nacionalidades = Nacionalidades::all();
        return view('livewire.create-representantes', compact('nacionalidades'));
    }

    public function setNacionalidades($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

    public function nextStep()
    {
        if ($this->step === 1) {
            $this->validate([
                'nombre' => 'required|string|max:255',
                'documento' => [
                    'required',
                    Rule::unique('representantes')->where(function ($query) {
                        return $query->where('user_id', auth()->id());
                    }),
                ],
                'tipo_documento' => 'required|in:cedula,pasaporte',
                'imagen_documento' => $this->tipo_documento === 'pasaporte' ? 'required|file|mimes:jpg,png,pdf|max:2048' : '',
            ]);
        }

        if ($this->step === 2) {
            // $this->emitTo('show-embarcaciones', 'setSelectedEmb', $this->selectedEmb);
            // Validar que al menos un registro haya sido seleccionado
            if (count($this->selectedEmb) === 0) {
                $this->addError('selectedEmb', 'Debes seleccionar al menos una embarcación para continuar.');
                return; // no avanzar
            } else {

                $this->resetErrorBag('selectedEmb'); // borrar error si ya hay selección
            }
        }
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
        if ($this->step === 2) {
            $this->emitTo('show-embarcaciones', 'setSelectedEmb', $this->selectedEmb);
        }
    }
    public function setNombreRepresentante($nombre)
    {
        $this->nombre = $nombre;
    }

    public function submit()
    {
        // Aquí ya tienes $selectedRegistros recibido desde ShowRepresentantes
        // Guardas todo al final
        // Guardar representante
        $this->validate();
        $rep = Representantes::create([
            'nombre' => $this->nombre,
            'documento' => $this->documento,
            'tipo_documento' => $this->tipo_documento,
            'imagen_documento' => $this->imagen_documento ? $this->imagen_documento->store('pasaportes', 'public') : null,
            'nacionalidad' => $this->nacionalidad ?? null,
            'user_id' => auth()->id(),
        ]);
        // Guardar asignación de registros/embarcaciones
        if (!empty($this->selectedEmb)) {
            $rep->embarcaciones()->sync($this->selectedEmb);
        }
        $this->resetWizard();
        $this->emitTo('mis-representantes', 'render');
        $this->emit('alert', 'Representante agregado con exito');
    }

    public function resetWizard()
    {
        $this->reset([
            'open',
            'step',
            'nombre',
            'documento',
            'tipo_documento',
            'nacionalidad',
            'representanteId',
            'selectedEmb',
            'imagen_documento',
            'aceptoCondiciones',
        ]);
        $this->step = 1;
    }
}

<div>
    <button data-id="{{ $despacho->id }}" wire:click="$set('openEdit', true)"
        class="{{ \Carbon\Carbon::parse($despacho->fecha_llegada)->isPast() ? 'hidden ' : 'inline-flex ' }}items-center justify-center px-3 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 edit-desp disabled:opacity-25"
        title="Editar"><i class="uil-edit"></i>
    </button>
    <x-dialog-modal wire:model="openEdit">
        <x-slot name="title">
            MODIFICAR DESTINO
        </x-slot>
        <x-slot name="content">
            @if ($despacho->detalle_destino == '')
                <div class="alert alert-warning">
                    Solo se permiten los cambios de destino si seleccionó perimetro costero.
                </div>
            @else
                <h2 class="text-xl font-semibold">
                    No. Solicitud: {{ $despacho->id }}
                </h2>
                <div class="mt-3 uppercase">
                    <x-label class="text-1xl">{{ __('Destino anterior') }}</x-label>
                    <x-input
                        class="{{ $errors->has('telefono') ? 'is-invalid' : '' }} block w-full mt-2 uppercase telefono"
                        readonly value="{{ $despacho->detalle_destino }}"></x-input>
                </div>
                <div class="mt-3 uppercase">
                    <x-label class="text-1xl">{{ __('Nuevo Destino') }}</x-label>
                    <select wire:model.defer='destino' class="form-control mb-2 rounded-md">
                        <option value="">- {{ __('Seleccione') }} -</option>
                        @foreach ($perimetros as $perimetro)
                            <option value="{{ $perimetro->description }}">{{ $perimetro->description }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-danger-button class="mr-3" wire:click="$set('openEdit', false)">Cancelar</x-danger-button>
            @if ($despacho->detalle_destino != '')
                <x-blue-button wire:click='save' wire:loading.attr='disabled' class="disabled:opacity-25">Realizar
                    cambio</x-blue-button>
            @endif
        </x-slot>
    </x-dialog-modal>
</div>

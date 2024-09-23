<div style="display: inline-block;">
    <button wire:click="$set('open', true)" title="Actualizar información"
        class="inline-flex items-center justify-center px-3 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 edit-desp disabled:opacity-25">
        <i class="mdi mdi-pencil"></i>
    </button>
    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            MODIFICAR CAPITAN - {{ $capitan->nombre }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">Tipo de documento</x-label>
                <select name="" id=""
                    class="{{ $errors->has('tipo_documento') ? 'is-invalid' : '' }} form-control mb-2 rounded-md block w-full mt-2 uppercase"
                    wire:model='capitan.tipo_documento'>
                    <option value="cedula">Cédula</option>
                    <option value="pasaporte">Pasaporte</option>
                    <option value="carnet_navegante">Carnet Navegante</option>
                </select>

            </div>
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">Documento de identidad</x-label>
                <x-input class="{{ $errors->has('documento') ? 'is-invalid' : '' }} block w-full mt-2 uppercase"
                    wire:model='capitan.documento'></x-input>
            </div>
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">Nombre</x-label>
                <x-input wire:model='capitan.nombre'
                    class="{{ $errors->has('nombre') ? 'is-invalid' : '' }} block w-full mt-2 uppercase"></x-input>
            </div>
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">Nacionalidad</x-label>
                <select wire:model='capitan.nacionalidad'
                    class="{{ $errors->has('nacionalidad') ? 'is-invalid' : '' }} form-control mb-2 rounded-md">
                    <option value="">- Seleccione -</option>
                    @foreach ($nacionalidades as $nacionalidad)
                        <option value="{{ $nacionalidad->gentilicio }}">{{ $nacionalidad->gentilicio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">Telefono</x-label>
                <x-input class="{{ $errors->has('telefono') ? 'is-invalid' : '' }} block w-full mt-2 uppercase"
                    wire:model='capitan.telefono'></x-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button class="mr-3" wire:click="$set('open', false)">Cancelar</x-danger-button>
            <x-blue-button wire:click='save' wire:loading.attr='disabled'
                class="disabled:opacity-25">Aceptar</x-blue-button>
        </x-slot>
    </x-dialog-modal>
</div>

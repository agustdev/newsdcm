<div>
    <button wire:click="$set('open', true)"
        class="inline-flex items-center justify-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end"><i
            class="mdi mdi-plus mdi-18px"></i>{{ __('Nuevo Capitan') }}</button>

    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            Crear capitan
        </x-slot>
        <x-slot name="content">
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Tipo de documento</x-label>
                <x-select class="block w-full mt-2 uppercase" wire:model='tipo_documento'></x-select>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Documento de identidad</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='documento'></x-input>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Nombre</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='nombre'></x-input>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Nacionalidad</x-label>
                <select class="form-control mb-2 rounded-md" wire:model='nacionalidad'>
                    <option value="">- Seleccione -</option>
                    @foreach ($nacionalidades as $nacionalidad)
                        <option value="{{ $nacionalidad->gentilicio }}">{{ $nacionalidad->gentilicio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4 uppercase">
                <x-label class="text-3xl">Telefono</x-label>
                <x-input class="block w-full mt-2 uppercase" wire:model='contacto'></x-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button class="mr-4" wire:click="$set('open', false)">Cancelar</x-danger-button>
            <x-blue-button wire:click='update' wire:loading.attr='disabled'
                class="disabled:opacity-25">Aceptar</x-blue-button>
        </x-slot>
    </x-dialog-modal>
</div>

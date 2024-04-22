<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Actualiza contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-lg-12">
            <x-label for="current_password" value="{{ __('Contraseña actual') }}" />
            <x-input id="current_password" type="password" class="form-control mb-2"
                wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-lg-12">
            <x-label for="password" value="{{ __('Nueva contraseña') }}" />
            <x-input id="password" type="password" class="form-control mb-2" wire:model.defer="state.password"
                autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-lg-12">
            <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
            <x-input id="password_confirmation" type="password" class="form-control"
                wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guadar.') }}
        </x-action-message>

        <x-button>
            {{ __('Guadar') }}
        </x-button>
    </x-slot>
</x-form-section>

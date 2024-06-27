<div>
    <a wire:click.prevent="$set('terminoModal', true)" href="#"
        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">'
        {{ __('Términos de servicio') }}
    </a>
    <x-dialog-modal-term wire:model="terminoModal">
        <x-slot name="title">
            <h2 class="text-2xl font-extrabold ">
                {{ __('Términos de servicio') }}
            </h2>
        </x-slot>

        <x-slot name="content">

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="accept_c" wire:click="$set('terminoModal', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-button-register class="ml-3 accept_t" wire:click="$set('terminoModal', false)"
                wire:loading.attr="disabled" x-bind:checked="terms">
                {{ __('Aceptar') }}
            </x-button-register>
        </x-slot>
    </x-dialog-modal-term>
</div>

<x-app-layout>
    @section('titulo', 'Notificaciones')
    <x-slot name="header">
        <h2 class="h2 mb-2 mt-3 text-black text-uppercase">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>
    <div class="alert alert-info">
        <h2 class="h4">
            <i class="mdi mdi-folder-information mdi-24px"></i>
            {!! __('Esta es la lista de tus embarcaciones en movimiento') !!} <br>
            {!! __('Puedes ver las notificaciones de cada solicitud') !!}
        </h2>
    </div>

</x-app-layout>

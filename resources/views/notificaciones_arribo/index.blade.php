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
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-xl">
                <div class="card-header">
                    <h2 class="h3 text-slate-600">Notificaciones de arribo</h2>
                </div>
                <div class="card-body">
                    @livewire('tabla-notificaciones')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
        @if (get_emb_request_zarpe()->count() > 0)
            <div class="col-lg-12">
                <div class="card shadow-xl">
                    <div class="card-header">
                        <h2 class="h3 text-slate-600">Notificaciones de zarpe</h2>
                    </div>
                    <div class="card-body">
                        @livewire('tabla-notificaciones-zarpe')
                    </div>
                </div>
            </div>
        @endif
        @if (get_emb_request_all()->count() > 0)
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
        @endif

        @if (get_emb_request_all()->count() == 0 || get_emb_request_zarpe()->count() == 0)
            <div class="alert alert-warning">
                Sin notificaciones aun.
            </div>
        @endif
    </div>
</x-app-layout>

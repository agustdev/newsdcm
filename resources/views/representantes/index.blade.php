<x-app-layout>
    @section('titulo', __('Listado de mis re representantes'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
    @endpush

    <x-slot name="header">
        <h2 class="h2 mb-2 mt-3 text-black text-uppercase">
            {{ __('Mis Representantes') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h3 text-slate-600">
                        {{ __('Listado de representantes de Embarcaciones') }}
                        @livewire('create-representantes')
                    </h2>
                </div>

                <div class="card-body">
                    @livewire('mis-representantes')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

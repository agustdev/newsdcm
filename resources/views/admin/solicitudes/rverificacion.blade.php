<x-admin-layout>
    @section('titulo', 'Resultado Verificación de solicitud')
    <x-slot name="header">
        <h2 class="h2">
            {{ __('Status verification code') }}
        </h2>
    </x-slot>
    <div class="row">
        @if(!empty($solicitud))
        <div class="col-lg-12">
            <div class="alert alert-success">Codigo de valdidación correcto</div>
        </div>
        <div class="col-lg-12">

        </div>
        @else
        <div class="col-lg-12">
            <div class="alert alert-danger">No existe este codigo de validación</div>
        </div>
        @endif

    </div>
</x-admin-layout>
<x-app-layout>
    @section('titulo', 'Acceso Rápido')
    @push('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-2">
            {{ __('Acceso Rápido') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-4">
            <div class="card cta-box bg-primary bg-custom text-white">
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="m-0 fw-normal cta-box-title">DESPACHO</h3>
                        <img class="my-3 text-center mx-auto" src="{{ asset('images/despacho-icon.png') }}" width="180" alt="Generic placeholder image">

                        <br>
                        <a href="{{ route('movimientos.despachos.index') }}" class="btn btn-sm btn-light btn-rounded">SOLICITAR <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card-->
        </div>
        <div class="col-xl-4">
            <div class="card cta-box bg-primary bg-custom text-white">
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="m-0 fw-normal cta-box-title">CONDUCE</h3>
                        <img class="my-3 text-center mx-auto" src="{{ asset('images/conduce-icon.png') }}" width="180" alt="Generic placeholder image">

                        <br>
                        <a href="/" class="btn btn-sm btn-light btn-rounded">SOLICITAR <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card-->
        </div>

    </div>
</x-app-layout>

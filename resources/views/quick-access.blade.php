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
    <div class="row mb-2">
        <div class="relative flex py-2 items-center">
            <div class="flex-grow border-t border-gray-400"></div>
            <span class="flex-shrink mx-4 text-gray-400">NACIONALES</span>
            <div class="flex-grow border-t border-gray-400"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-4">
            <div class="card cta-box bg-primary bg-custom text-white">
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="m-0 fw-normal cta-box-title">DESPACHO</h3>
                        <img class="my-3 text-center mx-auto" src="{{ asset('images/despacho-icon.png') }}"
                            width="180" alt="Generic placeholder image">

                        <br>
                        <a href="{{ route('movimientos.despachos.create') }}"
                            class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">SOLICITAR
                            <i class="mdi mdi-arrow-right"></i></a>
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
                        <img class="my-3 text-center mx-auto" src="{{ asset('images/conduce-icon.png') }}"
                            width="180" alt="Generic placeholder image">
                        <br>
                        <a href="{{ route('movimientos.conduces.create') }}"
                            class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">SOLICITAR
                            <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card-->
        </div>
    </div>
    <div class="row mb-2">
        <div class="relative flex py-2 items-center">
            <div class="flex-grow border-t border-gray-400"></div>
            <span class="flex-shrink mx-4 text-gray-400">INTERNACIONALES</span>
            <div class="flex-grow border-t border-gray-400"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-4">
            <div class="card cta-box bg-primary bg-custom text-white">
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="m-0 fw-normal cta-box-title">ENTRADAS</h3>
                        <img class="my-3 text-center mx-auto" src="{{ asset('images/e-internacional-icon.png') }}"
                            width="180" alt="Generic placeholder image">
                        <br>
                        <a href="{{ route('movimientos.entradas.create') }}"
                            class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">SOLICITAR
                            <i class="mdi mdi-arrow-right"></i></a>
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
                        <h3 class="m-0 fw-normal cta-box-title">SALIDAS</h3>
                        <img class="my-3 text-center mx-auto" src="{{ asset('images/s-internacional-icon.png') }}"
                            width="180" alt="Generic placeholder image">
                        <br>
                        <a href="{{ route('movimientos.entradas.create') }}"
                            class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">SOLICITAR
                            <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card-->
        </div>
    </div>
</x-app-layout>

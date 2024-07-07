<x-app-layout>
    @section('titulo', __('Acceso Rápido'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-2 mt-4 uppercase text-black">
            {{ __('Acceso Rápido') }}
        </h2>
    </x-slot>
    @if (auth()->user()->tipo == 'P')
        <div class="row mb-2">
            <div class="relative flex py-1 items-center">
                <div class="flex-grow border-t border-1 border-yellow-600"></div>
                <span class="flex-shrink mx-2 text-xl text-black font-bold">{{ __('NACIONAL') }}</span>
                <div class="flex-grow border-t border-1 border-yellow-600"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-4">
                <div class="card cta-box bg-primary bg-custom text-white">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="m-0 fw-normal cta-box-title">
                                {{ __('DESPACHO') }}</h3>
                            <img class="my-3 text-center mx-auto" src="{{ asset('images/barco2.2.png') }}"
                                width="180" alt="Generic placeholder image">

                            <br>
                            <a href="{{ route('movimientos.despachos.create') }}"
                                class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">{{ __('SOLICITAR') }}
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
                            <h3 class="m-0 fw-normal cta-box-title">
                                {{ __('CONDUCE') }}</h3>
                            <img class="my-3 text-center mx-auto" src="{{ asset('images/barco4.2.png') }}"
                                width="180" alt="Generic placeholder image">
                            <br>
                            <a href="{{ route('movimientos.conduces.create') }}"
                                class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">{{ __('SOLICITAR') }}
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
                <div class="flex-grow border-t border-1 border-yellow-600"></div>
                <span class="flex-shrink mx-2 text-xl text-black font-bold">{{ __('INTERNACIONAL') }}</span>
                <div class="flex-grow border-t border-1 border-yellow-600"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-4">
                <div class="card cta-box bg-primary bg-custom text-white">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="m-0 fw-normal cta-box-title">
                                {{ __('ENTRADAS') }}</h3>
                            <img class="my-3 text-center mx-auto" src="{{ asset('images/barco1.1.png') }}"
                                width="180" alt="Generic placeholder image">
                            <br>
                            <a href="{{ route('movimientos.entradas.create') }}"
                                class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">{{ __('SOLICITAR') }}
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
                            <h3 class="m-0 fw-normal cta-box-title">
                                {{ __('SALIDAS') }}</h3>
                            <img class="my-3 text-center mx-auto" src="{{ asset('images/barco3.2.png') }}"
                                width="180" alt="Generic placeholder image">
                            <br>
                            <a href="{{ route('movimientos.entradas.create') }}"
                                class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">{{ __('SOLICITAR') }}
                                <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card-->
            </div>
        </div>
    @else
        <div class="row mb-2">
            <div class="relative flex py-1 items-center">
                <div class="flex-grow border-t border-1 border-yellow-600"></div>
                <span class="flex-shrink mx-2 text-xl text-black font-bold uppercase">{{ __('Actividad') }}</span>
                <div class="flex-grow border-t border-1 border-yellow-600"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="card cta-box bg-primary bg-custom text-white">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="m-0 fw-normal cta-box-title">
                                {{ __('ENTRADAS') }}</h3>
                            <img class="my-3 text-center mx-auto" src="{{ asset('images/e-internacional-icon.png') }}"
                                width="180" alt="Generic placeholder image">
                            <br>
                            <a href="{{ route('solicitudes.navieras.entradas') }}"
                                class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">{{ __('SOLICITAR') }}
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
                            <h3 class="m-0 fw-normal cta-box-title">
                                {{ __('SALIDAS') }}</h3>
                            <img class="my-3 text-center mx-auto" style="transform: scaleX(-1);"
                                src="{{ asset('images/e-internacional-icon.png') }}" width="180"
                                alt="Generic placeholder image">
                            <br>
                            <a href="{{ route('solicitudes.navieras.salidas') }}"
                                class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">{{ __('SOLICITAR') }}
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
                            <h3 class="m-0 fw-normal cta-box-title">
                                {{ __('USUARIOS') }}</h3>
                            <img class="my-3 text-center mx-auto rounded-full"
                                src="{{ asset('images/users-3.png') }}" width="180"
                                alt="Generic placeholder image">
                            <br>
                            <a href="{{ route('usuarios.navieras.index') }}"
                                class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2">{{ __('USUARIOS') }}
                                <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card-->
            </div>
        </div>
    @endif

</x-app-layout>

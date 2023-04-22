<x-app-layout>
    @section('titulo', 'Solicitud de Despachos')
    @push('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-3 mt-2">
            {{ __('Solicitud Despacho') }}
        </h2>
    </x-slot>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">

        <form action="" class="form-inline">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12 mb-2">
                        <h3 class="h4">Numero de solicitud: {{ 1 }}</h3>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="alert alert-warning" role="alert">
                            <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatinMatricula" placeholder="name@example.com" name="matricula" />
                                <label for="floatinMatricula">MATRICULA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingNombreEmbarcacion" placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre" readonly />
                                <label for="floatingNombreEmbarcacion">NOMBRE DE LA EMBARCACIÓN</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingNumeroCasco" placeholder="name@example.com" name="numero_casco" readonly />
                                <label for="floatingNumeroCasco">NUMERO DE CASCO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingColor" placeholder="NOMBRE DE LA EMBARCACIÓN" readonly name="color" />
                                <label for="floatingColor">COLOR</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="alert alert-info mt-2" role="alert">
                            <strong>INFORMACIÓN DEL CAPITAN</strong>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatinMatricula" placeholder="name@example.com" name="matricula" />
                                <label for="floatinMatricula">DOCUMENTO DE IDENTIDAD DEL CAPITAN</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingNombreEmbarcacion" placeholder="NOMBRE DE LA EMBARCACIÓN" />
                                <label for="floatingNombreEmbarcacion">NOMBRE Y APELLIDO DEL CAPITAN</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatinMatricula" placeholder="name@example.com" name="matricula" />
                                <label for="floatinMatricula">NACIONALIDAD DEL CAPITAN</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingNombreEmbarcacion" placeholder="NOMBRE DE LA EMBARCACIÓN" />
                                <label for="floatingNombreEmbarcacion">TELEFONO DEL CAPITAN</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatinMatricula" placeholder="name@example.com" name="matricula" />
                                <label for="floatinMatricula">MOTIVO DEL VIAJE</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatinMatricula" placeholder="name@example.com" name="matricula" />
                                <label for="floatinMatricula">LUGAR DESTINO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="floatingNombreEmbarcacion" placeholder="NOMBRE DE LA EMBARCACIÓN" />
                                <label for="floatingNombreEmbarcacion">CANTIDAD TRIPULANTES</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="floatinMatricula" placeholder="CANTIDAD PASAJEROS" name="matricula" />
                                <label for="floatinMatricula">CANTIDAD PASAJEROS</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.despachos.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        <button type="button" href="#" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150"><i class="mdi mdi-send mr-2"></i> Enviar</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</x-app-layout>

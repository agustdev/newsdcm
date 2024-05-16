<x-app-layout>
    @section('titulo', 'Salidas Internacionales')
    @push('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-2 mt-4 text-black">
            {{ __('Salidas Internacionales') }}
        </h2>
    </x-slot>
    <div class="row g-2">
        <div class="alert alert-info">
            <i class="uil-info-circle"></i> {{ __('Este formulario solo es para embarcaciones que salen para otros paises') }}
        </div>
    </div>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">
        <form action="{{ route('movimientos.salidas.store') }}" method="POST" class="form-inline" autocomplete="off">
            @csrf
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white" role="alert">
                            <div class="inline-block float-start">
                                <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control matricula rounded-md" id="floatinMatricula"
                                    placeholder="MATRICULA" name="matricula" />
                                <label style="font-size: 10px;" for="floatinMatricula">{{ __('MATRÍCULA') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_emb rounded-md" id="floatingNombreEmbarcacion"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre" />
                                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">{{ __('NOMBRE DE LA EMBARCACIÓN') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control numero_casco rounded-md" id="floatingNumeroCasco"
                                    placeholder="NUMERO DE CASCO" name="numero_casco" />
                                <label style="font-size: 10px;" for="floatingNumeroCasco">{{ __('NUMERO DE CASCO')}}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control color rounded-md" id="floatingColor"
                                    placeholder="COLOR DE LA EMBARCACIÓN" name="color" />
                                <label style="font-size: 10px;" for="floatingColor">{{ __('COLOR') }}</label>
                            </div>
                        </div>
                    </div>
                    

                </div>

                
            </div>
            <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
            <input type="hidden" name="user" value="{{ auth()->user()->id }}">



<div class="card shadow-xl">
    <div class="card-header bg-blue-900">
        <div class="text-white" role="alert">
            <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
        </div>
    </div>
<div class="card-body">
    <div class="row g-2">
        
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control documento rounded-md" id="floatinDocumento"
                    placeholder="Documento" name="documento" />
                <label style="font-size: 10px;" for="floatinMatricula">{{ __('DOCUMENTO DE IDENTIDAD DEL CAPITÁN') }}</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control nombre_capitan rounded-md" id="floatingNombreCapitan"
                    placeholder="NOMBRE Y APELLIDO DEL CAPITAN" value="" name="nombre_capitan" />
                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">{{ __('NOMBRE Y APELLIDO DEL CAPITÁN') }}</label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="text" class="form-control nacionalidad rounded-md" id="floatinMatricula"
                    placeholder="name@example.com" name="nacionalidad" value="" />
                <label style="font-size: 10px;" for="floatinMatricula">{{ __('NACIONALIDAD DEL CAPITÁN') }}</label>
            </div>
        </div>
    </div>
    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control telefono rounded-md" id="floatingNombreEmbarcacion"
                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="telefono" />
                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">{{ __('TELÉFONO DEL CAPITÁN') }}</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="text" class="form-control motivo_viaje rounded-md" id="floatinMatricula"
                    placeholder="name@example.com" name="motivo_viaje" />
                <label style="font-size: 10px;" for="floatinMatricula">{{ __('MOTIVO DEL VIAJE') }}</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="date" class="form-control rounded-md" id="floatingFecha" placeholder="FECHA"
                    name="fecha_llegada" min="{{ date('Y-m-d') }}" />
                <label style="font-size: 10px;" for="floatingFecha">{{ __('FECHA SALIDA') }}</label>
            </div>
        </div>

    </div>
    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating">
                <input type="number" class="form-control rounded-md" id="floatingNombreEmbarcacion"
                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="cantidad_tripulantes" />
                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">{{ __('CANTIDAD TRIPULANTES') }}</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="number" class="form-control rounded-md" id="floatinMatricula"
                    placeholder="CANTIDAD PASAJEROS" name="cantidad_pasajeros"
                    name="cantidad_pasajeros" />
                <label style="font-size: 10px;" for="floatinMatricula">{{ __('CANTIDAD PASAJEROS') }}</label>
            </div>
        </div>

    </div>
    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control rounded-md" id="floatingPais" placeholder="PAIS"
                    name="pais_procedencia" />
                <label style="font-size: 10px;" for="floatingPais">{{ __('PAIS DESTINO') }}</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control rounded-md" id="floatingPuertoLlegada"
                    placeholder="PUERTO DE LLEGADA" name="puerto_llegada" />
                <label style="font-size: 10px;" for="floatingPuertoLlegada">{{ __('PUERTO DE SALIDA') }}</label>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <div class="float-end">
        <a href="{{ route('movimientos.despachos.index') }}"
            class="inline-flex items-center px-3 py-2 bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-700 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras')}}</a>
        <button type="submit"
            class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send"> {{ __('Enviar') }}<i
                class="mdi mdi-send mr-2"></i></button>
    </div>
</div>


</div>








        </form>
    </div>
</x-app-layout>
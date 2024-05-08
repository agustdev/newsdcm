<x-app-layout>
    @section('titulo', 'Salidas Internacionales')
    @push('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-2 mt-3 text-center">
            {{ __('Salidas Internacionales') }}
        </h2>
    </x-slot>
    <div class="row g-2">
        <div class="alert alert-info">
            <i class="uil-info-circle"></i> Este formulario solo es para embarcaciones que salen para otros paises
        </div>
    </div>
<div class="card">
    <div class="card-body">
        <div class="col-lg-12 mb-2">
                        <h3 class="h4 uppercase">Número de solicitud: {{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}
                        </h3>
                    </div>
    </div>
</div>

    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">
        <form action="{{ route('movimientos.salidas.store') }}" method="POST" class="form-inline" autocomplete="off">
            @csrf
            <div class="card">
                <div class="card-header bg-blue-900">
                    <div class="" role="alert">    
                   <div class="inline-block float-start text-white">
                                <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                            </div>
                         </div>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control matricula rounded-md" id="floatinMatricula"
                                    placeholder="MATRICULA" name="matricula" />
                                <label style="font-size: 10px;" for="floatinMatricula">MATRÍCULA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_emb rounded-md" id="floatingNombreEmbarcacion"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre" />
                                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">NOMBRE DE LA EMBARCACIÓN</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control numero_casco rounded-md" id="floatingNumeroCasco"
                                    placeholder="NUMERO DE CASCO" name="numero_casco" />
                                <label style="font-size: 10px;" for="floatingNumeroCasco">NUMERO DE CASCO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control color rounded-md" id="floatingColor"
                                    placeholder="COLOR DE LA EMBARCACIÓN" name="color" />
                                <label style="font-size: 10px;" for="floatingColor">COLOR</label>
                            </div>
                        </div>
                    </div>
 
                        {{--div del final de card  --}}
                </div>
                {{-- /div del final de card  --}}


                
            </div>

{{-- cardbody que debo sacar --}}
<div class="card">
    <div class="card-header bg-blue-900">
<div class="text-white" role="alert">
            <strong>INFORMACIÓN DEL CAPITÁN</strong>
        </div>
    </div>


    <div class="card-body">
        
    {{-- informacion del capitan --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
       
        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="text" class="form-control documento rounded-md" id="floatinDocumento"
                    placeholder="Documento" name="documento" />
                <label style="font-size: 10px;" for="floatinMatricula">DOCUMENTO DE IDENTIDAD DEL CAPITÁN</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="text" class="form-control nombre_capitan rounded-md" id="floatingNombreCapitan"
                    placeholder="NOMBRE Y APELLIDO DEL CAPITAN" value="" name="nombre_capitan" />
                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">NOMBRE Y APELLIDO DEL CAPITÁN</label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="text" class="form-control nacionalidad rounded-md" id="floatinMatricula"
                    placeholder="name@example.com" name="nacionalidad" value="" />
                <label style="font-size: 10px;" for="floatinMatricula">NACIONALIDAD DEL CAPITÁN</label>
            </div>
        </div>
    
    {{-- fin de informacion del capitan --}}

        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="text" class="form-control telefono rounded-md" id="floatingNombreEmbarcacion"
                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="telefono" />
                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">TELÉFONO DEL CAPITÁN</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="text" class="form-control motivo_viaje rounded-md" id="floatinMatricula"
                    placeholder="name@example.com" name="motivo_viaje" />
                <label style="font-size: 10px;" for="floatinMatricula">MOTIVO DEL VIAJE</label>
            </div>
        </div>
    

        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="date" class="form-control rounded-md" id="floatingFecha" placeholder="FECHA"
                    name="fecha_llegada" min="{{ date('Y-m-d') }}" />
                <label style="font-size: 10px;" for="floatingFecha">FECHA SALIDA</label>
            </div>
        </div>

    

        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="number" class="form-control rounded-md" id="floatingNombreEmbarcacion"
                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="cantidad_tripulantes" />
                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">CANTIDAD TRIPULANTES</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="number" class="form-control rounded-md" id="floatinMatricula"
                    placeholder="CANTIDAD PASAJEROS" name="cantidad_pasajeros"
                    name="cantidad_pasajeros" />
                <label style="font-size: 10px;" for="floatinMatricula">CANTIDAD PASAJEROS</label>
            </div>
        </div>

    
    
        <div class="col-md">
            <div class="form-floating mb-2">
                <input type="text" class="form-control rounded-md" id="floatingPais" placeholder="PAIS"
                    name="pais_procedencia" />
                <label style="font-size: 10px;" for="floatingPais">PAIS DESTINO</label>
            </div>
        </div>
        <div class="col-span-3">
            <div class="form-floating mb-2">
                <input type="text" class="form-control rounded-md" id="floatingPuertoLlegada"
                    placeholder="PUERTO DE LLEGADA" name="puerto_llegada" />
                <label style="font-size: 10px;" for="floatingPuertoLlegada">PUERTO DE SALIDA</label>
            </div>
        </div>
    
</div>
    </div>



    <div class="card-footer">
        <div class="float-end">
            <a href="{{ route('movimientos.despachos.index') }}"
            class="inline-flex items-center px-3 py-2 bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                <button type="submit"
                class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send"> Enviar<i
                    class="mdi mdi-send ml-2"></i></button>
        </div>
    </div>


</div>


            <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
            <input type="hidden" name="user" value="{{ auth()->user()->id }}">
        </form>
    </div>
</x-app-layout>
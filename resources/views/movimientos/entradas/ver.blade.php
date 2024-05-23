<x-app-layout>
    @section('titulo', __('Detalle de la entrada'))
    <div class="">
        <div class="col-xl-12">
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <h3 class="font-bold uppercase text-white">
                        {{ __('Tipo movimiento') }}:
                        @if ($entrada->tipo_movimiento == 'E')
                            {{ __('Entrada internacional') }}
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <div class="">
                        <span
                            class="header-title d-inline text-black"><strong>{{ __('Número solicitud') }}:</strong></span>
                        <span class="">{{ $entrada->id }}</span>
                    </div>
                    <div class="">
                        <span
                            class="header-title d-inline text-black"><strong>{{ __('Fecha Solicitud') }}:</strong></span>
                        <span class="">{{ $entrada->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="">
                        <span class="header-title d-inline text-black"><strong>{{ __('Estatus') }}:</strong></span>
                        @if ($entrada->estado == 'Aprobado')
                            <span
                                class="header-title col-md-1 d-inline bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ __($entrada->estado) }}</span>
                        @elseif ($entrada->estado == 'Rechazado' or $entrada->estado == 'Cancelado')
                            <span
                                class="header-title col-md-1 d-inline bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ __($entrada->estado) }}</span>
                        @elseif ($entrada->estado == 'Enviado')
                            <span
                                class="header-title col-md-1 d-inline bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ __($entrada->estado) }}</span>
                        @elseif ($entrada->estado == 'En proceso')
                            <span
                                class="header-title col-md-1 d-inline bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ __($entrada->estado) }}</span>
                        @endif
                    </div>
                </div>    
                </div>
                
            </div>
        </div>
    </div>
{{-- datos de la embarcacion --}}
    <div class="card shadow-xl">
        <div class="card-header bg-blue-900">
            <div class="text-white" role="alert">
                <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
            </div>
        </div>
        <div class="card-body">
            <h4 class="header-title">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Matrícula') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->matricula }}</span>
                </div>
                <div class="header-title d-inline text-black">
                    <p class="">
                        <strong>{{ __('Nombre de la Embarcación') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->nombre }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Material del casco') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->material_casco }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('No Chasis') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->numero_casco }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Cantidad de Tripulantes') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->capacidad_personas }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Cantidad de Pasajeros') }}:</strong>
                    </p>
                    <span
                        class="">{{ $entrada->embarcacion_internacional->capacidad_tripulantes }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Tipo embarcación') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->tipo_embarcacion }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Tipo uso') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->tipo_uso }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Eslora') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->eslora }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Manga') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->manga }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Puntal') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->puntal }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Tipo motor') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->tipo_motor }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Marca del motor') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->marca_modelo_motor }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Caballos de fuerza del motor') }}:</strong>
                    </p>
                    <span
                        class="">{{ $entrada->embarcacion_internacional->caballos_fuerza_motor }}</span>
                </div>
                <div class="">
                    <p class="header-title d-inline text-black">
                        <strong>{{ __('Cantidad motor') }}:</strong>
                    </p>
                    <span class="">{{ $entrada->embarcacion_internacional->no_motor }}</span>
                </div>
            </div>
            </h4>
        </div>
    </div>
    {{-- find de datos del card de la embarcacion --}}


    <div class="card shadow-xl">
        <div class="card-header bg-blue-900">
            <div class="text-white" role="alert">
                <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
            </div>
        </div>
        <div class="card-body">
{{-- datos del capitan --}}
                    @if (!empty($entrada->capitan_internacional))
                        <h4 class="header-title mt-3">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                            <div class="">
                                <p class="header-title d-inline text-black">
                                    <strong>{{ __('Nombre') }}:</strong>
                                </p>
                                <span
                                    class="">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->nombre : '' }}</span>
                            </div>
                            <div class="">
                                <p class="header-title d-inline text-black">
                                    <strong>{{ __('Tipo Documento') }}:</strong>
                                </p>
                                <span
                                    class="">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->tipo_documento : '' }}</span>
                            </div>
                            <div class="">
                                <p class="header-title d-inline text-black">
                                    <strong>{{ __('Documento') }}:</strong>
                                </p>
                                <span
                                    class="">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->documento : '' }}</span>
                            </div>
                            <div class="">
                                <p class="header-title d-inline text-black">
                                    <strong>{{ __('Teléfono') }}:</strong>
                                </p>
                                <span
                                    class="">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->telefono : '' }}</span>
                            </div>
                            <div class="">
                                <p class="header-title d-inline text-black">
                                    <strong>{{ __('Motivo del viaje') }}:</strong>
                                </p>
                                <span
                                    class="">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->motivo_viaje : '' }}</span>
                            </div>
                            <div class="">
                                <p class="header-title d-inline text-black">
                                    <strong>{{ __('Fecha Salida') }}:</strong>
                                </p>
                                <span class="">{{ $entrada->fecha->format('d-m-Y') }}</span>
                            </div>
                            <div class="">
                                <p class="header-title d-inline text-black">
                                    <strong>{{ __('Lugar salida') }}:</strong>
                                </p>
                                <span
                                    class="">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->lugar_salida : '' }}</span>
                            </div>
                            <div class="">
                                <p class="header-title d-inline text-black">
                                    <strong>{{ __('Lugar destino') }}:</strong>
                                </p>
                                <span
                                    class="">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->lugar_destino : '' }}</span>
                            </div>
                        </div>
                        </h4>
                    @else
                        <div class="text-red-500"><i class="mdi mdi-alert-circle"></i>
                            <strong>{{ __('SOLICITUD INCOMPLETA') }}</strong>
                        </div>
                    @endif
        </div>
    </div>


    {{-- tercer card de los tripulantes --}}

<div class="card shadow-xl">
    <div class="card-header bg-blue-900">
        <div class="text-white" role="alert">
            <strong>{{ __('INFORMACIÓN DE LOS TRIPULANTES') }}</strong>
        </div>
    </div>
    <div class="card-body">
        @if ($entrada->tripulantes->count() > 0)
        <h4 class="header-title mt-3">
            
            <table class="table table-responsive" style="width: 60%">
                <thead>
                    <tr class="bg-blue-900 text-white">
                        <th>NOMBRE</th>
                        <th>DOCUMENTO DE IDENTIDAD</th>
                        <th>NACIONALIDAD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entrada->tripulantes as $tripulante)
                        <tr>
                            <td>{{ $tripulante->nombre }}</td>
                            <td>{{ $tripulante->documento }}</td>
                            <td>{{ $tripulante->nacionalidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </h4>
    @else
        <div class="text-red-500"><i class="mdi mdi-alert-circle"></i>
            <strong>{{ __('NO TIENE TRIPULANTES REGISTRADOS') }}</strong>
        </div>
    @endif
    </div>
</div>

    {{-- fin del tercer card --}}



{{-- card para datos de los pasajeros --}}
    <div class="card shadow-xl">
        <div class="card-header bg-blue-900">
            <div class="text-white" role="alert">
                <strong>{{ __('INFORMACIÓN DE LOS PASAJEROS') }}</strong>
            </div>
        </div>
        <div class="card-body">
            @if ($entrada->pasajeros->count() > 0)
            <h4 class="header-title">
                
                <table class="table table-responsive" style="width: 60%">
                    <thead>
                        <tr class="bg-blue-900 text-white">
                            <th>NOMBRE</th>
                            <th>DOCUMENTO DE IDENTIDAD</th>
                            <th>NACIONALIDAD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entrada->pasajeros as $pasajero)
                            <tr>
                                <td>{{ $pasajero->nombre }}</td>
                                <td>{{ $pasajero->documento }}</td>
                                <td>{{ $pasajero->nacionalidad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </h4>
        @else
            <div class="text-red-500"><i class="mdi mdi-alert-circle"></i>
                <strong>{{ __('NO TIENE PASAJEROS REGISTRADOS') }}</strong>
            </div>
        @endif
        </div>
        <div class="card-footer">
            <div class="float-end">
                <a href="{{ route('movimientos.entradas.index') }}"
                    class="inline-flex items-center px-3 py-2 bg- bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
                @if ($entrada->estado != 'Cancelado')
                    <a href="{{ route('pdf.eticket', $entrada) }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">{{ __('GENERAR E-TICKET') }}</a>
                @endif
                @php
                    $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
                @endphp
                @if (!in_array($entrada->estado, $estados))
                    <a href="#"
                        class="inline-flex items-center justify-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 transition ease-in-out duration-150">Descargar
                        PDF</a>
                @endif
            </div>
        </div>
    </div>
    {{-- aqui termina el card para los datos del pasajero --}}
</x-app-layout>

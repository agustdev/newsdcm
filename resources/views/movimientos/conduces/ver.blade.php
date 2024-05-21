<x-app-layout>
    @section('titulo', __('Detalle del conduce'))
    <div class="">
        <div class="col-xl-12">
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="font-bold text-white uppercase">
                        {{ __('Tipo movimiento') }}:
                        @if ($conduce->tipo_movimiento == 'C')
                            {{ __('Conduce') }}
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <div class="">
                        <span
                            class="header-title col-md-2 d-inline text-black"><strong>{{ __('Número solicitud') }}:</strong></span>
                        <span class="header-title col-md-2 d-inline">{{ $conduce->id }}</span>
                    </div>
                    <div class="">
                        <span
                            class="header-title col-md-2 d-inline text-black"><strong>{{ __('Fecha Solicitud') }}:</strong></span>
                        <span class="header-title col-md-2 d-inline">{{ $conduce->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="">
                        <span class="header-title  col-md-2 d-inline text-black"><strong>{{ __('Estatus') }}:</strong></span>
                        @if ($conduce->estado == 'Aprobado')
                            <span
                                class="header-title col-md-1 d-inline bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ __($conduce->estado) }}</span>
                        @elseif ($conduce->estado == 'Rechazado' or $conduce->estado == 'Cancelado')
                            <span
                                class="header-title col-md-1 d-inline bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ __($conduce->estado) }}</span>
                        @elseif ($conduce->estado == 'Enviado')
                            <span
                                class="header-title col-md-1 d-inline bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ __($conduce->estado) }}</span>
                        @elseif ($conduce->estado == 'En proceso')
                            <span
                                class="header-title col-md-1 d-inline bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ __($conduce->estado) }}</span>
                        @endif
                    </div>
                </div>
{{-- aqui termina la primera columna de tipo de movimiento  --}}

                    
                    
               
            </div>
        </div>
    </div>
{{-- Este card es para la informacion de la embarcacion --}}
    <div class="card shadow-xl">
        <div class="card-header bg-blue-900">
            <div class="text-white" role="alert">
                <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
            </div>
        </div>
<div class="card-body">
{{-- datos de la embarcacion --}}
<h4 class="header-title">
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
    <div class="">
        <p class="header-title col-md-2 d-inline text-black">
            <strong>{{ __('Matrícula') }}:</strong>
        </p>
        <span class="col-md-2">{{ $conduce->matricula }}</span>
    </div>
    <div class="">
        <p class="header-title col-md-2 d-inline text-black">
            <strong>{{ __('Nombre de la Embarcación') }}:</strong>
        </p>
        <span class="col-md-2">{{ $conduce->nombre }}</span>
    </div>
    <div class="">
        <p class="header-title col-md-2 d-inline text-black">
            <strong>{{ __('No Chasis') }}:</strong>
        </p>
        <span class="col-md-2">{{ $conduce->numero_casco }}</span>
    </div>
    <div class="">
        <p class="header-title col-md-2 d-inline text-black">
            <strong>{{ __('Cantidad de Tripulantes') }}:</strong>
        </p>
        <span class="">{{ $conduce->embarcacion->capacidad_personas }}</span>
    </div>
    <div class="">
        <p class="header-title col-md-2 d-inline text-black">
            <strong>{{ __('Cantidad de Pasajeros') }}:</strong>
        </p>
        <span class="col-md-2">{{ $conduce->embarcacion->capacidad_tripulantes }}</span>
    </div>
    <div class="">
        <p class="header-title col-md-2 d-inline text-black">
            <strong>{{ __('Tipo embarcación') }}:</strong>
        </p>
        <span class="col-md-2">{{ $conduce->embarcacion->tipo_embarcacion }}</span>
    </div>
</h4>
</div>
{{-- fin de datos de la embarcacion --}}
</div>

    </div>
    {{-- aqui termina este card que es para la informacion de la embarcacion --}}

    {{-- nuevo card para la siguiente informacion --}}
<div class="card shadow-xl">
    <div class="card-header bg-blue-900">
        <div class="text-white" role="alert">
            <strong>{{ __('INFORMACIÓN DEL CONDUCTOR') }}</strong>
        </div>
    </div>
    <div class="card-body">
        @if (!empty($conduce->conductor))
        <h4 class="header-title">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <div class="">
                <p class="header-title col-md-2 d-inline text-black">
                    <strong>{{ __('Nombre') }}:</strong>
                </p>
                <span
                    class="col-md-2">{{ !empty($conduce->conductor) ? $conduce->conductor->nombre : '' }}</span>
            </div>
            <div class="">
                <p class="header-title col-md-2 d-inline text-black">
                    <strong>{{ __('Documento de identidad') }}:</strong>
                </p>
                <span
                    class="col-md-2">{{ !empty($conduce->conductor) ? $conduce->conductor->documento : '' }}</span>
            </div>
            <div class="">
                <p class="header-title col-md-2 d-inline text-black">
                    <strong>{{ __('Teléfonos') }}:</strong>
                </p>
                <span
                    class="col-md-2">{{ str_replace('|', ', ', $conduce->conductor->telefono) }}</span>
            </div>
            <div class="">
                <p class="header-title col-md-2 d-inline text-black">
                    <strong>{{ __('Fecha Salida') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->fecha->format('d-m-Y') }}</span>
            </div>
        </div>
        </h4>
    @else
        <div class="alert alert-danger">
            <strong>{{ __('SOLICITUD INCOMPLETA FALTA INFORMACIÓN DEL CONDUCTOR') }}</strong>
        </div>
    @endif
    @if (!empty($conduce->vehiculo))
        <h4 class="header-title mt-3">
            <div
                class="bg-gray-100 text-gray-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-gray-700 dark:text-gray-300">
                {{ __('DATOS DEL VEHÍCULO') }}
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('Marca') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->marca }}</span>
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('Color') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->color }}</span>
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('Año') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->year }}</span>
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('Placa') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->placa }}</span>
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('Provincia') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->provincia }}</span>
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('Municipio') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->municipio }}</span>
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('sector') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->sector }}</span>
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('calle') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->calle }}</span>
            </div>
            <div class="row mb-2 mt-2">
                <p class="col-md-2">
                    <strong>{{ __('Observación') }}:</strong>
                </p>
                <span class="col-md-2">{{ $conduce->vehiculo->observacion }}</span>
            </div>
        </h4>
    @else
        <div class="text-red-500 mt-3"><i class="mdi mdi-alert-circle"></i>
            <strong>{{ __('SOLICITUD INCOMPLETA FALTA INFORMACIÓN DEL VEHÍCULO') }}</strong>
        </div>
    @endif
</div>
<div class="card-footer">
    <div class="float-end">
        <a href="{{ route('movimientos.conduces.index') }}"
            class="inline-flex items-center px-3 py-2 bg- bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
        @php
            $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
        @endphp
        @if (!in_array($conduce->estado, $estados))
            <a href="#"
                class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">{{ __('Previsualizar') }}</a>
            <a href="#"
                class="inline-flex items-center justify-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Descargar PDF') }}</a>
        @endif
    </div>
</div>
    </div>
    
</div>

    {{-- Fin del nuevo card para la siguiente informacion --}}
</x-app-layout>

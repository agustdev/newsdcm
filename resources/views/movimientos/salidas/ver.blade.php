<x-app-layout>
    @section('titulo', 'Detalle de la entrada')
    <div class="">
        <div class="col-xl-12">
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <h3 class="font-bold uppercase text-white">
                        Tipo movimiento:
                        @if ($salida->tipo_movimiento == 'S')
                            Salida internacional
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-3">
                    <div>
                    <span class="header-title d-inline text-black"><strong>Número solicitud:</strong> </span>
                    <span>{{ $salida->id }}</span>
                </div>
                <div>
                    <span class="header-title d-inline text-black"><strong>Fecha Solicitud:</strong> </span>
                    <span>{{ $salida->created_at->format('d-m-Y') }}</span>
                </div>
                <div>
                    <span class="header-title d-inline text-black"><strong>Estatus:</strong></span>
                        @if ($salida->estado == 'Aprobado')
                            <span
                                class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ $salida->estado }}</span>
                        @elseif ($salida->estado == 'Rechazado' or $salida->estado == 'Cancelado')
                            <span
                                class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ $salida->estado }}</span>
                        @elseif ($salida->estado == 'Enviado')
                            <span
                                class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ $salida->estado }}</span>
                        @elseif ($salida->estado == 'En proceso')
                            <span
                                class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ $salida->estado }}</span>
                        @endif 
                </div>
            </div>
                    
                    
                </div>
                
            </div>
        </div>
    </div>

{{-- informacion de la embarcacion --}}
    <div class="card shadow-xl">
        <div class="card-header bg-blue-900">
            <div class="text-white" role="alert">
                <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
            </div>
        </div>
        <div class="card-body">
            {{-- datos de la embarcacion --}}
            <h4 class="header-title">
                <div class="grid grid-cols-1 md:grid-cols-3">
                <div>
                <span class="header-title d-inline text-black">
                    <strong>{{ __('Matrícula') }}:</strong></span>
                <span>{{ $salida->matricula }}</span>
            </div>
            <div>
                <span class="header-title d-inline text-black">
                    <strong>{{ __('Nombre de la Embarcación') }}:</strong> 
                </span>
                <span>{{ $salida->nombre }}</span>
            </div>
            <div>
                <span class="header-title d-inline text-black">
                    <strong>{{ __('No Chasis') }}:</strong></span>
                <span>{{ $salida->numero_casco }}</span>
            </div>
            <div>
                <span class="header-title d-inline text-black">
                    <strong>{{ __('Cantidad de Tripulantes') }}:</strong></span>
                <span>{{ $salida->embarcacion->capacidad_personas }}</span>
            </div>
            <div>
                <span class="header-title d-inline text-black">
                    <strong>{{ __('Cantidad de Pasajeros') }}:</strong> </span>
                <span>{{ $salida->embarcacion->capacidad_tripulantes }}</span>
            </div>
            <div>
                <span class="header-title d-inline text-black">
                    <strong>{{ __('Tipo tripulación') }}:</strong></span>
                <span>{{ $salida->embarcacion->tipo_embarcacion }}</span>
            </div>
        </div>
            </h4>
        </div>
    </div>
{{-- fin de la informacion de la embarcacion --}}


    {{-- nuevo card --}}
<div class="card shadow-xl">
    <div class="card-header bg-blue-900">
        <div class="text-white" role="alert">
            <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
        </div>
    </div>
    <div class="card-body">
{{-- datos del capitan --}}
@if (!empty($salida->capitan))
<h4 class="header-title">
<div class="grid grid-cols-1 md:grid-cols-3">
    <div>
    <span class="header-title d-inline text-black">
        <strong>{{ __('Nombre') }}:</strong> 
    </span>
    <span>{{ !empty($salida->capitan) ? $salida->capitan->nombre : '' }}</span>
</div>
<div>
    <span class="header-title d-inline text-black">
        <strong>{{ __('Documento') }}:</strong></span>
        <span>{{ !empty($salida->capitan) ? $salida->capitan->documento : '' }}</span>
</div>
<div>
    <span class="header-title d-inline text-black">
        <strong>{{ __('Teléfono') }}:</strong></span>
    <span>{{ !empty($salida->capitan) ? $salida->capitan->telefono : '' }}</span>
</div>
<div>
    <span class="header-title d-inline text-black">
        <strong>{{ __('Motivo del viaje') }}:</strong></span>
    <span>{{ !empty($salida->capitan) ? $salida->capitan->motivo_viaje : '' }}</span>
</div>
<div>
    <span class="header-title d-inline text-black">
        <strong>{{ __('Fecha Salida') }}:</strong></span>
    <span>{{ $salida->fecha->format('d-m-Y') }}</span>
</div>
<div>
    <span class="header-title d-inline text-black">
        <strong>{{ __('Lugar salida') }}:</strong></span>
    <span>{{ !empty($salida->capitan) ? $salida->capitan->lugar_salida : '' }}</span>
</div>
<div>
    <span class="header-title d-inline text-black">
        <strong>{{ __('Lugar destino') }}:</strong></span>
    <span>{{ !empty($salida->capitan) ? $salida->capitan->lugar_destino : '' }}</span>
</div>
</div>
</h4>
@else
<div class="text-red-500"><i class="mdi mdi-alert-circle"></i>
    <strong>{{ __('SOLICITUD INCOMPLETA') }}</strong>
</div>
@endif
    </div>
    <div class="card-footer">
        <div class="float-end">
            <a href="{{ route('movimientos.salidas.index') }}"
                class="inline-flex items-center px-3 py-2 bg- bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
            @if ($salida->estado != 'Cancelado')
                <a href="{{ route('pdf.eticket', $salida) }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">GENERAR
                    E-TICKET</a>
            @endif
            @php
                $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
            @endphp
            @if (!in_array($salida->estado, $estados))
                <a href="#"
                    class="inline-flex items-center justify-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 transition ease-in-out duration-150">Descargar
                    PDF</a>
            @endif
        </div>
    </div>
</div>

    {{-- fin del nuevo card --}}

    
</x-app-layout>

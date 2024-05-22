<x-app-layout>
    @section('titulo', 'Detalle del despacho')
    <div class="">
        <div class="col-xl-12">
            <div class="card shadow-xl mt-3">
                <div class="card-header bg-blue-900">
                    <h3 class="font-bold uppercase text-white">
                        {{ __('Tipo movimiento') }}:
                        @if ($despacho->tipo_movimiento == 'D')
                            {{ __('Despacho') }}
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <div class="">
                        <span class="header-title d-inline text-black"><strong>{{ __('Número solicitud') }}:</strong>
                        </span>
                        <span class="header-title d-inline">{{ $despacho->id }}</span>
                    </div>
                    <div class="">
                        <span
                            class="header-title col-md-2 d-inline text-black"><strong>{{ __('Fecha Solicitud') }}:</strong></span>
                        <span class="header-title col-md-2 d-inline">{{ $despacho->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="">
                        <span class="header-title d-inline text-black"><strong>{{ __('Estatus') }}:</strong></span>
                        @if ($despacho->estado == 'Aprobado')
                            <span
                                class="header-title d-inline bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ $despacho->estado }}</span>
                        @elseif ($despacho->estado == 'Rechazado' or $despacho->estado == 'Cancelado')
                            <span
                                class="header-title d-inline bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ $despacho->estado }}</span>
                        @elseif ($despacho->estado == 'Enviado')
                            <span
                                class="header-title d-inline bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ $despacho->estado }}</span>
                        @elseif ($despacho->estado == 'En proceso')
                            <span
                                class="header-title d-inline bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ $despacho->estado }}</span>
                        @endif
                    </div>
                </div>
                    
                    
                </div>
               
            </div>
        </div>
    </div>

{{-- este card es sobre la informacion de la embarcacion --}}
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
        <p class="header-title d-inline text-black">
            <strong>{{ __('Matrícula') }}:</strong>
        </p>
        <span class="">{{ $despacho->matricula }}</span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Nombre de la Embarcación') }}:</strong>
        </p>
        <span class="">{{ $despacho->nombre }}</span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('No Chasis') }}:</strong>
        </p>
        <span class="">
            {{ $despacho->numero_casco }}
        </span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Cantidad de Tripulantes') }}:</strong>
        </p>
        <span class="">
            {{ $despacho->embarcacion->capacidad_personas }}
        </span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Cantidad de Pasajeros') }}:</strong>
        </p>
        <span class="">{{ $despacho->embarcacion->capacidad_tripulantes }}</span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Tipo embarcación') }}:</strong>
        </p>
        <span class="">{{ $despacho->embarcacion->tipo_embarcacion }}</span>
    </div>
</div>
</h4>
        </div>
    </div>

    {{-- nuevo card sobre el capitan --}}
<div class="card shadow-xl">
    <div class="card-header bg-blue-900">
        <div class="text-white" role="alert">
            <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
        </div>
    </div>
    <div class="card-body">
{{-- datos del capitan --}}
@if (!empty($despacho->capitan))
<h4 class="header-title ">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Nombre') }}:</strong>
        </p>
        <span
            class="">{{ !empty($despacho->capitan) ? $despacho->capitan->nombre : '' }}</span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Documento de identidad') }}:</strong>
        </p>
        <span
            class="">{{ !empty($despacho->capitan) ? $despacho->capitan->documento : '' }}</span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Teléfono') }}:</strong>
        </p>
        <span
            class="">{{ !empty($despacho->capitan) ? $despacho->capitan->telefono : '' }}</span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Fecha Salida') }}:</strong>
        </p>
        <span class="">{{ $despacho->fecha->format('d-m-Y') }}</span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Lugar salida') }}:</strong>
        </p>
        <span
            class="">{{ !empty($despacho->capitan) ? $despacho->capitan->lugar_salida : '' }}</span>
    </div>
    <div class="">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Lugar destino') }}:</strong>
        </p>
        <span
            class="">{{ !empty($despacho->capitan) ? $despacho->capitan->lugar_destino : '' }}</span>
    </div>
    <div class="md:col-span-3">
        <p class="header-title d-inline text-black">
            <strong>{{ __('Motivo del viaje') }}:</strong>
        </p>
        <span
            class="">{{ !empty($despacho->capitan) ? $despacho->capitan->motivo_viaje : '' }}</span>
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
            <a href="{{ route('movimientos.despachos.index') }}"
                class="inline-flex items-center px-3 py-2 bg- bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
            @php
                $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
            @endphp
            @if (!in_array($despacho->estado, $estados))
                {{-- <a href="#"
                    class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">Previsualizar</a> --}}
                <form method="POST" action="{{ route('movimientos.pdf', $despacho) }}" class="d-inline">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 transition ease-in-out duration-150">Descargar
                        PDF</button>
                </form>
            @endif
        </div>
    </div>
</div>

    {{-- fin del nuevo card sobre el capitan --}}
</x-app-layout>

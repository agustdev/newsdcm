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
                    {{-- datos de la embarcacion --}}
                    <h4 class="header-title mt-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>{{ __('Matrícula') }}:</strong> {{ $salida->matricula }}
                        </p>
                        <p>
                            <strong>{{ __('Nombre de la Embarcación') }}:</strong> {{ $salida->nombre }}
                        </p>
                        <p class="mt-2">
                            <strong>{{ __('No Chasis') }}:</strong> {{ $salida->numero_casco }}
                        </p>
                        <p class="mt-2">
                            <strong>{{ __('Cantidad de Tripulantes') }}:</strong> {{ $salida->embarcacion->capacidad_personas }}
                        </p>
                        <p class="mt-2">
                            <strong>{{ __('Cantidad de Pasajeros') }}:</strong> {{ $salida->embarcacion->capacidad_tripulantes }}
                        </p>
                        <p class="mt-2">
                            <strong>{{ __('Tipo tripulación') }}:</strong> {{ $salida->embarcacion->tipo_embarcacion }}
                        </p>

                    </h4>
                    {{-- datos del capitan --}}
                    @if (!empty($salida->capitan))
                        <h4 class="header-title mt-3">
                            <div class="alert alert-info mt-2" role="alert">
                                <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
                            </div>
                            <p class="mb-2 mt-2">
                                <strong>{{ __('Nombre') }}:</strong> {{ !empty($salida->capitan) ? $salida->capitan->nombre : '' }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>{{ __('Documento') }}:</strong>
                                {{ !empty($salida->capitan) ? $salida->capitan->documento : '' }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>{{ __('Teléfono') }}:</strong>
                                {{ !empty($salida->capitan) ? $salida->capitan->telefono : '' }}
                            </p>
                            <p class="mb-2 mt-2 py-2">
                                <strong>{{ __('Motivo del viaje') }}:</strong>
                                {{ !empty($salida->capitan) ? $salida->capitan->motivo_viaje : '' }}
                            </p>
                            <p>
                                <strong>{{ __('Fecha Salida') }}:</strong>
                                {{ $salida->fecha->format('d-m-Y') }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>{{ __('Lugar salida') }}:</strong>
                                {{ !empty($salida->capitan) ? $salida->capitan->lugar_salida : '' }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>{{ __('Lugar destino') }}:</strong>
                                {{ !empty($salida->capitan) ? $salida->capitan->lugar_destino : '' }}
                            </p>
                        </h4>
                    @else
                        <div class="alert alert-danger">
                            <strong>{{ __('SOLICITUD INCOMPLETA') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.salidas.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        @if ($salida->estado != 'Cancelado')
                            <a href="{{ route('pdf.eticket', $salida) }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">GENERAR
                                E-TICKET</a>
                        @endif
                        @php
                            $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
                        @endphp
                        @if (!in_array($salida->estado, $estados))
                            <a href="#"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Descargar
                                PDF</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

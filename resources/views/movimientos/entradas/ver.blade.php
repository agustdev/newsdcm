<x-app-layout>
    @section('titulo', 'Detalle de la entrada')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-3">
                        Tipo movimiento:
                        @if ($entrada->tipo_movimiento == 'E')
                            Entrada internacional
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <h5 class="header-title"><strong>Número solicitud:</strong> {{ $entrada->id }}</h5>
                    <h5 class="header-title"><strong>Fecha Solicitud:</strong>
                        {{ $entrada->created_at->format('d-m-Y') }}</h5>
                    <h5 class="header-title border-bottom py-2"><strong>Estatus:</strong>
                        @if ($entrada->estado == 'Aprobado')
                            <span
                                class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ $entrada->estado }}</span>
                        @elseif ($entrada->estado == 'Rechazado' or $entrada->estado == 'Cancelado')
                            <span
                                class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ $entrada->estado }}</span>
                        @elseif ($entrada->estado == 'Enviado')
                            <span
                                class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ $entrada->estado }}</span>
                        @elseif ($entrada->estado == 'En proceso')
                            <span
                                class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ $entrada->estado }}</span>
                        @endif
                    </h5>
                    {{-- datos de la embarcacion --}}
                    <h4 class="header-title mt-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>Matrícula:</strong> {{ $entrada->matricula }}
                        </p>
                        <p>
                            <strong>Nombre de la Embarcación:</strong> {{ $entrada->nombre }}
                        </p>
                        <p class="mt-2">
                            <strong>No Chasis:</strong> {{ $entrada->numero_casco }}
                        </p>
                        <p class="mt-2">
                            <strong>Cantidad de Tripulantes:</strong>
                            {{ $entrada->embarcacion_internacional->capacidad_personas }}
                        </p>
                        <p class="mt-2">
                            <strong>Cantidad de Pasajeros:</strong>
                            {{ $entrada->embarcacion_internacional->capacidad_tripulantes }}
                        </p>
                        <p class="mt-2">
                            <strong>Tipo embarcación:</strong>
                            {{ $entrada->embarcacion_internacional->tipo_embarcacion }}
                        </p>

                    </h4>
                    {{-- datos del capitan --}}
                    @if (!empty($entrada->capitan_internacional))
                        <h4 class="header-title mt-3">
                            <div class="alert alert-info mt-2" role="alert">
                                <strong>INFORMACIÓN DEL CAPITÁN</strong>
                            </div>
                            <p class="mb-2 mt-2">
                                <strong>Nombre:</strong>
                                {{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->nombre : '' }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>Tipop Documento:</strong>
                                {{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->tipo_documento : '' }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>Documento:</strong>
                                {{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->documento : '' }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>Teléfono:</strong>
                                {{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->telefono : '' }}
                            </p>
                            <p class="mb-2 mt-2 py-2">
                                <strong>Motivo del viaje:</strong>
                                {{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->motivo_viaje : '' }}
                            </p>
                            <p>
                                <strong>Fecha Salida:</strong>
                                {{ $entrada->fecha->format('d-m-Y') }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>Lugar salida:</strong>
                                {{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->lugar_salida : '' }}
                            </p>
                            <p class="mb-2 mt-2">
                                <strong>Lugar destino:</strong>
                                {{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->lugar_destino : '' }}
                            </p>
                        </h4>
                    @else
                        <div class="alert alert-danger">
                            <strong>SOLICITUD INCOMPLETA</strong>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.entradas.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        @if ($entrada->estado != 'Cancelado')
                            <a href="{{ route('pdf.eticket', $entrada) }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">GENERAR
                                E-TICKET</a>
                        @endif
                        @php
                            $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
                        @endphp
                        @if (!in_array($entrada->estado, $estados))
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

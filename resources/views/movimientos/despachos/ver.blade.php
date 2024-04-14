<x-app-layout>
    @section('titulo', 'Detalle del despacho')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-3">
                        Tipo movimiento:
                        @if ($despacho->tipo_movimiento == 'D')
                            Despacho
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <span class="header-title col-md-2 d-inline"><strong>Número solicitud:</strong> </span>
                        <span class="header-title col-md-1 d-inline">{{ $despacho->id }}</span>
                    </div>
                    <div class="row">
                        <span class="header-title col-md-2 d-inline"><strong>Fecha Solicitud:</strong></span>
                        <span class="header-title col-md-2 d-inline">{{ $despacho->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="row">
                        <span class="header-title  col-md-2 d-inline"><strong>Estatus:</strong></span>
                        @if ($despacho->estado == 'Aprobado')
                            <span
                                class="header-title col-md-1 d-inline bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ $despacho->estado }}</span>
                        @elseif ($despacho->estado == 'Rechazado' or $despacho->estado == 'Cancelado')
                            <span
                                class="header-title col-md-1 d-inline bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ $despacho->estado }}</span>
                        @elseif ($despacho->estado == 'Enviado')
                            <span
                                class="header-title col-md-1 d-inline bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ $despacho->estado }}</span>
                        @elseif ($despacho->estado == 'En proceso')
                            <span
                                class="header-title col-md-1 d-inline bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ $despacho->estado }}</span>
                        @endif
                    </div>
                    {{-- datos de la embarcacion --}}
                    <h4 class="header-title mt-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                        </div>
                        <div class="row mb-2 mt-2 ">
                            <p class="col-md-2">
                                <strong>Matrícula:</strong>
                            </p>
                            <span class="col-md-2">{{ $despacho->matricula }}</span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>Nombre de la Embarcación:</strong>
                            </p>
                            <span class="col-md-2">{{ $despacho->nombre }}</span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>No Chasis:</strong>
                            </p>
                            <span class="col-md-2">
                                {{ $despacho->numero_casco }}
                            </span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>Cantidad de Tripulantes:</strong>
                            </p>
                            <span class="col-md-2">
                                {{ $despacho->embarcacion->capacidad_personas }}
                            </span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>Cantidad de Pasajeros:</strong>
                            </p>
                            <span class="col-md-2">{{ $despacho->embarcacion->capacidad_tripulantes }}</span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>Tipo tripulación:</strong>
                            </p>
                            <span class="col-md-2">{{ $despacho->embarcacion->tipo_embarcacion }}</span>
                        </div>
                    </h4>
                    {{-- datos del capitan --}}
                    @if (!empty($despacho->capitan))
                        <h4 class="header-title mt-3">
                            <div class="alert alert-info mt-2" role="alert">
                                <strong>INFORMACIÓN DEL CAPITÁN</strong>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Nombre:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($despacho->capitan) ? $despacho->capitan->nombre : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Documento de identidad:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($despacho->capitan) ? $despacho->capitan->documento : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Teléfono:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($despacho->capitan) ? $despacho->capitan->telefono : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2 py-2">
                                <p class="col-md-2">
                                    <strong>Motivo del viaje:</strong>
                                </p>
                                <span
                                    class="col-md-3">{{ !empty($despacho->capitan) ? $despacho->capitan->motivo_viaje : '' }}</span>
                            </div>
                            <div class="row">
                                <p class="col-md-2">
                                    <strong>Fecha Salida:</strong>
                                </p>
                                <span class="col-md-2">{{ $despacho->fecha->format('d-m-Y') }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Lugar salida:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($despacho->capitan) ? $despacho->capitan->lugar_salida : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Lugar destino:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($despacho->capitan) ? $despacho->capitan->lugar_destino : '' }}</span>
                            </div>

                        </h4>
                    @else
                        <div class="alert alert-danger">
                            <strong>SOLICITUD INCOMPLETA</strong>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.despachos.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        @php
                            $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
                        @endphp
                        @if (!in_array($despacho->estado, $estados))
                            {{-- <a href="#"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Previsualizar</a> --}}
                            <form method="POST" action="{{ route('movimientos.pdf', $despacho) }}" class="d-inline">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Descargar
                                    PDF</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

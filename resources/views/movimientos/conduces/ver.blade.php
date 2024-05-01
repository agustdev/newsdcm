<x-app-layout>
    @section('titulo', 'Detalle del conduce')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-3">
                        Tipo movimiento:
                        @if ($conduce->tipo_movimiento == 'C')
                            Conduce
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <span class="header-title col-md-2 d-inline"><strong>Número solicitud:</strong></span>
                        <span class="header-title col-md-2 d-inline">{{ $conduce->id }}</span>
                    </div>
                    <div class="row">
                        <span class="header-title col-md-2 d-inline"><strong>Fecha Solicitud:</strong></span>
                        <span class="header-title col-md-2 d-inline">{{ $conduce->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="row">
                        <span class="header-title  col-md-2 d-inline"><strong>Estatus:</strong></span>
                        @if ($conduce->estado == 'Aprobado')
                            <span
                                class="header-title col-md-1 d-inline bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ $conduce->estado }}</span>
                        @elseif ($conduce->estado == 'Rechazado' or $conduce->estado == 'Cancelado')
                            <span
                                class="header-title col-md-1 d-inline bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ $conduce->estado }}</span>
                        @elseif ($conduce->estado == 'Enviado')
                            <span
                                class="header-title col-md-1 d-inline bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ $conduce->estado }}</span>
                        @elseif ($conduce->estado == 'En proceso')
                            <span
                                class="header-title col-md-1 d-inline bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ $conduce->estado }}</span>
                        @endif
                    </div>
                    {{-- datos de la embarcacion --}}
                    <h4 class="header-title mt-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>Matrícula:</strong>
                            </p>
                            <span class="col-md-2">{{ $conduce->matricula }}</span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>Nombre de la Embarcación:</strong>
                            </p>
                            <span class="col-md-2">{{ $conduce->nombre }}</span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>No Chasis:</strong>
                            </p>
                            <span class="col-md-2">{{ $conduce->numero_casco }}</span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>Cantidad de Tripulantes:</strong>
                            </p>
                            <span class="col-md-2">{{ $conduce->embarcacion->capacidad_personas }}</span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>Cantidad de Pasajeros:</strong>
                            </p>
                            <span class="col-md-2">{{ $conduce->embarcacion->capacidad_tripulantes }}</span>
                        </div>
                        <div class="row mt-2">
                            <p class="col-md-2">
                                <strong>Tipo embarcación:</strong>
                            </p>
                            <span class="col-md-2">{{ $conduce->embarcacion->tipo_embarcacion }}</span>
                        </div>
                    </h4>
                    @if (!empty($conduce->conductor))
                        <h4 class="header-title mt-3">
                            <div class="alert alert-info mt-2" role="alert">
                                <strong>INFORMACIÓN DEL CONDUCTOR</strong>
                            </div>
                            <div class="row mb-2 nt-2">
                                <p class="col-md-2">
                                    <strong>Nombre:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($conduce->conductor) ? $conduce->conductor->nombre : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Documento de identidad:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($conduce->conductor) ? $conduce->conductor->documento : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Teléfonos:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ str_replace('|', ', ', $conduce->conductor->telefono) }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Fecha Salida:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->fecha->format('d-m-Y') }}</span>
                            </div>
                        </h4>
                    @else
                        <div class="alert alert-danger">
                            <strong>SOLICITUD INCOMPLETA FALTA INFORMACIÓN DEL CONDUCTOR</strong>
                        </div>
                    @endif
                    @if (!empty($conduce->vehiculo))
                        <h4 class="header-title mt-3">
                            <div
                                class="bg-gray-100 text-gray-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                DATOS DEL VEHÍCULO
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Marca:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->marca }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Color:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->color }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Año:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->year }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Placa:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->placa }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Provincia:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->provincia }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Municipio:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->municipio }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>sector:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->sector }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>calle:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->calle }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>Observación:</strong>
                                </p>
                                <span class="col-md-2">{{ $conduce->vehiculo->observacion }}</span>
                            </div>
                        </h4>
                    @else
                        <div class="alert alert-danger">
                            <strong>SOLICITUD INCOMPLETA FALTA INFORMACIÓN DEL VEHÍCULO</strong>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.conduces.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        @php
                            $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
                        @endphp
                        @if (!in_array($conduce->estado, $estados))
                            <a href="#"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Previsualizar</a>
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

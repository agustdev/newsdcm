<x-app-layout>
    @section('titulo', __('Detalle de la entrada'))
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-3">
                        {{ __('Tipo movimiento') }}:
                        @if ($entrada->tipo_movimiento == 'E')
                            {{ __('Entrada internacional') }}
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <span
                            class="header-title col-md-2 d-inline"><strong>{{ __('Número solicitud') }}:</strong></span>
                        <span class="header-title col-md-1 d-inline">{{ $entrada->id }}</span>
                    </div>
                    <div class="row">
                        <span
                            class="header-title col-md-2 d-inline"><strong>{{ __('Fecha Solicitud') }}:</strong></span>
                        <span class="header-title col-md-2 d-inline">{{ $entrada->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="row">
                        <span class="header-title col-md-2 d-inline"><strong>{{ __('Estatus') }}:</strong></span>
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
                    {{-- datos de la embarcacion --}}
                    <h4 class="header-title mt-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Matrícula') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->matricula }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Nombre de la Embarcación') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->nombre }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Material del casco') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->material_casco }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('No Chasis') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->numero_casco }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Cantidad de Tripulantes') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->capacidad_personas }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Cantidad de Pasajeros') }}:</strong>
                            </p>
                            <span
                                class="col-md-2">{{ $entrada->embarcacion_internacional->capacidad_tripulantes }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Tipo embarcación') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->tipo_embarcacion }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Tipo uso') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->tipo_uso }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Eslora') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->eslora }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Manga') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->manga }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Puntal') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->puntal }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Tipo motor') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->tipo_motor }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Marca del motor') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->marca_modelo_motor }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Caballos de fuerza del motor') }}:</strong>
                            </p>
                            <span
                                class="col-md-2">{{ $entrada->embarcacion_internacional->caballos_fuerza_motor }}</span>
                        </div>
                        <div class="row mb-2 mt-2">
                            <p class="col-md-2">
                                <strong>{{ __('Cantidad motor') }}:</strong>
                            </p>
                            <span class="col-md-2">{{ $entrada->embarcacion_internacional->no_motor }}</span>
                        </div>
                    </h4>
                    {{-- datos del capitan --}}
                    @if (!empty($entrada->capitan_internacional))
                        <h4 class="header-title mt-3">
                            <div class="alert alert-info mt-2" role="alert">
                                <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>{{ __('Nombre') }}:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->nombre : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>{{ __('Tipo Documento') }}:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->tipo_documento : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>{{ __('Documento') }}:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->documento : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>{{ __('Teléfono') }}:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->telefono : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>{{ __('Motivo del viaje') }}:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->motivo_viaje : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>{{ __('Fecha Salida') }}:</strong>
                                </p>
                                <span class="col-md-2">{{ $entrada->fecha->format('d-m-Y') }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>{{ __('Lugar salida') }}:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->lugar_salida : '' }}</span>
                            </div>
                            <div class="row mb-2 mt-2">
                                <p class="col-md-2">
                                    <strong>{{ __('Lugar destino') }}:</strong>
                                </p>
                                <span
                                    class="col-md-2">{{ !empty($entrada->capitan_internacional) ? $entrada->capitan_internacional->lugar_destino : '' }}</span>
                            </div>
                        </h4>
                    @else
                        <div class="alert alert-danger">
                            <strong>{{ __('SOLICITUD INCOMPLETA') }}</strong>
                        </div>
                    @endif
                    @if ($entrada->tripulantes->count() > 0)
                        <h4 class="header-title mt-3">
                            <div class="alert alert-dark mt-2" role="alert">
                                <strong>{{ __('INFORMACIÓN DE LOS TRIPULANTES') }}</strong>
                            </div>
                            <table class="table table-responsive" style="width: 60%">
                                <thead>
                                    <tr>
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
                        <div class="alert alert-warning">
                            <strong>{{ __('NO TIENE TRIPULANTES REGISTRADOS') }}</strong>
                        </div>
                    @endif
                    @if ($entrada->pasajeros->count() > 0)
                        <h4 class="header-title mt-3">
                            <div class="alert alert-dark mt-2" role="alert">
                                <strong>{{ __('INFORMACIÓN DE LOS PASAJEROS') }}</strong>
                            </div>
                            <table class="table table-responsive" style="width: 60%">
                                <thead>
                                    <tr>
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
                        <div class="alert alert-warning">
                            <strong>{{ __('NO TIENE PASAJEROS REGISTRADOS') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.entradas.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
                        @if ($entrada->estado != 'Cancelado')
                            <a href="{{ route('pdf.eticket', $entrada) }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('GENERAR E-TICKET') }}</a>
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

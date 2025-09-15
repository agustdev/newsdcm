<x-app-layout>
    @section('titulo', __('Detalle de la salida'))
    <div class="">
        <div class="col-xl-12">
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <h3 class="font-bold uppercase text-white">
                        {{ __('Tipo movimiento') }}:
                        @if ($salida->tipo_movimiento == 'S')
                            {{ __('Salida internacional') }}
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <div class="">
                            <span
                                class="header-title d-inline text-black"><strong>{{ __('Número solicitud') }}:</strong></span>
                            <span class="">{{ $salida->id }}</span>
                        </div>
                        <div class="">
                            <span
                                class="header-title d-inline text-black"><strong>{{ __('Fecha Solicitud') }}:</strong></span>
                            <span class="">{{ $salida->created_at }}</span>
                        </div>
                        <div class="">
                            <span class="header-title d-inline text-black"><strong>{{ __('Estatus') }}:</strong></span>
                            @if ($salida->estado == 'Aprobado')
                                <span
                                    class="header-title col-md-1 d-inline bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ __($salida->estado) }}</span>
                            @elseif ($salida->estado == 'Rechazado' or $salida->estado == 'Cancelado')
                                <span
                                    class="header-title col-md-1 d-inline bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ __($salida->estado) }}</span>
                            @elseif ($salida->estado == 'Enviado')
                                <span
                                    class="header-title col-md-1 d-inline bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ __($salida->estado) }}</span>
                            @elseif ($salida->estado == 'En proceso')
                                <span
                                    class="header-title col-md-1 d-inline bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ __($salida->estado) }}</span>
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
                        <span class="">{{ $salida->matricula }}</span>
                    </div>
                    <div class="header-title d-inline text-black">
                        <p class="">
                            <strong>{{ __('Nombre de la Embarcación') }}:</strong>
                        </p>
                        <span class="">{{ $salida->nombre }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Material del casco') }}:</strong>
                        </p>
                        <span
                            class="">{{ !empty($salida->embarcacion_internacional->material_casco) ? $salida->embarcacion_internacional->material_casco : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('No Chasis') }}:</strong>
                        </p>
                        <span class="">{{ $salida->numero_casco }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Cantidad de Tripulantes') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->capacidad_tripulantes) ? $salida->embarcacion_internacional->capacidad_tripulantes : !empty($salida->embarcacion_nacional->capacidad_tripulantes)) ? $salida->embarcacion_nacional->capacidad_tripulantes : 0 }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Cantidad de Pasajeros') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->capacidad_personas) ? $salida->embarcacion_internacional->capacidad_personas : !empty($salida->embarcacion_nacional->capacidad_personas)) ? $salida->embarcacion_nacional->capacidad_personas : 0 }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Tipo embarcación') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->tipo_embarcacion) ? $salida->embarcacion_internacional->tipo_embarcacion : !empty($salida->embarcacion_nacional->tipo_embarcacion)) ? $salida->embarcacion_nacional->tipo_embarcacion : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Tipo uso') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->tipo_uso) ? $salida->embarcacion_internacional->tipo_uso : !empty($salida->embarcacion_nacional->tipo_uso)) ? $salida->embarcacion_nacional->tipo_uso : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Eslora') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->eslora) ? $salida->embarcacion_internacional->eslora : !empty($salida->embarcacion_nacional->pies_eslora)) ? $salida->embarcacion_nacional->pies_eslora : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Manga') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->manga) ? $salida->embarcacion_internacional->manga : !empty($salida->embarcacion_nacional->pies_manga)) ? $salida->embarcacion_nacional->pies_manga : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Puntal') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->puntal) ? $salida->embarcacion_internacional->puntal : !empty($salida->embarcacion_nacional->pies_puntual)) ? $salida->embarcacion_nacional->pies_puntual : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Tipo motor') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->tipo_motor) ? $salida->embarcacion_internacional->tipo_motor : !empty($salida->embarcacion_nacional->tipo_motor)) ? $salida->embarcacion_nacional->tipo_motor : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Marca del motor') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->marca_modelo) ? $salida->embarcacion_internacional->marca_modelo : !empty($salida->embarcacion_nacional->marca_modelo)) ? $salida->embarcacion_nacional->marca_modelo : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Caballos de fuerza del motor') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->caballos_fuerza_motor) ? $salida->embarcacion_internacional->caballos_fuerza_motor : !empty($salida->embarcacion_nacional->caballos_fuerza_motor)) ? $salida->embarcacion_nacional->caballos_fuerza_motor : 'N/A' }}</span>
                    </div>
                    <div class="">
                        <p class="header-title d-inline text-black">
                            <strong>{{ __('Cantidad motor') }}:</strong>
                        </p>
                        <span
                            class="">{{ (!empty($salida->embarcacion_internacional->no_motor) ? $salida->embarcacion_internacional->no_motor : !empty($salida->embarcacion_nacional->no_motor)) ? $salida->embarcacion_nacional->no_motor : 'N/A' }}</span>
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
            @if (!empty($salida->capitan_internacional))
                <h4 class="header-title mt-3">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <div class="">
                            <p class="header-title d-inline text-black">
                                <strong>{{ __('Nombre') }}:</strong>
                            </p>
                            <span
                                class="">{{ !empty($salida->capitan_internacional) ? $salida->capitan_internacional->nombre : '' }}</span>
                        </div>
                        <div class="">
                            <p class="header-title d-inline text-black">
                                <strong>{{ __('Tipo Documento') }}:</strong>
                            </p>
                            <span
                                class="">{{ !empty($salida->capitan_internacional) ? $salida->capitan_internacional->tipo_documento : '' }}</span>
                        </div>
                        <div class="">
                            <p class="header-title d-inline text-black">
                                <strong>{{ __('Documento') }}:</strong>
                            </p>
                            <span
                                class="">{{ !empty($salida->capitan_internacional) ? $salida->capitan_internacional->documento : '' }}</span>
                        </div>
                        <div class="">
                            <p class="header-title d-inline text-black">
                                <strong>{{ __('Teléfono') }}:</strong>
                            </p>
                            <span
                                class="">{{ !empty($salida->capitan_internacional) ? $salida->capitan_internacional->telefono : '' }}</span>
                        </div>
                        <div class="">
                            <p class="header-title d-inline text-black">
                                <strong>{{ __('Motivo del viaje') }}:</strong>
                            </p>
                            <span
                                class="">{{ !empty($salida->capitan_internacional) ? $salida->capitan_internacional->motivo_viaje : '' }}</span>
                        </div>
                        <div class="">
                            <p class="header-title d-inline text-black">
                                <strong>{{ __('Fecha Salida') }}:</strong>
                            </p>
                            <span class="">{{ $salida->fecha->format('d-m-Y') }}</span>
                        </div>
                        <div class="">
                            <p class="header-title d-inline text-black">
                                <strong>{{ __('Lugar salida') }}:</strong>
                            </p>
                            <span
                                class="">{{ !empty($salida->capitan_internacional) ? $salida->capitan_internacional->lugar_salida : '' }}</span>
                        </div>
                        <div class="">
                            <p class="header-title d-inline text-black">
                                <strong>{{ __('Lugar destino') }}:</strong>
                            </p>
                            <span
                                class="">{{ !empty($salida->capitan_internacional) ? $salida->capitan_internacional->lugar_destino : '' }}</span>
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
                    class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
                @if ($salida->estado != 'Cancelado')
                    <a target="_blank" href="{{ route('pdf.eticket', $salida) }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('GENERAR E-CLEREANCE') }}</a>
                @endif
                @php
                    $estados = ['Rechazado', 'En proceso', 'Cancelado', 'Enviado'];
                @endphp
                @if (!in_array($salida->estado, $estados))
                    <a href="#"
                        class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Descargar PDF') }}</a>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- aqui termina el card para los datos del pasajero --}}
</x-app-layout>

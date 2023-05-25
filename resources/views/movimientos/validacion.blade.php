<x-guest-layout>
    @section('titulo', 'Detalle de la solicitud')
    <div class="row">
        <h2 class="h2">Validación de Solicitud</h2>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-3">
                        Detalle
                        tipo movimiento:
                        @if($solicitud->tipo_movimiento == 'D')
                        Despacho
                        @else
                        Conduce
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <h5 class="header-title"><strong>Número solicitud:</strong> {{ $solicitud->id }}</h5>
                    <h5 class="header-title"><strong>Fecha Solicitud:</strong> {{
                        $solicitud->created_at->format('d-m-Y')
                        }}</h5>
                    <h5 class="header-title border-bottom py-2"><strong>Estatus:</strong>
                        @if($solicitud->estado == "Aprobado")
                        <span
                            class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{
                            $solicitud->estado }}</span>
                        @elseif ($solicitud->estado == "Rechazado" or $solicitud->estado == "Cancelado")
                        <span
                            class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{
                            $solicitud->estado }}</span>
                        @elseif ($solicitud->estado == "Enviado")
                        <span
                            class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{
                            $solicitud->estado }}</span>
                        @elseif ($solicitud->estado == "En proceso")
                        <span
                            class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{
                            $solicitud->estado }}</span>
                        @endif
                    </h5>
                    {{-- datos de la embarcacion --}}
                    <h4 class="header-title mt-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>Matrícula:</strong> {{ $solicitud->matricula }}
                        </p>
                        <p>
                            <strong>Nombre de la Embarcación:</strong> {{ $solicitud->nombre }}
                        </p>
                        <p class="mt-2">
                            <strong>No Chasis:</strong> {{ $solicitud->numero_casco }}
                        </p>
                        <p class="mt-2">
                            <strong>Cantidad de Tripulantes:</strong> {{ $solicitud->embarcacion->capacidad_personas }}
                        </p>
                        <p class="mt-2">
                            <strong>Cantidad de Pasajeros:</strong> {{ $solicitud->embarcacion->capacidad_tripulantes }}
                        </p>
                        <p class="mt-2">
                            <strong>Tipo tripulación:</strong> {{ $solicitud->embarcacion->tipo_embarcacion }}
                        </p>

                    </h4>
                    {{-- verificar si es un despacho o un conduce --}}
                    @if($solicitud->tipo_movimiento == 'D')
                    {{-- datos del capitan --}}
                    @if(!empty($solicitud->capitan))
                    <h4 class="header-title mt-3">
                        <div class="alert alert-info mt-2" role="alert">
                            <strong>INFORMACIÓN DEL CAPITÁN</strong>
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>Nombre:</strong> {{ !empty($solicitud->capitan) ? $solicitud->capitan->nombre : ''
                            }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Documento:</strong> {{ !empty($solicitud->capitan) ? $solicitud->capitan->documento
                            :
                            '' }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Teléfono:</strong> {{ !empty($solicitud->capitan) ? $solicitud->capitan->telefono :
                            ''
                            }}
                        </p>
                        <p class="mb-2 mt-2 py-2">
                            <strong>Motivo del viaje:</strong> {{ !empty($solicitud->capitan) ?
                            $solicitud->capitan->motivo_viaje : '' }}
                        </p>
                        <p>
                            <strong>Fecha Salida:</strong>
                            {{ $solicitud->fecha->format('d-m-Y') }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Lugar salida:</strong> {{ !empty($solicitud->capitan) ?
                            $solicitud->capitan->lugar_salida : '' }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Lugar destino:</strong> {{ !empty($solicitud->capitan) ?
                            $solicitud->capitan->lugar_destino : '' }}
                        </p>
                    </h4>
                    @else
                    <div class="alert alert-danger">
                        <strong>SOLICITUD INCOMPLETA</strong>
                    </div>
                    @endif
                    @else
                    @if(!empty($solicitud->conductor))
                    <h4 class="header-title mt-3">
                        <div class="alert alert-info mt-2" role="alert">
                            <strong>INFORMACIÓN DEL CONDUCTOR</strong>
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>Nombre:</strong> {{ $solicitud->conductor->nombre }}
                        </p>
                        <p>
                            <strong>Documento:</strong> {{ $solicitud->conductor->documento }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Teléfonos:</strong> {{
                            str_replace("|",", ",$solicitud->conductor->telefono) }}
                        </p>
                        <p>
                            <strong>Fecha Salida:</strong>
                            {{ $solicitud->fecha->format('d-m-Y') }}
                        </p>
                    </h4>
                    @else
                    <div class="alert alert-danger">
                        <strong>SOLICITUD INCOMPLETA FALTA INFORMACIÓN DEL CONDUCTOR</strong>
                    </div>
                    @endif
                    @if(!empty($solicitud->vehiculo))
                    <h4 class="header-title mt-3">
                        <div
                            class="bg-gray-100 text-gray-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-gray-700 dark:text-gray-300">
                            DATOS DEL VEHÍCULO
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>MArca:</strong> {{ $solicitud->vehiculo->marca }}
                        </p>
                        <p>
                            <strong>Color:</strong> {{ $solicitud->vehiculo->color }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Año:</strong> {{ $solicitud->vehiculo->year }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Placa:</strong> {{ $solicitud->vehiculo->placa }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Provincia:</strong> {{ $solicitud->vehiculo->provincia }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Municipio:</strong> {{ $solicitud->vehiculo->municipio }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>sector:</strong> {{ $solicitud->vehiculo->sector }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>calle:</strong> {{ $solicitud->vehiculo->calle }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Observación:</strong> {{ $solicitud->vehiculo->observacion }}
                        </p>
                    </h4>
                    @else<div class="alert alert-danger">
                        <strong>SOLICITUD INCOMPLETA FALTA INFORMACIÓN DEL VEHÍCULO</strong>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
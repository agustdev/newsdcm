<x-app-layout>
    @section('titulo', 'Detalle del conduce')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-3">
                        Tipo movimiento:
                        @if($conduce->tipo_movimiento == 'C')
                        Conduce
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <h5 class="header-title"><strong>Número solicitud:</strong> {{ $conduce->id }}</h5>
                    <h5 class="header-title"><strong>Fecha Solicitud:</strong> {{ $conduce->created_at->format('d-m-Y')
                        }}</h5>
                    <h5 class="header-title border-bottom py-2"><strong>Estatus:</strong>
                        @if($conduce->estado == "Aprobado")
                        <span
                            class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{
                            $conduce->estado }}</span>
                        @elseif ($conduce->estado == "Rechazado" or $conduce->estado == "Cancelado")
                        <span
                            class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{
                            $conduce->estado }}</span>
                        @elseif ($conduce->estado == "Enviado")
                        <span
                            class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{
                            $conduce->estado }}</span>
                        @elseif ($conduce->estado == "En proceso")
                        <span
                            class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{
                            $conduce->estado }}</span>
                        @endif
                    </h5>
                    <h4 class="header-title">
                        <div class="alert alert-warning" role="alert">
                            <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>Matrícula:</strong> {{ $conduce->matricula }}
                        </p>
                        <p>
                            <strong>Nombre de la Embarcación:</strong> {{ $conduce->nombre }}
                        </p>
                        <p class="mt-2">
                            <strong>No Chasis:</strong> {{ $conduce->numero_casco }}
                        </p>
                        <p class="mt-2">
                            <strong>Cantidad de Tripulantes:</strong> {{ $conduce->embarcacion->capacidad_personas }}
                        </p>
                        <p class="mt-2">
                            <strong>Cantidad de Pasajeros:</strong> {{ $conduce->embarcacion->capacidad_tripulantes }}
                        </p>
                        <p class="mt-2">
                            <strong>Tipo tripulación:</strong> {{ $conduce->embarcacion->tipo_embarcacion }}
                        </p>
                    </h4>
                    @if(!empty($conduce->conductor))
                    <h4 class="header-title mt-3">
                        <div class="alert alert-info mt-2" role="alert">
                            <strong>INFORMACIÓN DEL CONDUCTOR</strong>
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>Nombre:</strong> {{ $conduce->conductor->nombre }}
                        </p>
                        <p>
                            <strong>Documento:</strong> {{ $conduce->conductor->documento }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Teléfonos:</strong> {{
                            str_replace("|",", ",$conduce->conductor->telefono) }}
                        </p>
                        <p>
                            <strong>Fecha Salida:</strong>
                            {{ $conduce->fecha->format('d-m-Y') }}
                        </p>
                    </h4>
                    @else
                    <div class="alert alert-danger">
                        <strong>SOLICITUD INCOMPLETA FALTA INFORMACIÓN DEL CONDUCTOR</strong>
                    </div>
                    @endif
                    @if(!empty($conduce->vehiculo))
                    <h4 class="header-title mt-3">
                        <div
                            class="bg-gray-100 text-gray-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-gray-700 dark:text-gray-300">
                            DATOS DEL VEHÍCULO
                        </div>
                        <p class="mb-2 mt-2">
                            <strong>MArca:</strong> {{ $conduce->vehiculo->marca }}
                        </p>
                        <p>
                            <strong>Color:</strong> {{ $conduce->vehiculo->color }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Año:</strong> {{ $conduce->vehiculo->year }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Placa:</strong> {{ $conduce->vehiculo->placa }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Provincia:</strong> {{ $conduce->vehiculo->provincia }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Municipio:</strong> {{ $conduce->vehiculo->municipio }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>sector:</strong> {{ $conduce->vehiculo->sector }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>calle:</strong> {{ $conduce->vehiculo->calle }}
                        </p>
                        <p class="mb-2 mt-2">
                            <strong>Observación:</strong> {{ $conduce->vehiculo->observacion }}
                        </p>
                    </h4>
                    @else<div class="alert alert-danger">
                        <strong>SOLICITUD INCOMPLETA FALTA INFORMACIÓN DEL VEHÍCULO</strong>
                    </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.conduces.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        @php
                        $estados = array("Rechazado", "En proceso", "Cancelado", "Enviado");
                        @endphp
                        @if(!in_array($conduce->estado, $estados))
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
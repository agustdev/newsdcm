<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Despacho</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('css/validacion.css') }}">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            clifford: '#da373d',
                            marine:
                        }
                    }
                }
            }
        </script>
        <style type="text/tailwindcss">
            @layer utilities {
                .content-auto {
                    content-visibility: auto;
                }
            }
        </style>
    </head>

    <body class="bg-blue-950">
        <header class="">
            <div class="flex justify-center mt-14 lg:mt-16 -mb-16 lg:-mb-26">
                <img class="" src="{{ asset('images/logo1.png') }}" alt="">
            </div>
        </header>
        <div class="flex justify-center items-center min-h-screen">
            <div class="p-8 bg-slate-300 rounded-lg">
                <div>
                    <h1 class="title text-center">Validación de solicitud</h1>
                    <h1 class="text-center text-2xl">Detalle tipo movimiento: <br>
                        @if ($solicitud->tipo_movimiento == 'D')
                            Despacho
                        @else
                            Conduce
                        @endif
                    </h1>
                    <!-- primera columna -->
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-3 border-b-2 border-slate-950 pb-3">
                        <div class="text-center font-bold text-xl">Número de solicitud: {{ $solicitud->id }} </div>
                        <div class="text-center font-bold text-xl">Fecha de solicitud:
                            {{ $solicitud->created_at->format('d-m-Y') }}</div>
                        <div class="flex justify-center font-bold text-xl">
                            <h1 class="mr-1">Estatus: </h1>
                            @if ($solicitud->estado == 'Aprobado')
                                <h1
                                    class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">
                                    {{ $solicitud->estado }}</h1>
                            @elseif ($solicitud->estado == 'Rechazado' or $solicitud->estado == 'Cancelado')
                                <h1
                                    class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">
                                    {{ $solicitud->estado }}</h1>
                            @elseif ($solicitud->estado == 'Enviado')
                                <h1
                                    class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">
                                    {{ $solicitud->estado }}</h1>
                            @elseif ($solicitud->estado == 'En proceso')
                                <h1
                                    class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">
                                    {{ $solicitud->estado }}</h1>
                            @endif
                        </div>
                    </div>
                    <!-- fin primera columna -->
                    <h1 class="text-center font-bold text-2xl mt-3">Información de la embarcación</h1>
                    <!-- segunda  columma -->
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-3 border-b-2 border-slate-950 pb-3">
                        <div class="flex justify-center bg-white rounded-full">
                            <h1>Matrícula:</h1>
                            <h1 class="ml-2">{{ $solicitud->matricula }}</h1>
                        </div>
                        <div class="flex justify-center bg-white rounded-full">
                            <h1>Nombre de la embarcación:</h1>
                            <h1 class="ml-2">{{ $solicitud->nombre }}</h1>
                        </div>
                        <div class="flex justify-center bg-white rounded-full">
                            <h1>No Chasis:</h1>
                            <h1 class="ml-2">{{ $solicitud->numero_casco }}</h1>
                        </div>
                        <div class="flex justify-center bg-white rounded-full">
                            <h1>Cantidad de tripulantes:</h1>
                            <h1 class="ml-2">{{ $solicitud->embarcacion->capacidad_tripulantes }}</h1>
                        </div>
                        <div class="flex justify-center bg-white rounded-full">
                            <h1>Cantidad de pasajeros:</h1>
                            <h1 class="ml-2">{{ $solicitud->embarcacion->capacidad_personas }}</h1>
                        </div>
                        <div class="flex justify-center bg-white rounded-full">
                            <h1>Tipo de tripulación:</h1>
                            <h1 class="ml-2">{{ $solicitud->embarcacion->tipo_embarcacion }}</h1>
                        </div>
                    </div>

                    <!-- <h1 class="text-center font-bold text-2xl mt-3">Información del Conductor</h1>
      <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-3 border-b-2 border-slate-950 pb-3">
      <div class="flex justify-center bg-white rounded-full"><h1>Nombre:</h1><h1 class="ml-2">Dean Winchester</h1></div>
      <div class="flex justify-center bg-white rounded-full"><h1>Documento de Identidad:</h1><h1 class="ml-2">000-00000-8</h1></div>
      <div class="flex justify-center bg-white rounded-full"><h1>Teléfono:</h1><h1 class="ml-2"></h1>809-555-5555</div>
      <div class="flex justify-center bg-white rounded-full"><h1>Fecha de salida:</h1><h1 class="ml-2">23/5/23</h1></div>
      </div> -->

                    {{-- verificar si es un despacho o un conduce --}}
                    @if ($solicitud->tipo_movimiento == 'D')
                        <!-- fin de la tercera columna -->
                        <h1 class="text-center font-bold text-2xl mt-3">Información del capitán</h1>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-3 border-b-2 border-slate-950 pb-3">
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Nombre:</h1>
                                <h1 class="ml-2">{{ !empty($solicitud->capitan) ? $solicitud->capitan->nombre : '' }}
                                </h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Documento de identidad:</h1>
                                <h1 class="ml-2"></h1>
                                {{ !empty($solicitud->capitan) ? $solicitud->capitan->documento : '' }}
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Télefono:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->capitan) ? $solicitud->capitan->telefono : '' }}
                                </h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Fecha de salida:</h1>
                                <h1 class="ml-2">{{ $solicitud->fecha->format('d-m-Y') }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Lugar de salida:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->capitan) ? $solicitud->capitan->lugar_salida : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Lugar de destino:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->capitan) ? $solicitud->capitan->lugar_destino : '' }}</h1>
                            </div>
                            <div class="flex md:col-span-2  bg-white rounded-md">
                                <h1>Motivo del viaje:</h1>
                                <p class="ml-2 text-wrap">
                                    {{ !empty($solicitud->capitan) ? $solicitud->capitan->motivo_viaje : '' }}</p>
                            </div>

                        </div>
                    @else
                        <!-- fin de la segunda columna -->
                        <h1 class="text-center font-bold text-2xl mt-3">Información del Conductor</h1>
                        <!-- principio de la tercera columna -->
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-3 border-b-2 border-slate-950 pb-3">
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Nombre:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->conductor) ? $solicitud->conductor->nombre : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Documento de Identidad:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->conductor) ? $solicitud->conductor->documento : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Teléfono:</h1>
                                <h1 class="ml-2"></h1>
                                {{ !empty($solicitud->conductor) ? str_replace('|', ', ', $solicitud->conductor->telefono) : '' }}
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Fecha de salida:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->conductor) ? $solicitud->fecha->format('d-m-Y') : '' }}</h1>
                            </div>
                        </div>

                        <h1 class="text-center font-bold text-2xl mt-3">Datos del Vehículo</h1>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-3 border-b-2 border-slate-950 pb-3">
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Marca:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->marca : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Año:</h1>
                                <h1 class="ml-2"></h1>
                                {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->year : '' }}
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Color:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->color : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Placa:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->placa : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Provincia:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->provincia : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Municipio:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->municipio : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Sector:</h1>
                                <h1 class="ml-2">
                                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->sector : '' }}</h1>
                            </div>
                            <div class="flex justify-center bg-white rounded-full">
                                <h1>Calle:</h1>
                                <p class="ml-2">{{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->calle : '' }}
                                </p>
                            </div>
                            <div class="flex md:col-span-2  bg-white rounded-md">
                                <h1>Observación:</h1>
                                <p class="ml-2 text-wrap">
                                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->observacion : '' }}</p>
                            </div>
                    @endif
                </div>
            </div>
        </div>


    </body>

</html>

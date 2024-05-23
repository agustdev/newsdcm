<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Validación de solicitud</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <div class="flex justify-center items-center mt-10">
            <div class="p-8 bg-slate-300 rounded-lg">
                <div>
                    <h1 class="title text-center">Validación de solicitud1</h1>
                    
                    <!-- primera columna -->
                    
                    <!-- fin primera columna -->
                    
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
                   
                        <!-- fin de la segunda columna -->
                        

                        
            </div>
        </div>

<div class="container mx-auto">
<div class="card mt-2 mb-2 shadow-xl">
    <div class="card-header">
        <span class=""><strong>Detalle tipo movimiento:</strong>
            @if ($solicitud->tipo_movimiento == 'D')
                Despacho
            @else
                Conduce
            @endif
        </span>


    </div>
    <div class="card-body">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
        <div class="md:text-center">
        <span class="header-title d-inline text-black"><strong>{{ __('Número de solicitud') }}:</strong></span>
        <span>{{ $solicitud->id }}</span>
        </div>
        <div class="md:text-center">
        <span class="header-title d-inline text-black"><strong>Fecha de solicitud:</strong></span>
            <span>{{ $solicitud->created_at->format('d-m-Y') }}</span>
        </div>

        <div class="md:text-center">
            <span class="header-title d-inline text-black"><strong>Estatus:</strong></span>
            @if ($solicitud->estado == 'Aprobado')
                <span
                    class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">
                    {{ $solicitud->estado }}</span>
            @elseif ($solicitud->estado == 'Rechazado' or $solicitud->estado == 'Cancelado')
                <span
                    class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">
                    {{ $solicitud->estado }}</span>
            @elseif ($solicitud->estado == 'Enviado')
                <span
                    class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">
                    {{ $solicitud->estado }}</span>
            @elseif ($solicitud->estado == 'En proceso')
                <span
                    class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">
                    {{ $solicitud->estado }}</span>
            @endif
        </div>
    </div>
    </div>
</div>

<div class="card mt-2 mb-2 shadow-xl">
    <div class="card-header">
        <span class="">{{ __('Información de la embarcación') }}</span>
    </div>
    <div class="card-body">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Matrícula:</strong></span>
                <span class="">{{ $solicitud->matricula }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Nombre de la embarcación:</strong></span>
                <span class="">{{ $solicitud->nombre }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>No Chasis:</strong></span>
                <span class="">{{ $solicitud->numero_casco }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Cantidad de tripulantes:</strong></span>
                <span class="">{{ $solicitud->embarcacion->capacidad_tripulantes }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Cantidad de pasajeros:</strong></span>
                <span class="">{{ $solicitud->embarcacion->capacidad_personas }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Tipo de tripulación:</strong></span>
                <span class="">{{ $solicitud->embarcacion->tipo_embarcacion }}</span>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <span class="">Información del capitán</span>
    </div>
    <div class="card-body">
        @if ($solicitud->tipo_movimiento == 'D')
        <!-- fin de la tercera columna -->
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
            <div class="md:text-center">
                <span class="header-title d-inline text-black">Nombre:</span>
                <span class="">{{ !empty($solicitud->capitan) ? $solicitud->capitan->nombre : '' }}
                </span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black">Documento de identidad:</span>
                <span class="">{{ !empty($solicitud->capitan) ? $solicitud->capitan->documento : '' }}</span>
                
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black">Télefono:</span>
                <span class="">
                    {{ !empty($solicitud->capitan) ? $solicitud->capitan->telefono : '' }}
                </span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black">{{ __('Fecha de salida') }}:</span>
                <span class="">{{ $solicitud->fecha->format('d-m-Y') }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black">Lugar de salida:</span>
                <span class="">
                    {{ !empty($solicitud->capitan) ? $solicitud->capitan->lugar_salida : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black">Lugar de destino:</span>
                <span class="">
                    {{ !empty($solicitud->capitan) ? $solicitud->capitan->lugar_destino : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black">Motivo del viaje:</span>
                <span class="">
                    {{ !empty($solicitud->capitan) ? $solicitud->capitan->motivo_viaje : '' }}</span>
            </div>

        </div>
    @else
    </div>
</div>


{{-- informacion del conductor --}}
<div class="card">
    <div class="card-header">
        <span class="">Información del Conductor</span>
    </div>
    <div class="card-body">
        
        <!-- principio de la tercera columna -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
            <div class="flex justify-center bg-white rounded-full">
                <span class="header-title d-inline text-black"><strong>Nombre:</strong></span>
                <span class="">
                    {{ !empty($solicitud->conductor) ? $solicitud->conductor->nombre : '' }}</span>
            </div>
            <div class="flex justify-center bg-white rounded-full">
                <span class="header-title d-inline text-black"><strong>Documento de Identidad:</strong></span>
                <span class="">
                    {{ !empty($solicitud->conductor) ? $solicitud->conductor->documento : '' }}</span>
            </div>
            <div class="flex justify-center bg-white rounded-full">
                <span class="header-title d-inline text-black"><strong>Teléfono:</strong></span>
                <span class="">{{ !empty($solicitud->conductor) ? str_replace('|', ', ', $solicitud->conductor->telefono) : '' }}</span>
                
            </div>
            <div class="flex justify-center bg-white rounded-full">
                <span class="header-title d-inline text-black"><strong>{{ __('Fecha de salida') }}:</strong></span>
                <span class="">
                    {{ !empty($solicitud->conductor) ? $solicitud->fecha->format('d-m-Y') : '' }}</span>
            </div>
        </div>
    </div>
</div>
{{-- fin de informacion del conductor --}}

{{-- card sobre la informacion del vehiculo --}}
<div class="card">
    <div class="card-header">
        <span class="">Datos del Vehículo</span>
    </div>

    <div class="card-body">
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Marca:</strong></span>
                <span class="">
                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->marca : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Año:</strong></span>
                <span class="ml-2">{{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->year : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Color:</strong></span>
                <span class="">
                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->color : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Placa:</strong></span>
                <span class="">
                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->placa : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Provincia:</strong></span>
                <span class="">
                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->provincia : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Municipio:</strong></span>
                <span class="">
                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->municipio : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Sector:</strong></span>
                <span class="">
                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->sector : '' }}</span>
            </div>
            <div class="md:text-center">
                <span class="header-title d-inline text-black"><strong>Calle:</strong></span>
                <span class="ml-2">{{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->calle : '' }}
                </span>
            </div>
            <div class="md:text-center md:col-span-3">
                <span class="header-title d-inline text-black"><strong>Observación:</strong></span>
                <span class="ml-2 text-wrap">
                    {{ !empty($solicitud->vehiculo) ? $solicitud->vehiculo->observacion : '' }}</span>
            </div>
    @endif
</div>
    </div>
</div>
{{-- fin del card sobre la informacion de vehiculo --}}


{{-- este es el div container todos mis cards deben ir antes de esto  --}}
</div>
{{-- este es el div container si pongo un card fuera de esto no estara dentro del container --}}
    </body>

</html>

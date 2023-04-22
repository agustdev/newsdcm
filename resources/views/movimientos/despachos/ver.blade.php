<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-3">
                        Tipo movimiento:
                        @if($despacho->tipo_movimiento == 'D')
                        Despacho
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    <h5 class="header-title"><strong>Número solicitud:</strong> {{ $despacho->id }}</h5>
                    <h5 class="header-title"><strong>Fecha validez:</strong> {{ $despacho->fecha }}</h5>
                    <h5 class="header-title border-bottom"><strong>Estatus:</strong> {{ $despacho->estado }}</h5>
                    <h4 class="header-title">
                        <strong class="mb-2 mt-3">Datos de la embarcación:</strong>
                        <p class="mb-2 mt-2">
                            <strong>Matricula:</strong> {{ $despacho->matricula }}
                        </p>
                        <p>
                            <strong>Nombre de la Embarcación:</strong> {{ $despacho->nombre }}
                        </p>
                        <p class="mt-2">
                            <strong>No Chasis:</strong> {{ $despacho->numero_casco }}
                        </p>
                        <p class="mt-2">
                            <strong>Cantidad de Tripulantes:</strong> {{ $despacho->embarcacion->capacidad_personas }}
                        </p>
                        <p class="mt-2">
                            <strong>Cantidad de Pasajeros:</strong> {{ $despacho->embarcacion->capacidad_tripulantes }}
                        </p>
                        <p class="mt-2">
                            <strong>Tipo tripulación:</strong> {{ $despacho->embarcacion->tipo_embarcacion }}
                        </p>

                    </h4>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.despachos.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        <a href="#" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Descargar PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

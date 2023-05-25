<x-admin-layout>
    @section('titulo', 'Dashboard')
    <x-slot name="header">
        <h2 class="h2">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        {{-- <div class="row mb-2">
            <div class="col-12">
                <div class="float-end">
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 ml-4"><i
                            class="mdi mdi-download mdi-24px"></i> Descargar informe
                        detallado</a>
                </div>
            </div>
        </div> --}}
        <div class="flex flex-col items-center justify-center py-4 sm:py-12">
            <div class="flex space-x-6" id="widget">
                <div
                    class="flex h-48 w-64 flex-col items-center justify-center rounded-lg bg-white border-4 border-gray-500 hover:border-gray-800 transition ease-in-out duration-50">
                    <div class="flex flex-col space-x-4 text-center">
                        <i class="dripicons-to-do text-muted mb-3" style="font-size: 24px;"></i>
                        <div class="text-center text-4xl font-bold">{{ $total_movimientos }}</div>
                        <div class="my-2 text-center text-gray-700 text-bold">
                            TOTAL DE SOLICITUDES
                        </div>
                    </div>
                </div>
                <div
                    class="flex h-48 w-64 flex-col items-center justify-center rounded-lg bg-white border-4 border-green-600 hover:border-green-800 transition ease-in-out duration-50">
                    <div class="flex flex-col space-x-4 text-center">
                        <i class="dripicons-checkmark mb-3" style="font-size: 24px; color:green;"></i>
                        <div class="text-center text-4xl font-bold">{{ $total_aprove_movimientos }}</div>
                        <div class="my-2 text-center text-gray-500">
                            TOTAL SOLICITUDES APROBADAS
                        </div>

                    </div>
                </div>
                <div
                    class="flex h-48 w-64 flex-col items-center justify-center rounded-lg bg-white border-4 border-blue-500 hover:border-blue-800 transition ease-in-out duration-50">
                    <div class="flex flex-col space-x-4 text-center">
                        <i class="dripicons-clock mb-3" style="font-size: 24px; color:blue;"></i>
                        <div class="text-center text-4xl font-bold">{{ $total_pendent_movimientos }}</div>
                        <div class="my-2 text-center text-gray-500">
                            TOTAL SOLICITUDES PENDIENTES
                        </div>

                    </div>
                </div>
                <div
                    class="flex h-48 w-64 flex-col items-center justify-center rounded-lg bg-white border-4 border-red-500 hover:border-red-800 transition ease-in-out duration-50">
                    <div class="flex flex-col space-x-4 text-center">
                        <i class="dripicons-cross mb-3" style="font-size: 24px; color:red;"></i>
                        <div class="text-center text-4xl font-bold">{{ $total_denied_movimientos }}</div>
                        <div class="my-2 text-center text-gray-500">
                            SOLICITUDES RECHAZADAS
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="flex  flex-col items-center justify-center py-4 sm:py-12">
            <div class="flex space-x-6" id="widget">
                <div
                    class="flex h-48 w-64 flex-col items-center justify-center rounded-lg bg-white border-4 border-gray-500 hover:border-gray-800 transition ease-in-out duration-50">
                    <div class="flex flex-col space-x-4 text-center">
                        <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                        <div class="text-center text-4xl font-bold">{{ $total_usuarios }}</div>
                        <div class="my-2 text-center text-gray-700 text-bold">
                            TOTAL DE USUARIOS PROPIETARIOS
                        </div>
                    </div>
                </div>
                <div
                    class="flex h-48 w-64 flex-col items-center justify-center rounded-lg bg-white border-4 border-green-600 hover:border-green-800 transition ease-in-out duration-50">
                    <div class="flex flex-col space-x-4 text-center">
                        <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                        <div class="text-center text-4xl font-bold">{{ $total_usuarios_admins }}</div>
                        <div class="my-2 text-center text-gray-500">
                            TOTAL DE USUARIOS ADMINISTRATIVOS
                        </div>

                    </div>
                </div>
                <div
                    class="flex h-48 w-64 flex-col items-center justify-center rounded-lg bg-white border-4 border-yellow-500 hover:border-yellow-800 transition ease-in-out duration-50">
                    <div class="flex flex-col space-x-4 text-center">
                        <i class="uil-ship" style="font-size: 24px; color:#9c690a;"></i>
                        <div class="text-center text-4xl font-bold">{{ $total_embarcaciones }}</div>
                        <div class="my-2 text-center text-gray-500">
                            TOTAL EMBARCACIONES MATRICULADAS
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-admin-layout>
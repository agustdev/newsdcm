<x-admin-layout>
    @section('titulo', 'Solicitudes')
    @push('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />

    @endpush

    <x-slot name="header">
        <h2 class="h2 mb-2 mt-2">
            {{ __('Despachos') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h3">
                        Listado de Solicitudes de Despacho
                        {{-- <a href="{{ route('movimientos.despachos.create') }}"
                            class="inline-flex items-center justify-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end"><i
                                class="mdi mdi-plus mdi-18px"></i>Nueva Solicitud</a> --}}
                    </h2>
                </div>

                <div class="card-body">
                    <table id="table-despacho" class="table dt-responsive table-striped nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Fecha Salida</th>
                                <th>Matrícula</th>
                                <th>Estado</th>
                                <th>Detalle</th>
                                <th>Fecha solicitud</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $sol)
                            <tr>
                                <td>{{ $sol->id }}</td>
                                <td>
                                    @if($sol->tipo_movimiento == 'D')
                                    <span
                                        class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">
                                        Despacho
                                    </span>
                                    @else
                                    <span
                                        class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">
                                        Conduce
                                    </span>
                                    @endif

                                </td>

                                <td>{{ $sol->fecha->format('d-m-Y') }}</td>
                                <td>{{ $sol->matricula }}</td>
                                <td>
                                    @if($sol->estado == "Aprobado")
                                    <span
                                        class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{
                                        $sol->estado }}</span>
                                    @elseif ($sol->estado == "Rechazado" or $sol->estado == "Cancelado")
                                    <span
                                        class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{
                                        $sol->estado }}</span>
                                    @elseif ($sol->estado == "Enviado")
                                    <span
                                        class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{
                                        $sol->estado }}</span>
                                    @elseif ($sol->estado == "En proceso")
                                    <span
                                        class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{
                                        $sol->estado }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.solicitudes.show', $sol) }}"
                                        class="inline-flex items-center justify-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        <i class="uil-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    {{ $sol->created_at->format('d-m-Y h:i:s') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
    @push('js')
    <!-- Datatables js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>

    <!-- Datatable Init js -->
    {{-- <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            var table = $('#table-despacho').DataTable({
                ordering: true
                , columnDefs: [{
                    orderable: false
                    , targets: 0
                }]
                , lengthMenu: [
                    [10, 25, 50, -1]
                    , [10, 25, 50, 'Todos']
                , ]
                , "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.0/i18n/es-ES.json"
                }
                , "responsive": true
            , });
        });

    </script>

    @if(Session::get('msj'))
    <script>
        Swal.fire(
            'Buen trabajo!'
            , 'Se ha enviado la solicitud con exito'
            , 'success'
        )

    </script>
    @endif

    @if(Session::has('cancel'))
    <script>
        Swal.fire(
            'Buen trabajo!'
            , 'Se ha cancelado la solicitud con exito'
            , 'success'
        )

    </script>
    @endif

    <script type="text/javascript">
        $('.cancel').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro de anular esta solicitud?'
                , text: "¡Esta acción no podra ser revertida!"
                , showCancelButton: true
                , confirmButtonColor: '#2563EB'
                , cancelButtonColor: '#DC2626'
                , confirmButtonText: '¡Si, anular!'
                , cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });

    </script>

    @endpush

</x-admin-layout>
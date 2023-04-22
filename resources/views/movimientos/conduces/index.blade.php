<x-app-layout>
    @section('titulo', 'Conduces')
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
                        Listado de Solicitudes de Conduce
                        <a href="{{ route('movimientos.conduces.create') }}" class="btn btn-primary float-end"><i class="mdi mdi-plus mdi-18px"></i>Nueva Solicitud</a>
                    </h2>
                </div>

                <div class="card-body">
                    <table id="table-despacho" class="table dt-responsive table-striped nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Matricula</th>
                                <th>Estado</th>
                                <th>Detalle</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($despachos as $desp)
                            <tr>
                                <td>{{ $desp->id }}</td>
                                <td>{{ $desp->fecha }}</td>
                                <td>{{ $desp->matricula }}</td>
                                <td>
                                    @if($desp->estado == 'Aprobado')
                                    <span class="badge bg-success">{{ $desp->estado }}</span>
                                    @elseif ($desp->estado = 'Rechazado')
                                    <span class="badge bg-danger">{{ $desp->estado }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('movimientos.despachos.show', $desp) }}" class="btn btn-primary">
                                        <i class="uil-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="tooltip-container">
                                        <a href="#" class="btn btn-warning" title="Editar"><i class="uil-edit"></i></a>
                                        <a href="#" class="btn btn-danger" title="Cancelar"><i class="mdi mdi-cancel"></i></a>
                                    </div>
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
                lengthMenu: [
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

    @endpush
</x-app-layout>

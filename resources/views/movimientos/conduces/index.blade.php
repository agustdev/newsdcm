<x-app-layout>
    @section('titulo', 'Conduces')
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
        <!-- Datatables css -->
        <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <x-slot name="header">
        <h2 class="h2 mb-2 mt-4 text-black">
            {{ __('Conduces') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h3">
                        {{ __('Listado de Solicitudes de Conduce') }}
                        <a href="{{ route('movimientos.conduces.create') }}"
                            class="inline-flex items-center justify-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 transition ease-in-out duration-150 float-end"><i
                                class="mdi mdi-plus mdi-18px"></i>{{ __('Nueva Solicitud') }}</a>
                    </h2>
                </div>

                <div class="card-body">
                    <table id="table-conduce" class="table dt-responsive table-striped nowrap w-100">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th>ID</th>
                                <th>{{ __('Fecha Salida') }}</th>
                                <th>{{ __('Matrícula') }}</th>
                                <th>{{ __('Estado') }}</th>
                                <th>{{ __('Detalle') }}</th>
                                <th>{{ __('Fecha solicitud') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conduces as $cond)
                                <tr>
                                    <td>{{ $cond->id }}</td>
                                    <td>{{ $cond->fecha->format('d-m-Y') }}</td>
                                    <td>{{ $cond->matricula }}</td>
                                    <td>
                                        @if ($cond->estado == 'Aprobado')
                                            <span
                                                class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ __($cond->estado) }}</span>
                                        @elseif ($cond->estado == 'Rechazado' or $cond->estado == 'Cancelado')
                                            <span
                                                class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ __($cond->estado) }}</span>
                                        @elseif ($cond->estado == 'Enviado')
                                            <span
                                                class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ __($cond->estado) }}</span>
                                        @elseif ($cond->estado == 'En proceso')
                                            <span
                                                class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ __($cond->estado) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('movimientos.conduces.show', $cond) }}"
                                            class="inline-flex items-center justify-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            <i class="uil-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $cond->created_at->format('d-m-Y h:i:s') }}
                                    </td>
                                    <td>
                                        <div class="tooltip-container">
                                            @php
                                                $estados = ['Aprobado', 'Rechazado', 'En proceso', 'Cancelado'];
                                            @endphp
                                            @if (!in_array($cond->estado, $estados))
                                                {{-- <a href="{{ route('movimientos.despachos.edit', $desp) }}"
                                            class="inline-flex items-center justify-center px-3 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 edit-desp disabled:opacity-25"
                                            title="Editar"><i class="uil-edit"></i></a> --}}
                                            @endif
                                            @if (!in_array($cond->estado, $estados))
                                                <form id="despacho-cancel"
                                                    action="{{ route('movimientos.conduces.destroy', $cond) }}"
                                                    method="POST" class="inline-block cancel">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex items-center justify-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                        title="Cancelar"><i class="mdi mdi-cancel"></i></button>
                                                </form>
                                            @endif
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
            let flag = '{{ app()->getLocale() }}'
            let lenguages = '{{ app()->getLocale() }}'.toUpperCase();
            let url = flag == 'ru' ? `https://cdn.datatables.net/plug-ins/1.12.0/i18n/${flag}.json` :
                `https://cdn.datatables.net/plug-ins/1.12.0/i18n/${flag}-${lenguages}.json`;

            $(document).ready(function() {
                var table = $('#table-conduce').DataTable({
                    ordering: true,
                    columnDefs: [{
                        orderable: false,
                        targets: 0
                    }],
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, 'Todos'],
                    ],
                    "language": {
                        "url": url
                    },
                    "responsive": true,
                });
            });
        </script>

        @if (Session::get('msj'))
            <script>
                Swal.fire(
                    'Buen trabajo!', 'Se ha enviado la solicitud con exito', 'success'
                )
            </script>
        @endif

        @if (Session::has('cancel'))
            <script>
                Swal.fire(
                    'Buen trabajo!', 'Se ha cancelado la solicitud con exito', 'success'
                )
            </script>
        @endif

        <script type="text/javascript">
            $('.cancel').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estas seguro de anular esta solicitud?',
                    text: "¡Esta acción no podra ser revertida!",
                    showCancelButton: true,
                    confirmButtonColor: '#2563EB',
                    cancelButtonColor: '#DC2626',
                    confirmButtonText: '¡Si, anular!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        </script>

    @endpush

</x-app-layout>

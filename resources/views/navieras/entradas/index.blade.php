<x-app-layout>
    @section('titulo', __('Listado de entradas'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
        <!-- Datatables css -->
        <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <style>
            textarea {
                border-right: 1px solid #6b7280 !important;
                border-top: 1px solid #6b7280 !important;
                border-bottom: 1px solid #6b7280 !important;
            }
        </style>
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-2 mt-4 text-black uppercase">
            {{ __('Listado de entradas') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-xl">
                <div class="card-header">
                    <h2 class="h3 text-slate-600">
                        {{ __('Listado de movimientos de entrada') }}
                        <a href="{{ route('solicitudes.navieras.entradas.create') }}"
                            class="inline-flex items-center justify-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 transition ease-in-out duration-150 float-end"><i
                                class="mdi mdi-plus mdi-18px"></i>{{ __('Nueva solicitud') }}</a>
                    </h2>
                </div>
                <div class="card-body">
                    @if ($entradasnavieras->count() > 0)
                        <table id="table-movimientoe" class="table dt-responsive table-striped nowrap w-100">
                            <thead>
                                <tr class="bg-blue-900 text-white">
                                    <th>{{ __('Nombre') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Documento') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entradasnavieras as $entradas)
                                    <tr>
                                        <td>{{ $entradas->name }}</td>
                                        <td>{{ $entradas->email }}</td>
                                        <td>{{ $entradas->documento }}</td>
                                        <td>
                                            <button
                                                class="inline-flex items-center justify-center px-3 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Editar') }}</button>
                                            <form action="{{ route('usuarios.navieras.destroy', $entradas) }}"
                                                class="inline-block cancel" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    class="inline-flex items-center justify-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            No tiene ningun movimiento registrado
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    @push('js')
        @if (Session::has('info'))
            <script script script>
                Swal.fire(
                    'Buen trabajo!', 'Se ha anulado el movimiento con exito', 'success'
                )
            </script>
        @endif
        <!-- Datatables js -->
        <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
        <script>
            let flag = '{{ app()->getLocale() }}'
            let lenguages = '{{ app()->getLocale() }}'.toUpperCase();
            let url = flag == 'ru' ? `https://cdn.datatables.net/plug-ins/1.12.0/i18n/${flag}.json` :
                `https://cdn.datatables.net/plug-ins/1.12.0/i18n/${flag}-${lenguages}.json`;

            $(document).ready(function() {
                var table = $('#table-movimientoe').DataTable({
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

            $('.cancel').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estas seguro de anular este movimiento?',
                    text: "¡Esta acción no podra ser revertida!",
                    showCancelButton: true,
                    confirmButtonColor: '#1089FF',
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

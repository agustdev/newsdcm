<x-app-layout>
    @section('titulo', 'Despachos')
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
        <!-- Datatables css -->
        <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <x-slot name="header">
        <h2 class="h2 mb-2 mt-4 text-black uppercase">
            {{ __('Despachos') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h3 text-slate-600">
                        {{ __('Listado de Solicitudes de Despacho') }}
                        <a href="{{ route('movimientos.despachos.create') }}"
                            class="inline-flex items-center justify-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end"><i
                                class="mdi mdi-plus mdi-18px"></i>{{ __('Nueva Solicitud') }}</a>
                    </h2>
                </div>

                <div class="card-body">
                    @livewire('despachos')
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
            let flag = '{{ !empty(app()->getLocale()) ? app()->getLocale() : 'es' }}'
            let lenguages = flag.toUpperCase();

            let url = flag == 'ru' ? `https://cdn.datatables.net/plug-ins/1.12.0/i18n/${flag}.json` :
                `https://cdn.datatables.net/plug-ins/1.12.0/i18n/${flag}-${lenguages}.json`;
            // document.addEventListener('DOMContentLoaded', function() {
            //     $(document).ready(function() {
            //         var table = $('#table-despacho').DataTable({
            //             order: [
            //                 [0, 'desc']
            //             ],
            //             ordering: true,
            //             columnDefs: [{
            //                 targets: 0,
            //                 type: 'num',
            //                 orderable: true,
            //             }],
            //             lengthMenu: [
            //                 [10, 25, 50, -1],
            //                 [10, 25, 50, 'Todos'],
            //             ],
            //             "language": {
            //                 "url": url
            //             },
            //             "responsive": true,
            //         });

            //         // Cada vez que se redibuja la tabla
            //         table.on('draw', function() {
            //             // Reasignar click a los botones que deben abrir el modal
            //             $('.edit-desp').off('click').on('click', function() {
            //                 let id = $(this).data('id');
            //                 Livewire.emit('abrirModal',
            //                 id); // Envía evento al componente Livewire
            //             });
            //         });

            //         // Llamar la primera vez
            //         $('.edit-desp').on('click', function() {
            //             let id = $(this).data('id');
            //             Livewire.emit('abrirModal', id);
            //         });
            //     });
            // });
        </script>

        @if (Session::get('msj'))
            <script>
                Swal.fire(
                    '¡SOLICITUD DE DESPACHO!',
                    'Su solicitud ha sido recibida, la autorización será enviada dentro de un plazo de 24 horas', 'success'
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

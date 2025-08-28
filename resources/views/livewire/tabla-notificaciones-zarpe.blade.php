<div>
    <table id="table-despacho" class="table dt-responsive table-striped nowrap w-100">
        <thead>
            <tr class="bg-blue-900 text-white">
                <th>ID</th>
                <th>{{ __('Fecha Salida') }}</th>
                <th>{{ __('Matrícula') }}</th>
                <th>{{ __('Estado') }}</th>
                <th>{{ __('Fecha Solicitud') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach (get_emb_request_zarpe()->get() as $zarpe)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $zarpe->fecha }}</td>
                    <td>{{ $zarpe->matricula }}</td>
                    <td>{{ $zarpe->estado_movimiento == 1 ? 'Listo para zarpar' : 'Listo para arribar' }}</td>
                    <td>{{ $zarpe->created_at }}</td>
                    <td>
                        <button wire:click="$emit('notificarSalida', {{ $zarpe->emb_id }})"
                            class="inline-flex items-center justify-center px-3 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <i class="uil uil-ship mdi-24px text-white"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('js')
    <script>
        Livewire.on('notificarSalida', embId => {
            Swal.fire({
                title: "Notificación de zarpe",
                text: "Esta acción realizara la salida de la embarcación!",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#1089FF",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('tabla-notificaciones-zarpe', 'notificar', embId);
                    Swal.fire({
                        title: "Notificación!",
                        text: "Se realizo el arribo correctamente.",
                        icon: "success",
                        confirmButtonColor: "#1089FF",
                        confirmButtonText: "Aceptar"
                    });
                }
            });
        });
    </script>
@endpush

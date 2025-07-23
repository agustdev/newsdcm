<div>
    <table id="table-despacho" class="table dt-responsive table-striped nowrap w-100">
        <thead>
            <tr class="bg-blue-900 text-white">
                <th>ID</th>
                <th>{{ __('Fecha Llegada') }}</th>
                <th>{{ __('Matrícula') }}</th>
                <th>{{ __('Estado') }}</th>
                <th>{{ __('Fecha Solicitud') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach (get_emb_request_all()->get() as $notifica)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $notifica->fecha_llegada->format('d-m-Y h:i A') }}</td>
                    <td>{{ $notifica->matricula }}</td>
                    <td>
                        {{ $notifica->estado_movimiento }}
                    </td>
                    <td>
                        {{ $notifica->created_at->format('d-m-Y h:i A') }}
                    </td>
                    <td>

                        <button wire:click="$emit('notificarLLegada', {{ $notifica->emb_id }})"
                            class="inline-flex items-center justify-center px-3 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
        Livewire.on('notificarLLegada', embId => {
            Swal.fire({
                title: "Notificación de arribo",
                text: "Esta acción realizara la llegada de la embarcacion!",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#1089FF",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('notificaciones', 'notificar', embId);
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

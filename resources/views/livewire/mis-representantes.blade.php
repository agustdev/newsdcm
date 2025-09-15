<div>
    <table class="table dt-responsive table-striped nowrap w-100">
        <thead class="bg-blue-900">
            <tr class="text-white">
                <th></th>
                <th>{{ __('Documento de Identidad') }}</th>
                <th>{{ __('Nombre') }}</th>
                <th>{{ __('Nacionalidad') }}</th>
                <th>{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($representantes as $rep)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rep->documento }}</td>
                    <td>{{ $rep->nombre }}</td>
                    <td>{{ $rep->nacionalidad }}</td>
                    <td>
                        {{-- @livewire('edit-representantes', ['representante' => $rep], key($rep->id)) --}}
                        <button wire:click="$emit('deleteRepresentante', {{ $rep->id }})" title="Quitar de mi lista"
                            class="inline-flex items-center justify-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"><i
                                class="mdi mdi-trash-can"></i> Eliminar</button>
                    </td>
                </tr>
            @empty
                <div class="alert alert-warning">No se han registrado representantes</div>
            @endforelse
        </tbody>
    </table>
</div>
@push('js')
    <script>
        Livewire.on('deleteRepresentante', capId => {
            Swal.fire({
                title: "Estas seguro?",
                text: "Esta acción no podra ser revertida!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1089FF",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('mis-representantes', 'delete', capId);
                    Swal.fire({
                        title: "Eliminado!",
                        text: "El registro fue elminiado con exito.",
                        icon: "success",
                        confirmButtonColor: "#1089FF",
                        confirmButtonText: "Aceptar"
                    });
                }
            });
        });
    </script>
@endpush

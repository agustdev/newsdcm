<div>
    <table class="table dt-responsive table-striped nowrap w-100">
        <thead class="bg-blue-900">
            <tr class="text-white">
                <th></th>
                <th>{{ __('Nombre') }}</th>
                <th>{{ __('Documento de Identidad') }}</th>
                <th>{{ __('Nacionalidad') }}</th>
                <th>{{ __('Contacto') }}</th>
                <th>{{ __('Fecha Registro') }}</th>
                <th>{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $capitanes = auth()->user()->capitanes_registrados_usuarios;
            @endphp

            @foreach ($capitanes as $capi)
                @foreach ($capi->capitanes_registrados as $cap)
                    <tr>
                        <td></td>
                        <td>{{ $cap->nombre }}</td>
                        <td>{{ $cap->documento }}</td>
                        <td>{{ $cap->nacionalidad }}</td>
                        <td>{{ $cap->telefono }}</td>
                        <td>{{ $cap->created_at->format('d-m-Y') }}</td>
                        <td>
                            @livewire('edit-capitanes', ['capitan' => $cap], key($cap->id))
                            <button wire:click="$emit('deleteCapitan', {{ $cap->id }})" title="Quitar de mi lista"
                                class="inline-flex items-center justify-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"><i
                                    class="mdi mdi-trash-can"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@push('js')
    <script>
        Livewire.on('deleteCapitan', capId => {
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
                    Livewire.emitTo('mis-capitanes', 'delete', capId);
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

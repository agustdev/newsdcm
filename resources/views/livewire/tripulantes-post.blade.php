<div class="row tripulantes">
    <div class="alert alert-secondary mt-2" role="alert">
        <strong>DATOS DE LOS TRIUPLANTES (MAX: <span class="cant-trip">0</span>)</strong>
    </div>
    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model.defer='nombre' type="text" class="form-control documento" id="floatinDocumento"
                placeholder="Documento" name="documento" />
            <label for="floatinMatricula">NOMBRE</label>
        </div>
    </div>
    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model.defer='nacionalidad' type="text" class="form-control nombre_capitan"
                id="floatingNombreCapitan" placeholder="NOMBRE Y APELLIDO DEL CAPITAN" value=""
                name="nacionalidad" />
            <label for="floatingNombreEmbarcacion">NACIONALIDAD</label>
        </div>
    </div>
    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model.defer='documento' type="text" class="form-control nacionalidad" id="floatinMatricula"
                placeholder="name@example.com" name="documento" value="" />
            <label for="floatinMatricula">DOCUMENTO DE IDENTIDAD</label>
        </div>
    </div>
    <div class="col-md">
        <button wire:click='save' type="button" title="Agregar tripulante"
            class="mt-1 inline-flex items-center px-3 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">
            <i class="mdi mdi-plus mdi-18px"></i>
        </button>
    </div>
    <div class="row">
        @if ($tripulantes->count() > 0)
            <table class="table">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Nacionalidad</th>
                        <th scope="col" class="px-6 py-3">Documento de identidad</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tripulantes as $tripulante)
                        <tr>
                            <td>{{ $tripulante->nombre }}</td>
                            <td>{{ $tripulante->nacionalidad }}</td>
                            <td>{{ $tripulante->documento }}</td>
                            <td>
                                {{-- <a href="#"
                                    class="inline-flex items-center px-3 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1"><i
                                        class="mdi mdi-pencil"></i></a> --}}
                                <button type="button" wire:click="$emit('deleteTripulante', {{ $tripulante->id }})"
                                    class="inline-flex items-center px-3 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1"><i
                                        class="mdi mdi-delete"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                No se ha registrado ningún tripulante
            </div>
        @endif
    </div>
    @push('js')
        <script>
            Livewire.on('deleteTripulante', tripulanteId => {
                Swal.fire({
                    title: "Estas seguro?",
                    text: "Esta acción no podra ser revertida!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('tripulantes-post', 'delete', tripulanteId);
                        Swal.fire({
                            title: "Eliminado!",
                            text: "El registro fue elminiado con exito.",
                            icon: "success"
                        });
                    }
                });
            });
        </script>
    @endpush
</div>

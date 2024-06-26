<div class="row pasajeros">
    {{-- <div class="alert alert-secondary mt-2" role="alert">
        <strong>{{ __('DATOS DE LOS PASAJEROS') }} (MAX: <span class="cant-pas">0</span>)</strong>
    </div> --}}
    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model='nombre' type="text" class="form-control documento rounded-md" id="floatinDocumento"
                placeholder="Documento" name="documento" @error('nombre') style="border-left: 2px solid red" @enderror />
            <label style="font-size: 10px;" for="floatinMatricula">{{ __('NOMBRE') }}</label>
            @error('nombre')
                <span class="text-red-600">{{ $message }}</span>
            @enderror

        </div>
    </div>

    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model='documento' type="text" class="form-control rounded-md" id="floatinMatricula"
                placeholder="name@example.com" name="documento" value=""
                @error('documento') style="border-left: 2px solid red" @enderror />
            <label style="font-size: 10px;" for="floatinMatricula">{{ __('DOCUMENTO DE IDENTIDAD') }}</label>
            @error('documento')
                <span class="text-red-600">{{ $message }}</span>
            @enderror

        </div>
    </div>
    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model='nacionalidad' type="text" class="form-control nombre_capitan rounded-md"
                id="floatingNombreCapitan" placeholder="NOMBRE Y APELLIDO DEL CAPITAN" name="nacionalidad"
                @error('nacionalidad') style="border-left: 2px solid red" @enderror />
            <label style="font-size: 10px;" for="floatingNombreEmbarcacion">{{ __('NACIONALIDAD') }}</label>
            @error('nacionalidad')
                <span class="text-red-600">{{ $message }}</span>
            @enderror

        </div>
    </div>
    <div class="col-md">
        <button wire:click='save' type="button" title="Agregar tripulante"
            class="mt-1 inline-flex items-center px-3 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">
            <i class="mdi mdi-plus mdi-18px"></i>
        </button>
    </div>
    <div class="row">
        @if ($pasajeros->count() > 0)
            <table class="table">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr class="bg-blue-900 text-white">
                        <th scope="col" class="px-6 py-3">{{ __('Nombre') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('Nacionalidad') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('Documento de identidad') }}</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasajeros as $pasajero)
                        <tr>
                            <td>{{ $pasajero->nombre }}</td>
                            <td>{{ $pasajero->nacionalidad }}</td>
                            <td>{{ $pasajero->documento }}</td>
                            <td>
                                <button type="button" wire:click="$emit('deletePasajero', {{ $pasajero->id }})"
                                    class="inline-flex items-center px-3 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1"><i
                                        class="mdi mdi-delete"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                {{ __('No se ha registrado ningún pasajero') }}
            </div>
        @endif
    </div>
    @push('js')
        <script>
            Livewire.on('deletePasajero', pasajeroId => {
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
                        Livewire.emitTo('pasajeros-post', 'delete', pasajeroId);
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
</div>

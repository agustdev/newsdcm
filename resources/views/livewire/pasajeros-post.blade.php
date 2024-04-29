<div class="row">
    <div class="alert alert-secondary mt-2" role="alert">
        <strong>DATOS DE LOS PASAJEROS (MAX: <span>0</span>)</strong>
    </div>
    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model='nombre' type="text" class="form-control documento" id="floatinDocumento"
                placeholder="Documento" name="documento" />
            <label for="floatinMatricula">NOMBRE</label>
        </div>
    </div>
    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model='nacionalidad' type="text" class="form-control nombre_capitan"
                id="floatingNombreCapitan" placeholder="NOMBRE Y APELLIDO DEL CAPITAN" name="nacionalidad" />
            <label for="floatingNombreEmbarcacion">NACIONALIDAD</label>
        </div>
    </div>
    <div class="col-md">
        <div class="form-floating mb-2">
            <input wire:model='documento' type="text" class="form-control" id="floatinMatricula"
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
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Nacionalidad</th>
                    <th scope="col" class="px-6 py-3">Documento de identidad</th>
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
                            <button class="btn btn-danger">X</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

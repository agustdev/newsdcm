<div>
    <table class="table dt-responsive table-striped nowrap w-100">
        <thead class="bg-blue-900">
            <tr class="text-white">
                <th></th>
                <th>Nombre</th>
                <th>Documento de Identidad</th>
                <th>Nacionalidad</th>
                <th>Contacto</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
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
                            <button title="Actualizar información"
                                class="inline-flex items-center justify-center px-3 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 edit-desp disabled:opacity-25">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button title="Quitar de mi lista"
                                class="inline-flex items-center justify-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"><i
                                    class="mdi mdi-trash-can"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

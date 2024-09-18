<x-app-layout>
    @section('titulo', __('Listado de mis capitanes'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
    @endpush

    <x-slot name="header">
        <h2 class="h2 mb-2 mt-3 text-black text-uppercase">
            {{ __('Mis capitanes') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h3 text-slate-600">
                        {{ __('Listado de Capitanes de Embarcaciones') }}
                        <a href="{{ route('capitanes.registrados.create') }}"
                            class="inline-flex items-center justify-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end"><i
                                class="mdi mdi-plus mdi-18px"></i>{{ __('Nuevo Capitan') }}</a>
                    </h2>
                </div>

                <div class="card-body">
                    <table class="table dt-responsive table-striped nowrap w-100">
                        <thead class="bg-blue-900">
                            <tr class="text-white">
                                <th></th>
                                <th>Nombre</th>
                                <th>Documento de Identidad</th>
                                <th>Contacto</th>
                                <th>Fecha Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($capitanes as $capi)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button
                                            class="inline-flex items-center justify-center px-3 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 edit-desp disabled:opacity-25">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button
                                            class="inline-flex items-center justify-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"><i
                                                class="mdi mdi-trash-can"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>

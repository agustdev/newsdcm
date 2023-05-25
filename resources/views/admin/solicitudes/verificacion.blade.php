<x-admin-layout>
    @section('titulo', 'Verificación de solicitud')
    <x-slot name="header">
        <h2 class="h2">
            {{ __('Validation code') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-5">
            <form action="{{ route('admin.cverificacion') }}" method="POST">
                @csrf
                <label for="vcode" class="h3"><strong>Codigo de verificación</strong></label>
                <input type="text" name="vcode" required placeholder="Codigo de verificación"
                    class="form-control rounded mt-1">
                <button type="submit"
                    class="inline-flex items-center justify-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 mt-2 float-end">Validar</button>
            </form>
        </div>
        <div class="col-lg-7">
            <h3 class="mb-2 h3"><strong>Documento de ejemplo: </strong></h3>
            <img src="{{ asset('images/ejemplo-doc-arrowred.png') }}" alt="documento ejemplo">
        </div>
    </div>
</x-admin-layout>
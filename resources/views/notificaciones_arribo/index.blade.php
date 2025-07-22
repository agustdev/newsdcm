<x-app-layout>
    @section('titulo', 'Notificaciones')
    <x-slot name="header">
        <h2 class="h2 mb-2 mt-3 text-black text-uppercase">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>
    <div class="alert alert-info">
        <h2 class="h4">
            <i class="mdi mdi-folder-information mdi-24px"></i>
            {!! __('Esta es la lista de tus embarcaciones en movimiento') !!} <br>
            {!! __('Puedes ver las notificaciones de cada solicitud') !!}
        </h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-xl">
                <div class="card-header">
                    <h2 class="h3 text-slate-600">Notificaciones de arribo</h2>
                </div>
                <div class="card-body">
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
                                        <form action="">
                                            @csrf
                                            <button
                                                class="inline-flex items-center justify-center px-3 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <i class="uil uil-ship mdi-24px text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

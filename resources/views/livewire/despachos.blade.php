<div>
    <table id="table-despacho" class="table dt-responsive table-striped nowrap w-100" wire:ignore>
        <thead class="bg-blue-900">
            <tr class="text-white">
                <th>ID</th>
                <th>{{ __('Fecha Salida') }}</th>
                <th>{{ __('Matrícula') }}</th>
                <th>{{ __('Estado') }}</th>
                <th>{{ __('Detalle') }}</th>
                <th>{{ __('Fecha solicitud') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($despachos as $desp)
                <tr>
                    <td>{{ $desp->id }}</td>
                    <td>{{ $desp->fecha->format('d-m-Y') }}</td>
                    <td>{{ $desp->matricula }}</td>
                    <td>
                        @if ($desp->estado == 'Aprobado')
                            <span
                                class="bg-green-100 text-green-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-700 dark:text-green-300">{{ __($desp->estado) }}</span>
                        @elseif ($desp->estado == 'Rechazado' or $desp->estado == 'Cancelado')
                            <span
                                class="bg-red-100 text-red-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-700 dark:text-red-300">{{ __($desp->estado) }}</span>
                        @elseif ($desp->estado == 'Enviado')
                            <span
                                class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-700 dark:text-yellow-300">{{ __($desp->estado) }}</span>
                        @elseif ($desp->estado == 'En proceso')
                            <span
                                class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ __($desp->estado) }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('movimientos.despachos.show', $desp) }}"
                            class="inline-flex items-center justify-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <i class="uil-eye"></i>
                        </a>
                    </td>
                    <td>
                        {{ $desp->created_at->format('d-m-Y h:i:s') }}
                    </td>
                    <td>
                        <div class="tooltip-container">
                            @php
                                $estados = ['Aprobado', 'Rechazado', 'En proceso', 'Cancelado'];
                            @endphp

                            @livewire('cambio-destino', ['despacho' => $desp], key($desp->id))

                            @if (!in_array($desp->estado, $estados))
                                <form id="despacho-cancel" action="{{ route('movimientos.despachos.destroy', $desp) }}"
                                    method="POST" class="inline-block cancel">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center justify-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                        title="Cancelar"
                                        style="display: {{ now()->diffInHours(\Carbon\Carbon::parse($desp->created_at)) < 1 ? 'block' : 'none' }}"><i
                                            class="mdi mdi-cancel"></i></button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

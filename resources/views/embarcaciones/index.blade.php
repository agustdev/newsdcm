<x-app-layout>
    @section('titulo', 'Listado de mis embarcaciones')
    @push('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('modals')
    <!-- Standard modal -->
    <div id="option-mov-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h3" id="standard-modalLabel">MOVIMIENTOS A SOLICITAR</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <a href="{{ route('movimientos.despachos.create') }}" class="btn btn-outline-custom btn-md btn-rounded">DESPACHO</a>
                    <a href="#" class="btn btn-outline-custom btn-xl btn-rounded">CONDUCE</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @endpush

    <x-slot name="header">
        <h2 class="h2 mb-2 mt-2">
            {{ __('Mis embarcaciones') }}
        </h2>
    </x-slot>
    <div class="alert alert-info">
        <h2 class="h3">
            <i class="mdi mdi-folder-information mdi-24px"></i> Esta es la lista de tus <strong>embarcaciones</strong>
        </h2>
    </div>
    <div class="row">

        {{-- {{ dd(auth()->user()->movimientos) }} --}}
        @php $embarcaciones = auth()->user()->embarcaciones @endphp
        @foreach ($embarcaciones as $emb)
        <div class="col-xxl-3 col-lg-6">
            {{-- listado de las embarcaciones disponibles por usuario --}}
            <div class="card widget-flat border border-custom border-5 rounded sombra">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-ship-wheel mdi-36px widget-icon bg-custom rounded-circle text-warning"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Revenue"><strong>Fecha de expiración:</strong>
                        <small class="badge bg-success me-1 h2">{{ $emb->fecha_validez->format('d-m-Y') }}</small>
                    </h5>
                    <div class="col-lg-12">
                        <p class="mb-2 text-muted ">
                            <span class="badge badge-outline-success me-1 font-weight-bold">

                                <i class="uil-ship uil-16-plus me-1" style="font-size: 24px;"></i> <span style="vertical-align: super; font-size: 14px;">{{ $emb->nombre }}
                                </span>
                            </span>
                        </p>
                        <p class="mb-2 text-muted ">
                            <span class="badge badge-outline-info me-1">
                                <i class="mdi mdi-card-account-details mdi-48px me-1"></i> <span style="vertical-align: super; font-size: 14px;">{{ $emb->matricula }}</span>
                            </span>
                        </p>
                        <p class="text-muted ">
                            <span class="badge badge-outline-danger me-1">
                                <i class="mdi mdi-card-text mdi-36px me-1"></i>
                                <span style="vertical-align: super; font-size: 14px;">CHASIS: {{ $emb->no_chasis }}</span>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <small>Ultima solicitud: </small>
                    <h3 class="mt-0 mb-1 "><strong>Solicitudes realizadas:</strong>
                        <small class="badge bg-warning me-1 h2">{{ 0 }}</small>
                    </h3>
                    <div class="d-grid mt-2 col-lg-12">
                        <a href="#" class="btn btn-outline-custom btn-md" data-bs-toggle="modal" data-bs-target="#option-mov-modal">SOLICITAR</a>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>

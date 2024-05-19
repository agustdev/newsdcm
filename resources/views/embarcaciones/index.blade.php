<x-app-layout>
    @section('titulo', __('Listado de mis embarcaciones'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
    @endpush

    <x-slot name="header">
        <h2 class="h2 mb-2 mt-3 text-black text-uppercase">
            {{ __('Mis embarcaciones') }}
        </h2>
    </x-slot>
    <div class="alert alert-info">
        <h2 class="h4">
            <i class="mdi mdi-folder-information mdi-24px"></i>
            {!! __('Esta es la lista de tus embarcaciones') !!}
        </h2>
    </div>
    <div class="row">

        {{-- {{ dd(auth()->user()->movimientos) }} --}}
        @php
            $embarcaciones = auth()->user()->embarcaciones->where('internacional', 0);
            $emb_internacionales = auth()->user()->embarcaciones_internacionales;
        @endphp
        @foreach ($embarcaciones as $emb)
            <div class="col-xxl-3 col-lg-6">
                {{-- listado de las embarcaciones disponibles por usuario --}}
                <div
                    class="card widget-flat border @if (strtotime($emb->fecha_validez->format('d-m-Y')) >= strtotime(\Carbon\Carbon::now()->format('d-m-Y'))) border-custom @else border-custom-red @endif border-5 rounded sombra">
                    <div class="card-body">
                        <span class="badge text-gray-800">{{ __('Nacional') }}</span>
                        <div class="float-end">
                            <i
                                class="mdi mdi-ship-wheel mdi-36px widget-icon bg-custom rounded-circle text-warning"></i>
                        </div>
                        <h5 class="fw-normal mt-0" title="Revenue">
                            <strong>{{ __('Fecha de expiración') }}:</strong>
                            @if (strtotime($emb->fecha_validez->format('d-m-Y')) >= strtotime(\Carbon\Carbon::now()->format('d-m-Y')))
                                <small
                                    class="badge bg-success me-1 h2 py-1">{{ $emb->fecha_validez->format('d-m-Y') }}</small>
                            @else
                                <small
                                    class="badge bg-danger me-1 h2 py-1">{{ $emb->fecha_validez->format('d-m-Y') }}</small>
                            @endif
                        </h5>
                        <div class="grid grid-cols-1 gap-3">

                            <div class="border-bottom text-dark border-secondary mt-2 text-center">
                                <p style="">{{ __('NOMBRE') }}: {{ $emb->nombre }} </p>
                            </div>
                            <div class="border-bottom text-dark border-secondary mt-2 text-center">
                                <p style="">{{ __('MATRÍCULA') }}: {{ $emb->matricula }} </p>
                            </div>
                            <div class="border-bottom text-dark border-secondary mt-2 text-center">
                                <p style="">{{ __('CHASIS') }}: {{ $emb->no_chasis }} </p>
                            </div>

                        </div>
                        <p class="text-muted mt-3">
                            <a data-bs-toggle="modal" data-bs-target="#option-pic-modal-{{ $emb->id }}"
                                href="#"
                                class="fotosemb bg-azulito text-white hover:bg-blue-700  focus:outline-none focus:ring-4 focus:ring-blue-400 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2">
                                <i class="mdi mdi-camera"></i>
                                {{ __('Fotos') }}
                            </a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <small>{{ __('Ultima solicitud') }}:
                            {{ !empty($emb->movimiento->last())
                                ? $emb->movimiento->last()->created_at->format('d-m-Y') .
                                    ' (' .
                                    $emb->movimiento->last()->created_at->diffForHumans([
                                        'parts' => 2,
                                        'join' => ' y ',
                                    ]) .
                                    ')'
                                : '' }}</small>

                        <h3 class="mt-0 mb-1 ">
                            <strong>{{ __('Solicitudes realizadas') }}:</strong>
                            <small class="badge bg-warning me-1 py-1">{{ 0 }}</small>
                        </h3>
                        <div class="d-grid mt-2 col-lg-12">
                            @if (strtotime($emb->fecha_validez->format('d-m-Y')) >= strtotime(\Carbon\Carbon::now()->format('d-m-Y')))
                                <button type="button"
                                    class="items-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 block"
                                    data-bs-toggle="modal"
                                    data-bs-target="#option-mov-modal-{{ $emb->id }}">{{ __('SOLICITAR') }}</button>
                            @else
                                <button type="button" disabled
                                    class="items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 disabled:opacity-25 block">{{ __('SOLICITAR') }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Standard modal -->
            <div id="option-mov-modal-{{ $emb->id }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header mx-auto">
                            <h4 class="modal-title h3 uppercase text-black" id="standard-modalLabel">
                                {{ __('MOVIMIENTOS A SOLICITAR') }}</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-hidden="true"></button>
                        </div>
                        <div class="modal-body text-center">
                            <a href="{{ route('despachos.createpost') }}"
                                class="items-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 url_despacho"
                                onclick="event.preventDefault(); document.getElementById('despacho-form-{{ $emb->id }}').submit();">{{ __('DESPACHO') }}

                            </a>
                            <form id="despacho-form-{{ $emb->id }}" action="{{ route('despachos.createpost') }}"
                                method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="emb" value="{{ $emb->matricula }}">
                            </form>

                            <a href="{{ route('conduces.createpost') }}"
                                class="items-center px-3 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 url_conduce"
                                onclick="event.preventDefault(); document.getElementById('conduce-form-{{ $emb->id }}').submit();">{{ __('CONDUCE') }}</a>

                            <form id="conduce-form-{{ $emb->id }}" action="{{ route('conduces.createpost') }}"
                                method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="emb" value="{{ $emb->matricula }}">
                            </form>

                            <a href="{{ route('salidas.createpost') }}"
                                class="items-center px-3 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 url_conduce"
                                onclick="event.preventDefault(); document.getElementById('salidas-form-{{ $emb->id }}').submit();">{{ __('SALIDAS') }}</a>

                            <form id="salidas-form-{{ $emb->id }}" action="{{ route('salidas.createpost') }}"
                                method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="emb" value="{{ $emb->matricula }}">
                            </form>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Standard modal fotos-->
            <div id="option-pic-modal-{{ $emb->id }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title h3" id="standard-modalLabel">
                                {{ __('FOTOS DE LA EMBARCACION') }}</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-hidden="true"></button>
                        </div>
                        <div class="modal-body text-center">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/emb.jpg') }}" alt="Foto {{ $emb->nombre }}">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/emb.jpg') }}" alt="Foto {{ $emb->nombre }}">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/emb.jpg') }}" alt="Foto {{ $emb->nombre }}">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        @endforeach
        @foreach ($emb_internacionales as $embi)
            <div class="col-xxl-3 col-lg-6">
                {{-- listado de las embarcaciones disponibles por usuario --}}
                <div
                    class="card widget-flat border @if (strtotime($embi->fecha_validez->format('d-m-Y')) >= strtotime(\Carbon\Carbon::now()->format('d-m-Y'))) border-custom @else border-custom-red @endif border-5 rounded sombra">
                    <div class="card-body">
                        <span class="badge bg-info">{{ __('Internacional') }}</span>
                        <div class="float-end">
                            <i
                                class="mdi mdi-ship-wheel mdi-36px widget-icon bg-custom rounded-circle text-warning"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Revenue">
                            <strong>{{ __('Fecha de expiración') }}:</strong>
                            @if (strtotime($embi->fecha_validez->format('d-m-Y')) >= strtotime(\Carbon\Carbon::now()->format('d-m-Y')))
                                <small
                                    class="badge bg-success me-1 h2 py-1">{{ $embi->fecha_validez->format('d-m-Y') }}</small>
                            @else
                                <small
                                    class="badge bg-danger me-1 h2 py-1">{{ $embi->fecha_validez->format('d-m-Y') }}</small>
                            @endif
                        </h5>
                        <div class="col-lg-12">
                            <p class="mb-2 text-muted ">
                                <span class="badge badge-outline-success me-1 font-weight-bold py-1 block">
                                    <i class="uil-ship uil-16-plus me-1" style="font-size: 24px;"></i> <span
                                        style="vertical-align: super; font-size: 16px;">{{ $embi->nombre }}
                                    </span>
                                </span>
                            </p>
                            <p class="mb-2 text-muted ">
                                <span class="badge badge-outline-info me-1 py-1 block">
                                    {{-- <i class="mdi mdi-card-account-details mdi-48px me-1"></i> --}}
                                    <span style="vertical-align: super; font-size: 14px;">{{ __('MATRICULA') }}:
                                        {{ $embi->matricula }}</span>
                                </span>
                            </p>
                            <p class="text-muted ">
                                <span class="badge badge-outline-danger me-1 py-1 block">
                                    {{-- <i class="mdi mdi-card-text mdi-36px me-1"></i> --}}
                                    <span style="vertical-align: super; font-size: 14px;">{{ __('CHASIS') }}:
                                        {{ $embi->no_chasis }}</span>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>{{ __('Ultima solicitud') }}:
                            {{ !empty($embi->movimiento->last()) ? $embi->movimiento->last()->created_at->diffForHumans() : '' }}</small>

                        <h3 class="mt-0 mb-1 ">
                            <strong>{{ __('Solicitudes realizadas') }}:</strong>
                            <small class="badge bg-warning me-1 py-1">{{ 0 }}</small>
                        </h3>
                        <div class="d-grid mt-2 col-lg-12">
                            @if (strtotime($embi->fecha_validez->format('d-m-Y')) >= strtotime(\Carbon\Carbon::now()->format('d-m-Y')))
                                <button type="button"
                                    class="items-center px-3 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 block"
                                    data-bs-toggle="modal"
                                    data-bs-target="#option-mov-modal-{{ $embi->id }}">{{ __('SOLICITAR') }}</button>
                            @else
                                <button type="button" disabled
                                    class="items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1 disabled:opacity-25 block">{{ __('SOLICITAR') }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>

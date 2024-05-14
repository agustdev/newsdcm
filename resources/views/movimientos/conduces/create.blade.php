<x-app-layout>
    @section('titulo', __('Solicitud de Conduces'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-3 mt-2 text-center">
            {{ __('Solicitud de Conduce') }}
        </h2>
    </x-slot>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">

        <form action="{{ route('movimientos.conduces.store') }}" method="POST" class="form-inline" autocomplete="off">
            @csrf
            {{-- primera tarjeta --}}
            <div class="card shadow-xl">
                <div class="card-body">
                    <div class="col-lg-12 mb-2">
                        <h3 class="h4 uppercase">{{ __('Número de solicitud') }}:
                            {{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}
                        </h3>
                    </div>
                </div>
            </div>
            {{-- primera tarjeta tarjeta --}}

            {{-- informacion de la embarcacion --}}
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white">
                        <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
                        <div role="status" class="spin-matricula float-end hidden">
                            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin fill-white"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                {{-- <input type="text" class="form-control matricula" id="floatinMatricula"
                                    placeholder="MATRICULA" name="matricula" value="" required /> --}}
                                <select name="matricula" class="form-select emb_matricula rounded-md"
                                    id="floatinMatricula">
                                    @if ($embarcaciones->count() > 0)
                                        <option value="">- {{ __('Seleccione') }} -</option>
                                        @foreach ($embarcaciones as $embarcacion)
                                            <option value="{{ $embarcacion->matricula }}">{{ $embarcacion->matricula }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="">- {{ __('Sin embarcaciones disponible') }} -</option>
                                    @endif
                                </select>
                                <label for="floatinMatricula">{{ __('MATRÍCULA') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_emb rounded-md"
                                    id="floatingNombreEmbarcacion" placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre"
                                    readonly value="" required />
                                <label for="floatingNombreEmbarcacion">{{ __('NOMBRE DE LA EMBARCACIÓN') }}</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control numero_casco rounded-md"
                                    id="floatingNumeroCasco" placeholder="NUMERO DE CASCO" name="numero_casco" readonly
                                    value="" required />
                                <label for="floatingNumeroCasco">{{ __('NUMERO DE CASCO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control color_emb rounded-md" id="floatingColor"
                                    placeholder="COLOR DE LA EMBARCACIÓN" readonly name="color_emb" value=""
                                    required />
                                <label for="floatingColor">{{ __('COLOR') }}</label>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-3">
                            {{-- <span
                                class="uppercase bg-gray-100 text-gray-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-gray-700 dark:text-gray-300">
                                {{ __('INFORMACIÓN DEL MOTOR DE LA EMBARCACIÓN') }}
                            </span> --}}
                            <div class="mb-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control marca_motor rounded-md" id="floatingColor"
                                        placeholder="MARCA MOTOR DE LA EMBARCACIÓN" readonly
                                        name="marca_modelo_motor" />
                                    <label for="floatingColor">{{ __('MARCA') }}</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control caballos_motor rounded-md"
                                        id="floatingColor" placeholder="CABALLOS DE FUERZA MOTOR DE LA EMBARCACIÓN"
                                        readonly name="caballos_fuerza_motor" />
                                    <label for="floatingColor">{{ __('CABALLOS DE FUERZA') }}</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-floating">
                                    <input type="text" class="form-control numero_motor rounded-md"
                                        id="floatingColor" placeholder="NUMERO DE MOTOR" readonly name="no_motor" />
                                    <label for="floatingColor">{{ __('NÚMERO DE MOTOR') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="alert alert-info mt-2" role="alert">
                            <strong>{{ __('INFORMACIÓN DEL CONDUCTOR / VEHÍCULO / DESTINO') }}</strong>
                            <div role="status" class="spin-cap float-end hidden">
                                <svg aria-hidden="true"
                                    class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-700"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select tipo_documento" name="tipo_documento" id="floatingSelect">
                                    <option>- {{ __('Seleccione') }} -</option>
                                    <option value="cedula">{{ __('Cédula') }}</option>
                                    <option value="pasaporte">{{ __('Pasaporte') }}</option>
                                </select>
                                <label for="floatinMatricula">{{ __('TIPO DE DOCUMENTO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control documento" id="floatinDocumento"
                                    placeholder="Documento" name="documento" required />
                                <label for="floatinDocumento">{{ __('DOCUMENTO DE IDENTIDAD DEL CONDUCTOR') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_capitan"
                                    id="floatingNombreConductor" placeholder="NOMBRE Y APELLIDO DEL CONDUCTOR"
                                    value="" name="nombre_conductor" required />
                                <label
                                    for="floatingNombreConductor">{{ __('NOMBRE Y APELLIDO DEL CONDUCTOR') }}R</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control telefono1" id="floatingTelefonoConductor"
                                    placeholder="TELEFONO CONDUCTOR" name="telefono_conductor" value=""
                                    required />
                                <label for="floatingTelefonoConductor">{{ __('TELÉFONO DEL CONDUCTOR') }}</label>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control telefono2" id="floatingTelefono2Conductor"
                                    placeholder="OTRO TELÉFONO DEL CONDUCTOR" name="telefono_conductor_otro"
                                    value="" />
                                <label
                                    for="floatingTelefono2Conductor">{{ __('OTRO TELÉFONO DEL CONDUCTOR') }}</label>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <span class="bg-gray-500  text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded  text-gray-300">
                            {{ __('DATOS DEL VEHÍCULO') }}</span>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control marca" id="floatingMarcaModelo"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="marca" required />
                                <label for="floatingMarcaModelo">{{ __('MARCA Y MODELO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control color" id="floatinColor"
                                    placeholder="COLOR" name="color" required />
                                <label for="floatinColor">{{ __('COLOR') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control year" id="floatingYear" placeholder="AÑO"
                                    name="year" />
                                <label for="floatingYear">{{ __('AÑO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control placa" id="floatingPlaca"
                                    placeholder="PLACA" name="placa" />
                                <label for="floatingPlaca">{{ __('PLACA') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span
                            class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-yellow-700 dark:text-yellow-300">
                            {{ __('LUGAR SALIDA') }}
                            <div role="status" class="spin float-end hidden">
                                <svg aria-hidden="true"
                                    class="w-6 h-6 mr-2 text-gray-200 animate-spin dark:text-gray-200 fill-gray-700"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="date" class="form-control" id="floatingFechaSalida"
                                    placeholder="FECHA SALIDA" name="fecha_salida" min="{{ date('Y-m-d') }}" />
                                <label for="floatingFechaSalida">{{ __('FECHA SALIDA') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="provinciasalida"
                                    id="floatingSelectProvinciaSalida">
                                    <option>- {{ __('Seleccione') }} -</option>
                                    @foreach ($provincias as $prov)
                                        <option value="{{ $prov->id }}|{{ $prov->descripcion }}">
                                            {{ $prov->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectProvinciaSalida">{{ __('PROVINCIA SALIDA') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="municipiosalida"
                                    id="floatingSelectMunicipioSalida">
                                    <option>- {{ __('Seleccione') }} -</option>
                                </select>
                                <label for="floatingSelectMunicipioSalida">{{ __('MUNICIPIO') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span
                            class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-blue-700 dark:text-blue-300">
                            {{ __('LUGAR DESTINO') }}
                            <div role="status" class="spin float-end hidden">
                                <svg aria-hidden="true"
                                    class="w-6 h-6 mr-2 text-gray-200 animate-spin dark:text-gray-200 fill-gray-700"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="provincia" id="floatingSelectProvincia">
                                    <option>- {{ __('Seleccione') }} -</option>
                                    @foreach ($provincias as $prov)
                                        <option value="{{ $prov->id }}|{{ $prov->descripcion }}">
                                            {{ $prov->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectProvincia">{{ __('PROVINCIA') }}</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="municipio" id="floatingSelectMunicipio">
                                    <option>- {{ __('Seleccione') }} -</option>
                                </select>
                                <label for="floatingSelectMunicipio">{{ __('MUNICIPIO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingSector"
                                    placeholder="{{ __('SECTOR') }}" name="sector" />
                                <label for="floatingSector">{{ __('SECTOR') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingCalle"
                                    placeholder="{{ __('CALLE') }}" name="calle" />
                                <label for="floatingCalle">{{ __('CALLE') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatinObservacion"
                                    placeholder="OBSERVACIÓN" name="observacion" />
                                <label for="floatinObservacion">{{ __('OBSERVACIÓN') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.conduces.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
                        <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send"><i
                                class="mdi mdi-send mr-2"></i> {{ __('Enviar') }}</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
            <input type="hidden" name="user" value="{{ auth()->user()->id }}">
            <input type="hidden" name="comandancia" class="comandancia" value="">
            <input type="hidden" name="idcomandancia" class="idcomandancia" value="">

        
    </div>


   {{-- segundo card --}}
   <div class="card shadow-xl">
    {{-- header del card --}}
    <div class="card-header bg-blue-900">
        <div class="text-white" role="alert">
            <strong>INFORMACIÓN DEL CONDUCTOR</strong>
            <div role="status" class="spin-cap float-end hidden">
                <svg aria-hidden="true"
                    class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-700"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    {{-- fin del header --}}
    {{-- cardbody --}}
    <div class="card-body">
    {{-- texto  para informacion del conductor --}}
    
    {{-- fin del texto para la informacion del conductor --}}
    
    {{-- columna para la informacion del conductor --}}
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
    
    <div class="">
        <div class="form-floating mb-2">
            <select class="form-select tipo_documento rounded-md" name="tipo_documento" id="floatingSelect">
                <option>- Seleccione -</option>
                <option value="cedula">Cédula</option>
                <option value="pasaporte">Pasaporte</option>
            </select>
            <label style="font-size: 10px;" for="floatinMatricula">TIPO DE DOCUMENTO</label>
        </div>
    </div>
    <div class="">
        <div class="form-floating mb-2">
            <input type="text" class="form-control documento rounded-md" id="floatinDocumento"
                placeholder="Documento" name="documento" required />
            <label style="font-size: 10px;" for="floatinDocumento">DOCUMENTO DE IDENTIDAD DEL CONDUCTOR</label>
        </div>
    </div>
    <div class="">
        <div class="form-floating mb-2">
            <input type="text" class="form-control nombre_capitan rounded-md"
                id="floatingNombreConductor" placeholder="NOMBRE Y APELLIDO DEL CONDUCTOR"
                value="" name="nombre_conductor" required />
            <label style="font-size: 10px;" for="floatingNombreConductor">NOMBRE Y APELLIDO DEL CONDUCTOR</label>
        </div>
    </div>
    
    <div class="">
        <div class="form-floating mb-2">
            <input type="text" class="form-control telefono1 rounded-md" id="floatingTelefonoConductor"
                placeholder="TELEFONO CONDUCTOR" name="telefono_conductor" value=""
                required />
            <label style="font-size: 10px;" for="floatingTelefonoConductor">TELÉFONO DEL CONDUCTOR</label>
        </div>
    </div>
    
    <div class="md:col-span-4">
        <div class="form-floating mb-2">
            <input type="text" class="form-control telefono2 rounded-md" id="floatingTelefono2Conductor"
                placeholder="OTRO TELÉFONO DEL CONDUCTOR" name="telefono_conductor_otro"
                value="" />
            <label style="font-size: 10px;" for="floatingTelefono2Conductor">OTRO TELÉFONO DEL CONDUCTOR</label>
        </div>
    </div>
    </div>
    
    
    </div>
    
    
    </div>





</form>
    @push('js')
        <script>
            // Initiate an Ajax request on button click
            $(document).on("focusout", ".documento", function() {
                var documento = $(this).val();
                var tipo = $('.tipo_documento').val();
                if (tipo == 'cedula') {
                    if (documento != '') {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('consultar.cedula') }}",
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            data: {
                                "documento": documento
                            },
                            beforeSend: function() {
                                $(".spin-cap").css('display', 'inline-block');
                                $('button').attr('disabled', true);
                            },
                            success: function(data) {
                                json = $.parseJSON(data);
                                console.log(json[0].nacionalidad)
                                if (json[0].nombres != '') {
                                    $('.nombre_capitan').val(json[0].nombres + ' ' + json[0].apellidos);
                                    $('.nombre_capitan').attr('readonly', true);
                                } else {
                                    $('.nombre_capitan').attr('readonly', false).val('');
                                }
                                if (json[0].nacionalidad != '') {
                                    $('.nacionalidad').val(json[0].nacionalidad);
                                }
                            },
                            complete: function() {
                                $(".spin-cap").css('display', 'none');
                                $('button').attr('disabled', false);
                            }

                        });
                    }
                } else {
                    // uso del endpoint pasaporte
                }

            });

            $(document).on("change", ".emb_matricula", function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('consulta.embarcacion') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        "matricula": this.value,
                    },
                    beforeSend: function() {
                        $(".spin-matricula").css('display', 'inline-block');
                        $('button').attr('disabled', true);
                    },
                    success: function(data) {
                        json = $.parseJSON(data);
                        $('.nombre_emb').val(json.nombre);
                        $(".nombre_emb").val($(".nombre_emb").val().toUpperCase());
                        $('.numero_casco').val(json.no_chasis);
                        $('.color_emb').val(json.color);
                        $(".color_emb").val($(".color_emb").val().toUpperCase());
                        $(".marca_motor").val(json.marca_modelo_motor);
                        $(".marca_motor").val($(".marca_motor").val().toUpperCase());
                        $(".caballos_motor").val(json.caballos_fuerza_motor);
                        $(".caballos_motor").val($(".caballos_motor").val().toUpperCase());
                        $(".numero_motor").val(json.no_motor);
                    },
                    complete: function() {
                        $(".spin-matricula").css('display', 'none');
                        $('button').attr('disabled', false);
                    }
                });
            });
            // provincia de llegada
            $("#floatingSelectProvincia").change(function() {
                var provincia = $(this).val();
                const idp = provincia.split("|");
                $.post("{{ route('get.municipios') }}", {
                    idprovincia: idp[0],
                    _token: $('input[name="_token"]').val()
                }, function(data) {
                    json = $.parseJSON(data);
                    $("#floatingSelectMunicipio").empty();
                    $("#floatingSelectMunicipio").append("<option value=''>- Seleccione -</option>");
                    // iterando los resultados encontrados
                    // $.each(data, function(index, field){
                    for (var i = 0; i < json.length; i++) {
                        console.log(json[i].descripcion);
                        $("#floatingSelectMunicipio").append("<option value='" + json[i].descripcion + "'>" +
                            json[i].descripcion + "</option>")
                    }
                    // });

                });
            });
            // provincia de salida
            $("#floatingSelectProvinciaSalida").change(function() {
                var provincia = $(this).val();
                const idp = provincia.split("|");
                $.post("{{ route('get.municipios') }}", {
                    idprovincia: idp[0],
                    _token: $('input[name="_token"]').val()
                }, function(data) {
                    json = $.parseJSON(data);
                    $("#floatingSelectMunicipioSalida").empty();
                    $("#floatingSelectMunicipioSalida").append("<option value=''>- Seleccione -</option>");
                    // iterando los resultados encontrados
                    // $.each(data, function(index, field){
                    for (var i = 0; i < json.length; i++) {
                        console.log(json[i].descripcion);
                        $("#floatingSelectMunicipioSalida").append("<option value='" + json[i].descripcion +
                            "'>" + json[i].descripcion + "</option>")
                    }
                    // });
                });
                // adquirir nombre de la comandancia
                $.post("{{ route('get.comandancia') }}", {
                    idprovincia: idp[0],
                    _token: $('input[name="_token"]').val()
                }, function(data) {
                    json = $.parseJSON(data);
                    $(".comandancia").empty();
                    // iterando los resultados encontrados
                    // $.each(data, function(index, field){
                    console.log(json[0]);
                    $(".comandancia").val(json[0].descripcion);
                    $(".idcomandancia").val(json[0].idcomandancia);

                    // });
                });
            });

            $('input').prop('required', true);
            $('select').prop('required', true);

            $('[required]').css({
                'border-left': '2px solid red'
            });
        </script>
    @endpush

</x-app-layout>

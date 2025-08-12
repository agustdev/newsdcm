<x-app-layout>
    @section('titulo', __('Solicitud de Despachos'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-3 mt-4 text-black uppercase">
            {{ __('Solicitud Despacho') }}
        </h2>
    </x-slot>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">
        <form action="{{ route('movimientos.despachos.store') }}" method="POST" class="form-inline needs-validation"
            autocomplete="off" enctype="multipart/form-data">
            @csrf
            <x-validation-errors></x-validation-errors>
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white" role="alert">
                        <div class="inline-block float-start">
                            <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
                        </div>
                        <div role="status" class="spin-matricula float-end hidden">
                            <svg aria-hidden="true"
                                class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-white"
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
                            <div class="form-floating">
                                {{-- <input type="text" class="form-control matricula" id="floatinMatricula"
                                    placeholder="MATRICULA" name="matricula" /> --}}

                                <select name="matricula" class="form-select emb_matricula rounded-md"
                                    id="floatinMatricula" required>
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
                                <label style="font-size: 10px;" for="floatinMatricula">{{ __('MATRÍCULA') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control nombre_emb rounded-md"
                                    id="floatingNombreEmbarcacion" placeholder="{{ __('NOMBRE DE LA EMBARCACIÓN') }}"
                                    name="nombre" readonly />
                                <label style="font-size: 10px;"
                                    for="floatingNombreEmbarcacion">{{ __('NOMBRE DE LA EMBARCACIÓN') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control numero_casco rounded-md"
                                    id="floatingNumeroCasco" placeholder="NUMERO DE CASCO" name="numero_casco"
                                    readonly />
                                <label style="font-size: 10px;"
                                    for="floatingNumeroCasco">{{ __('NÚMERO DE CASCO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control color rounded-md" id="floatingColor"
                                    placeholder="{{ __('COLOR DE LA EMBARCACIÓN') }}" readonly name="color" />
                                <label style="font-size: 10px;" for="floatingColor">{{ __('COLOR') }}</label>
                            </div>
                        </div>

                        <span class="uppercase text-black text-sm font-semibold -mb-4 py-2.5">
                            {{ __('INFORMACIÓN DEL MOTOR DE LA EMBARCACIÓN') }}
                        </span>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control marca_motor rounded-md" id="floatingColor"
                                        placeholder="{{ __('MARCA MOTOR DE LA EMBARCACIÓN') }}" readonly
                                        name="marca_modelo_motor" />
                                    <label style="font-size: 10px;" for="floatingColor">{{ __('MARCA') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control caballos_motor rounded-md"
                                        id="floatingColor"
                                        placeholder="{{ __('CABALLOS DE FUERZA MOTOR DE LA EMBARCACIÓN') }}" readonly
                                        name="caballos_fuerza_motor" />
                                    <label style="font-size: 10px;" for="floatingColor">{{ __('CABALLOS DE FUERZA') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control numero_motor rounded-md"
                                        id="floatingColor" placeholder="{{ __('NÚMERO DE MOTOR') }}" readonly
                                        name="no_motor" />
                                    <label style="font-size: 10px;"
                                        for="floatingColor">{{ __('NÚMERO DE MOTOR') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- aqui termina la informacion del motor --}}


                    {{-- cardbody no tocar --}}
                </div>


            </div>
            <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
            <input type="hidden" name="user" value="{{ auth()->user()->id }}">

            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white" role="alert">
                        <strong>{{ __('INFORMACIÓN DEL DESPACHO') }}</strong>
                        <div role="status" class="spin-defualt float-end hidden">
                            <svg aria-hidden="true"
                                class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-white"
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
                    {{-- ifnormacion del despacho --}}
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control rounded-md" id="floatingFecha"
                                    placeholder="FECHA" name="fecha" />
                                <label style="font-size: 10px;"
                                    for="floatingFecha">{{ __('FECHA Y HORA DE ZARPE') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select rounded-md" name="lugar_salida"
                                    id="floatingSelectLugarSalida" required>
                                    <option>- {{ __('Seleccione') }} -</option>
                                    @foreach ($destinos as $dest)
                                        @if ($dest->id != 13)
                                            <option value="{{ $dest->id }}|{{ strtoupper($dest->descripcion) }}">
                                                {{ strtoupper($dest->descripcion) }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatingSelectLugarSalida">{{ __('LUGAR SALIDA') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select rounded-md" name="detalle_salida"
                                    id="floatingSelectLugarSalidaEspecifico" required>
                                    <option>- {{ __('Seleccione') }} -</option>
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatingSelectLugarSalidaEspecifico">{{ __('LUGAR SALIDA ESPECIFICO') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="datetime-local" class="form-control rounded-md" id="floatingFechaArribo"
                                    placeholder="FECHA" name="fecha_llegada" min="{{ date('Y-m-d') . 'T06:00' }}"
                                    max="{{ date('Y-m-d', strtotime('+10 Days')) . 'T18:00' }}" />
                                <label style="font-size: 10px;"
                                    for="floatingFecha">{{ __('FECHA Y HORA DE ARRIBO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select rounded-md" name="lugar_destino"
                                    id="floatingSelectDestino" required>
                                    <option>-{{ __('Seleccione') }}-</option>
                                    @foreach ($destinos as $dest)
                                        <option value="{{ $dest->id }}|{{ strtoupper($dest->descripcion) }}">
                                            {{ strtoupper($dest->descripcion) }}
                                        </option>
                                    @endforeach
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatingSelectDestino">{{ __('LUGAR DESTINO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select rounded-md" name="detalle_destino"
                                    id="floatingSelectPerimetro" required>
                                    <option>-{{ __('Seleccione') }}-</option>
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatingSelectPerimetro">{{ __('LUGAR DE DESTINO ESPECIFICO') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control rounded-md cantidad_tripulantes"
                                    id="floatingCantidadTripulantes" placeholder="CANTIDAD DE TRIPULANTES"
                                    name="cantidad_tripulantes" min="1" value="0" />
                                <label style="font-size: 10px;"
                                    for="floatingCantidadTripulantes">{{ __('CANTIDAD DE TRIPULANTES') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control rounded-md cantidad_pasajeros"
                                    id="floatingCantidadPasajeros" placeholder="CANTIDAD DE PASAJEROS"
                                    name="cantidad_pasajeros" min="1" value="0" />
                                <label style="font-size: 10px;"
                                    for="floatingCantidadPasajeros">{{ __('CANTIDAD DE PASAJEROS') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control rounded-md" id="floatingCantidadAdultos"
                                    placeholder="CANTIDAD DE ADULTOS" name="cant_adultos" value="0" />
                                <label style="font-size: 10px;"
                                    for="floatingCantidadAdultos">{{ __('CANTIDAD DE ADULTOS') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control rounded-md" id="floatingCantidadMenores"
                                    placeholder="CANTIDAD DE MENORES" name="cant_menores" value="0" />
                                <label style="font-size: 10px;"
                                    for="floatingCantidadMenores">{{ __('CANTIDAD DE MENORES') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control rounded-md" id="floatingNombreEmbarcacion"
                                    placeholder="CANTIDAD DE NACIONALES" name="cant_nacionales" value="0" />
                                <label style="font-size: 10px;"
                                    for="floatingNombreEmbarcacion">{{ __('CANTIDAD DE NACIONALES') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control rounded-md" id="floatinMatricula"
                                    placeholder="CANTIDAD DE EXTRANJEROS" name="cant_extranjeros" value="0" />
                                <label style="font-size: 10px;"
                                    for="floatinMatricula">{{ __('CANTIDAD DE EXTRANJEROS') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white" role="alert">
                        <strong>{{ __('INFORMACIÓN DE TRIPULANTES Y PASAJEROS') }}</strong>
                        <a href="#"
                            class="float-end px-2 py-1 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25"><i
                                class="mdi mdi-download"></i> Descargar
                            plantilla</a>
                    </div>
                </div>
                <div class="card-body shadow-xl">
                    <div class="row g-2">
                        <div class="col-lg">
                            <div class="alert alert-info font-semibold">
                                {{ __('Favor cargar documento de tripulantes en formato PDF, JPG, PNG o XLSX') }}
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-floating mb-2">
                                <input type="file" class="form-control rounded-md"
                                    id="floatinDocumentoTripulantes" placeholder="Cargar documento"
                                    name="tripulantes" name="tripulantes" accept=".pdf,.png,.jpg,.csv,.xlsx" />
                                <label style="font-size: 10px;"
                                    for="floatinDocumentoTripulantes">{{ __('Cargar documento') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-lg">
                            <div class="alert alert-info font-semibold">
                                {{ __('Favor cargar documento de pasajeros en formato PDF, JPG, PNG o XLSX') }}
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-floating mb-2">
                                <input type="file" class="form-control rounded-md" id="floatinDocumentoPasajeros"
                                    placeholder="Cargar documento" name="pasajeros" name="pasajeros"
                                    accept=".pdf,.png,.jpg,.csv,.xlsx" />
                                <label style="font-size: 10px;"
                                    for="floatinDocumentoPasajeros">{{ __('Cargar documento') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white" role="alert">
                        <strong>{{ __('INFORMACIÓN DEL CAPITÁN') }}</strong>
                        <div role="status" class="spin-cap float-end hidden">
                            <svg aria-hidden="true"
                                class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-white"
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

                <div class="card-body shadow-xl">
                    <div class="row g-2">

                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select name="capitan" class="form-select rounded-md" id="" required>
                                    <option value="">- {{ __('Seleccione el capitan designado') }} -</option>
                                    @foreach ($capitanesreg as $capi)
                                        <option value="{{ $capi->documento }}">{{ $capi->nombre }}</option>
                                    @endforeach
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatingNombreEmbarcacion">{{ __('CAPITAN DESIGNADO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select name="motivo_viaje" class="form-select rounded-md" id="" required>
                                    <option value="">- {{ __('Seleccione motivo del viaje') }} -</option>
                                    <option value="ATRAQUE">{{ __('ATRAQUE') }}</option>
                                    <option value="BUCEO">{{ __('BUCEO') }}</option>
                                    <option value="CARGA">{{ __('CARGA') }}</option>
                                    <option value="DEPORTIVO">{{ __('DEPORTIVO') }}</option>
                                    <option value="LANCHA_PRACTICO">{{ __('LANCHA PRÁCTICO') }}</option>
                                    <option value="PASAJERO">{{ __('PASAJERO') }}</option>
                                    <option value="PESCA">{{ __('PESCA') }}</option>
                                    <option value="RECREO">{{ __('RECREO') }}</option>
                                    <option value="REMOLQUE">{{ __('REMOLQUE') }}</option>
                                    <option value="TRANSPORTE_COMBUSTIBLE">{{ __('TRANSPORTE DE COMBUSTIBLE') }}
                                    </option>
                                    <option value="TURISTICO">{{ __('TURÍSTICO') }}</option>
                                    <option value="TURISTICO COMERCIAL">{{ __('TURÍSTICO COMERCIAL') }}</option>
                                    <option value="TURISTICO PRIVADO">{{ __('TURÍSTICO PRIVADO') }}</option>
                                    {{-- <option value="TURISTICO PRIVADO">{{ __('TURÍSTICO PRIVADO') }}</option> --}}
                                    <option value="OTRO DESTINO">OTRO DESTINO</option>
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatinMatricula">{{ __('MOTIVO DEL VIAJE') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- card footer --}}
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.despachos.index') }}"
                            class="inline-flex items-center px-3 py-2 bg- bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
                        <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send">
                            {{ __('Enviar') }}<i class="mdi mdi-send ml-2"></i></button>
                    </div>
                </div>
            </div>


        </form>
    </div>
    @push('css')
        <style>
            input.is-invalid {
                border: 2px solid red;
            }
        </style>
    @endpush
    @push('js')
        <script>
            // Initiate an Ajax request on button click
            $(document).on("change", ".tipo_documento", function() {
                $(".nombre_capitan").val('').attr('readonly', false);
            })
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
                } else if (tipo == 'pasaporte') {
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
                        $('.color').val(json.color);
                        $(".color").val($(".color").val().toUpperCase());
                        $(".marca_motor").val(json.marca_modelo_motor);
                        $(".marca_motor").val($(".marca_motor").val().toUpperCase());
                        $(".caballos_motor").val(json.caballos_fuerza_motor);
                        $(".caballos_motor").val($(".caballos_motor").val().toUpperCase());
                        $(".numero_motor").val(json.no_motor);
                        $(".cantidad_tripulantes").attr('max', json.capacidad_tripulantes);
                        $(".cantidad_pasajeros").attr('max', json.capacidad_personas);

                        // 👉 Segunda consulta POST usando el dato de la primera (por ejemplo, la matrícula)
                        $.post("{{ route('get.destino.salida') }}", {
                                matricula: json
                                    .matricula, // o el campo que necesites enviar
                                _token: $('meta[name="csrf-token"]').attr(
                                    'content') // CSRF token si es Laravel
                            },
                            function(response) {
                                // jsonL = $.parseJSON(response);
                                // // Aquí manejas la respuesta de la segunda consulta
                                // // Ejemplo: llenar un campo adicional
                                // if (jsonL.lugar_destino != '') {
                                //     $("#floatingSelectLugarSalida").val(
                                //         jsonL.dest_ll_id + '|' + jsonL.lugar_destino);
                                //     // $("#floatingSelectLugarSalida").change();
                                // }
                            });
                    },
                    complete: function() {
                        $(".spin-matricula").css('display', 'none');
                        $('button').attr('disabled', false);
                    }
                });
            });

            // lugar de salida
            $("#floatingSelectLugarSalida").change(function() {
                var salida = $(this).val();
                const idp = salida.split("|");
                $.post("{{ route('get.perimetros') }}", {
                    salida_id: idp[0],
                    _token: $('input[name="_token"]').val()
                }, function(data) {
                    json = $.parseJSON(data);
                    $("#floatingSelectLugarSalidaEspecifico").empty();
                    $("#floatingSelectLugarSalidaEspecifico").append(
                        "<option value=''>- {{ __('Seleccione') }} -</option>");
                    // iterando los resultados encontrados
                    // $.each(data, function(index, field){
                    for (var i = 0; i < json.length; i++) {
                        $("#floatingSelectLugarSalidaEspecifico").append("<option value='" + json[i]
                            .description +
                            "'>" + json[i].description + "</option>");
                    }
                    // });
                });

            });

            // verificar que el lugar de destino sea perimetro costeros
            $("#floatingSelectDestino").change(function() {
                var destino = $(this).val();
                const idd = destino.split("|");
                var salida = $("#floatingSelectLugarSalida").val();
                const ids = salida.split("|");
                // $(".detalle_d").next('select').next('label').text(idd[1]);
                if (idd[0] == 13) {
                    $.post("{{ route('get.perimetros') }}", {
                        salida_id: ids[0],
                        _token: $('input[name="_token"]').val()
                    }, function(data) {
                        json = $.parseJSON(data);
                        $("#floatingSelectPerimetro").empty();
                        $("#floatingSelectPerimetro").append(
                            "<option value=''>- {{ __('Seleccione') }} -</option>");
                        // iterando los resultados encontrados
                        // $.each(data, function(index, field){
                        for (var i = 0; i < json.length; i++) {
                            $("#floatingSelectPerimetro").append("<option value='" + json[i]
                                .description +
                                "'>" + json[i].description + "</option>");
                        }
                        // });
                    });
                } else {
                    $.post("{{ route('get.perimetros') }}", {
                        salida_id: idd[0],
                        _token: $('input[name="_token"]').val()
                    }, function(data) {
                        json = $.parseJSON(data);
                        $("#floatingSelectPerimetro").empty();
                        $("#floatingSelectPerimetro").append(
                            "<option value=''>- {{ __('Seleccione') }} -</option>");
                        // iterando los resultados encontrados
                        // $.each(data, function(index, field){
                        for (var i = 0; i < json.length; i++) {
                            $("#floatingSelectPerimetro").append("<option value='" + json[i]
                                .description +
                                "'>" + json[i].description + "</option>");
                        }
                        // });
                    });
                }
            });

            $('input').prop('required', true);
            // $('select').prop('required', true);

            $('[required]').css({
                'border-left': '2px solid red'
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tripulantes = document.getElementById('floatingCantidadTripulantes');
                const pasajeros = document.getElementById('floatingCantidadPasajeros');
                const adultos = document.getElementById('floatingCantidadAdultos');
                const menores = document.getElementById('floatingCantidadMenores');

                function calcularMenores() {
                    const t = parseInt(tripulantes.value) || 0;
                    const p = parseInt(pasajeros.value) || 0;
                    const a = parseInt(adultos.value) || 0;

                    const total = t + p;
                    const m = total - a;

                    // Mostrar solo si hay datos
                    menores.value = (total && a >= 0) ? Math.max(0, m) : '';
                }

                // Recalcular cuando cambie cualquiera de los tres campos
                tripulantes.addEventListener('input', calcularMenores);
                pasajeros.addEventListener('input', calcularMenores);
                adultos.addEventListener('input', calcularMenores);
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fechaInput = document.getElementById('floatingFecha');
                const horasMin = 6; // 06:00
                const horasMax = 18; // 18:00 (permitimos exactamente 18:00, minutos > 0 no)

                // CONFIG: Cambia esto según prefieras:
                // - preventPastSelections = true  -> min será "ahora" si estamos entre 06:00-18:00 (evita seleccionar horas pasadas del día)
                // - preventPastSelections = false -> min será hoy 06:00 (si estamos antes de 18:00), permitiendo elegir horas desde las 06:00.
                const preventPastSelections =
                    false; // <--- cambia a `true` si quieres forzar min = ahora cuando estemos dentro del rango
                const autoCorrectOnInvalid =
                    true; // <--- si true corrige automáticamente a la hora permitida más cercana

                const pad = (n) => String(n).padStart(2, '0');

                // Formatea una Date (local) a "YYYY-MM-DDTHH:mm" evitando toISOString() que introduce offsets UTC.
                function formatLocalDate(d) {
                    return `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}T${pad(d.getHours())}:${pad(d.getMinutes())}`;
                }

                const now = new Date();
                let minDate, maxDate;

                // Lógica para minDate:
                // - Si ya pasó la hora máxima de hoy (>= 18), min = mañana 06:00
                // - Si preventPastSelections && estamos entre 06 y 18 => min = ahora
                // - En otro caso => min = hoy 06:00
                if (now.getHours() >= horasMax) {
                    minDate = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1, horasMin, 0, 0, 0);
                } else if (preventPastSelections && now.getHours() >= horasMin) {
                    // min = ahora (se respeta minutos actuales)
                    minDate = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now
                        .getMinutes(), 0, 0);
                } else {
                    // min = hoy 06:00
                    minDate = new Date(now.getFullYear(), now.getMonth(), now.getDate(), horasMin, 0, 0, 0);
                }

                // Max: 10 días desde minDate, con hora hasta 18:00
                maxDate = new Date(minDate.getFullYear(), minDate.getMonth(), minDate.getDate() + 10, horasMax, 0, 0,
                    0);

                fechaInput.min = formatLocalDate(minDate);
                fechaInput.max = formatLocalDate(maxDate);

                // Parseo manual "YYYY-MM-DDTHH:mm" a objeto para evitar conversiones de zona
                function parseDateTimeLocal(str) {
                    if (!str) return null;
                    const [datePart, timePart] = str.split('T');
                    if (!datePart || !timePart) return null;
                    const [y, m, d] = datePart.split('-').map(Number);
                    const [h, mi] = timePart.split(':').map(Number);
                    return {
                        y,
                        m,
                        d,
                        h,
                        mi
                    };
                }

                function formatObj(o) {
                    return `${o.y}-${pad(o.m)}-${pad(o.d)}T${pad(o.h)}:${pad(o.mi)}`;
                }

                // Clamp a la franja horaria permitida y luego a min/max (devuelve string listo para asignar)
                function clampToAllowed(obj) {
                    // clampa horas al rango 06:00 - 18:00 (18:00 permitido con minutos = 0)
                    if (obj.h < horasMin) {
                        obj.h = horasMin;
                        obj.mi = 0;
                    } else if (obj.h > horasMax || (obj.h === horasMax && obj.mi > 0)) {
                        obj.h = horasMax;
                        obj.mi = 0;
                    }

                    const s = formatObj(obj);
                    if (fechaInput.min && s < fechaInput.min) return fechaInput.min;
                    if (fechaInput.max && s > fechaInput.max) return fechaInput.max;
                    return s;
                }

                // Chequeo principal: si está fuera de la ventana 06:00-18:00 o fuera de min/max
                function isOutsideAllowed(str) {
                    if (!str) return false;
                    const o = parseDateTimeLocal(str);
                    if (!o) return false;
                    if (o.h < horasMin) return true;
                    if (o.h > horasMax) return true;
                    if (o.h === horasMax && o.mi > 0) return true; // 18:01 no permitido
                    if (fechaInput.min && str < fechaInput.min) return true;
                    if (fechaInput.max && str > fechaInput.max) return true;
                    return false;
                }

                fechaInput.addEventListener('input', function() {
                    const val = this.value;
                    if (!val) {
                        this.classList.remove('is-invalid');
                        return;
                    }

                    if (isOutsideAllowed(val)) {
                        this.classList.add('is-invalid');
                        if (autoCorrectOnInvalid) {
                            const obj = parseDateTimeLocal(val);
                            const corrected = clampToAllowed(obj);
                            if (corrected && corrected !== val) {
                                this.value = corrected; // asigna string corregido
                            }
                            // si con la corrección queda válido, quitar el error visual
                            if (!isOutsideAllowed(this.value)) this.classList.remove('is-invalid');
                        }
                    } else {
                        this.classList.remove('is-invalid');
                    }
                });

                // Validación final en submit
                if (fechaInput.form) {
                    fechaInput.form.addEventListener('submit', function(e) {
                        const v = fechaInput.value;
                        if (!v || isOutsideAllowed(v)) {
                            e.preventDefault();
                            alert(
                                'La fecha y hora deben estar entre 06:00 y 18:00 y dentro del rango permitido.'
                                );
                        }
                    });
                }

                // FIN
            });

            document.addEventListener('DOMContentLoaded', function() {
                const fechaInput = document.getElementById('floatingFechaArribo');
                const horasMin = 6; // 06:00
                const horasMax = 18; // 18:00 (permitimos exactamente 18:00, minutos > 0 no)

                // CONFIG: Cambia esto según prefieras:
                // - preventPastSelections = true  -> min será "ahora" si estamos entre 06:00-18:00 (evita seleccionar horas pasadas del día)
                // - preventPastSelections = false -> min será hoy 06:00 (si estamos antes de 18:00), permitiendo elegir horas desde las 06:00.
                const preventPastSelections =
                false; // <--- cambia a `true` si quieres forzar min = ahora cuando estemos dentro del rango
                const autoCorrectOnInvalid =
                true; // <--- si true corrige automáticamente a la hora permitida más cercana

                const pad = (n) => String(n).padStart(2, '0');

                // Formatea una Date (local) a "YYYY-MM-DDTHH:mm" evitando toISOString() que introduce offsets UTC.
                function formatLocalDate(d) {
                    return `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}T${pad(d.getHours())}:${pad(d.getMinutes())}`;
                }

                const now = new Date();
                let minDate, maxDate;

                // Lógica para minDate:
                // - Si ya pasó la hora máxima de hoy (>= 18), min = mañana 06:00
                // - Si preventPastSelections && estamos entre 06 y 18 => min = ahora
                // - En otro caso => min = hoy 06:00
                if (now.getHours() >= horasMax) {
                    minDate = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1, horasMin, 0, 0, 0);
                } else if (preventPastSelections && now.getHours() >= horasMin) {
                    // min = ahora (se respeta minutos actuales)
                    minDate = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now
                    .getMinutes(), 0, 0);
                } else {
                    // min = hoy 06:00
                    minDate = new Date(now.getFullYear(), now.getMonth(), now.getDate(), horasMin, 0, 0, 0);
                }

                // Max: 10 días desde minDate, con hora hasta 18:00
                maxDate = new Date(minDate.getFullYear(), minDate.getMonth(), minDate.getDate() + 10, horasMax, 0, 0,
                0);

                fechaInput.min = formatLocalDate(minDate);
                fechaInput.max = formatLocalDate(maxDate);

                // Parseo manual "YYYY-MM-DDTHH:mm" a objeto para evitar conversiones de zona
                function parseDateTimeLocal(str) {
                    if (!str) return null;
                    const [datePart, timePart] = str.split('T');
                    if (!datePart || !timePart) return null;
                    const [y, m, d] = datePart.split('-').map(Number);
                    const [h, mi] = timePart.split(':').map(Number);
                    return {
                        y,
                        m,
                        d,
                        h,
                        mi
                    };
                }

                function formatObj(o) {
                    return `${o.y}-${pad(o.m)}-${pad(o.d)}T${pad(o.h)}:${pad(o.mi)}`;
                }

                // Clamp a la franja horaria permitida y luego a min/max (devuelve string listo para asignar)
                function clampToAllowed(obj) {
                    // clampa horas al rango 06:00 - 18:00 (18:00 permitido con minutos = 0)
                    if (obj.h < horasMin) {
                        obj.h = horasMin;
                        obj.mi = 0;
                    } else if (obj.h > horasMax || (obj.h === horasMax && obj.mi > 0)) {
                        obj.h = horasMax;
                        obj.mi = 0;
                    }

                    const s = formatObj(obj);
                    if (fechaInput.min && s < fechaInput.min) return fechaInput.min;
                    if (fechaInput.max && s > fechaInput.max) return fechaInput.max;
                    return s;
                }

                // Chequeo principal: si está fuera de la ventana 06:00-18:00 o fuera de min/max
                function isOutsideAllowed(str) {
                    if (!str) return false;
                    const o = parseDateTimeLocal(str);
                    if (!o) return false;
                    if (o.h < horasMin) return true;
                    if (o.h > horasMax) return true;
                    if (o.h === horasMax && o.mi > 0) return true; // 18:01 no permitido
                    if (fechaInput.min && str < fechaInput.min) return true;
                    if (fechaInput.max && str > fechaInput.max) return true;
                    return false;
                }

                fechaInput.addEventListener('input', function() {
                    const val = this.value;
                    if (!val) {
                        this.classList.remove('is-invalid');
                        return;
                    }

                    if (isOutsideAllowed(val)) {
                        this.classList.add('is-invalid');
                        if (autoCorrectOnInvalid) {
                            const obj = parseDateTimeLocal(val);
                            const corrected = clampToAllowed(obj);
                            if (corrected && corrected !== val) {
                                this.value = corrected; // asigna string corregido
                            }
                            // si con la corrección queda válido, quitar el error visual
                            if (!isOutsideAllowed(this.value)) this.classList.remove('is-invalid');
                        }
                    } else {
                        this.classList.remove('is-invalid');
                    }
                });

                // Validación final en submit
                if (fechaInput.form) {
                    fechaInput.form.addEventListener('submit', function(e) {
                        const v = fechaInput.value;
                        if (!v || isOutsideAllowed(v)) {
                            e.preventDefault();
                            alert(
                                'La fecha y hora deben estar entre 06:00 y 18:00 y dentro del rango permitido.');
                        }
                    });
                }

                // FIN
            });
        </script>
    @endpush

</x-app-layout>

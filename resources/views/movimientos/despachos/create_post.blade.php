<x-app-layout>
    @section('titulo', 'Solicitud de Despachos')
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-3 mt-4 text-black">
            {{ __('Solicitud Despacho') }}
        </h2>
    </x-slot>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">

        <form action="{{ route('movimientos.despachos.store') }}" method="POST" class="form-inline" autocomplete="off">
            @csrf
            <div class="card shadow-xl">
                <div class="card-header bg-blue-900">
                    <div class="text-white" role="alert">
                        <strong>{{ __('INFORMACIÓN DE LA EMBARCACIÓN') }}</strong>
                        <div role="status" class="spin-matricula float-end hidden">
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
                <div class="card-body">
                    <div class="row g-2">
                        
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="uppercase form-control rounded-md" id="floatinMatricula"
                                    placeholder="MATRICULA" name="matricula" readonly
                                    value="{{ $embarcacion->matricula }}" />
                                <label style="font-size: 10px;" for="floatinMatricula">MATRÍCULA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="uppercase form-control rounded-md" id="floatingNombreEmbarcacion"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre" readonly
                                    value="{{ $embarcacion->nombre }}" />
                                <label style="font-size: 10px;" for="floatingNombreEmbarcacion">NOMBRE DE LA EMBARCACIÓN</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="uppercase form-control rounded-md" id="floatingNumeroCasco"
                                    placeholder="NUMERO DE CASCO" name="numero_casco" readonly
                                    value="{{ $embarcacion->no_chasis }}" />
                                <label style="font-size: 10px;" for="floatingNumeroCasco">NUMERO DE CASCO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="uppercase form-control rounded-md" id="floatingColor"
                                    placeholder="COLOR DE LA EMBARCACIÓN" readonly name="color"
                                    value="{{ $embarcacion->color }}" />
                                <label style="font-size: 10px;" for="floatingColor">COLOR</label>
                            </div>
                        </div>
                        <div class="row g-2">
                            <span
                                class=" text-black font-semibold px-2.5 mb-1 ">
                                INFORMACIÓN DEL MOTOR DE LA EMBARCACIÓN
                            </span>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="uppercase form-control marca_motor rounded-md" id="floatingColor"
                                        placeholder="MARCA MOTOR DE LA EMBARCACIÓN" readonly name="marca_modelo_motor"
                                        value="{{ $embarcacion->marca_modelo_motor }}" />
                                    <label style="font-size: 10px;" for="floatingColor">MARCA </label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control caballos_motor rounded-md" id="floatingColor"
                                        placeholder="CABALLOS DE FUERZA MOTOR DE LA EMBARCACIÓN" readonly
                                        name="caballos_fuerza_motor"
                                        value="{{ $embarcacion->caballos_fuerza_motor }}" />
                                    <label style="font-size: 10px;" for="floatingColor">CABALLOS DE FUERZA </label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="uppercase form-control numero_motor rounded-md" id="floatingColor"
                                        placeholder="NUMERO DE MOTOR" readonly name="no_motor"
                                        value="{{ $embarcacion->no_motor }}" />
                                    <label style="font-size: 10px;" for="floatingColor">NÚMERO DE MOTOR</label>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
            </div>
            <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
            <input type="hidden" name="user" value="{{ auth()->user()->id }}">






<div class="card shadow-xl">
    <div class="card-header bg-blue-900">
        <div class=" text-white font-semibold" role="alert">
            <strong>INFORMACIÓN DEL CAPITÁN</strong>
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

    <div class="card-body">
        <div class="row g-2">
            
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select tipo_documento rounded-md" name="tipo_documento" id="floatingSelect">
                        <option>- Seleccione -</option>
                        <option value="cedula">Cédula</option>
                        <option value="pasaporte">Pasaporte</option>
                    </select>
                    <label style="font-size: 10px;" for="floatinMatricula">TIPO DE DOCUMENTO</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control documento rounded-md" id="floatinDocumento"
                        placeholder="Documento" name="documento" />
                    <label style="font-size: 10px;" for="floatinMatricula">DOCUMENTO DE IDENTIDAD DEL CAPITÁN</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control nombre_capitan rounded-md" id="floatingNombreCapitan"
                        placeholder="NOMBRE Y APELLIDO DEL CAPITAN" value=""
                        name="nombre_capitan" />
                    <label style="font-size: 10px;" for="floatingNombreEmbarcacion">NOMBRE Y APELLIDO DEL CAPITÁN</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating mb-2">
                    <select name="nacionalidad" class="form-select rounded-md" id="" required>
                        <option value="">- Seleccione -</option>
                        <option value="DOMINICANO">DOMINICANO</option>
                        <option value="FRANCES">FRANCES</option>
                        <option value="ALEMAN">ALEMAN</option>
                        <option value="RUSO">RUSO</option>
                        <option value="ITALIANO">ITALIANO</option>
                    </select>
                    <label style="font-size: 10px;" for="floatinMatricula">NACIONALIDAD DEL CAPITÁN</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control telefono rounded-md" id="floatingNombreEmbarcacion"
                        placeholder="NOMBRE DE LA EMBARCACIÓN" name="telefono" />
                    <label style="font-size: 10px;" for="floatingNombreEmbarcacion">TELÉFONO DEL CAPITÁN</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-2">
                    <select name="motivo_viaje" class="form-select rounded-md" id="" required>
                        <option value="">- Seleccione motivo del viaje -</option>
                        <option value="TURISMO">TURISMO</option>
                        <option value="RECREO">RECREO</option>
                        <option value="NEGOCIOS">NEGOCIOS</option>
                        <option value="VACACIONES">VACACIONES</option>
                    </select>
                    <label style="font-size: 10px;" for="floatinMatricula">MOTIVO DEL VIAJE</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-floating mb-2">
                    <input type="date" class="form-control rounded-md" id="floatingFecha" placeholder="FECHA"
                        name="fecha" min="{{ date('Y-m-d') }}" />
                    <label style="font-size: 10px;" for="floatingFecha">FECHA SALIDA</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-2">
                    <select class="form-select rounded-md" name="lugar_salida" id="floatingSelect">
                        <option>- Seleccione -</option>
                        @foreach ($destinos as $dest)
                            <option value="{{ $dest->id }}|{{ $dest->descripcion }}">
                                {{ $dest->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    <label style="font-size: 10px;" for="floatingSelect">LUGAR SALIDA</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating mb-2">
                    <select class="form-select rounded-md" name="lugar_destino" id="floatingSelect">
                        <option>- Seleccione -</option>
                        @foreach ($destinos as $dest)
                            <option value="{{ $dest->id }}|{{ $dest->descripcion }}">
                                {{ $dest->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    <label style="font-size: 10px;" for="floatingSelect">LUGAR DESTINO</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-floating mb-2">
                    <input type="number" class="form-control rounded-md" id="floatingNombreEmbarcacion"
                        placeholder="NOMBRE DE LA EMBARCACIÓN" name="cantidad_tripulantes" />
                    <label style="font-size: 10px;" for="floatingNombreEmbarcacion">CANTIDAD TRIPULANTES</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-2">
                    <input type="number" class="form-control rounded-md" id="floatinMatricula"
                        placeholder="CANTIDAD PASAJEROS" name="cantidad_pasajeros"
                        name="cantidad_pasajeros" />
                    <label style="font-size: 10px;" for="floatinMatricula">CANTIDAD PASAJEROS</label>
                </div>
            </div>

        </div>
    </div>
    <div class="card-footer">
        <div class="float-end">
            <a href="{{ route('movimientos.despachos.index') }}"
                class="inline-flex items-center px-3 py-2 bg- bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
            <button type="submit"
                class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send"> Enviar<i
                    class="mdi mdi-send ml-2"></i></button>
        </div>
    </div>
</div>




        </form>
    </div>
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
                                console.log(json[0].nombres)
                                if (json[0].nombres != '') {
                                    $('.nombre_capitan').val(json[0].nombres + ' ' + json[0].apellidos);
                                    $('.nombre_capitan').attr('readonly', true);
                                } else {
                                    $('.nombre_capitan').attr('readonly', false).val('');
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

            $('input').prop('required', true);
            $('select').prop('required', true);

            $('[required]').css({
                'border-left': '2px solid red'
            });
        </script>
    @endpush

</x-app-layout>

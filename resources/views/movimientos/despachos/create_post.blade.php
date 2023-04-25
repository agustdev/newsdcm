<x-app-layout>
    @section('titulo', 'Solicitud de Despachos')
    @push('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-3 mt-2">
            {{ __('Solicitud Despacho') }}
        </h2>
    </x-slot>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">

        <form action="{{ route('movimientos.despachos.store') }}" method="POST" class="form-inline" autocomplete="off">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12 mb-2">
                        <h3 class="h4 uppercase">Número de solicitud: {{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="alert alert-warning" role="alert">
                            <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatinMatricula" placeholder="MATRICULA"
                                    name="matricula" readonly value="{{ $embarcacion->matricula }}" />
                                <label for="floatinMatricula">MATRÍCULA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingNombreEmbarcacion"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre" readonly
                                    value="{{ $embarcacion->nombre }}" />
                                <label for="floatingNombreEmbarcacion">NOMBRE DE LA EMBARCACIÓN</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingNumeroCasco"
                                    placeholder="NUMERO DE CASCO" name="numero_casco" readonly
                                    value="{{ $embarcacion->no_chasis }}" />
                                <label for="floatingNumeroCasco">NUMERO DE CASCO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingColor"
                                    placeholder="COLOR DE LA EMBARCACIÓN" readonly name="color"
                                    value="{{ $embarcacion->color }}" />
                                <label for="floatingColor">COLOR</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="alert alert-info mt-2" role="alert">
                            <strong>INFORMACIÓN DEL CAPITÁN</strong>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control documento" id="floatinDocumento"
                                    placeholder="Documento" name="documento" />
                                <label for="floatinMatricula">DOCUMENTO DE IDENTIDAD DEL CAPITÁN</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_capitan" id="floatingNombreCapitan"
                                    placeholder="NOMBRE Y APELLIDO DEL CAPITAN" value="" name="nombre_capitan" />
                                <label for="floatingNombreEmbarcacion">NOMBRE Y APELLIDO DEL CAPITÁN</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nacionalidad" id="floatinMatricula"
                                    placeholder="name@example.com" name="nacionalidad" value="" />
                                <label for="floatinMatricula">NACIONALIDAD DEL CAPITÁN</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control telefono" id="floatingNombreEmbarcacion"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="telefono" />
                                <label for="floatingNombreEmbarcacion">TELÉFONO DEL CAPITÁN</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control motivo_viaje" id="floatinMatricula"
                                    placeholder="name@example.com" name="motivo_viaje" />
                                <label for="floatinMatricula">MOTIVO DEL VIAJE</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="date" class="form-control" id="floatingFecha" placeholder="FECHA"
                                    name="fecha" min="{{ date('Y-m-d') }}" />
                                <label for="floatingFecha">FECHA SALIDA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="lugar_salida" id="floatingSelect">
                                    <option>- Seleccione -</option>
                                    @foreach($destinos as $dest)
                                    <option value="{{ $dest->id }}|{{ $dest->descripcion }}">{{ $dest->descripcion }}
                                    </option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">LUGAR SALIDA</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="lugar_destino" id="floatingSelect">
                                    <option>- Seleccione -</option>
                                    @foreach($destinos as $dest)
                                    <option value="{{ $dest->id }}|{{ $dest->descripcion }}">{{ $dest->descripcion }}
                                    </option>

                                    @endforeach
                                </select>
                                <label for="floatingSelect">LUGAR DESTINO</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="floatingNombreEmbarcacion"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="cantidad_tripulantes" />
                                <label for="floatingNombreEmbarcacion">CANTIDAD TRIPULANTES</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="floatinMatricula"
                                    placeholder="CANTIDAD PASAJEROS" name="cantidad_pasajeros"
                                    name="cantidad_pasajeros" />
                                <label for="floatinMatricula">CANTIDAD PASAJEROS</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.despachos.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150"><i
                                class="mdi mdi-send mr-2"></i> Enviar</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
            <input type="hidden" name="user" value="{{ auth()->user()->id }}">

        </form>
    </div>
    @push('js')

    <script>
        // Initiate an Ajax request on button click

        // $(document).on("focusout", ".documento", function() {
        //     var documento = $(this).val();
        //     var tipo = $('.tipo_documento').val();
        //     if (documento != '') {
        //         $.post("https://newsdcm.cdp.mil.do/public/consulta", {
        //             documento: documento
        //             , tipo: tipo
        //             , _token: $('input[name="_token"]').val()
        //         }, function(data) {
        //             json = $.parseJSON(data);
        //             if (json[0].nombres != '') {
        //                 $('.nombre').val(json[0].nombres + ' ' + json[0].apellidos);
        //             } else {
        //                 $('.nombre').attr('readonly', false).val('');
        //             }

        //         });
        //     }
        // });

        // Add remove loading class on body element based on Ajax request status
        // $(document).on({
        //     ajaxStart: function() {
        //         $(".spin").css('display', 'inline-block');
        //         $('.nombre').attr('readonly', true);
        //         $('button').attr('disabled', true);
        //     }
        //     , ajaxStop: function() {
        //         $(".spin").css('display', 'none');
        //         $('button').attr('disabled', false);

        //     }
        // });

    </script>

    @endpush

</x-app-layout>
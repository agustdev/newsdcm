<x-app-layout>
    @section('titulo', __('Registro de usuarios operativos'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
        <!-- Datatables css -->
        <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <style>
            textarea {
                border-right: 1px solid #6b7280 !important;
                border-top: 1px solid #6b7280 !important;
                border-bottom: 1px solid #6b7280 !important;
            }
        </style>
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-4 mt-4 text-black uppercase">
            {{ __('Registro de movimiento de entrada') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('solicitudes.navieras.entradas.store') }}" method="POST">
                @csrf
                <x-card>
                    <x-slot name="title">
                        {{ __('Datos de la embarcación') }}
                        <div role="status" class="spin-user float-end hidden">
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
                    </x-slot>
                    <x-slot name="content">
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="NOMBRE DE LA EMBARCACION" value="" name="name_ship"
                                        required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('NOMBRE DE LA EMBARCACION') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="NUMERO DE IMO" value="" name="number_imo" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('NUMERO DE IMO') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="LLAMADA DE SEÑAL" value="" name="call_sign" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('LLAMADA DE SEÑAL') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="NÚMERO DE VIAJE" value="" name="number_voyage" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('NÚMERO DE VIAJE') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="PUERTO DE SALIDA" value="" name="port_salida_llegada"
                                        required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('PUERTO DE SALIDA') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="datetime-local" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="FECHA Y HORA DE SALIDA" value=""
                                        name="datetime_salida_llegada" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('FECHA Y HORA DE SALIDA') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="ESTADO DE BANDERA" value="" name="flag_state" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('ESTADO DE BANDERA') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="NOMBRE DEL CAPITAN" value="" name="name_master"
                                        required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('NOMBRE DEL CAPITAN') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="ULTIMO/SIGUIENTE PUERTO DE ESCALA" value=""
                                        name="last_port_call" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('ULTIMO/SIGUIENTE PUERTO DE ESCALA') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="CERTIFICADO DE REGISTRO (PUERTO, FECHA, NUMERO)" value=""
                                        name="certificate_registry" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('CERTIFICADO DE REGISTRO (PUERTO, FECHA, NUMERO)') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <textarea id="floatingNameShip" name="" id="" cols="30" rows="10"
                                        class="form-control rounded-md" placeholder="NOMBRE Y DATOS DE CONTACTO DEL AGENTE DEL BUQUE" value=""
                                        name="name_contact_ship" required></textarea>
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('NOMBRE Y DATOS DE CONTACTO DEL AGENTE DEL BUQUE') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="TONELAJE GRUESO" value="" name="gross_tonnage" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('TONELAJE GRUESO') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="TONELAJE NETO" value="" name="net_tonnage" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('TONELAJE NETO') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <textarea id="floatingNameShip" name="" id="" cols="30" rows="10"
                                        class="form-control rounded-md"
                                        placeholder="Breves detalles del viaje (puertos de escala anteriores y posteriores; subrayar dónde se descargará la carga restante)"
                                        value="" name="brief_particulars" required></textarea>
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('Breves detalles del viaje (puertos de escala anteriores y posteriores; subrayar dónde se descargará la carga restante)') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <textarea id="floatingNameShip" name="" id="" cols="30" rows="10"
                                        class="form-control rounded-md" placeholder="Breve descripción de la carga." value=""
                                        name="brief_description" required></textarea>
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('Breve descripción de la carga.') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="NUMERO DE TRIPULANTES" value="" name="number_crew"
                                        required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('NUMERO DE TRIPULANTES') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="NUMERO DE PASAJEROS" value="" name="number_passengers"
                                        required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('NUMERO DE PASAJEROS') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <textarea id="floatingNameShip" name="" id="" cols="30" rows="10"
                                        class="form-control rounded-md" placeholder="OBSERVACIONES" value="" name="remarks" required></textarea>
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('OBSERVACIONES') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="DECLARACION DE CARGA" value="" name="cargo_declaration"
                                        required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('DECLARACION DE CARGA') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="Declaración de provisiones del buque" value=""
                                        name="ship_stores_declaration" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('Declaración de provisiones del buque') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="LISTA DE TRIPULANTES" value="" name="crew_list"
                                        required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('LISTA DE TRIPULANTES') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="LISTA DE PASAJEROS" value="" name="passenger_list"
                                        required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('LISTA DE PASAJEROS') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="Declaración de efectos de la tripulación (sólo a la llegada)"
                                        value="" name="crew_effects_declaration" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('Declaración de efectos de la tripulación (sólo a la llegada)') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="Las necesidades del buque en cuanto a instalaciones receptoras de desechos y residuos"
                                        value="" name="the_ship_requiriments" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('Las necesidades del buque en cuanto a instalaciones receptoras de desechos y residuos') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="Declaración Marítima de Sanidad (sólo a la llegada)"
                                        value="" name="maritime_declaration_health" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('Declaración Marítima de Sanidad (sólo a la llegada)') }}</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating mb-2">
                                    <input type="file" class="form-control rounded-md" id="floatingNameShip"
                                        placeholder="Fecha y firma del capitán, agente autorizado o funcionario"
                                        value="" name="passenger_list" required />
                                    <label style="font-size: 10px;"
                                        for="floatingNameShip">{{ __('Fecha y firma del capitán, agente autorizado o funcionario') }}</label>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="content_footer">
                        <div class="float-end">
                            <a href="{{ route('movimientos.conduces.index') }}"
                                class="inline-flex items-center px-3 py-2 bg- bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
                            <button type="submit"
                                class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send">
                                {{ __('Enviar') }}<i class="mdi mdi-send ml-2"></i></button>
                        </div>
                    </x-slot>
                </x-card>
            </form>
        </div>
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
                                $(".spin-user").css('display', 'inline-block');
                                $('button').attr('disabled', true);
                            },
                            success: function(data) {
                                json = $.parseJSON(data);
                                console.log(json[0].nacionalidad)
                                if (json[0].nombres != '') {
                                    $('.nombre_usuario').val(json[0].nombres + ' ' + json[0].apellidos);
                                    $('.nombre_usuario').attr('readonly', true);
                                } else {
                                    $('.nombre_usuario').attr('readonly', false).val('');
                                }

                            },
                            complete: function() {
                                $(".spin-user").css('display', 'none');
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

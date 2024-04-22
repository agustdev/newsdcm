<x-app-layout>
    @section('titulo', 'Solicitud de Conduces')
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-3 mt-2">
            {{ __('Solicitud de Conduce') }}
        </h2>
    </x-slot>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">

        <form action="{{ route('movimientos.conduces.store') }}" method="POST" class="form-inline" autocomplete="off">
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
                            <div role="status" class="spinm float-end hidden">
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
                                <input type="text" class="form-control matricula" id="floatinMatricula"
                                    placeholder="MATRICULA" name="matricula" value="" required />
                                <label for="floatinMatricula">MATRÍCULA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_emb" id="floatingNombreEmbarcacion"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre" readonly value=""
                                    required />
                                <label for="floatingNombreEmbarcacion">NOMBRE DE LA EMBARCACIÓN</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control numero_casco" id="floatingNumeroCasco"
                                    placeholder="NUMERO DE CASCO" name="numero_casco" readonly value=""
                                    required />
                                <label for="floatingNumeroCasco">NUMERO DE CASCO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control color_emb" id="floatingColor"
                                    placeholder="COLOR DE LA EMBARCACIÓN" readonly name="color_emb" value=""
                                    required />
                                <label for="floatingColor">COLOR</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="alert alert-info mt-2" role="alert">
                            <strong>INFORMACIÓN DEL VEHÍCULO / CONDUCTOR / DESTINO</strong>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control documento" id="floatinDocumento"
                                    placeholder="Documento" name="documento" required />
                                <label for="floatinDocumento">DOCUMENTO DE IDENTIDAD DEL CONDUCTOR</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_capitan" id="floatingNombreConductor"
                                    placeholder="NOMBRE Y APELLIDO DEL CONDUCTOR" value="" name="nombre_conductor"
                                    required />
                                <label for="floatingNombreConductor">NOMBRE Y APELLIDO DEL CONDUCTOR</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control telefono1" id="floatingTelefonoConductor"
                                    placeholder="TELEFONO CONDUCTOR" name="telefono_conductor" value=""
                                    required />
                                <label for="floatingTelefonoConductor">TELÉFONO DEL CONDUCTOR</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control telefono2" id="floatingTelefono2Conductor"
                                    placeholder="OTRO TELÉFONO DEL CONDUCTOR" name="telefono_conductor_otro"
                                    value="" />
                                <label for="floatingTelefono2Conductor">OTRO TELÉFONO DEL CONDUCTOR</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span
                            class="bg-gray-100 text-gray-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-gray-700 dark:text-gray-300">
                            DATOS DEL VEHÍCULO</span>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control marca" id="floatingMarcaModelo"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="marca" required />
                                <label for="floatingMarcaModelo">MARCA Y MODELO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control color" id="floatinColor"
                                    placeholder="COLOR" name="color" required />
                                <label for="floatinColor">COLOR</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control year" id="floatingYear" placeholder="AÑO"
                                    name="year" />
                                <label for="floatingYear">AÑO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control placa" id="floatingPlaca"
                                    placeholder="PLACA" name="placa" />
                                <label for="floatingPlaca">PLACA</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span
                            class="bg-yellow-100 text-yellow-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-yellow-700 dark:text-yellow-300">
                            LUGAR SALIDA
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
                                <label for="floatingFechaSalida">FECHA SALIDA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="provinciasalida"
                                    id="floatingSelectProvinciaSalida">
                                    <option>- Seleccione -</option>
                                    @foreach ($provincias as $prov)
                                        <option value="{{ $prov->id }}|{{ $prov->descripcion }}">
                                            {{ $prov->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectProvinciaSalida">PROVINCIA SALIDA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="municipiosalida"
                                    id="floatingSelectMunicipioSalida">
                                    <option>- Seleccione -</option>
                                </select>
                                <label for="floatingSelectMunicipioSalida">MUNICIPIO</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span
                            class="bg-blue-100 text-blue-600 text-sm font-medium mr-2 px-2.5 py-1.5 mb-1 rounded dark:bg-blue-700 dark:text-blue-300">
                            LUGAR DESTINO
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
                                    <option>- Seleccione -</option>
                                    @foreach ($provincias as $prov)
                                        <option value="{{ $prov->id }}|{{ $prov->descripcion }}">
                                            {{ $prov->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingSelectProvincia">PROVINCIA</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select" name="municipio" id="floatingSelectMunicipio">
                                    <option>- Seleccione -</option>
                                </select>
                                <label for="floatingSelectMunicipio">MUNICIPIO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingSector" placeholder="SECTOR"
                                    name="sector" />
                                <label for="floatingSector">SECTOR</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatingCalle" placeholder="CALLE"
                                    name="calle" />
                                <label for="floatingCalle">CALLE</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="floatinObservacion"
                                    placeholder="OBSERVACIÓN" name="observacion" />
                                <label for="floatinObservacion">OBSERVACIÓN</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('movimientos.conduces.index') }}"
                            class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">Atras</a>
                        <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send"><i
                                class="mdi mdi-send mr-2"></i> Enviar</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="mov" value="{{ empty($ultimo_mov) ? 1 : $ultimo_mov->id + 1 }}">
            <input type="hidden" name="user" value="{{ auth()->user()->id }}">
            <input type="hidden" name="comandancia" class="comandancia" value="">
            <input type="hidden" name="idcomandancia" class="idcomandancia" value="">

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

            $(document).on({
                ajaxStart: function() {
                    $(".spin").css('display', 'inline-block');
                    // $('.nombre').attr('readonly', true);
                    $('button.send').attr({
                        disabled: true,
                        type: 'button'
                    });
                },
                ajaxStop: function() {
                    $(".spin").css('display', 'none');
                    $('button.send').attr({
                        disabled: false,
                        type: 'submit'
                    });
                }
            });

            function autocomplete(inp, arr) {
                /*the autocomplete function takes two arguments,
                the text field element and an array of possible autocompleted values:*/
                var currentFocus;
                /*execute a function when someone writes in the text field:*/
                inp.addEventListener("input", function(e) {
                    var a, b, i, val = this.value;
                    /*close any already open lists of autocompleted values*/
                    closeAllLists();
                    if (!val) {
                        return false;
                    }
                    currentFocus = -1;
                    /*create a DIV element that will contain the items (values):*/
                    a = document.createElement("DIV");
                    a.setAttribute("id", this.id + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    /*append the DIV element as a child of the autocomplete container:*/
                    this.parentNode.appendChild(a);
                    /*for each item in the array...*/
                    for (i = 0; i < arr.length; i++) {
                        /*check if the item starts with the same letters as the text field value:*/
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                            /*create a DIV element for each matching element:*/
                            b = document.createElement("DIV");
                            b.setAttribute("class", "emb_matricula");
                            /*make the matching letters bold:*/
                            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                            b.innerHTML += arr[i].substr(val.length);
                            /*insert a input field that will hold the current array item's value:*/
                            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                            /*execute a function when someone clicks on the item value (DIV element):*/
                            b.addEventListener("click", function(e) {
                                /*insert the value for the autocomplete text field:*/
                                inp.value = this.getElementsByTagName("input")[0].value;
                                // codigo para consultar por ajax la matricula y devolver el autocompletado de los demas campos
                                // alert(inp.value)
                                $(document).on("click", ".emb_matricula", function() {
                                    $.post('{{ route('consulta.embarcacion') }}', {
                                        matricula: inp.value,
                                        _token: $('input[name="_token"]').val()
                                    }, function(data) {
                                        json = $.parseJSON(data);
                                        $('.nombre_emb').val(json.nombre);
                                        $('.numero_casco').val(json.no_chasis);
                                        $('.color_emb').val(json.color);
                                        console.log(json)
                                        if (json.matricula == '') {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops.... Embarcación no encontrada',
                                                text: 'La embarcación que busca no se encuentra, puede que la matricula este vencida, o no pertenezca a esta cuenta de usuario.',
                                                confirmButtonColor: '#2563EB',
                                                confirmButtonText: '¡Aceptar!'
                                            }).then((result) => {
                                                if (result.isConfirmed || result
                                                    .dismiss) {
                                                    $('button.send').attr({
                                                        disabled: true,
                                                        type: 'button'
                                                    });
                                                }
                                            })
                                        }
                                    });
                                });

                                // Add remove loading class on body element based on Ajax request status
                                $(document).on({
                                    ajaxStart: function() {
                                        $(".spinm").css('display', 'inline-block');
                                        // $('.nombre').attr('readonly', true);
                                        $('button.send').attr({
                                            disabled: true,
                                            type: 'button'
                                        });
                                    },
                                    ajaxStop: function() {
                                        $(".spinm").css('display', 'none');
                                        $('button.send').attr({
                                            disabled: false,
                                            type: 'submit'
                                        });

                                    }
                                });
                                /*close the list of autocompleted values,
                                (or any other open lists of autocompleted values:*/
                                closeAllLists();
                            });
                            a.appendChild(b);
                        }
                    }
                });
                /*execute a function presses a key on the keyboard:*/
                inp.addEventListener("keydown", function(e) {
                    var x = document.getElementById(this.id + "autocomplete-list");
                    if (x) x = x.getElementsByTagName("div");
                    if (e.keyCode == 40) {
                        /*If the arrow DOWN key is pressed,
                        increase the currentFocus variable:*/
                        currentFocus++;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 38) { //up
                        /*If the arrow UP key is pressed,
                        decrease the currentFocus variable:*/
                        currentFocus--;
                        /*and and make the current item more visible:*/
                        addActive(x);
                    } else if (e.keyCode == 13) {
                        /*If the ENTER key is pressed, prevent the form from being submitted,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                            /*and simulate a click on the "active" item:*/
                            if (x) x[currentFocus].click();
                        }
                    }
                });

                function addActive(x) {
                    /*a function to classify an item as "active":*/
                    if (!x) return false;
                    /*start by removing the "active" class on all items:*/
                    removeActive(x);
                    if (currentFocus >= x.length) currentFocus = 0;
                    if (currentFocus < 0) currentFocus = (x.length - 1);
                    /*add class "autocomplete-active":*/
                    x[currentFocus].classList.add("autocomplete-active");
                }

                function removeActive(x) {
                    /*a function to remove the "active" class from all autocomplete items:*/
                    for (var i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                    }
                }

                function closeAllLists(elmnt) {
                    /*close all autocomplete lists in the document,
                    except the one passed as an argument:*/
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                        if (elmnt != x[i] && elmnt != inp) {
                            x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }
                /*execute a function when someone clicks in the document:*/
                document.addEventListener("click", function(e) {
                    closeAllLists(e.target);
                });
                // evento on focusout para validar si tratan de ingresar una matricula inexitente
                $(document).on("focusout", ".matricula", function() {
                    $(this).val($(this).val().toUpperCase())
                    // console.log($(this).val().length)
                    if ($(this).val().length > 2) {
                        $.post('{{ route('consulta.embarcacion') }}', {
                            matricula: inp.value,
                            _token: $('input[name="_token"]').val()
                        }, function(data) {
                            json = $.parseJSON(data);
                            console.log(json);
                            $('.nombre_emb').val(json.nombre);
                            $('.numero_casco').val(json.no_chasis);
                            $('.color_emb').val(json.color);
                            if (json.matricula == '') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops.... Embarcación no encontrada',
                                    text: 'La embarcación que busca no se encuentra, puede que la matricula este vencida, o no pertenezca a esta cuenta de usuario.',
                                    confirmButtonColor: '#2563EB',
                                    confirmButtonText: '¡Aceptar!'
                                }).then((result) => {
                                    if (result.isConfirmed || result.dismiss) {
                                        $('button.send').attr({
                                            disabled: true,
                                            type: 'button'
                                        });
                                    }
                                })
                            }
                        });
                    }
                }).delay(5000);
                $(document).on({
                    ajaxStart: function() {
                        $(".spinm").css('display', 'inline-block');
                        // $('.nombre').attr('readonly', true);
                        $('button.send').attr({
                            disabled: true,
                            type: 'button'
                        });
                    },
                    ajaxStop: function() {
                        $(".spinm").css('display', 'none');
                        $('button.send').attr({
                            disabled: false,
                            type: 'submit'
                        });
                    }
                });
            }

            /*An array containing all the country names in the world:*/
            var embarcaciones = {!! $embarcaciones !!};

            /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
            autocomplete(document.getElementById("floatinMatricula"), embarcaciones);
            $(".matricula").on("keypress", function() {
                $(this).val($(this).val().toUpperCase())
            });
        </script>
    @endpush

</x-app-layout>

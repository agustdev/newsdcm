<x-app-layout>
    @section('titulo', 'Solicitud de Despachos')
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
        <style>
            /*the container must be positioned relative:*/
            .autocomplete {
                position: relative;
                display: inline-block;
            }

            .autocomplete-items {
                position: absolute;
                border: 1px solid #d4d4d4;
                border-bottom: none;
                border-top: none;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 100%;
                left: 0;
                right: 0;
            }

            .autocomplete-items div {
                padding: 10px;
                cursor: pointer;
                background-color: #fff;
                border-bottom: 1px solid #d4d4d4;
            }

            /*when hovering an item:*/
            .autocomplete-items div:hover {
                background-color: #e9e9e9;
            }

            /*when navigating through the items using the arrow keys:*/
            .autocomplete-active {
                background-color: DodgerBlue !important;
                color: #ffffff;
            }
        </style>
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
                            <div class="inline-block float-start">
                                <strong>INFORMACIÓN DE LA EMBARCACIÓN</strong>
                            </div>
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
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                {{-- <input type="text" class="form-control matricula" id="floatinMatricula"
                                    placeholder="MATRICULA" name="matricula" /> --}}

                                <select name="matricula" class="form-select emb_matricula" id="floatinMatricula">
                                    @if ($embarcaciones->count() > 0)
                                        <option value="">- Seleccione -</option>
                                        @foreach ($embarcaciones as $embarcacion)
                                            <option value="{{ $embarcacion->matricula }}">{{ $embarcacion->matricula }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="">- Sin embarcaciones disponible -</option>
                                    @endif
                                </select>
                                <label for="floatinMatricula">MATRÍCULA</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_emb" id="floatingNombreEmbarcacion"
                                    placeholder="NOMBRE DE LA EMBARCACIÓN" name="nombre" readonly />
                                <label for="floatingNombreEmbarcacion">NOMBRE DE LA EMBARCACIÓN</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control numero_casco" id="floatingNumeroCasco"
                                    placeholder="NUMERO DE CASCO" name="numero_casco" readonly />
                                <label for="floatingNumeroCasco">NÚMERO DE CASCO</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control color" id="floatingColor"
                                    placeholder="COLOR DE LA EMBARCACIÓN" readonly name="color" />
                                <label for="floatingColor">COLOR</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="alert alert-info mt-2" role="alert">
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
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select tipo_documento" name="tipo_documento" id="floatingSelect">
                                    <option>- Seleccione -</option>
                                    <option value="cedula">Cédula</option>
                                    <option value="pasaporte">Pasaporte</option>
                                </select>
                                <label for="floatinMatricula">TIPO DE DOCUMENTO</label>
                            </div>
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
                                    @foreach ($destinos as $dest)
                                        <option value="{{ $dest->id }}|{{ $dest->descripcion }}">
                                            {{ $dest->descripcion }}
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
                                    @foreach ($destinos as $dest)
                                        <option value="{{ $dest->id }}|{{ $dest->descripcion }}">
                                            {{ $dest->descripcion }}
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
                            class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send"><i
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
                        // $.post("{{ route('consultar.cedula') }}", {
                        //     documento: documento,
                        //     tipo: tipo,
                        //     _token: $('input[name="_token"]').val()
                        // }, function(data) {
                        //     $(".spin-cap").css('display', 'inline-block');
                        //     $('.nombre_capitan').attr('readonly', true);
                        //     $('button').attr('disabled', true);
                        //     json = $.parseJSON(data);
                        //     console.log(json[0].nombres)
                        //     if (json[0].nombres != '') {
                        //         $('.nombre_capitan').val(json[0].nombres + ' ' + json[0].apellidos);
                        //     } else {
                        //         $('.nombre_capitan').attr('readonly', false).val('');
                        //     }

                        // }).done(function(data) {
                        //     $(".spin-cap").css('display', 'none');
                        //     $('button').attr('disabled', false);
                        // });
                    }
                } else {

                }

            });
        </script>

        <script>
            // function autocomplete(inp, arr) {
            //     /*the autocomplete function takes two arguments,
            //     the text field element and an array of possible autocompleted values:*/
            //     var currentFocus;
            //     /*execute a function when someone writes in the text field:*/
            //     inp.addEventListener("input", function(e) {
            //         var a, b, i, val = this.value;
            //         /*close any already open lists of autocompleted values*/
            //         closeAllLists();
            //         if (!val) {
            //             return false;
            //         }
            //         currentFocus = -1;
            //         /*create a DIV element that will contain the items (values):*/
            //         a = document.createElement("DIV");
            //         a.setAttribute("id", this.id + "autocomplete-list");
            //         a.setAttribute("class", "autocomplete-items");
            //         /*append the DIV element as a child of the autocomplete container:*/
            //         this.parentNode.appendChild(a);
            //         /*for each item in the array...*/
            //         for (i = 0; i < arr.length; i++) {
            //             /*check if the item starts with the same letters as the text field value:*/
            //             if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            //                 /*create a DIV element for each matching element:*/
            //                 b = document.createElement("DIV");
            //                 b.setAttribute("class", "emb_matricula");
            //                 /*make the matching letters bold:*/
            //                 b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            //                 b.innerHTML += arr[i].substr(val.length);
            //                 /*insert a input field that will hold the current array item's value:*/
            //                 b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            //                 /*execute a function when someone clicks on the item value (DIV element):*/
            //                 b.addEventListener("click", function(e) {
            //                     /*insert the value for the autocomplete text field:*/
            //                     inp.value = this.getElementsByTagName("input")[0].value;
            //                     // codigo para consultar por ajax la matricula y devolver el autocompletado de los demas campos
            //                     // alert(inp.value)
            //                     // $(document).on("click", ".emb_matricula", function() {
            //                     //     $.post('{{ route('consulta.embarcacion') }}', {
            //                     //         matricula: inp.value,
            //                     //         _token: $('input[name="_token"]').val()
            //                     //     }, function(data) {
            //                     //         json = $.parseJSON(data);
            //                     //         $('.nombre_emb').val(json.nombre);
            //                     //         $('.numero_casco').val(json.no_chasis);
            //                     //         $('.color').val(json.color);
            //                     //         console.log(json)
            //                     //         if (json.matricula == '') {
            //                     //             Swal.fire({
            //                     //                 icon: 'error',
            //                     //                 title: 'Oops.... Embarcación no encontrada',
            //                     //                 text: 'La embarcación que busca no se encuentra, puede que la matricula este vencida, o no pertenezca a esta cuenta de usuario.',
            //                     //                 confirmButtonColor: '#2563EB',
            //                     //                 confirmButtonText: '¡Aceptar!'
            //                     //             }).then((result) => {
            //                     //                 if (result.isConfirmed || result
            //                     //                     .dismiss) {
            //                     //                     $('button.send').attr({
            //                     //                         disabled: true,
            //                     //                         type: 'button'
            //                     //                     });
            //                     //                 }
            //                     //             })
            //                     //         }
            //                     //     });
            //                     // });

            //                     // Add remove loading class on body element based on Ajax request status
            //                     $(document).on({
            //                         ajaxStart: function() {
            //                             $(".spin").css('display', 'inline-block');
            //                             // $('.nombre').attr('readonly', true);
            //                             $('button.send').attr({
            //                                 disabled: true,
            //                                 type: 'button'
            //                             });
            //                         },
            //                         ajaxStop: function() {
            //                             $(".spin").css('display', 'none');
            //                             $('button.send').attr({
            //                                 disabled: false,
            //                                 type: 'submit'
            //                             });

            //                         }
            //                     });
            //                     /*close the list of autocompleted values,
            //                     (or any other open lists of autocompleted values:*/
            //                     closeAllLists();
            //                 });
            //                 a.appendChild(b);
            //             }
            //         }
            //     });
            //     /*execute a function presses a key on the keyboard:*/
            //     inp.addEventListener("keydown", function(e) {
            //         var x = document.getElementById(this.id + "autocomplete-list");
            //         if (x) x = x.getElementsByTagName("div");
            //         if (e.keyCode == 40) {
            //             /*If the arrow DOWN key is pressed,
            //             increase the currentFocus variable:*/
            //             currentFocus++;
            //             /*and and make the current item more visible:*/
            //             addActive(x);
            //         } else if (e.keyCode == 38) { //up
            //             /*If the arrow UP key is pressed,
            //             decrease the currentFocus variable:*/
            //             currentFocus--;
            //             /*and and make the current item more visible:*/
            //             addActive(x);
            //         } else if (e.keyCode == 13) {
            //             /*If the ENTER key is pressed, prevent the form from being submitted,*/
            //             e.preventDefault();
            //             if (currentFocus > -1) {
            //                 /*and simulate a click on the "active" item:*/
            //                 if (x) x[currentFocus].click();
            //             }
            //         }
            //     });

            //     function addActive(x) {
            //         /*a function to classify an item as "active":*/
            //         if (!x) return false;
            //         /*start by removing the "active" class on all items:*/
            //         removeActive(x);
            //         if (currentFocus >= x.length) currentFocus = 0;
            //         if (currentFocus < 0) currentFocus = (x.length - 1);
            //         /*add class "autocomplete-active":*/
            //         x[currentFocus].classList.add("autocomplete-active");
            //     }

            //     function removeActive(x) {
            //         /*a function to remove the "active" class from all autocomplete items:*/
            //         for (var i = 0; i < x.length; i++) {
            //             x[i].classList.remove("autocomplete-active");
            //         }
            //     }

            //     function closeAllLists(elmnt) {
            //         /*close all autocomplete lists in the document,
            //         except the one passed as an argument:*/
            //         var x = document.getElementsByClassName("autocomplete-items");
            //         for (var i = 0; i < x.length; i++) {
            //             if (elmnt != x[i] && elmnt != inp) {
            //                 x[i].parentNode.removeChild(x[i]);
            //             }
            //         }
            //     }
            //     /*execute a function when someone clicks in the document:*/
            //     document.addEventListener("click", function(e) {
            //         closeAllLists(e.target);
            //     });
            //     // evento on focusout para validar si tratan de ingresar una matricula inexitente
            //     $(".matricula").on("focusout", function() {
            //         $(this).val($(this).val().toUpperCase())
            //         // console.log($(this).val().length)
            //         if ($(this).val().length > 2) {
            //             $.post('{{ route('consulta.embarcacion') }}', {
            //                 matricula: inp.value,
            //                 _token: $('input[name="_token"]').val()
            //             }, function(data) {
            //                 json = $.parseJSON(data);
            //                 console.log(json);
            //                 $('.nombre_emb').val(json.nombre);
            //                 $('.numero_casco').val(json.no_chasis);
            //                 $('.color').val(json.color);
            //                 if (json.matricula == '') {
            //                     Swal.fire({
            //                         icon: 'error',
            //                         title: 'Oops.... Embarcación no encontrada',
            //                         text: 'La embarcación que busca no se encuentra, puede que la matricula este vencida, o no pertenezca a esta cuenta de usuario.',
            //                         confirmButtonColor: '#2563EB',
            //                         confirmButtonText: '¡Aceptar!'
            //                     }).then((result) => {
            //                         if (result.isConfirmed || result.dismiss) {
            //                             $('button.send').attr({
            //                                 disabled: true,
            //                                 type: 'button'
            //                             });
            //                         }
            //                     })
            //                 }
            //             });
            //         }
            //     });
            //     $(document).on({
            //         ajaxStart: function() {
            //             $(".spin").css('display', 'inline-block');
            //             // $('.nombre').attr('readonly', true);
            //             $('button.send').attr({
            //                 disabled: true,
            //                 type: 'button'
            //             });
            //         },
            //         ajaxStop: function() {
            //             $(".spin").css('display', 'none');
            //             $('button.send').attr({
            //                 disabled: false,
            //                 type: 'submit'
            //             });
            //         }
            //     });
            // }

            /*An array containing all the country names in the world:*/
            // var embarcaciones = {!! $embarcaciones !!};

            /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
            // autocomplete(document.getElementById("floatinMatricula"), embarcaciones);
            // $(".emb_matricula").on("change", function() {
            //     $(this).val($(this).val().toUpperCase());
            //     $(".nombre_emb").val($(".nombre_emb").val().toUpperCase())
            // });

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
                    },
                    complete: function() {
                        $(".spin-matricula").css('display', 'none');
                        $('button').attr('disabled', false);
                    }
                });
            });
        </script>
    @endpush

</x-app-layout>

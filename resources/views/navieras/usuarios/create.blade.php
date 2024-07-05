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
        <h2 class="h2 mb-2 mt-4 text-black uppercase">
            {{ __('Registro de usuarios operativos') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('usuarios.navieras.store') }}" method="POST">
                @csrf
                <x-card>
                    <x-slot name="title">
                        {{ __('Creación de usuario') }}
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
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <select class="form-select tipo_documento rounded-md" name="tipo_documento"
                                    id="floatingSelect">
                                    <option>- {{ __('Seleccione') }} -</option>
                                    <option value="cedula">{{ __('Cédula') }}</option>
                                    <option value="pasaporte">{{ __('Pasaporte') }}</option>
                                </select>
                                <label style="font-size: 10px;"
                                    for="floatinMatricula">{{ __('TIPO DE DOCUMENTO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control documento rounded-md" id="floatinDocumento"
                                    placeholder="Documento" name="documento" required />
                                <label style="font-size: 10px;"
                                    for="floatinDocumento">{{ __('DOCUMENTO DE IDENTIDAD') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control nombre_usuario rounded-md"
                                    id="floatingNombreUsuario" placeholder="NOMBRE Y APELLIDO DEL USUARIO"
                                    value="" name="name" required />
                                <label style="font-size: 10px;"
                                    for="floatingNombreUsuario">{{ __('NOMBRE Y APELLIDO DEL USUARIO') }}</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-md" id="floatingNombreUsuario"
                                    placeholder="EMAIL" value="" name="email" required />
                                <label style="font-size: 10px;" for="floatingNombreUsuario">{{ __('EMAIL') }}</label>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="content_footer">
                        <div class="float-end">
                            <a href="{{ route('movimientos.conduces.index') }}"
                                class="inline-flex items-center px-3 py-2 bg- bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-400 focus:bg-slate-500 active:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-1">{{ __('Atras') }}</a>
                            <button type="submit"
                                class="inline-flex items-center justify-center px-4 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25 send">
                                {{ __('Registrar') }}<i class="mdi mdi-save ml-2"></i></button>
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

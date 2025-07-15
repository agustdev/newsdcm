<x-app-layout>
    @section('titulo', __('Listado de mis capitanes'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
    @endpush

    <x-slot name="header">
        <h2 class="h2 mb-2 mt-3 text-black text-uppercase">
            {{ __('Mis capitanes') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h3 text-slate-600">
                        {{ __('Listado de Capitanes de Embarcaciones') }}
                        @livewire('create-capitanes')
                    </h2>
                </div>

                <div class="card-body">
                    @livewire('mis-capitanes')
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).on("focusout", ".documento", function() {
                var documento = $(this).val();
                var tipo = $('.tipo_documento').val();
                if (tipo == 'cedula') {
                    if (documento != '') {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('consultar.capitan') }}",
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            data: {
                                "documento": documento
                            },
                            beforeSend: function() {
                                $(".spin-cap").css('display', 'inline-block');
                                $('button.acept_consult').attr('disabled', true);
                            },
                            success: function(data) {
                                json = $.parseJSON(data);
                                console.log(json)
                                if (json.nombre != '') {
                                    $('.nombre_capitan').val(json.nombre + ' ' + json.apellido);
                                    $('.nombre_capitan').attr('readonly', true);
                                } else {
                                    $('.nombre_capitan').attr('readonly', false).val('');
                                }
                                // if (json[0].nacionalidad != '') {
                                //     $('.nacionalidad').val(json[0].nacionalidad);
                                // }
                            },
                            complete: function() {
                                $(".spin-cap").css('display', 'none');
                                $('button.acept_consult').attr('disabled', false);
                            }

                        });
                    }
                } else if (tipo == 'pasaporte') {
                    // uso del endpoint pasaporte
                }

            });
        </script>
    @endpush
</x-app-layout>

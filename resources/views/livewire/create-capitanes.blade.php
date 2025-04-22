<div>
    <button wire:click="$set('open', true)"
        class="inline-flex items-center justify-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end"><i
            class="mdi mdi-plus mdi-18px"></i>{{ __('Nuevo Capitan') }}</button>

    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            {{ __('REGISTRAR CAPITAN') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">{{ __('Tipo de documento') }}</x-label>
                <select name="" id=""
                    class="{{ $errors->has('tipo_documento') ? 'is-invalid' : '' }} form-control mb-2 rounded-md block w-full mt-2 uppercase tipo_documento"
                    wire:model='tipo_documento'>
                    <option value="cedula">{{ __('Cédula') }}</option>
                    {{-- <option value="pasaporte">{{ __('Pasaporte') }}</option> --}}
                    {{-- <option value="carnet_navegante">{{ __('Carnet Navegante') }}</option> --}}
                </select>

            </div>
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">{{ __('Documento de identidad') }}</x-label>
                <x-input
                    class="{{ $errors->has('documento') ? 'is-invalid' : '' }} block w-full mt-2 uppercase documento"
                    wire:model='documento'></x-input>
            </div>
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">{{ __('Nombre') }}</x-label>
                <x-input wire:model='nombre'
                    class="{{ $errors->has('nombre') ? 'is-invalid' : '' }} block w-full mt-2 uppercase nombre_capitan"></x-input>
            </div>
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">{{ __('Nacionalidad') }}</x-label>
                <select wire:model='nacionalidad'
                    class="{{ $errors->has('nacionalidad') ? 'is-invalid' : '' }} form-control mb-2 rounded-md">
                    <option value="">- {{ __('Seleccione') }} -</option>
                    @foreach ($nacionalidades as $nacionalidad)
                        <option value="{{ $nacionalidad->gentilicio }}">{{ $nacionalidad->gentilicio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3 uppercase">
                <x-label class="text-1xl">{{ __('Telefono') }}</x-label>
                <x-input class="{{ $errors->has('telefono') ? 'is-invalid' : '' }} block w-full mt-2 uppercase"
                    wire:model='telefono'></x-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button class="mr-3" wire:click="$set('open', false)">{{ __('Cancelar') }}</x-danger-button>
            <x-blue-button wire:click='update' wire:loading.attr='disabled'
                class="disabled:opacity-25 acept_consult">{{ __('Aceptar') }}</x-blue-button>
        </x-slot>
    </x-dialog-modal>

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
</div>

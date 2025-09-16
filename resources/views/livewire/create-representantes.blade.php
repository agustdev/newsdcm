<div>
    <button wire:click="$set('open', true)"
        class="inline-flex items-center justify-center px-3 py-2 bg-azulito border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 float-end"><i
            class="mdi mdi-plus mdi-18px"></i>{{ __('Nuevo Representante') }}</button>
    <x-dialog-modal wire:model='open'>
        <div class="p-6">

            <x-slot name="title">
                @if ($step === 1)
                    {{ __('Registrar Representante') }}
                @elseif($step === 2)
                    {{ __('Asignar Embarcaciones') }}
                @elseif($step === 3)
                    <i class="mdi mdi-alert text-red-600 text-4xl mr-2"></i> {{ __('Aviso importante') }}
                @endif
            </x-slot>
            <x-slot name="content">
                {{-- Paso 1 --}}
                @if ($step === 1)
                    <div class="space-y-4">
                        <div class="mb-2">
                            <x-label value="Tipo de documento" />
                            <select wire:model="tipo_documento"
                                class="mt-1 block w-full rounded border-gray-300 tipo_documento">
                                <option value="cedula">Cédula</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                            <x-input-error for="tipo_documento" class="mt-1" />
                        </div>

                        <div>
                            <x-label for="documento" value="Documento" />
                            <x-input id="documento" type="text" class="mt-1 block w-full documento"
                                wire:model.defer="documento" />
                            <x-input-error for="documento" class="mt-1" />
                        </div>
                        <div class="spin-cap" style="display: none;">
                            <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4" />
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                            </svg>

                        </div>
                        <div>
                            <x-label for="nombre" value="Nombre del Representante" />
                            <input id="nombre" type="text" class="mt-1 block w-full form-control mb-2 rounded-md"
                                wire:model.defer="nombre" @if ($tipo_documento === 'cedula') readonly @endif />
                            <x-input-error for="nombre" class="mt-1" />
                        </div>

                        @if ($tipo_documento === 'pasaporte')
                            <div class="mt-3 uppercase">
                                <x-label class="text-1xl">{{ __('Nacionalidad') }}</x-label>
                                <select wire:model.defer='nacionalidad'
                                    class="{{ $errors->has('nacionalidad') ? 'is-invalid' : '' }} form-control mb-2 rounded-md">
                                    <option value="">- {{ __('Seleccione') }} -</option>
                                    @foreach ($nacionalidades as $nacionalidad)
                                        <option value="{{ $nacionalidad->gentilicio }}">{{ $nacionalidad->gentilicio }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-label for="imagen_documento" value="Foto del documento (Pasaporte)"></x-label>
                                <x-input id="imagen_documento" type="file" class="mt-1 block w-full"
                                    wire:model="imagen_documento" accept="image/*" />
                                <x-input-error for="imagen_documento" class="mt-1" />
                            </div>
                        @endif
                    </div>
                @endif

                {{-- Paso 2 --}}
                @if ($step === 2)
                    <div>
                        @php
                            $embarcaciones = auth()->user()->embarcaciones;
                        @endphp
                        <x-label value="Seleccione embarcaciones para asignar:" />
                        @livewire('show-embarcaciones', ['selectedEmb' => &$selectedEmb], key('show-embarc'))

                        @error('selectedEmb')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                {{-- Paso 3: Confirmación y condiciones --}}
                @if ($step === 3)
                    <div class="space-y-4">
                        <div class="p-3 border rounded bg-gray-50 text-sm text-gray-700 max-h-40 overflow-y-auto">
                            <p><strong>Condiciones del registro:</strong></p>
                            <p class="mt-2 text-justify">
                                Al confirmar este registro, usted declara que los datos ingresados del representante,
                                son verídicos y que la asignación de embarcaciones ha sido revisada cuidadosamente. Este
                                registro será utilizado con fines administrativos y de control institucional. Asimismo,
                                queda establecido que tanto el propietario de la embarcación como el representante
                                designado, asumen la responsabilidad de darle el uso correcto a las embarcación
                                asignadas. En caso de que la misma sea utilizada en actividades delictivas o ilícitas;
                                ambas partes podrán ser objeto de investigaciones, sanciones administrativas y
                                consecuencias legales conforme a las leyes y normativas vigentes en la República
                                Dominicana.

                            </p>
                            <p class="mt-2">
                                En caso de no estar acuerdo con estos términos y condiciones, puede volver atrás y
                                modificar los datos, antes de finalizar el registro.
                            </p>
                        </div>

                        <div class="flex items-start space-x-2 mt-2">
                            <input type="checkbox" wire:model="aceptoCondiciones" id="condiciones" class="mt-1">
                            <label for="condiciones" class="text-sm text-gray-600">
                                Acepto las condiciones del registro.
                            </label>
                        </div>
                        <x-input-error for="aceptoCondiciones" class="mt-1" />
                    </div>
                @endif
            </x-slot>
            {{-- Footer --}}
            <x-slot name="footer">
                <div class="flex justify-between">
                    @if ($step > 1)
                        <x-secondary-button wire:click="prevStep" class="mr-2">
                            Atrás
                        </x-secondary-button>
                    @endif
                    @if ($step < 3)
                        <x-button wire:click="nextStep" class="acept_consult disabled:opacity-25">Siguiente</x-button>
                    @else
                        <x-button wire:click="submit" :disabled="!$aceptoCondiciones" class="disabled:opacity-25">Finalizar</x-button>
                    @endif
                </div>
            </x-slot>
        </div>
    </x-dialog-modal>
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('.documento').mask('000-0000000-0', {
                    placeholder: '000-0000000-0'
                });
                $(document).on("change", ".tipo_documento", function() {
                    var tipo = $(this).val();
                    if (tipo == 'cedula') {
                        $('.documento').mask('000-0000000-0', {
                            placeholder: '000-0000000-0'
                        });
                    } else if (tipo == 'pasaporte') {
                        $('.documento').unmask();
                    }
                })
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $(document).on("focusout", ".documento", function() {
                    var documento = $(this).val();
                    var tipo = $('.tipo_documento').val();
                    if (tipo == 'cedula' && documento != '') {
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
                                $('button.acept_consult').attr('disabled', true);
                            },
                            success: function(data) {
                                json = $.parseJSON(data);
                                if (json?.message) {
                                    $('button.acept_consult').attr('disabled', true);
                                } else {
                                    if (json[0].nombres != '') {
                                        // $('.nombre').val(json.nombre + ' ' + json.apellido);
                                        Livewire.emit('setNombreRepresentante', json[0].nombres +
                                            ' ' +
                                            json[0]
                                            .apellidos);
                                        Livewire.emit('setNacionalidades', json[0].nacionalidades);
                                        // $('.nombre').prop('readonly', true);
                                    }
                                    // if (json.nacionalidades != '') {
                                    //     Livewire.emit('setNacionalidades', json.nacionalidades);
                                    //     // $('.nacionalidad').val(json.nacionalidades);
                                    // }
                                    // if (json.fechaExpiracion != '') {
                                    //     Livewire.emit('setFechaExpira', json.fechaExpiracion)
                                    // }
                                }
                            },
                            complete: function(data) {
                                $(".spin-cap").hide();
                                let respuesta = null;

                                try {
                                    // Algunos callbacks (como "complete") devuelven un objeto XHR, no el JSON directamente.
                                    // Intentamos obtener el responseText.
                                    let raw = data.responseText || data;

                                    respuesta = JSON.parse(raw);
                                } catch (e) {
                                    console.warn('La respuesta no es un JSON válido:', data);
                                }

                                // Si NO hay respuesta válida o viene con message (ej. "no existe"), deshabilitamos el botón
                                if (!respuesta || respuesta.message) {
                                    $('div.nodata').slideDown('fast');
                                    $('button.acept_consult').prop('disabled', true);
                                } else {
                                    $('div.nodata').slideUp('fast');
                                    $('button.acept_consult').prop('disabled', false);
                                }
                            }

                        });
                    } else if (tipo == 'pasaporte') {
                        // uso del endpoint migracion
                    }

                });
            });
        </script>
    @endpush
</div>

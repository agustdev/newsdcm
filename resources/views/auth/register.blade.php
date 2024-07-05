<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div x-data="{
            openTab: 1,
            activeClasses: 'border-l border-t border-r rounded-t text-black border-blue-600',
            inactiveClasses: 'text-blue-400 hover:text-blue-700'
        }" class="p-2">
            <ul class="flex border-b border-blue-600">
                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                    <a href="#" :class="openTab === 1 ? activeClasses : inactiveClasses"
                        class="bg-white inline-block py-2 px-4 font-semibold" x-on:click.prevent>
                        {{ __('Propietario') }}
                    </a>
                </li>
                <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                    <!-- Set active class by using :class provided by Alpine -->
                    <a href="#" :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="bg-white inline-block py-2 px-4 font-semibold" x-on:click.prevent>
                        {{ __('Naviera') }}
                    </a>
                </li>
            </ul>
            <div class="w-full">
                <div x-show="openTab === 1">
                    {{-- propietarios --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center">
                            <div role="status" class="spin hidden">
                                <svg aria-hidden="true"
                                    class="w-14 h-14 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
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
                        <div class="mt-4">
                            <x-label for="tipo_documento" value="{{ __('Tipo documento') }}" />
                            <x-select id="tipo_documento" class="block mt-1 w-full tipo_documento" type="text"
                                name="tipo_documento" :value="old('tipo_documento')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="documento" value="{{ __('No documento') }}" />
                            <x-input id="documento" class="block mt-1 w-full documento" type="text" name="documento"
                                :value="old('documento')" required autofocus autocomplete="Cédula" />
                            @error('documento')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <x-label for="name" value="{{ __('Nombre') }}" />
                            <x-input id="name" class="block mt-1 w-full nombre" type="text" name="name"
                                :value="old('name')" required autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            @error('email')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        @livewire('register-passwords')

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" required id="accept-terms" />

                                        <div class="ml-2">
                                            @livewire('terminos-modal')
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-center mt-4">
                            <a class="inline-flex items-center px-3 py-2 bg-azulito rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 
                            focus:bg-blue-800 active:bg-blue-900 active:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                            transition ease-in-out duration-150 ml-1"
                                href="{{ route('login') }}">
                                {{ __('¿Posees una cuenta?') }}
                            </a>

                            <x-button-register class="ml-4 disabled:opacity-25">
                                {{ __('Registrarse') }}
                            </x-button-register>
                        </div>
                    </form>
                </div>
                <div x-show="openTab === 2">
                    {{-- navieras --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center">
                            <div role="status" class="spin hidden">
                                <svg aria-hidden="true"
                                    class="w-14 h-14 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
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
                        {{-- <div class="mt-4">
                            <x-label for="tipo_documento" value="{{ __('Tipo documento') }}" />
                            <x-select id="tipo_documento" class="block mt-1 w-full tipo_documento" type="text"
                                name="tipo_documento" :value="old('tipo_documento')" required />
                        </div> --}}
                        <input type="hidden" name="tipo_documento" value="RNC">
                        <div class="mt-4">
                            <x-label for="documento" value="{{ __('RNC') }}" />
                            <x-input id="documento" class="block mt-1 w-full documento" type="text" name="documento"
                                :value="old('documento')" required autofocus autocomplete="RNC" />
                            @error('documento')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <x-label for="name" value="{{ __('Razon Social') }}" />
                            <x-input id="name" class="block mt-1 w-full nombre" type="text" name="name"
                                :value="old('name')" required autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Correo Electronico Manejador') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            @error('email')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror

                        </div>

                        @livewire('register-passwords')

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" required id="accept-terms" x-model="!terms" />

                                        <div class="ml-2">
                                            @livewire('terminos-modal')
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-center mt-4">
                            <a class="inline-flex items-center px-3 py-2 bg-azulito rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 
                            focus:bg-blue-800 active:bg-blue-900 active:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                            transition ease-in-out duration-150 ml-1"
                                href="{{ route('login') }}">
                                {{ __('¿Posees una cuenta?') }}
                            </a>

                            <x-button-register class="ml-4 disabled:opacity-25">
                                {{ __('Registrarse') }}
                            </x-button-register>
                        </div>
                    </form>
                </div>

            </div>
    </x-authentication-card>

    @push('js')
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            // Initiate an Ajax request on button click

            $(document).on("focusout", ".documento", function() {
                var documento = $(this).val();
                var tipo = $('.tipo_documento').val();
                if (documento != '') {
                    $.post("{{ route('consultar.cedula') }}", {
                        documento: documento,
                        tipo: tipo,
                        _token: $('input[name="_token"]').val()
                    }, function(data) {
                        json = $.parseJSON(data);
                        if (json[0].nombres != '') {
                            $('.nombre').val(json[0].nombres + ' ' + json[0].apellidos);
                        } else {
                            $('.nombre').attr('readonly', false).val('');
                        }

                    });
                }
            });

            // Add remove loading class on body element based on Ajax request status
            $(document).on({
                ajaxStart: function() {
                    $(".spin").css('display', 'inline-block');
                    $('.nombre').attr('readonly', true);
                    $('button').attr('disabled', true);
                },
                ajaxStop: function() {
                    $(".spin").css('display', 'none');
                    $('button').attr('disabled', false);

                }
            });

            // click accept mark checkbox
            $('.accept_t').on('click', function() {
                $('#accept-terms').attr('checked', true)
            });
            // click cancel unmark checkbox
            $('.accept_c').on('click', function() {
                $('#accept-terms').attr('checked', false)
            });
        </script>
    @endpush
</x-guest-layout>

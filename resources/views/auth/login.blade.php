<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-label class="text-black font-semibold" for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>
            <div class="mt-4">
                <x-label class="text-black font-semibold" for="password" value="{{ __('Password') }}" />
                <div>
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" show-password-icon="heroicon-m-eye"
                        hide-password-icon="heroicon-m-eye-slash" />
                </div>
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-black font-bold">{{ __('Recordar') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-4">
                    {{ __('Iniciar Sesion') }}
                </x-button>

                <x-button-link href="{{ route('register') }}">
                    {{ __('Registro') }}
                </x-button-link>
<x-custom-link>

</x-custom-link>

            </div>
            <div class="mt-4 flex items-center justify-center">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-black font-bold hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
        </form>

    </x-authentication-card>

</x-guest-layout>

<x-form-section submit="updateProfileInformation">

    <x-slot name="title">
        {{ __('Información del perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualice la información del perfil y la dirección de correo electrónico de su cuenta.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="mb-3">
                <!-- Profile Photo File Input -->
                <input type="file" class="d-none" wire:model="photo" x-ref="photo"
                    x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);" />
                <h4>
                    <x-label for="photo" value="{{ __('Foto') }}" />
                </h4>

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-circle avatar-lg img-thumbnail">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <img class="rounded-circle avatar-lg img-thumbnail"
                        x-bind:style="'background-image: url(\'' + photoPreview +
                            '\'); background-size: cover; background-position: center; background-repeat: no-repeat;'">

                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Seleccione una nueva foto') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Quitar foto') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        {{-- documento usuario --}}
        <div class="col-lg-12">
            <x-label for="documento" value="{{ __('Documento') }}" />
            <x-input id="documento" type="text" wire:model.defer="state.documento" autocomplete="documento"
                readonly />
            <x-input-error for="documento" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-lg-12">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text" wire:model.defer="state.name" autocomplete="name" readonly />

            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-lg-12">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="form-control" wire:model.defer="state.email"
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="btn btn-primary" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guardar.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>

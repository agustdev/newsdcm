<x-app-layout>
    @section('titulo', __('Entradas Internacionales'))
    @push('css')
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
        <!-- Datatables css -->
        <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    <x-slot name="header">
        <h2 class="h2 mb-2 mt-2">
            {{ __('Entradas Internacionales') }}
        </h2>
    </x-slot>
    <div class="row g-2">
        <div class="alert alert-info text-black font-black">
            <i class="uil-info-circle"></i>
            {{ __('Este formulario solo es para embarcaciones que provienen de otros paises') }}
        </div>
    </div>
    {{-- formulario de solicitud de despacho --}}
    <div class="row g-2">
        @livewire('entradasinternacionales-step-post')
    </div>
    @push('js')
        <script>
            $('.cant-tripulante').on('keyup', function() {
                if ($(this).val() != '0') {
                    // $('.tripulantes').show();
                    $('.cant-trip').text($(this).val());
                }
                if ($(this).val() == '') {
                    $('.cant-trip').text('0');
                }
                // if ($(this).val() == 0) {
                //     $('.tripulantes').hide();
                // }
            });

            $('.cant-pasajero').on('keyup', function() {
                if ($(this).val() != '0') {
                    // $('.tripulantes').show();
                    $('.cant-pas').text($(this).val());
                }
                if ($(this).val() == '') {
                    $('.cant-pas').text('0');
                }
            });

            $('[required]').css({
                'border-left': '2px solid red'
            });
        </script>
    @endpush
</x-app-layout>

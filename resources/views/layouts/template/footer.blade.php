<!-- bundle -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('assets/js/jQueryMaskPlugin/dist/jquery.mask.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (get_emb_request_today()->where('estado_movimiento', 2)->count() == 1)
    {{-- pregunta en caso de ser solo una embarcacion --}}
    <script>
        Swal.fire({
            title: "¿Su embarcación arribo?",
            text: "Favor indicar el arribo por esta via!",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si!",
            cancelButtonText: "No!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Arribo notificado!",
                    text: "Ha realizado la notificación de arribo.",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                });
            }
        });
    </script>
@elseif(get_emb_request_today()->where('estado_movimiento', 2)->count() > 1)
    {{-- pregunta en caso de ser mas de una embarcacion --}}
    <script>
        // Swal.fire({
        //     title: "Realice los arribos correspondientes",
        //     text: "Detectamos que tiene varias embarcaciones en movimiento y segun las solicitudes ya deben estar en su destino, favor notificar el arribo de cada una de ellas.",
        //     icon: "info",
        //     showCancelButton: true,
        //     confirmButtonColor: "#3085d6",
        //     cancelButtonColor: "#d33",
        //     confirmButtonText: "Si!",
        //     cancelButtonText: "No!"
        // }).then((result) => {
        //     // redirigir a la pagina de notificaciones
        // });
    </script>
@endif
@if (get_emb_request_zarpe()->where('estado_movimiento', 1)->count() == 1)
    {{-- alerta de solicitud pendiente --}}
    <script>
        // Swal.fire({
        //     title: "¿Su embarcación zarpo?",
        //     // text: "Favor indicar el zarpe por esta via!",
        //     icon: "question",
        //     showCancelButton: true,
        //     confirmButtonColor: "#3085d6",
        //     cancelButtonColor: "#d33",
        //     confirmButtonText: "Si!",
        //     cancelButtonText: "No!"
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         Swal.fire({
        //             title: "Zarpe notificado!",
        //             text: "Ha realizado la notificación de zarpe de su embarcación.",
        //             icon: "success"
        //         });
        //     }
        //     if (result.isDismissed) {
        //         Swal.fire({
        //             title: "Zarpe no notificado!",
        //             text: "No ha realizado la notificación de zarpe de su embarcación.",
        //             icon: "info"
        //         });
        //     }
        // });
    </script>
@endif

@if (auth()->user()->representante && auth()->user()->representante->conciente === 0)
    {{-- consentimiento de representante --}}
    <form action="{{ route('consentimiento.representante') }}" method="POST" class="conciente">
        @csrf
        @method('POST')
        <input type="hidden" name="conciente" value="1">
    </form>
    <form action="{{ route('consentimiento.representante') }}" method="POST" class="noconciente">
        @csrf
        @method('POST')
        <input type="hidden" name="conciente" value="2">
    </form>
    <script>
        Swal.fire({
            title: '¡Bienvenido!',
            html: '<p style="text-align: justify;">Usted fue registrado como representante y tiene responsabilidades sobre las embarcaciones asignadas. Si reconoce esta acción, por favor confirme que está al tanto de sus responsabilidades. De lo contrario, contacte al administrador del sistema.</p>',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#1089FF",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, estoy al tanto!",
            cancelButtonText: "No, no estoy al tanto!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('.conciente').submit();
            }
            if (result.isDismissed) {
                Swal.fire({
                    title: "Atención!",
                    text: "Contacte el administrador del sistema.",
                    icon: "info",
                    confirmButtonColor: "#1089FF",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    document.querySelector('.noconciente').submit();
                });
            }
        });
    </script>
@endif

<script>
    Livewire.on('alert', function(message) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: message
        });
    });
</script>
@stack('modals')
@stack('js')

</body>

</html>

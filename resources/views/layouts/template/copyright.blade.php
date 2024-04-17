<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> ©
                <span id="tooltip-container">
                    <a href="#" data-bs-container="#tooltip-container" data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Sistema de Control Marítimo">{{ GoogleTranslate::trans('SACOM', app()->getLocale()) }}</a>
                    -
                    {{ GoogleTranslate::trans('Todos los derechos reservados', app()->getLocale()) }}.
                </span>
            </div>

        </div>
    </div>
</footer>

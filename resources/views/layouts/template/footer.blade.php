<!-- bundle -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>
<script type="text/javascript">
    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = $(
            '<span class="mr-1"><img src="' + $(state.element).attr('data-img') +
            '" class="img-flag d-inline" width="24"/> ' +
            state
            .text +
            '</span>'
        );
        return $state;
    };
    $('.changeLang').select2({
        dropdownAutoWidth: true,
        minimumResultsForSearch: Infinity,
        templateResult: formatState,
        templateSelection: formatState
    });
</script>

@livewireScripts
@stack('modals')
@stack('js')

</body>

</html>

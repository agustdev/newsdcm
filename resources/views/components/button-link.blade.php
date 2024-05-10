<a
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-8 py-2 bg-yellow-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600
                                focus:bg-yellow-700 active:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2
                                transition ease-in-out duration-150 ml-1',
    ]) }}>
    {{ $slot }}
</a>

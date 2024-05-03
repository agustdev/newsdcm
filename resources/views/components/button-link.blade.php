<a
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-8 py-2 bg-red-500 border
                                border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700
                                focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2
                                transition ease-in-out duration-150 ml-1',
    ]) }}>
    {{ $slot }}
</a>

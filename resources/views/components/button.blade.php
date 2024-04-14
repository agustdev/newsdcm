<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-3 py-2 bg-white-800 border
                            border-blue-800 rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-300 
                            focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                            transition ease-in-out duration-150 ml-1',
    ]) }}>

    {{ $slot }}
</button>

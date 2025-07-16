@props(['disabled' => false, 'readonly' => false, 'error' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $readonly ? 'readonly' : '' }} {!! $attributes->merge(['class' => 'form-control mb-2 rounded-md']) !!}>

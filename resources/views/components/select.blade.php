@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control mb-2']) !!}>
    <option value="cedula">Cédula</option>
    {{-- <option value="pasaporte">Pasaporte</option> --}}
</select>

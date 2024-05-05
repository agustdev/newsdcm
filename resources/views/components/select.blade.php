@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control mb-2 rounded-md']) !!}>
    <option value="cedula">Cédula</option>
    <option value="pasaporte">Pasaporte</option>
</select>

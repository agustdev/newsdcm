@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control mb-2 rounded-md']) !!}>
    <option value="cedula">{{ __('Cédula') }}</option>
    <option value="pasaporte">{{ __('Pasaporte') }}</option>
</select>

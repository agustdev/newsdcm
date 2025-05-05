@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control mb-2 rounded-md']) !!}>

    <option value="cedula">Cédula</option>
    <option value="rnc">RNC</option>
    {{-- <option value="pasaporte">Pasaporte</option>
    <option value="carnet_navegante">Carnet Navegante</option> --}}

</select>

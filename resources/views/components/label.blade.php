@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label fw-bold font-bold']) }}>
    {{ $value ?? $slot }}
</label>

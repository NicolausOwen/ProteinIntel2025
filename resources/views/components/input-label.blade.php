@props(['value'])

<label {{ $attributes->merge(['class' => 'modern-label']) }}>
    {{ $value ?? $slot }}
</label>
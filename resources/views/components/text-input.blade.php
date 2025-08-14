@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'modern-input']) }}>
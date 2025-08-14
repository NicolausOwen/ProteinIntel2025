<button {{ $attributes->merge(['type' => 'submit', 'class' => 'modern-button']) }}>
    {{ $slot }}
</button>
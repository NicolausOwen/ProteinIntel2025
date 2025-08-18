<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-2">
            <h2 class="text-xl font-bold">Profile Overview</h2>
            <p>Welcome back, {{ $this->getUser()->name ?? 'User' }}</p>
            <p>Email: {{ $this->getUser()->email ?? '-' }}</p>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>

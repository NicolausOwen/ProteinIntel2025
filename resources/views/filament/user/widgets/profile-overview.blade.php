<x-filament-widgets::widget>
    <x-filament::section>
        <div class="bg-white dark:bg-gray-900 rounded-xl p-6 shadow-md w-full max-w-lg">
    <div class="flex items-center space-x-4">
        <div class="w-16 h-16 rounded-full bg-gray-200 overflow-hidden">
            @if($this->getUser()->photo)
                <img src="{{ asset('storage/' . $this->getUser()->photo) }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-500">
                    <x-heroicon-o-user class="w-8 h-8" />
                </div>
            @endif
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $this->getUser()->name }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $this->getUser()->email }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('filament.user.resources.users.edit', $this->getUser()->id) }}">
            <x-filament::button>Edit Profil</x-filament::button>
        </a>
    </div>
</div>

    </x-filament::section>
</x-filament-widgets::widget>

<x-filament::page>
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Profil Pengguna</h2>

        <dl class="space-y-4">
            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Nama</dt>
                <dd class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user->name }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Email</dt>
                <dd class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user->email }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">Terdaftar Sejak</dt>
                <dd class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ $user->created_at->format('d M Y') }}
                </dd>
            </div>
        </dl>

        <div class="mt-6">
            <x-filament::button tag="a" href="{{ route('filament.user.resources.users.edit', $user->id) }}"
                icon="heroicon-o-pencil-square">
                Edit Profil
            </x-filament::button>
        </div>
    </div>
</x-filament::page>
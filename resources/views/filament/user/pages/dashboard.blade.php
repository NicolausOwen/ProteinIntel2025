<x-filament-panels::page>
    <h1 class="text-xl font-bold">Selamat datang di Dashboard User</h1>

    @livewire(\App\Filament\User\Widgets\QuizAttemptHistory::class)
    @livewire(\App\Filament\User\Widgets\QuizScoreChart::class)
    @livewire(\App\Filament\User\Widgets\QuizAttemptTable::class)

</x-filament-panels::page>
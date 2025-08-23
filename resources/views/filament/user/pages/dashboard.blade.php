<x-filament-panels::page>
    <div class="space-y-10">

        <!-- Hero Section -->
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-3">
                    <div
                        class="flex items-center justify-center w-12 h-12 rounded-xl bg-primary-100 dark:bg-primary-900">
                        <x-heroicon-o-chart-bar class="w-6 h-6 text-primary-600 dark:text-primary-400" />
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">🎉 Selamat Datang!</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Dashboard pembelajaran Anda</p>
                    </div>
                </div>
            </x-slot>

            <div class="space-y-6">
                <p class="text-gray-600 dark:text-gray-300">
                    Pantau progres belajarmu, lihat pencapaian terbaikmu, dan terus kembangkan kemampuanmu melalui
                    dashboard ini
                </p>

                <!-- Quick Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <x-filament::section class="text-center">
                        <div class="space-y-2">
                            <div class="text-3xl font-bold text-primary-600 dark:text-primary-400">
                                {{ auth()->user()->quizAttempts()->completed()->count() }}
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Quiz Selesai</div>
                        </div>
                    </x-filament::section>

                    <x-filament::section class="text-center">
                        <div class="space-y-2">
                            <div class="text-3xl font-bold text-warning-600 dark:text-warning-400">
                                {{ auth()->user()->quizAttempts()->inProgress()->count() }}
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Sedang Berjalan</div>
                        </div>
                    </x-filament::section>

                    <x-filament::section class="text-center">
                        <div class="space-y-2">
                            <div class="text-3xl font-bold text-success-600 dark:text-success-400">
                                {{ number_format(auth()->user()->quizAttempts()->completed()->avg('score') ?? 0, 1) }}%
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Rata-rata Skor</div>
                        </div>
                    </x-filament::section>
                </div>
            </div>
        </x-filament::section>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mt-6">

            <!-- History Widget -->
            <x-filament::section>
                <x-slot name="heading">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-info-100 dark:bg-info-900">
                            <x-heroicon-o-clock class="w-5 h-5 text-info-600 dark:text-info-400" />
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold">Riwayat Percobaan</h2>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Aktivitas terbaru</p>
                        </div>
                    </div>
                </x-slot>

                @livewire(\App\Filament\User\Widgets\QuizAttemptHistory::class)
            </x-filament::section>

            <!-- Score Chart -->
            <div class="xl:col-span-2 mt-6 xl:mt-0">
                <x-filament::section>
                    <x-slot name="heading">
                        <div class="flex items-center justify-between w-full">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900">
                                    <x-heroicon-o-chart-bar class="w-5 h-5 text-primary-600 dark:text-primary-400" />
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold">Statistik Performa</h2>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Perkembangan skor dari waktu ke
                                        waktu</p>
                                </div>
                            </div>

                            <!-- Performance Indicator -->
                            <div class="hidden md:flex items-center gap-2 text-sm">
                                @php
                                    $trend = 'up'; // You can calculate this based on recent scores
                                @endphp
                                <span class="text-gray-500 dark:text-gray-400">Trend:</span>
                                <div class="flex items-center gap-1 text-success-600 dark:text-success-400">
                                    <x-heroicon-o-arrow-trending-up class="w-4 h-4" />
                                    <span class="font-medium">Naik</span>
                                </div>
                            </div>
                        </div>
                    </x-slot>

                    @livewire(\App\Filament\User\Widgets\QuizScoreChart::class)
                </x-filament::section>
            </div>
        </div>

        <!-- Detailed Table -->
        <x-filament::section class="mt-6 mb-6">
            <x-slot name="heading">
                <div class="flex items-center justify-between flex-wrap gap-4 w-full mt-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-warning-100 dark:bg-warning-900">
                            <x-heroicon-o-clipboard-document-list
                                class="w-5 h-5 text-warning-600 dark:text-warning-400" />
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold">Detail Percobaan Kuis</h2>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Riwayat lengkap semua percobaan quiz</p>
                        </div>
                    </div>

                    <!-- Summary Stats -->
                    <div class="flex items-center gap-6">
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ auth()->user()->quizAttempts()->count() }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Total</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-success-600 dark:text-success-400">
                                {{ auth()->user()->quizAttempts()->completed()->count() }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Selesai</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-warning-600 dark:text-warning-400">
                                {{ auth()->user()->quizAttempts()->inProgress()->count() }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Progress</div>
                        </div>
                    </div>
                </div>
            </x-slot>

            @livewire(\App\Filament\User\Widgets\QuizAttemptTable::class)
        </x-filament::section>

        <!-- Motivational Message -->
        <div class="text-center py-6 space-y-3 mt-6">
            <div class="flex items-center justify-center gap-3 text-gray-600 dark:text-gray-400">
                <x-heroicon-o-sparkles class="w-5 h-5 text-primary-500" />
                <span class="font-medium text-base">Terus belajar dan raih prestasi terbaikmu!</span>
                <x-heroicon-o-star class="w-5 h-5 text-warning-500" />
            </div>
        </div>
    </div>
</x-filament-panels::page>
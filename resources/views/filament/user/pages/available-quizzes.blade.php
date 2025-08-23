<x-filament::page>
    <div class="flex justify-center">
        <div class="w-full max-w-xl">
            @if ($quizzes->isEmpty())
                <div class="text-center text-gray-500 dark:text-gray-400 mt-10">
                    <p class="text-lg">No Quizzes Available.</p>
                </div>
            @else
                <!-- Grid Card -->
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($quizzes as $quiz)
                        @php
                            $attempt = $attempts->firstWhere('quiz_id', $quiz->id);
                        @endphp

                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col transition transform hover:shadow-xl hover:-translate-y-1 rounded-md">

                            <!-- Gambar Full Width -->
                            <div class="w-full h-48 bg-gray-100 dark:bg-gray-700">
                                <img src="{{ asset('img/quiz.jpg') }}" alt="Quiz Image" class="w-full h-full object-cover" />
                            </div>

                            <!-- Isi Card -->
                            <div class="p-6 flex flex-col flex-1 text-center">
                                <!-- Judul -->
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                                    {{ $quiz->title }}
                                </h3>

                                <!-- Deskripsi -->
                                <p class="text-gray-600 dark:text-gray-300 mb-3 line-clamp-3">
                                    {{ $quiz->description }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                    ⏱ Duration: {{ $quiz->duration_minutes }} minutes
                                </p>

                                <!-- Tombol -->
                                <div class="mt-auto">
                                    @if (!$attempt)
                                        <x-filament::button tag="a" color="primary" class="w-full justify-center"
                                            :href="route('user.quiz.index', $quiz->id)">
                                            Start Quiz
                                        </x-filament::button>
                                    @elseif (is_null($attempt->completed_at))
                                        <x-filament::button tag="a" color="warning" class="w-full justify-center"
                                            :href="route('user.quiz.index', $quiz->id)">
                                            Continue Quiz
                                        </x-filament::button>
                                    @else
                                        <x-filament::button tag="a" color="success" class="w-full justify-center"
                                            :href="route('user.attempt.result', $attempt->id)">
                                            View Result
                                        </x-filament::button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-filament::page>
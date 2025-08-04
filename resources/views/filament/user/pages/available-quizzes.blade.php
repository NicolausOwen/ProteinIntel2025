<x-filament::page>
    @if ($quizzes->isEmpty())
        <div class="text-center text-gray-500 dark:text-gray-400 mt-6">
            <p class="text-lg">No Quizzes Available.</p>
        </div>
    @else
        @foreach ($quizzes as $quiz)
            <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ $quiz->title }}
                </h3>
                <p class="text-gray-600 dark:text-gray-300">{{ $quiz->description }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Duration: {{ $quiz->duration_minutes }} minutes</p>

                <div class="mt-2">
                    <x-filament::button 
                        tag="a" 
                        color="primary" 
                        :href="route('user.quiz.index', $quiz->id)"
                    >
                        Start Quiz
                    </x-filament::button>
                </div>
            </div>
        @endforeach
    @endif
</x-filament::page>

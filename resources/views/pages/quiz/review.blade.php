@extends('layouts.quiz-result')

@section('container')
    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
        <h1 class="text-2xl font-bold mb-4">{{ $attempt->quiz->title }} - Review Soal</h1>

        @foreach ($attempt->answers as $index => $answer)
            <div class="mb-6 border-b pb-4">
                <p class="font-semibold">{{ $index + 1 }}. {{ $answer->question->question_text }}</p>

                <ul class="mt-2 space-y-1">
                    @foreach ($answer->question->options as $option)
                        <li class="@if($option->id == $answer->selected_option_id && $option->is_correct) 
                            text-green-600 font-bold
                           @elseif($option->id == $answer->selected_option_id && !$option->is_correct) 
                                        text-red-600 font-bold
                                       @endif">
                            {{ $option->option_text }}

                            {{-- Jika user benar, kasih ✅ --}}
                            @if($option->id == $answer->selected_option_id && $option->is_correct)
                                ✅
                            @endif

                            {{-- Jika user salah, kasih ❌ hanya di pilihannya --}}
                            @if($option->id == $answer->selected_option_id && !$option->is_correct)
                                ❌
                            @endif
                        </li>
                    @endforeach
                </ul>


                {{-- @if($answer->question->explanation)
                <div class="mt-2 text-gray-700">
                    <strong>Penjelasan:</strong> {{ $answer->question->explanation }}
                </div>
                @endif --}}
            </div>
        @endforeach

        {{-- Action button --}}
        <div class="flex justify-center">
            <a href="{{ route('filament.user.pages.dashboard') }}"
                class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-300 inline-block text-center">
                Return to Dashboard
            </a>
        </div>
    </div>
@endsection
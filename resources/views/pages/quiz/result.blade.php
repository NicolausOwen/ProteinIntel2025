@extends('layouts.quiz')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'primary': '#667eea',
                        'primary-dark': '#764ba2',
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .gradient-primary-light {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }
        .border-gradient-primary {
            border-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%) 1;
        }
        .fill { 
            transition: width 1s ease; 
        }
        .level-segment.active { 
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3); 
            transform: scale(1.05); 
            z-index: 1; 
        }
    </style>
@endpush

@section('container')
<div class="font-poppins bg-gray-50 min-h-screen py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                {{ $attempt->quiz->title }}
            </h1>
            <p class="text-gray-600 text-lg">
                {{ date('d M Y') }} &ndash; Hasil Quiz
            </p>
        </div>

        <!-- Main Result Section -->
        <div class="grid lg:grid-cols-2 gap-8 mb-8">
            
            <!-- Score Box -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Hasil</h3>
                
                <div class="w-32 h-32 rounded-full gradient-primary text-white flex items-center justify-center mx-auto mb-4">
                    <span class="text-4xl font-bold">{{ $percentage }}%</span>
                </div>
                
                <p class="text-gray-600 leading-relaxed">
                    @if($percentage >= 80)
                        Luar biasa! Anda memiliki pemahaman yang sangat baik.
                    @elseif($percentage >= 60)
                        Bagus! Anda memiliki pemahaman yang cukup baik.
                    @else
                        Tetap semangat! Ada ruang untuk perbaikan.
                    @endif
                </p>
            </div>

            <!-- Summary Box -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Ringkasan</h3>
                
                <!-- Correct Answers -->
                <div class="flex items-center gap-4 mb-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-5 h-5 text-primary">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                    </div>
                    <span class="min-w-16 font-medium text-gray-700">Benar</span>
                    <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full gradient-primary fill" style="width: {{ ($correctAnswers / $totalQuestions) * 100 }}%"></div>
                    </div>
                    <span class="font-semibold text-gray-800">{{ $correctAnswers }}/{{ $totalQuestions }}</span>
                </div>

                <!-- Wrong Answers -->
                <div class="flex items-center gap-4 mb-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-5 h-5 text-yellow-500">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                        </svg>
                    </div>
                    <span class="min-w-16 font-medium text-gray-700">Salah</span>
                    <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-yellow-500 fill" style="width: {{ ($wrongAnswers / $totalQuestions) * 100 }}%"></div>
                    </div>
                    <span class="font-semibold text-gray-800">{{ $wrongAnswers }}/{{ $totalQuestions }}</span>
                </div>

                <!-- Total Questions -->
                <div class="flex items-center gap-4 mb-6 p-3 bg-gray-50 rounded-lg">
                    <div class="w-5 h-5 text-primary">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 001 1h6a1 1 0 001-1V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z"/>
                        </svg>
                    </div>
                    <span class="min-w-16 font-medium text-gray-700">Total</span>
                    <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full gradient-primary fill" style="width: 100%"></div>
                    </div>
                    <span class="font-semibold text-gray-800">{{ $totalQuestions }}</span>
                </div>

                <!-- Level Indicator -->
                <div class="pt-6 border-t border-gray-200">
                    <span class="block font-semibold text-gray-800 mb-4">
                        Level: 
                        @if($percentage >= 80)
                            Mahir
                        @elseif($percentage >= 60)
                            Menengah
                        @else
                            Pemula
                        @endif
                    </span>
                    <div class="flex rounded-lg overflow-hidden mb-2">
                        <div class="flex-1 p-2 text-center text-xs font-medium text-white bg-red-500 {{ $percentage < 60 ? 'level-segment active' : '' }}">
                            0–59
                        </div>
                        <div class="flex-1 p-2 text-center text-xs font-medium text-white bg-yellow-500 {{ $percentage >= 60 && $percentage < 80 ? 'level-segment active' : '' }}">
                            60–79
                        </div>
                        <div class="flex-1 p-2 text-center text-xs font-medium text-white bg-green-500 {{ $percentage >= 80 ? 'level-segment active' : '' }}">
                            80–100
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips Section -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <div class="flex items-start gap-4 p-4 gradient-primary-light rounded-lg">
                <div class="w-8 h-8 text-primary mt-1">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Tips Belajar</h4>
                    <ul class="space-y-2 text-gray-600">
                        @if($percentage < 60)
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Pelajari kembali materi dasar dengan seksama.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Berlatih soal-soal serupa secara rutin.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Diskusikan materi yang sulit dengan teman atau guru.</span>
                            </li>
                        @elseif($percentage < 80)
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Fokus pada topik yang masih lemah.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Tingkatkan pemahaman konsep yang lebih mendalam.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Berlatih soal dengan tingkat kesulitan yang lebih tinggi.</span>
                            </li>
                        @else
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Pertahankan konsistensi dalam belajar.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Coba tantangan soal yang lebih kompleks.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2 flex-shrink-0"></span>
                                <span>Bantu teman yang membutuhkan penjelasan.</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-center">
            <a href="{{ route('user.attempt.review', $attempt->id) }}" 
               class="inline-flex items-center gap-3 px-8 py-4 gradient-primary text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="w-5 h-5">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 001 1h6a1 1 0 001-1V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z"/>
                    </svg>
                </div>
                <span>Review Jawaban</span>
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
@endpush
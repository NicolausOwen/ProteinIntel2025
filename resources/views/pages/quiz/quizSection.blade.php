@extends('layouts.quiz')

@section('container')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center justify-center p-4">
        <div class="w-full max-w-6xl space-y-8">

            <!-- Header Card -->
            <div
                class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transform transition-all duration-500">
                <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 px-6 py-8 text-center relative">
                    <h1 class="text-3xl font-bold text-white font-title">{{ $attempt->quiz->title }}</h1>
                    <p class="mt-2 text-sm text-white/80">{{ $attempt->quiz->description }}</p>
                </div>
            </div>

            <!-- Section Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $sectionIcons = [
                        'headphones', // First section
                        'microphone', // Second section  
                        'volume-up'   // Third section
                    ];
                    $gradients = [
                        'from-blue-500 to-indigo-600',
                        'from-purple-500 to-pink-600', 
                        'from-green-500 to-teal-600'
                    ];
                @endphp
                
                @foreach ($sections as $index => $section)
                    <a href="{{ route('user.attempt.questions', ['attempt' => $attempt->id, 'section' => $section->id]) }}"
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500">
                        
                        <!-- Card Header with Icon -->
                        <div class="bg-gradient-to-br {{ $gradients[$index % 3] }} p-6 text-center relative overflow-hidden">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 opacity-10">
                                <div class="absolute -top-4 -right-4 w-24 h-24 bg-white rounded-full"></div>
                                <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-white rounded-full"></div>
                            </div>
                            
                            <!-- Icon -->
                            <div class="relative z-10 mb-4">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-{{ $sectionIcons[$index % 3] }} text-3xl text-white"></i>
                                </div>
                            </div>
                            
                            <!-- Section Number -->
                            <div class="relative z-10">
                                <span class="text-white/80 text-sm font-medium uppercase tracking-wider">Section {{ $loop->iteration }}</span>
                            </div>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-indigo-700 transition-colors duration-300 mb-2">
                                {{ $section->name }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                Click to start this section
                            </p>
                            
                            <!-- Progress Indicator (Optional - you can add section progress here) -->
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-play-circle mr-2 text-indigo-500 group-hover:text-indigo-700 transition-colors"></i>
                                <span>Ready to begin</span>
                            </div>
                        </div>
                        
                        <!-- Hover Effect Arrow -->
                        <div class="absolute top-1/2 right-4 transform -translate-y-1/2 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300">
                            <i class="fas fa-arrow-right text-indigo-500 text-lg"></i>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Finish Button -->
            <div class="text-center">
                <button type="button" onclick="openModal()"
                    class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-red-500 via-pink-500 to-rose-500 rounded-2xl hover:from-red-600 hover:to-rose-600 transform hover:-translate-y-1 hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-red-200">
                    <i class="fas fa-flag-checkered mr-3 text-xl"></i> 
                    Finish Attempt
                </button>
            </div>

            <!-- Modal -->
            <div id="confirmationModal"
                class="fixed inset-0 z-50 bg-black bg-opacity-40 hidden items-center justify-center">
                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8 transform transition-all duration-300">
                    <div class="text-center mb-6">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                            <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Konfirmasi Selesai</h2>
                        <p class="text-gray-600">Apakah Anda yakin ingin menyelesaikan quiz ini? Jawaban yang sudah dikirim tidak bisa diubah.</p>
                    </div>
                    
                    <div class="flex gap-4">
                        <button onclick="closeModal()"
                            class="flex-1 px-6 py-3 text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors duration-200 font-medium">
                            Batal
                        </button>
                        <form id="finishForm" action="{{ route('user.attempt.submit', ['attempt' => $attempt->id]) }}"
                            method="POST" onsubmit="clearQuizStorage()" class="flex-1">
                            @csrf
                            <button type="submit"
                                class="w-full px-6 py-3 text-white bg-red-500 rounded-xl hover:bg-red-600 transition-colors duration-200 font-medium">
                                Ya, Saya Yakin
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal() {
            document.getElementById('confirmationModal').classList.remove('hidden');
            document.getElementById('confirmationModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('confirmationModal').classList.add('hidden');
            document.getElementById('confirmationModal').classList.remove('flex');
        }

        function clearQuizStorage() {
            localStorage.removeItem('quiz_start_time');
            localStorage.removeItem('quiz_duration');
            localStorage.removeItem('quiz_active');
            return true;
        }
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .font-title {
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
@endpush
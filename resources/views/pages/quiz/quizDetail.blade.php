@extends('layouts.quiz')
@section('container')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center justify-center p-4">
        <div class="w-full max-w-xl">
            <!-- Quiz Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition-all duration-500">
                <!-- Header with Gradient -->
                <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 px-6 py-8 text-center relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 left-0 w-32 h-32 border border-white rounded-full -translate-x-16 -translate-y-16"></div>
                        <div class="absolute bottom-0 right-0 w-24 h-24 border border-white rounded-full translate-x-12 translate-y-12"></div>
                        <div class="absolute top-1/2 left-1/2 w-16 h-16 border border-white rounded-full -translate-x-8 -translate-y-8"></div>
                    </div>
                    
                    <!-- Quiz Icon -->
                    {{-- <div class="relative z-10 mb-4">
                        <div class="w-16 h-16 mx-auto bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-brain text-2xl text-white"></i>
                        </div>
                    </div> --}}
                    
                    <form action="{{ route('user.attempt.start', $quiz->id) }}" method="post" class="relative z-10">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        
                        <!-- Quiz Title -->
                        <h1 class="text-3xl font-bold text-white mb-3 font-title leading-tight">
                            {{ $quiz->title }}
                        </h1>
                </div>
                
                <!-- Content Body -->
                <div class="px-6 py-6">
                    <!-- Quiz Description -->
                    <div class="bg-gradient-to-r from-gray-50 to-indigo-50 rounded-xl p-4 mb-5 border border-gray-100">
                        <div class="flex items-start space-x-3">
                            {{-- <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-info-circle text-indigo-600 text-sm"></i>
                                </div>
                            </div> --}}
                            <div>
                                <h3 class="text-md font-semibold text-gray-800 mb-1">Quiz Description</h3>
                                <p class="text-gray-600 leading-relaxed text-sm">{{ $quiz->description }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quiz Duration -->
                    <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-xl p-4 mb-5 border border-orange-100">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                {{-- <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-clock text-orange-600"></i>
                                </div> --}}
                                <div>
                                    <h3 class="text-md font-semibold text-gray-800">Duration</h3>
                                    <p class="text-orange-600 font-medium text-sm">{{ $quiz->duration_minutes }} minutes</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-orange-600">{{ $quiz->duration_minutes }}</div>
                                <div class="text-xs text-gray-500 uppercase tracking-wide">Minutes</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Instructions -->
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl p-4 mb-5 border border-emerald-100">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                {{-- <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-lightbulb text-emerald-600 text-sm"></i>
                                </div> --}}
                            </div>
                            <div>
                                <h3 class="text-md font-semibold text-gray-800 mb-2">Important Instructions</h3>
                                <ul class="space-y-1 text-gray-600 text-sm">
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-check-circle text-emerald-500 text-xs"></i>
                                        <span>Read each question carefully before answering</span>
                                    </li>
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-check-circle text-emerald-500 text-xs"></i>
                                        <span>Once started, the timer cannot be paused</span>
                                    </li>
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-check-circle text-emerald-500 text-xs"></i>
                                        <span>Make sure you have a stable internet connection</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Start Button -->
                    <div class="text-center">
                        <button 
                            onclick="startQuiz()" 
                            id="startBtn" 
                            type="submit" 
                            name="submit"
                            class="group relative inline-flex items-center justify-center px-8 py-3 text-md font-semibold text-white bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-xl hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 transform hover:-translate-y-1 hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-purple-300 min-w-40"
                        >
                            <div class="absolute inset-0 bg-gradient-to-r from-white to-transparent opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                            <i class="fas fa-play mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="relative z-10">Start Quiz</span>
                        </button>
                        
                        <p class="text-xs text-gray-500 mt-3">
                            <i class="fas fa-shield-alt mr-1"></i>
                            Your progress will be automatically saved
                        </p>
                    </div>
                    </form>
                </div>
            </div>
            
            <!-- Bottom Tips -->
            <div class="mt-6 grid grid-cols-3 gap-3">
                <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-lg p-3 text-center border border-white border-opacity-20">
                    {{-- <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-1">
                        <i class="fas fa-laptop text-blue-600 text-xs"></i>
                    </div> --}}
                    <p class="text-xs text-gray-600">Use a stable device</p>
                </div>
                <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-lg p-3 text-center border border-white border-opacity-20">
                    {{-- <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-1">
                        <i class="fas fa-wifi text-green-600 text-xs"></i>
                    </div> --}}
                    <p class="text-xs text-gray-600">Ensure good connection</p>
                </div>
                <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-lg p-3 text-center border border-white border-opacity-20">
                    {{-- <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-1">
                        <i class="fas fa-focus text-purple-600 text-xs"></i>
                    </div> --}}
                    <p class="text-xs text-gray-600">Stay focused</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .font-title {
            font-family: 'Space Grotesk', sans-serif;
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 15px rgba(139, 92, 246, 0.3); }
            50% { box-shadow: 0 0 20px rgba(139, 92, 246, 0.5); }
        }
        
        #startBtn:hover {
            animation: pulse-glow 2s ease-in-out infinite;
        }
        
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
    </style>
@endpush

@push('scripts')
    <script>
        function startQuiz() {
            const startBtn = document.getElementById('startBtn');
            const originalContent = startBtn.innerHTML;
            
            // Add loading state
            startBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i><span>Starting Quiz...</span>';
            startBtn.disabled = true;
            startBtn.classList.add('opacity-75', 'cursor-not-allowed');
            
            // Add a small delay for better UX
            setTimeout(() => {
                // The form will submit naturally, but we can add any additional logic here
            }, 500);
        }

        // Add entrance animation
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.bg-white.rounded-2xl');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px) scale(0.98)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }, 100);
        });
    </script>
@endpush
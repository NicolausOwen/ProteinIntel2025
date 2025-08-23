@extends('layouts.quiz')

@section('title', 'Quiz Test')

@push('styles')
    <style>
        /* General Styles */
        html { scroll-behavior: smooth; }
        body { background-color: #f0f2f5; font-family: sans-serif; }

        /* --- Header & Timer --- */
        .quiz-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 1.5rem;
        }
        .quiz-header h2 { margin: 0; font-size: 1.5rem; }
        .timer { font-size: 1.25rem; font-weight: bold; color: white; }

        /* --- Layout Container --- */
        .quiz-container {
            display: flex;
            gap: 1.5rem;
            padding: 0 2rem;
        }

        /* Panel Kiri (Hanya untuk Reading) */
        .passage-panel {
            flex: 1;
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            height: 70vh;
            overflow-y: auto;
        }

        /* Panel Kanan (Untuk Semua Soal) */
        .questions-panel {
            flex: 1;
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            height: 70vh;
            overflow-y: auto;
        }
        
        .questions-panel.full-width {
            flex-grow: 2;
        }

        .question-item {
            margin-bottom: 2rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 1.5rem;
        }
        .question-item:last-child { border-bottom: none; }
        .question-item audio, .question-item img { margin-top: 10px; margin-bottom: 15px; }
        .question-item .form-group { margin-top: 10px; }

        /* --- Custom Audio Player Button --- */
        .btn-play-audio {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.2s;
        }
        .btn-play-audio:hover {
            background-color: #218838;
        }
        .btn-play-audio:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
            opacity: 0.6;
        }

        /* --- Footer Navigation Buttons --- */
        .navigation-buttons {
            margin-top: 20px;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn { padding: 10px 20px; text-decoration: none; border-radius: 5px; border: none; cursor: pointer; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        
        .save-status-container { display: flex; align-items: center; gap: 10px; }
        .loading, .success-message, .error-message { display: none; font-size: 14px; }
        .loading { color: #007bff; }
        .success-message { color: #28a745; }
        .error-message { color: #dc3545; }
    </style>
@endpush

@section('container')
    <div class="quiz-header">
        <h2>{{ $questionsGroup->title }}</h2>
    </div>
    
    <!-- Quiz Navigation -->
    <div id="quiz-sidebar" class="fixed top-[30%] right-0 transform -translate-y-1/2 z-50 transition-all duration-300">
        <!-- Collapsed State Toggle -->
        <div id="sidebar-collapsed" class="bg-gradient-to-tr from-[#667eea] to-[#764ba2] rounded-l-lg shadow-lg border border-gray-200">
            <button onclick="toggleSidebar()" 
                    class="flex items-center justify-center w-12 h-12 text-white hover:text-blue-600 hover:bg-gray-50 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Expanded State Panel -->
        <div id="sidebar-expanded" class="hidden bg-white rounded-lg shadow-xl border border-gray-200 w-80 max-h-96">
            <!-- Header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gray-50 rounded-t-lg">
                <h3 class="font-semibold text-gray-800">Quiz Navigation</h3>
                <button onclick="toggleSidebar()" 
                        class="p-1 text-gray-400 hover:text-gray-600 hover:bg-gray-200 rounded transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Navigation Content -->
            <div class="p-4 overflow-y-auto max-h-80">
                <div class="grid grid-cols-6 gap-2">
                    @if ($allGroupId)
                        @foreach ($allGroupId as $groupId)
                            <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $groupId]) }}"
                            class="flex items-center justify-center w-10 h-10 text-sm font-bold text-blue-600 bg-gray-100 border border-gray-300 rounded hover:bg-blue-50 hover:border-blue-300 transition-all duration-200 
                                    {{ $groupId == $questionsGroup->id ? 'bg-blue-600 text-white border-blue-600 ring-2 ring-blue-200' : '' }}"
                            title="Question Group {{ $loop->iteration }}">
                                {{ $loop->iteration }}
                            </a>
                        @endforeach
                    @else
                        @foreach ($questionsGroup->questions as $question)
                            <a href="#question-{{ $question->id }}"
                            id="nav-{{ $question->id }}"
                            class="flex items-center justify-center w-10 h-10 text-sm font-bold text-blue-600 bg-gray-100 border border-gray-300 rounded hover:bg-blue-50 hover:border-blue-300 transition-all duration-200 
                                    @if(isset($existingAnswers[$question->id])) bg-green-600 text-white border-green-600 ring-2 ring-green-200 @endif"
                            title="Question {{ $loop->iteration }} @if(isset($existingAnswers[$question->id])) - Answered @endif">
                                {{ $loop->iteration }}
                            </a>
                        @endforeach
                    @endif
                </div>
                
                <!-- Legend -->
                <div class="mt-4 pt-4 border-t border-gray-200 space-y-2">
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <div class="w-4 h-4 bg-blue-600 rounded border"></div>
                        <span>Current/Active</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <div class="w-4 h-4 bg-green-600 rounded border"></div>
                        <span>Answered</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <div class="w-4 h-4 bg-gray-100 rounded border border-gray-300"></div>
                        <span>Not answered</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Version - Bottom Fixed -->
    <div class="fixed bottom-4 left-4 right-4 z-50 md:hidden">
        <div id="mobile-nav-collapsed" class="bg-white rounded-lg shadow-lg border border-gray-200">
            <button onclick="toggleMobileNav()" 
                    class="w-full flex items-center justify-center gap-2 p-3 text-gray-600 hover:text-blue-600 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <span class="text-sm font-medium">Quiz Navigation</span>
            </button>
        </div>
        
        <div id="mobile-nav-expanded" class="hidden bg-white rounded-lg shadow-xl border border-gray-200 max-h-64">
            <!-- Header -->
            <div class="flex items-center justify-between p-3 border-b border-gray-200">
                <span class="font-semibold text-gray-800">Quiz Navigation</span>
                <button onclick="toggleMobileNav()" class="p-1 text-gray-400 hover:text-gray-600 rounded">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Grid -->
            <div class="p-3 overflow-y-auto max-h-48">
                <div class="grid grid-cols-8 gap-2">
                    @if ($allGroupId)
                        @foreach ($allGroupId as $groupId)
                            <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $groupId]) }}"
                            class="flex items-center justify-center w-8 h-8 text-xs font-bold text-blue-600 bg-gray-100 border border-gray-300 rounded transition-all duration-200 
                                    {{ $groupId == $questionsGroup->id ? 'bg-blue-600 text-white border-blue-600' : '' }}">
                                {{ $loop->iteration }}
                            </a>
                        @endforeach
                    @else
                        @foreach ($questionsGroup->questions as $question)
                            <a href="#question-{{ $question->id }}"
                            class="flex items-center justify-center w-8 h-8 text-xs font-bold text-blue-600 bg-gray-100 border border-gray-300 rounded transition-all duration-200 
                                    @if(isset($existingAnswers[$question->id])) bg-green-600 text-white border-green-600 @endif">
                                {{ $loop->iteration }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <form id="quizForm">
        <div class="quiz-container">
            
            @if(!empty($questionsGroup->shared_content))
                <div class="passage-panel">
                    @php
                        $contentParts = explode('|||', $questionsGroup->shared_content, 2);
                        $passageTitle = $contentParts[0] ?? '';
                        $passageBody = $contentParts[1] ?? ($contentParts[0] ?? '');
                        if (count($contentParts) < 2) { $passageTitle = ''; }
                    @endphp

                    @if($passageTitle)
                        <h4 style="font-weight: bold; margin-bottom: 1.5rem;">{{ $passageTitle }}</h4>
                    @endif

                    <div style="text-align: justify;">
                        {!! str_replace('<br />', '<br><br>', nl2br(e(stripslashes($passageBody)))) !!}
                    </div>
                </div>
            @endif

            <div class="questions-panel @if(empty($questionsGroup->shared_content)) full-width @endif">
                @foreach ($questionsGroup->questions as $question)
                    <div class="question-item" id="question-{{ $question->id }}">
                        <h5>{{ $loop->iteration }}. {{ $question->question_text }}</h5>
                        
                        {{-- LOGIKA UNTUK MENAMPILKAN MEDIA (AUDIO ATAU GAMBAR) --}}
                        @if ($question->audio_url)
                            <div class="custom-audio-player">
                                <audio id="audio-player-{{ $question->id }}" src="{{ asset('storage/audio/' . $question->audio_url) }}"></audio>
                                <button type="button" class="btn-play-audio" data-audio-id="{{ $question->id }}">
                                    ▶️ Play Audio
                                </button>
                            </div>
                        @elseif ($question->foto_url)
                            <img src="{{ asset('storage/img/' . $question->foto_url) }}" alt="Question Image" style="max-width: 100%; height: auto; border-radius: 8px;">
                        @endif

                        @switch($question->type)
                            @case('fill_blank')
                                <div class="form-group">
                                    <input type="text" name="question_{{ $question->id }}" class="form-control fill-blank-input" data-question-id="{{ $question->id }}" value="{{ $existingAnswers[$question->id]->fill_answer_text ?? '' }}">
                                </div>
                                @break
                            @default
                                @foreach ($question->options as $option)
                                    <div>
                                        <input type="radio" name="question_{{ $question->id }}" value="{{ $option->id }}" id="option-{{ $option->id }}" data-question-id="{{ $question->id }}" class="question-option" @if(isset($existingAnswers[$question->id]) && $existingAnswers[$question->id]->selected_option_id == $option->id) checked @endif>
                                        <label for="option-{{ $option->id }}">{{ $option->option_text }}</label>
                                    </div>
                                @endforeach
                        @endswitch
                    </div>
                @endforeach
            </div>

        </div>

        <div class="navigation-buttons">
            <div>
                 @if($questionsGroup->type == 'text' && $prevGroupId)
                    <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $prevGroupId]) }}" class="btn btn-secondary">Previous</a>
                 @endif
                 <a href="{{ route('user.quiz.sections', ['attempt' => $attemptId]) }}" class="btn btn-secondary">Back to Sections</a>
            </div>
            <div class="save-status-container">
                <span class="loading" id="loadingIndicator">Saving...</span>
                <span class="success-message" id="successMessage">✓ Saved</span>
                <span class="error-message" id="errorMessage">✗ Save failed</span>
            </div>
            <div>
                 @if($questionsGroup->type == 'text' && $nextGroupId)
                    <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $nextGroupId]) }}" class="btn btn-primary" id="nextButton">Next</a>
                @else
                    <a href="{{ route('user.quiz.sections', ['attempt' => $attemptId]) }}" class="btn btn-primary" id="finishButton">Finish Section</a>
                @endif
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // --- FULL JAVASCRIPT FOR AUTO-SAVE ---
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            let saveTimeout;
            let isNavigating = false;

            function saveAnswers(callback) {
                const answers = {};
                $('.question-option:checked').each(function() {
                    const questionId = $(this).data('question-id');
                    const optionId = $(this).val();
                    answers[questionId] = optionId;
                });
                $('.fill-blank-input').each(function() {
                    const questionId = $(this).data('question-id');
                    const answerText = $(this).val();
                    if (answerText.trim() !== '') {
                        answers[questionId] = answerText;
                    }
                });

                if (Object.keys(answers).length === 0) {
                    if (callback) callback();
                    return;
                }

                showLoading();

                $.ajax({
                    url: '{{ route("user.attempt.save.answer.ajax", ["attempt" => $attemptId]) }}',
                    method: 'POST',
                    data: {
                        answers: answers,
                        question_group_id: {{ $questionsGroup->id }},
                        section_id: {{ $sectionId }}
                    },
                    success: function(response) {
                        showSuccess();
                        if (callback) callback();
                    },
                    error: function(xhr, status, error) {
                        showError();
                        console.error('Save error:', error);
                        if (callback) callback();
                    }
                });
            }

            $('.question-option, .fill-blank-input').on('change keyup', function() {
                clearTimeout(saveTimeout);
                saveTimeout = setTimeout(saveAnswers, 500);
            });
            
            $('#nextButton, #finishButton').on('click', function(e) {
                const href = $(this).attr('href');
                if (href.startsWith('#')) return;
                
                if (!isNavigating) {
                    e.preventDefault();
                    saveAnswers(function() {
                        isNavigating = true;
                        window.location.href = href;
                    });
                }
            });

            $(window).on('beforeunload', function() {
                if (!isNavigating) {
                    saveAnswers();
                }
            });

            function showLoading() {
                $('#successMessage, #errorMessage').hide();
                $('#loadingIndicator').show();
            }
            function showSuccess() {
                $('#loadingIndicator, #errorMessage').hide();
                $('#successMessage').show();
                setTimeout(() => $('#successMessage').hide(), 2000);
            }
            function showError() {
                $('#loadingIndicator, #successMessage').hide();
                $('#errorMessage').show();
                setTimeout(() => $('#errorMessage').hide(), 3000);
            }
            
            // --- SCRIPT TAMBAHAN UNTUK UI ---
            $('.question-option, .fill-blank-input').on('change keyup', function() {
                const questionId = $(this).data('question-id');
                $('#nav-' + questionId).addClass('answered');
            });

            if ($('.questions-panel.full-width').length > 0) {
                const questionPanel = $('.questions-panel.full-width');
                const navLinks = $('.nav-item');
                questionPanel.on('scroll', function() {
                    let currentQuestionId = '';
                    $('.question-item').each(function() {
                        const questionTop = $(this).position().top;
                        if (questionTop >= -10 && questionTop < questionPanel.height() / 2) {
                            currentQuestionId = $(this).attr('id');
                            return false;
                        }
                    });
                    if (currentQuestionId) {
                        navLinks.removeClass('active');
                        $('a[href="#' + currentQuestionId + '"]').addClass('active');
                    }
                });
                questionPanel.trigger('scroll');
            }

            // --- JAVASCRIPT UNTUK AUDIO PLAYER ---
            $('.btn-play-audio').on('click', function() {
                const button = $(this);
                const audioId = button.data('audio-id');
                const audioElement = $('#audio-player-' + audioId)[0]; 

                if (audioElement) {
                    audioElement.play();
                    button.prop('disabled', true);
                    button.html('Playing...');

                    $(audioElement).on('ended', function() {
                        button.html('✔️ Played');
                    });
                }
            });
        });

        // Desktop sidebar toggle
        function toggleSidebar() {
            const collapsed = document.getElementById('sidebar-collapsed');
            const expanded = document.getElementById('sidebar-expanded');
            
            if (expanded.classList.contains('hidden')) {
                collapsed.classList.add('hidden');
                expanded.classList.remove('hidden');
            } else {
                expanded.classList.add('hidden');
                collapsed.classList.remove('hidden');
            }
        }

        // Mobile navigation toggle
        function toggleMobileNav() {
            const collapsed = document.getElementById('mobile-nav-collapsed');
            const expanded = document.getElementById('mobile-nav-expanded');
            
            if (expanded.classList.contains('hidden')) {
                collapsed.classList.add('hidden');
                expanded.classList.remove('hidden');
            } else {
                expanded.classList.add('hidden');
                collapsed.classList.remove('hidden');
            }
        }

        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('quiz-sidebar');
            const mobileNav = document.getElementById('mobile-nav-expanded');
            
            // Close desktop sidebar if click is outside
            // if (!sidebar.contains(event.target) && !document.getElementById('sidebar-expanded').classList.contains('hidden')) {
            //     toggleSidebar();
            // }
            
            // Close mobile nav if click is outside
            if (!event.target.closest('#mobile-nav-collapsed') && !event.target.closest('#mobile-nav-expanded') && !mobileNav.classList.contains('hidden')) {
                toggleMobileNav();
            }
        });

        // Auto-scroll to active question
        document.addEventListener('DOMContentLoaded', function() {
            const activeNav = document.querySelector('.bg-blue-600');
            if (activeNav) {
                activeNav.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            // Untuk pilihan (radio button)
            document.querySelectorAll(".question-option").forEach(input => {
                input.addEventListener("change", function () {
                    let qid = this.dataset.questionId;
                    let navItem = document.getElementById("nav-" + qid);
                    if (navItem) {
                        navItem.classList.remove("bg-gray-100", "text-blue-600", "border-gray-300");
                        navItem.classList.add("bg-green-600", "text-white", "border-green-600", "ring-2", "ring-green-200");
                    }
                });
            });

            // Untuk isian fill in the blank
            document.querySelectorAll(".fill-blank-input").forEach(input => {
                input.addEventListener("input", function () {
                    let qid = this.dataset.questionId;
                    let navItem = document.getElementById("nav-" + qid);

                    if (this.value.trim() !== "" && navItem) {
                        navItem.classList.remove("bg-gray-100", "text-blue-600", "border-gray-300");
                        navItem.classList.add("bg-green-600", "text-white", "border-green-600", "ring-2", "ring-green-200");
                    }
                });
            });
        });
    </script>
@endpush

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

        /* --- Moodle-style Quiz Navigation --- */
        .quiz-navigation-panel {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 1rem 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            margin: 0 2rem 1.5rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .quiz-navigation-panel a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            text-decoration: none;
            color: #007bff;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-weight: bold;
            transition: all 0.2s ease-in-out;
        }
        .quiz-navigation-panel a:hover { background-color: #dde4ea; }
        .quiz-navigation-panel a.active {
            background-color: #007bff;
            color: #ffffff;
            border-color: #007bff;
        }
        .quiz-navigation-panel a.answered {
            background-color: #6c757d;
            color: #ffffff;
        }

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

    <div class="quiz-navigation-panel">
        @if ($allGroupId)
            @foreach ($allGroupId as $groupId)
                <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $groupId]) }}"
                   class="nav-item {{ $groupId == $questionsGroup->id ? 'active' : '' }}">
                    {{ $loop->iteration }}
                </a>
            @endforeach
        @else
            @foreach ($questionsGroup->questions as $question)
                <a href="#question-{{ $question->id }}"
                   id="nav-{{ $question->id }}"
                   class="nav-item @if(isset($existingAnswers[$question->id])) answered @endif">
                    {{ $loop->iteration }}
                </a>
            @endforeach
        @endif
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
    </script>
@endpush

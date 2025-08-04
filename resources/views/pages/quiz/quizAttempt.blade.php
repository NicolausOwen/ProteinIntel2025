@extends('pages.quiz.layouts.main')
@section('container')
<style>
    .loading {
        display: none;
        color: #007bff;
        font-size: 14px;
        margin-left: 10px;
    }
    .success-message {
        color: #28a745;
        font-size: 14px;
        margin-left: 10px;
        display: none;
    }
    .error-message {
        color: #dc3545;
        font-size: 14px;
        margin-left: 10px;
        display: none;
    }
    .question-group {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .navigation-buttons {
        margin-top: 20px;
        padding: 15px 0;
    }
    .btn {
        padding: 8px 16px;
        margin: 0 5px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
    }
    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }
    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border: none;
    }
    .auto-save-status {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 10px;
        border-radius: 4px;
        display: none;
    }
    .auto-save-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .auto-save-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>
    <h3>{{ $questionsGroup->title }}</h3>
    @switch($questionsGroup->type)
        @case('audio')
            <audio controls>
                <source src="{{ asset('storage/' . $questionsGroup->shared_content) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        @break
        @case('image')
            <img src="{{ asset('storage/' . $questionsGroup->shared_content) }}" alt="Image Question" style="max-width: 100%; height: auto;">
        @break
        @case('text')
            <h5>text{{ $questionsGroup->shared_content }}</h5>
        @default
    @endswitch

    <div class="auto-save-status" id="autoSaveStatus"></div>

    <form id="quizForm">
        <div class="question-group">
            @foreach ($questionsGroup->questions as $question)
                <div>
                    <h5>Question : {{ $question->question_text }}</h5>
                    <h5>Explanation : {{ $question->explanation }}</h5>
                </div>
                @switch($question->type)
                    @case('fill_blank')
                        <div class="form-group">
                            <label for="question_{{ $question->id }}">Your Answer:</label>
                            <input type="text" 
                                   name="question_{{ $question->id }}" 
                                   id="question_{{ $question->id }}"
                                   class="form-control fill-blank-input"
                                   data-question-id="{{ $question->id }}"
                                   value="{{ $existingAnswers[$question->id]->fill_answer_text ?? '' }}">
                        </div>
                    @break
                    {{-- multiple choice and true_false --}}
                    @default
                        @foreach ($question->options as $option)
                            <div>
                                <input type="radio" 
                                name="question_{{ $question->id }}" 
                                value="{{ $option->id }}" 
                                id="option-{{ $option->id }}"
                                data-question-id="{{ $question->id }}"
                                class="question-option"
                                @if(isset($existingAnswers[$question->id]) && $existingAnswers[$question->id]->selected_option_id == $option->id) checked @endif>
                                <label for="option-{{ $option->id }}">{{ $option->option_text }}</label>
                            </div>
                        @endforeach
                @endswitch
                <hr>
            @endforeach
        </div>

        <div class="navigation-buttons">
            @if($prevGroupId)
                <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $prevGroupId]) }}" 
                   class="btn btn-secondary">Previous</a>
            @endif
                    
            @if($nextGroupId)
                <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $nextGroupId]) }}" 
                   class="btn btn-primary" id="nextButton">Next</a>
            @else
                <a href="{{ route('user.quiz.sections', ['attempt' => $attemptId]) }}" 
                   class="btn btn-primary" id="finishButton">Finish</a>
            @endif

            <span class="loading" id="loadingIndicator">Saving...</span>
            <span class="success-message" id="successMessage">✓ Saved</span>
            <span class="error-message" id="errorMessage">✗ Save failed</span>
        </div>
    </form>
    {{-- js autosubmit --}}
    <form id="autoSubmitForm" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Set up CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let saveTimeout;
            let isNavigating = false;

            // Auto-save when radio button is changed
            $('.question-option').on('change', function() {
                clearTimeout(saveTimeout);
                
                // Debounce saving to avoid too many requests
                saveTimeout = setTimeout(function() {
                    saveAnswers();
                }, 500);
            });

            // Save answers before navigation
            $('#nextButton, #finishButton').on('click', function(e) {
                if (!isNavigating) {
                    e.preventDefault();
                    const href = $(this).attr('href');
                    
                    saveAnswers(function() {
                        isNavigating = true;
                        window.location.href = href;
                    });
                }
            });

            // Save answers before page unload
            $(window).on('beforeunload', function() {
                if (!isNavigating) {
                    saveAnswers();
                }
            });

            function saveAnswers(callback) {
                const answers = {};
                
                // Collect all selected answers
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

                // Only save if there are answers
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
                        showAutoSaveStatus('Answers saved successfully', 'success');
                        if (callback) callback();
                    },
                    error: function(xhr, status, error) {
                        showError();
                        showAutoSaveStatus('Failed to save answers', 'error');
                        console.error('Save error:', error);
                        if (callback) callback(); // Still navigate even if save fails
                    }
                });
            }

            function showLoading() {
                hideAllMessages();
                $('#loadingIndicator').show();
            }

            function showSuccess() {
                hideAllMessages();
                $('#successMessage').show();
                setTimeout(hideAllMessages, 2000);
            }

            function showError() {
                hideAllMessages();
                $('#errorMessage').show();
                setTimeout(hideAllMessages, 3000);
            }

            function hideAllMessages() {
                $('#loadingIndicator, #successMessage, #errorMessage').hide();
            }

            function showAutoSaveStatus(message, type) {
                const statusDiv = $('#autoSaveStatus');
                statusDiv.removeClass('auto-save-success auto-save-error');
                statusDiv.addClass('auto-save-' + type);
                statusDiv.text(message);
                statusDiv.show();
                
                setTimeout(function() {
                    statusDiv.hide();
                }, 3000);
            }

            // Manual save button (optional)
            if ($('#manualSaveButton').length) {
                $('#manualSaveButton').on('click', function() {
                    saveAnswers();
                });
            }
        });
    </script>
@endsection
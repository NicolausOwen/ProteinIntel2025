<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>{{ $questionsGroup->title }}</h3>
    <h5>{{ $questionsGroup->sharde_content }}</h5>

    <form action="{{ route('user.attempt.save.answer', 'attempt' => $attemptId) }}" method="post">
    @foreach ($questionsGroup->questions as $question)
        <div>
            <h5>Question : {{ $question->question_text }}</h5>
            <h5>Explanation : {{ $question->explanation }}</h5>
        </div>
        <input type="text" name="question_id" value="{{ $question->id }}" hidden>
        @foreach ($question->options as $option)
            <div>
                <input type="radio" name="answer[{{ $option->option_text }}]" value="{{ $option->id }}" id="option-{{ $option->id }}">
                <label for="option-{{ $option->id }}">{{ $option->option_text }}</label>
            </div>
        @endforeach
    @endforeach

    @if($prevGroupId)
        <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $prevGroupId]) }}">Previous</a>
    @endif
            
    @if($nextGroupId)
        <a href="{{ route('user.attempt.questions', ['attempt' => $attemptId, 'section' => $sectionId, 'questionGroupId' => $nextGroupId]) }}">Next</a>
    @else
        <a href="{{ route('user.quiz.sections', ['attempt' => $attemptId]) }}">Finish</a>
    @endif

    </form>

    <br><br>
    
    {{-- @foreach ($questions as $index => $question)
        <a href="{{ route('user.attempt.start', ['attempt' => $attempt->id, 'section' => $section->id, 'questionNumber' => $index + 1]) }}">
            <button>
                {{ $index + 1 }}
            </button>
        </a>
    @endforeach --}}

</body>
</html>
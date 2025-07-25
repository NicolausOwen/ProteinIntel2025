{{-- @php
    dump($attempt);
    dump($currentQuestion);
    dump($questionNumber);
    dump($questions);
@endphp --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>section : {{ $section->name }}</h1>
    <h3>{{ $questionNumber }}. {{ $currentQuestion->question_text }}</h3>
    <h5>explanation : {{ $currentQuestion->explanation }}</h5>
    @foreach ($currentQuestion->options as $option)
        <div>
            <input type="radio" name="answer" value="{{ $option->id }}" id="option-{{ $option->id }}">
            <label for="option-{{ $option->id }}">{{ $option->option_text }}</label>
        </div>
    @endforeach

    <button>
        <a href="{{ route('user.attempt.start', ['attempt' => $attempt->id, 'section' => $section->id, 'questionNumber' => $questionNumber - 1]) }}">
            previous
        </a>
    </button>
    @if ($questionNumber < $totalQuestions)
        <button>
            <a href="{{ route('user.attempt.start', ['attempt' => $attempt->id, 'section' => $section->id, 'questionNumber' => $questionNumber + 1]) }}">
                next
            </a>
        </button>
    @else
        <button>
            <a href="{{ route('user.attempt.show', ['attempt' => $attempt->id]) }}"> {{-- placeholder for finish --}}
                finish
            </a>
        </button>
    @endif

    <br><br>
    
    @foreach ($questions as $index => $question)
        <a href="{{ route('user.attempt.start', ['attempt' => $attempt->id, 'section' => $section->id, 'questionNumber' => $index + 1]) }}">
            <button>
                {{ $index + 1 }}
            </button>
        </a>
    @endforeach

</body>
</html>
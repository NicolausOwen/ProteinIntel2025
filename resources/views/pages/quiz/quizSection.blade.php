<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Quiz : {{ $attempt->quiz->title }}</h1>
    <h2>description :</h2>
    <h3>{{ $attempt->quiz->description }}</h3>
    @foreach ($sections as $section )
        <h2> 
            {{-- rombak route agar user diarahkan ke question group --}}
            <a href="{{ route('user.attempt.questions', ['attempt' => $attempt->id, 'section' => $section->id]) }}">
                section :{{ $section->name }}
            </a>
        </h2>
        {{-- <p>{{ $section->order }}</p> --}}
    @endforeach
</body>
</html>

{{-- quiz data --}}
{{-- {{ $quiz }} --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.quiz.start', $quiz->id) }}" method="post">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        <h1>{{ $quiz->title }}</h1>
        <p>{{ $quiz->description }}</p>
        <button type="submit">Start Quiz</button>
    </form>
</body>
</html>
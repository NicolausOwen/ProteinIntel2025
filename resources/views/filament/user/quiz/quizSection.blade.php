<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($sections as $section )
        <h2>
            <a href="{{ route('user.attempt.start', ['attempt' => $attempt->id, 'section' => $section->id]) }}">
                section :{{ $section->name }}
            </a>
        </h2>
        {{-- <p>{{ $section->order }}</p> --}}
    @endforeach
</body>
</html>
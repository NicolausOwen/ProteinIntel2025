@extends('pages.quiz.layouts.main')
@section('container')
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
    <form action="{{ route('user.attempt.submit',['attempt' => $attempt->id]) }}" method="post">
        @csrf
        <button name="submit">finish</button>
    </form>
@endsection
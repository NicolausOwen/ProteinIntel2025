@extends('pages.quiz.layouts.main')
@section('container')
    <form action="{{ route('user.attempt.start', $quiz->id) }}" method="post">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        <h1>{{ $quiz->title }}</h1>
        <p>{{ $quiz->description }}</p>
        <p>quiz duration : {{ $quiz->duration_minutes }}</p>
        <button onclick="startQuiz()" id="startBtn" type="submit" name = "submit">Start Quiz</button>
    </form>
@endsection

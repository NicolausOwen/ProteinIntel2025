<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;

class QuizResultController extends Controller
{
    public function show(QuizAttempt $attempt)
    {
        $attempt->load(['quiz', 'answers.option.question']);

        return response()->json([
            'quiz_title' => $attempt->quiz->title,
            'score' => $attempt->score,
            'correct_answers' => $attempt->correct_count,
            'answers' => $attempt->answers->map(function ($answer) {
                return [
                    'question' => $answer->option->question->question_text,
                    'is_correct' => $answer->option->is_correct,
                    'explanation' => $answer->option->question->explanation
                ];
            })
        ]);
    }
}
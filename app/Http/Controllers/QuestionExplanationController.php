<?php

namespace App\Http\Controllers;

use App\Models\Question;

class QuestionExplanationController extends Controller
{
    public function show(Question $question)
    {
        return response()->json([
            'question_text' => $question->question_text,
            'explanation' => $question->explanation,
            'correct_options' => $question->options()
                ->where('is_correct', true)
                ->pluck('option_text')
        ]);
    }
}
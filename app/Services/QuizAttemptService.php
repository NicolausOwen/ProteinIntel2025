<?php

namespace App\Services;

use App\Models\QuizAttempt;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;

class QuizAttemptService
{
    public function completeAttempt(QuizAttempt $attempt): void
    {
        $totalQuestions = Question::whereHas('group.section', function ($query) use ($attempt) {
            $query->where('quiz_id', $attempt->quiz_id);
        })->count();

        $correctAnswers = Answer::where('quiz_attempt_id', $attempt->id)
            ->where('is_correct', 1)
            ->count();

        $wrongAnswers = $totalQuestions - $correctAnswers;

        DB::table('quiz_attempts')
            ->where('id', $attempt->id)
            ->update([
                'correct_count' => $correctAnswers,
                'wrong_count' => $wrongAnswers,
                'updated_at' => now(),
                'completed_at' => now(),
                'status' => 'completed'
            ]);
    }
}

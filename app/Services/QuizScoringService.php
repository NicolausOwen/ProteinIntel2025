<?php

namespace App\Services;

use App\Models\QuizAttempt;
use App\Models\Option;

class QuizScoringService
{
    public function calculateScore(QuizAttempt $attempt): void
    {
        $correctAnswers = $attempt->answers()
            ->whereHas('option', fn($q) => $q->where('is_correct', true))
            ->count();

        $totalQuestions = $attempt->answers()->count();
        $score = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;

        $attempt->update([  // Gunakan tanda kurung siku untuk array
            'correct_count' => $correctAnswers,
            'wrong_count' => $totalQuestions - $correctAnswers,
            'score' => $score,
            'completed_at' => now()
        ]);
    }
}
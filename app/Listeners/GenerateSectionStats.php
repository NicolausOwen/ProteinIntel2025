<?php

namespace App\Listeners;

use App\Events\QuizAttemptSubmitted;
use App\Models\QuizAttemptSectionStat;

class GenerateSectionStats
{
    public function handle(QuizAttemptSubmitted $event): void
    {
        $attempt = $event->attempt;

        // Loop section dari jawaban attempt
        foreach ($attempt->quiz->sections as $section) {
            $totalQuestions = $section->questions()->count();
            $correctAnswers = $attempt->answers()
                ->whereHas('question', fn($q) => $q->where('section_id', $section->id))
                ->where('is_correct', true)
                ->count();

            QuizAttemptSectionStat::updateOrCreate(
                [
                    'quiz_attempt_id' => $attempt->id,
                    'section_id' => $section->id,
                ],
                [
                    'correct_count' => $correctAnswers,
                    'total_count' => $totalQuestions,
                ]
            );
        }
    }
}

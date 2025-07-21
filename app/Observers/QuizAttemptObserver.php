<?php

namespace App\Observers;

use App\Models\QuizAttempt;
use App\Services\QuizScoringService;

class QuizAttemptObserver
{
    public function updated(QuizAttempt $attempt)
    {
        if ($attempt->isDirty('completed_at') && $attempt->completed_at) {
            app(QuizScoringService::class)->calculateScore($attempt);
        }
    }
}
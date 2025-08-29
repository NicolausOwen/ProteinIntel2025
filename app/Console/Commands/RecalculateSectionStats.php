<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptSectionStat;

class RecalculateSectionStats extends Command
{
    protected $signature = 'quiz:recalculate-section-stats {attemptId?}';
    protected $description = 'Recalculate section stats for all quiz attempts or a specific attempt';

    public function handle()
    {
        $attemptId = $this->argument('attemptId');

        $query = QuizAttempt::with(['quiz.sections', 'answers.question'])
            ->when($attemptId, fn($q) => $q->where('id', $attemptId));

        $attempts = $query->get();

        if ($attempts->isEmpty()) {
            $this->error('No attempts found.');
            return Command::FAILURE;
        }

        foreach ($attempts as $attempt) {
            foreach ($attempt->quiz->sections as $section) {
                $correctAnswers = $attempt->answers()
                    ->whereHas('question.group', fn($q) => $q->where('section_id', $section->id))
                    ->where('is_correct', true)
                    ->count();

                $totalQuestions = $section->groups()
                    ->withCount('questions')
                    ->get()
                    ->sum('questions_count');


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

            $this->info("Updated stats for attempt ID: {$attempt->id}");
        }

        return Command::SUCCESS;
    }
}

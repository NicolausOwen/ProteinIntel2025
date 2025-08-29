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

        $query = QuizAttempt::with([
            'quiz.sections.groups.questions',
            'answers.question.group.section'
        ])->when($attemptId, fn($q) => $q->where('id', $attemptId));

        $attempts = $query->get();

        if ($attempts->isEmpty()) {
            $this->error('No attempts found.');
            return Command::FAILURE;
        }

        foreach ($attempts as $attempt) {
            foreach ($attempt->quiz->sections as $section) {
                // Hitung jumlah soal resmi di section ini
                $totalQuestions = $section->groups->sum(fn($g) => $g->questions->count());

                // Hitung jawaban benar user
                $correctAnswers = $attempt->answers
                    ->filter(fn($a) => $a->question?->group?->section?->id === $section->id)
                    ->where('is_correct', true)
                    ->count();

                // Jangan sampai lebih dari total
                $correctAnswers = min($correctAnswers, $totalQuestions);
                $wrongAnswers = max($totalQuestions - $correctAnswers, 0);

                // Update ke DB
                QuizAttemptSectionStat::updateOrCreate(
                    [
                        'quiz_attempt_id' => $attempt->id,
                        'section_id' => $section->id,
                    ],
                    [
                        'total_questions' => $totalQuestions,
                        'correct_answers' => $correctAnswers,
                        'wrong_answers' => $wrongAnswers,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }

            $this->info("✅ Updated stats for attempt ID: {$attempt->id}");
        }

        return Command::SUCCESS;
    }
}

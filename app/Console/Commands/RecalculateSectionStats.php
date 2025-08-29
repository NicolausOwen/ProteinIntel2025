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
            'quiz.sections',
            'answers.question.group.section'
        ])->when($attemptId, fn($q) => $q->where('id', $attemptId));

        $attempts = $query->get();

        if ($attempts->isEmpty()) {
            $this->error('No attempts found.');
            return Command::FAILURE;
        }

        foreach ($attempts as $attempt) {
            foreach ($attempt->quiz->sections as $section) {
                // Ambil semua jawaban user di section ini
                $answersInSection = $attempt->answers
                    ->filter(fn($a) => $a->question?->group?->section?->id === $section->id);

                $totalAnswers = $answersInSection->count(); // jumlah soal yg user kerjakan
                $correctAnswers = $answersInSection->where('is_correct', true)->count();
                $wrongAnswers = max($totalAnswers - $correctAnswers, 0); // biar ga negatif

                QuizAttemptSectionStat::updateOrCreate(
                    [
                        'quiz_attempt_id' => $attempt->id,
                        'section_id' => $section->id,
                    ],
                    [
                        'total_questions' => $totalAnswers,
                        'correct_answers' => $correctAnswers,
                        'wrong_answers' => $wrongAnswers,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }

            $this->info("Updated stats for attempt ID: {$attempt->id}");
        }

        return Command::SUCCESS;
    }
}

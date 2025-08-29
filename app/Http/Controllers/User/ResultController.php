<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show($attemptId)
    {
        // Ambil attempt user yang sesuai
        $attempt = QuizAttempt::with([
            'quiz',
            'answers.question.options', // include semua opsi soal
            'answers.selectedOption'
        ])
            ->where('id', $attemptId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Hitung jumlah benar & salah
        $totalQuestions = $attempt->correct_count + $attempt->wrong_count;
        $correctAnswers = $attempt->correct_count;
        $wrongAnswers = $attempt->wrong_count;

        // Persentase benar
        $percentage = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;
        $accuracy = $totalQuestions > 0 ? $correctAnswers / $totalQuestions : 0;

        // TOEFL ITP max score = 677, min sekitar 310
        $minScore = 310;
        $maxScore = 677;

        // Estimasi skor
        $toeflScore = round($minScore + ($maxScore - $minScore) * $accuracy);


        DB::table('quiz_attempts')
            ->where('id', $attemptId)
            ->update([
                'score' => $toeflScore,
                'percentage' => $percentage
            ]);

        return view('pages.quiz.result', [
            'attempt' => $attempt,
            'totalQuestions' => $totalQuestions,
            'correctAnswers' => $correctAnswers,
            'wrongAnswers' => $wrongAnswers,
            'percentage' => $percentage,
            'score' => $toeflScore
        ]);
    }

    public function review($attemptId)
    {
        $attempt = QuizAttempt::with([
            'quiz',
            'answers.question.group.section', // tambahkan relasi ke group->section
            'answers.question.options',
            'answers.selectedOption'
        ])
            ->where('id', $attemptId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Hitung benar/salah per section
        $sectionStats = $attempt->answers
            ->groupBy(fn($answer) => $answer->question->group->section->id ?? null)
            ->map(function ($answers) {
                $total = $answers->count();
                $correct = $answers->where('is_correct', true)->count();
                $wrong = $total - $correct;

                return [
                    'section_id' => $answers->first()->question->group->section->id ?? null,
                    'total' => $total,
                    'correct' => $correct,
                    'wrong' => $wrong,
                    'percentage' => $total > 0 ? round(($correct / $total) * 100, 2) : 0
                ];
            });


        foreach ($sectionStats as $stats) {
            if ($stats['section_id']) {
                DB::table('quiz_attempt_section_stats')->updateOrInsert(
                    [
                        'quiz_attempt_id' => $attempt->id,
                        'section_id' => $stats['section_id'],
                    ],
                    [
                        'total_questions' => $stats['total'],
                        'correct_answers' => $stats['correct'],
                        'wrong_answers' => $stats['wrong'],
                        'updated_at' => now(),
                    ]
                );
            }
        }

        return view('pages.quiz.review', [
            'attempt' => $attempt,
            'sectionStats' => $sectionStats
        ]);
    }

}

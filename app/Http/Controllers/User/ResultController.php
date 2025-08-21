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
            'answers.question.options',
            'answers.selectedOption'
        ])
            ->where('id', $attemptId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('pages.quiz.review', [
            'attempt' => $attempt
        ]);
    }
}

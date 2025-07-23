<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\QuizAttempt;

class QuizAttemptController extends Controller
{
    public function start($quizId)
    {
        // $userId = Auth::id();

        $userId = 1;

        // Validasi quiz exists
        $quiz = Quiz::findOrFail($quizId);

        // Cek apakah user sudah pernah attempt quiz ini (optional)
        $existingAttempt = QuizAttempt::where('user_id', $userId)
                                     ->where('quiz_id', $quizId)
                                     ->whereNull('completed_at')
                                     ->first();

        if ($existingAttempt) {
            // Jika sudah ada attempt yang sedang berjalan
            return redirect()->route('user.attempt.start', ['attempt' => $existingAttempt->id])
                            ->with('info', 'Anda memiliki quiz yang sedang berjalan');
        }

        // Buat quiz attempt baru
        $quizAttempt = QuizAttempt::create([
            'user_id' => $userId,
            'quiz_id' => $quizId,
            'started_at' => now(),
            'completed_at' => null, // belum selesai
            'score' => 0,
            'correct_count' => 0,
            'wrong_count' => 0,
            'percentage' => 0.00,
        ]);
        
        return redirect()->route('user.attempt.start', [
            'attempt' => $quizAttempt->id,
            'questionNumber' => 1
        ])->with('success', 'Quiz dimulai!');
    }

    // QuizAttemptController.php
    public function showQuestion($attemptId, $questionNumber)
    {
        $attempt = QuizAttempt::with('quiz.questions')->findOrFail($attemptId);

        // Pastikan user yang mengakses adalah pemilik attempt
        // if ($attempt->user_id !== Auth::id()) {
        //     abort(403);
        // }

        if ($attempt->user_id !== 1) {
            abort(403);
        }

        // Ambil question berdasarkan number
        $questions = $attempt->quiz->questions;
        $currentQuestion = $questions->get($questionNumber - 1); // index dimulai dari 0

        if (!$currentQuestion) {
            // Jika question tidak ditemukan, redirect ke hasil
            return redirect()->route('quiz.result', ['attempt' => $attempt->id]);
        }

        return view('filament/user/quiz/quizAttempt', compact('attempt', 'currentQuestion', 'questionNumber', 'questions'));
    }

}

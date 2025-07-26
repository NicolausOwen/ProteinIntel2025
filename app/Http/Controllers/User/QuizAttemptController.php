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
        $userId = Auth::id();

        // Validasi quiz exists
        // $quiz = Quiz::findOrFail($quizId);

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
        
        return redirect()->route('user.attempt.show', [
            'attempt' => $quizAttempt->id,
        ]);
    }
}

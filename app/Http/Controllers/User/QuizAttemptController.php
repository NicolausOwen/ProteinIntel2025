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
        ])->with('success', 'Quiz dimulai!');
    }

    public function showSections($attemptId)
    {
        $attempt = QuizAttempt::with('quiz')->findOrFail($attemptId);

        // user credentials validation
        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        $sections = $attempt->quiz->sections()
                                 ->select('id', 'name', 'order')
                                 ->get();

        if ($sections->isEmpty()) {
            return redirect()->route('user.result.show', ['attempt' => $attempt->id])
                             ->with('error', 'Tidak ada section dalam quiz ini.');
        }

        return view('filament/user/quiz/quizSection', compact('attempt', 'sections'));
    }

    // QuizAttemptController.php
    public function showQuestion($attemptId, $sectionId, $questionNumber = 1)
    {
        $attempt = QuizAttempt::with('quiz.sections.questions.options')->findOrFail($attemptId);

        // user credentials validation
        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        // Ambil section yang dipilih
        $section = $attempt->quiz->sections->where('id', $sectionId)->first();

        if (!$section) {
            return redirect()->route('user.result.show', ['attempt' => $attempt->id])
                             ->with('error', 'Section tidak ditemukan.');
        }

        // Ambil questions dari section yang dipilih
        $questions = $section->questions;
        $currentQuestion = $questions->get($questionNumber - 1); // index dimulai dari 0
        $totalQuestions = $questions->count();

        // if (!$currentQuestion) {
        //     // Jika question tidak ditemukan, redirect ke hasil
        //     return redirect()->route('quiz.section.finish', ['attempt' => $attempt->id]);
        // }

        return view('filament/user/quiz/quizAttempt', 
        compact(
            'attempt', 'section', 'totalQuestions', 'currentQuestion', 'questionNumber', 'questions'
        ));
    }

}

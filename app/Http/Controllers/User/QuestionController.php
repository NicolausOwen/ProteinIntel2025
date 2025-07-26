<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
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

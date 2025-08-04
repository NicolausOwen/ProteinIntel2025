<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index($quizId) 
    {
        $hasCompletedQuiz = QuizAttempt::where('quiz_id', $quizId)
            ->where('user_id', Auth::id())
            ->whereNotNull('completed_at')
            ->exists();

        if ($hasCompletedQuiz) {
            return redirect()->route('home') 
                ->with('message', 'Anda sudah menyelesaikan quiz ini sebelumnya.');
        }

        $quiz = Quiz::select('id', 'title', 'description', 'duration_minutes')->find($quizId);
        session(['quiz_data' => ['duration_minutes' => $quiz->duration_minutes]]);

        return view('pages/quiz/quiZDetail', compact('quiz'));
    }
    
    public function showSections($attemptId)
    {
        $attempt = QuizAttempt::select('id', 'user_id', 'quiz_id')
            ->with(['quiz' => function($query) {
                $query->select('id', 'title', 'description', 'duration_minutes') 
                      ->with(['sections' => function($q) {
                          $q->select('id', 'quiz_id', 'name', 'order');
                      }]);
            }])
            ->findOrFail($attemptId); 

        session([
            'quiz_data' => [
                'attempt_id' => $attempt->id,
                'id' => $attempt->quiz->id,
                'duration_minutes' => $attempt->quiz->duration_minutes,
                'started_at' => now(),
                'title' => $attempt->quiz->title
            ]
        ]);

        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        $sections = $attempt->quiz->sections;

        if ($sections->isEmpty()) {
            return redirect()->route('user.result.show', ['attempt' => $attempt->id])
                             ->with('error', 'Tidak ada section dalam quiz ini.');
        }

        return view('pages/quiz/quizSection', compact('attempt', 'sections'));
    }
}

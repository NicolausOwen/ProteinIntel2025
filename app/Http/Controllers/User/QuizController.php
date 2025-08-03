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
        return view('pages/quiz/quiZDetail', [
            'quiz' => Quiz::select('id', 'title', 'description', 'duration_minutes')->find($quizId)
        ]);
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
                'id' => $attempt->quiz->id,
                'duration_minutes' => $attempt->quiz->duration_minutes,
                'started_at' => now(),
                'title' => $attempt->quiz->title
            ]
        ]);

        // user credentials validation
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

    public function submit(Request $request, $quiz)
    {
        // Logic to handle quiz submission
        // Validate and process the submitted answers
        return redirect()->route('user.result.show', ['attempt' => $request->attempt_id]);
    }
}

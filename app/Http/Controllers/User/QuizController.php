<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index($quizId)
    {
        // // cek kalau user sudah menyelesaikan quiz
        $quizAttempt = QuizAttempt::where('quiz_id', $quizId)
            ->where('user_id', Auth::id())
            ->whereNull('completed_at')
            ->first();
        
        if ($quizAttempt) {
            $attemptStatus = $quizAttempt->status;
            $attemptEnd = $quizAttempt->end_at;
            $attemptId = $quizAttempt->id;

            if($attemptStatus == 'completed' || now()->greaterThanOrEqualTo($attemptEnd)){
            Notification::make()
                ->title('Waktu kuis sudah habis')
                ->success()
                ->send();  

            app(\App\Services\QuizAttemptService::class)->completeAttempt($quizAttempt);
            session()->forget('quiz_attempt_session');

            return redirect()->route('user.attempt.result', $attemptId);
            }
        }

        


        // cek kalau user sudah punya attempt tapi belum selesai
        $existingAttempt = QuizAttempt::where('quiz_id', $quizId)
            ->where('user_id', Auth::id())
            ->whereNull('completed_at')
            ->first();

        if ($existingAttempt) {
            // langsung redirect ke halaman sections
            return redirect()->route('user.quiz.sections', $existingAttempt->id);
        }

        // kalau belum ada attempt sama sekali → tampil detail quiz
        $attempts = QuizAttempt::where('user_id', Auth::id())->get();
        $quiz = Quiz::select('id', 'title', 'description', 'duration_minutes')->find($quizId);

        $remaining = 0;
        

        return view('pages.quiz.quizDetail', compact('quiz', 'attempts', 'remaining'));
    }


    public function showSections($attemptId)
    {
        $attempt = QuizAttempt::select('id', 'user_id', 'quiz_id')
            ->with([
                'quiz' => function ($query) {
                    $query->select('id', 'title', 'description', 'duration_minutes')
                        ->with([
                            'sections' => function ($q) {
                                $q->select('id', 'quiz_id', 'name', 'order');
                            }
                        ]);
                }
            ])
            ->findOrFail($attemptId);


        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        $remaining = 0;

        $quizSession = session('quiz_attempt_session');

        if (!$quizSession || !isset($quizSession['end_at'])) {
            
            $attempted = QuizAttempt::where('user_id', Auth::id())
                ->where('quiz_id', $attempt->quiz_id)
                ->where('status', 'in_progress') 
                ->latest()
                ->first();

            if($attempted){
                    session([
                        'quiz_attempt_session' => [
                            'attempt_id'       => $attempted->id,
                            'quiz_id'          => $attempted->quiz_id,
                            'duration_minutes' => $attempted->quiz->duration_minutes,
                            'started_at'       => $attempted->started_at,
                            'end_at'           => $attempted->end_at,
                            'title'            => $attempted->quiz->title,
                        ]
                    ]);

                    $quizSession = session('quiz_attempt_session');

                    $remaining = now()->diffInSeconds(\Carbon\Carbon::parse($quizSession['end_at']), false);

                    $sections = $attempted->quiz->sections;
                    if ($sections->isEmpty()) {
                        return redirect()->route('filament.user.pages.available-quizzes')
                            ->with('error', 'Tidak ada section dalam quiz ini.');
                    }

                     return view('pages.quiz.quizSection', [
                        'attempt'   => $attempt,
                        'sections'  => $sections,
                        'remaining' => $remaining,
                    ]);
            }

            

        }

        $remaining = now()->diffInSeconds(\Carbon\Carbon::parse($quizSession['end_at']), false);

        // Cek sections
        $sections = $attempt->quiz->sections;
        if ($sections->isEmpty()) {
            return redirect()->route('filament.user.pages.available-quizzes')
                ->with('error', 'Tidak ada section dalam quiz ini.');
        }

        // Cek waktu habis
        if ($remaining < 0) {
            Notification::make()
                ->title('Waktu kuis sudah habis')
                ->success()
                ->send();   

            return redirect()->route('user.attempt.result', ['attempt' => $attempt->id])
                ->with('error', 'Waktu kuis sudah habis.');
        }


        return view('pages.quiz.quizSection', compact('attempt', 'sections', 'remaining'));

    }
}

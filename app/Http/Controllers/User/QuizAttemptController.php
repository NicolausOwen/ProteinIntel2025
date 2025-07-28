<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\QuestionGroup;
use Illuminate\Support\Facades\Cache;

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
        
        return redirect()->route('user.quiz.sections', [
            'attempt' => $quizAttempt->id
        ]);
    }

    
    // public function showQuestion($attemptId, $questionGroupId = 1)
    // {
    //     $userAttemptId = QuizAttempt::where('id', $attemptId)->value('user_id');


    //     $questionGroupId = [];

        
    //     if ($userAttemptId !== Auth::id()) {
    //         abort(403);
    //     }

    //     $questionsGroup = QuestionGroup::with([
    //         'questions' => function($query) {
    //             $query->select('id', 'question_text', 'explanation', 'question_group_id');
    //         },
    //         'questions.options' => function($query) {
    //             $query->select('id', 'option_text', 'is_correct', 'question_id');
    //         }
    //     ])
    //     ->findOrFail($questionGroupId);
        

    //     // if (!$currentQuestion) {
    //     //     // Jika question tidak ditemukan, redirect ke hasil
    //     //     return redirect()->route('quiz.section.finish', ['attempt' => $attempt->id]);
    //     // }

    //     return view('filament/user/quiz/quizAttempt', 
    //     compact('userAttemptId', 'questionsGroup', 'questionGroupId'));
    // }

    public function showQuestion($attemptId, $sectionId, $questionGroupId = NULL)
    {
        // Cache key untuk user attempt validation
        $userAttemptCacheKey = "quiz_attempt_user_{$attemptId}";

        $userAttemptId = Cache::remember($userAttemptCacheKey, 3600, function() use ($attemptId) {
            return QuizAttempt::where('id', $attemptId)->value('user_id');
        });

        if ($userAttemptId !== Auth::id()) {
            abort(403);
        }

        // Cache untuk group IDs di section yang sama
        $groupIdsCacheKey = "section_group_ids_{$sectionId}";

        $groupIds = Cache::remember($groupIdsCacheKey, 1800, function() use ($sectionId) {
            return QuestionGroup::where('section_id', $sectionId)
                ->orderBy('id')
                ->pluck('id')
                ->toArray();
        });

        if (is_null($questionGroupId)) {
            // Jika tidak ada questionGroupId, ambil group pertama di section
            $questionGroupId = $groupIds[0];
        }

        // Cari posisi sekarang di dalam array
        $currentIndex = array_search($questionGroupId, $groupIds);

        // Ambil ID sebelumnya dan sesudahnya, kalau ada
        $nextGroupId = $groupIds[$currentIndex + 1] ?? null;
        $prevGroupId = $groupIds[$currentIndex - 1] ?? null;

        // Cache untuk question group dengan semua relasi
        $questionGroupCacheKey = "question_group_full_{$questionGroupId}";

        $questionsGroup = Cache::remember($questionGroupCacheKey, 1800, function() use ($questionGroupId) {
            return QuestionGroup::with([
                'questions' => function ($query) {
                    $query->select('id', 'question_text', 'explanation', 'question_group_id');
                },
                'questions.options' => function ($query) {
                    $query->select('id', 'option_text', 'is_correct', 'question_id');
                }
            ])->findOrFail($questionGroupId);
        });

        return view('pages/quiz/quizAttempt', compact(
            'attemptId',
            'sectionId',
            'questionsGroup',
            'questionGroupId',
            'nextGroupId',
            'prevGroupId'
        ));
    }

}

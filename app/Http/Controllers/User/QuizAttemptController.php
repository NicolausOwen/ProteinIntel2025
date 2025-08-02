<?php

namespace App\Http\Controllers\User;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use App\Models\QuizAttempt;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Models\QuestionGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class QuizAttemptController extends Controller
{
    public function start($quizId)
    {
        $userId = Auth::id();

        // Validasi quiz exists
        // $quiz = Quiz::findOrFail($quizId);

        // cek apakah user sudah memiliki quiz attempt yang belum selesai
        $existingAttempt = QuizAttempt::where('user_id', $userId)
                                     ->where('quiz_id', $quizId)
                                     ->whereNull('completed_at')
                                     ->first();

        if ($existingAttempt) {
            return redirect()->route('user.attempt.start', ['attempt' => $existingAttempt->id])
                            ->with('info', 'Anda memiliki quiz yang sedang berjalan');
        }

        // Buat quiz attempt baru
        $quizAttempt = QuizAttempt::create([
            'user_id' => $userId,
            'quiz_id' => $quizId,
            'started_at' => now(),
            'completed_at' => null,
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
            $questionGroupId = $groupIds[0];
        }

        $currentIndex = array_search($questionGroupId, $groupIds);

        
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
      
        $existingAnswers = Answer::where('quiz_attempt_id', $attemptId)
            ->whereIn('question_id', $questionsGroup->questions->pluck('id'))
            ->pluck('selected_option_id', 'question_id')
            ->toArray();

            return view('pages/quiz/quizAttempt', compact(
            'attemptId',
            'sectionId',
            'questionsGroup',
            'questionGroupId',
            'nextGroupId',
            'prevGroupId',
            'existingAnswers'
        ));
    }

    // public function saveAnswer(Request $request, $attemptId)
    // {
    //     $request->validate([
    //         'question_id' => 'required|exists:questions,id',
    //         'selected_option_id' => 'required|exists:options,id',
    //     ]);

    //     $userAttemptCacheKey = "quiz_attempt_user_{$attemptId}";

    //     $userAttemptId = Cache::remember($userAttemptCacheKey, 3600, function() use ($attemptId) {
    //         return QuizAttempt::where('id', $attemptId)->value('user_id');
    //     });

    //     if ($userAttemptId !== Auth::id()) {
    //         abort(403);
    //     }

    //     // Logic untuk menyimpan jawaban
    //     // ...

    //     return redirect()->back()->with('success', 'Jawaban berhasil disimpan.');
    // }

    
    /**
     * Save answers via AJAX for a question group (optimized for bulk operations)
     */
    public function saveAnswerAjax(Request $request, $attemptId)
    {
        try {
            $request->validate([
                'answers' => 'required|array',
                'answers.*' => 'required|integer',
                'question_group_id' => 'required|integer',
                'section_id' => 'required|integer'
            ]);

            $attempt = QuizAttempt::findOrFail($attemptId);

            // Verify user owns this attempt
            if ($attempt->user_id !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $answers = $request->input('answers');
            $questionGroupId = $request->input('question_group_id');

            // Begin single transaction for all answers in this group
            DB::beginTransaction();

            try {
                // OPTIMASI 1: Single query untuk validasi semua question dalam group
                $questionIds = array_keys($answers);
                $validQuestions = Question::whereIn('id', $questionIds)
                    ->where('question_group_id', $questionGroupId)
                    ->pluck('id')
                    ->toArray();

                if (count($validQuestions) !== count($questionIds)) {
                    throw new \Exception('Invalid questions detected');
                }

                // OPTIMASI 2: Single query untuk cek existing answers dalam group ini
                $existingAnswers = Answer::where('quiz_attempt_id', $attemptId)
                    ->whereIn('question_id', $questionIds)
                    ->get()
                    ->keyBy('question_id');

                // OPTIMASI 3: Prepare bulk operations
                $answersToInsert = [];
                $answersToUpdateIds = [];
                $currentTimestamp = now();

                foreach ($answers as $questionId => $optionId) {
                    if (isset($existingAnswers[$questionId])) {
                        // Collect IDs for bulk update
                        $answersToUpdateIds[] = $existingAnswers[$questionId]->id;
                    } else {
                        // Prepare for bulk insert
                        $answersToInsert[] = [
                            'quiz_attempt_id' => $attemptId,
                            'question_id' => $questionId,
                            'selected_option_id' => $optionId,
                            'created_at' => $currentTimestamp,
                            'updated_at' => $currentTimestamp
                        ];
                    }
                }

                // OPTIMASI 4: Execute bulk operations

                // Bulk insert new answers (single query)
                if (!empty($answersToInsert)) {
                    Answer::insert($answersToInsert);
                }

                // Bulk update existing answers (single query per update)
                if (!empty($answersToUpdateIds)) {
                    foreach ($answers as $questionId => $optionId) {
                        if (isset($existingAnswers[$questionId])) {
                            Answer::where('id', $existingAnswers[$questionId]->id)
                                ->update([
                                    'selected_option_id' => $optionId,
                                    'updated_at' => $currentTimestamp
                                ]);
                        }
                    }
                }

                // Manual update is_correct
                foreach ($answers as $questionId => $optionId) {
                    $option = Option::find($optionId);
                    Answer::where('quiz_attempt_id', $attemptId)
                          ->where('question_id', $questionId)
                          ->update(['is_correct' => $option->is_correct ?? false]);
                }

                // OPTIMASI 5: Update attempt progress dengan minimal queries
                // $this->updateAttemptProgress($attempt, $attemptId);
                // logic optimasi ini perlu diperbaiki->teradapat kesalahan pada function updateAttemptProgress

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Answers saved successfully',
                    'saved_count' => count($answers),
                    'group_id' => $questionGroupId
                ]);

            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

        } catch (\Throwable $e) {
            Log::error('Error saving answers via AJAX: ' . $e->getMessage(), [
                'attempt_id' => $attemptId,
                'user_id' => Auth::id(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Failed to save answers',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update attempt progress (optimized version)
     */
    private function updateAttemptProgress($attempt, $attemptId)
    {
        // OPTIMASI: Single query untuk count total questions
        $totalQuestions = Question::whereHas('questionGroup.section', function($query) use ($attempt) {
            $query->where('quiz_id', $attempt->quiz_id);
        })->count();

        // OPTIMASI: Single query untuk count answered questions
        $answeredQuestions = Answer::where('attempt_id', $attemptId)->count();

        // Calculate progress percentage
        $progressPercentage = $totalQuestions > 0 ? ($answeredQuestions / $totalQuestions) * 100 : 0;

        // OPTIMASI: Single update query
        DB::table('quiz_attempts')
            ->where('id', $attemptId)
            ->update([
                'percentage' => round($progressPercentage, 2),
                'answered_questions_count' => $answeredQuestions,
                'total_questions_count' => $totalQuestions,
                'last_activity_at' => now(),
                'updated_at' => now()
            ]);
    }

    /**
     * Get attempt statistics (optional method for additional info)
     */
    public function getAttemptStats($attemptId)
    {
        try {
            $attempt = QuizAttempt::with([
                'answers.question.questionGroup.section',
                'quiz.sections.questionGroups.questions'
            ])->findOrFail($attemptId);

            if ($attempt->user_id !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $stats = [
                'total_questions' => $attempt->total_questions_count ?? 0,
                'answered_questions' => $attempt->answered_questions_count ?? 0,
                'progress_percentage' => $attempt->progress_percentage ?? 0,
                'sections_completed' => 0,
                'time_spent' => $attempt->created_at->diffInMinutes(now())
            ];

            return response()->json($stats);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to get stats'], 500);
        }
    }
}

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

        // return redirect()->route('user.attempt.result', $attempt->id);

        return redirect('/user/available-quizzes')
            ->with('success', 'Terimakasih Telah Mengerjakan Quiz Kami!');
    }

    public function showQuestion($attemptId, $sectionId, $questionGroupId = NULL)
    {
        // Cache key untuk user attempt validation
        $userAttemptCacheKey = "quiz_attempt_user_{$attemptId}";

        $userAttemptId = Cache::remember($userAttemptCacheKey, 3600, function () use ($attemptId) {
            return QuizAttempt::where('id', $attemptId)->value('user_id');
        });

        if ($userAttemptId !== Auth::id()) {
            abort(403);
        }

        // Cache untuk group IDs di section yang sama
        $groupIdsCacheKey = "section_group_ids_{$sectionId}";

        $groupIds = Cache::remember($groupIdsCacheKey, 1800, function () use ($sectionId) {
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

        $questionsGroup = Cache::remember($questionGroupCacheKey, 1800, function () use ($questionGroupId) {
            return QuestionGroup::with([
                'questions' => function ($query) {
                    $query->select('id', 'question_group_id', 'type', 'question_text', 'foto_url', 'audio_url', 'explanation');
                },
                'questions.options' => function ($query) {
                    $query->select('id', 'option_text', 'is_correct', 'question_id');
                }
            ])->findOrFail($questionGroupId);
        });

        // kalau jadi pakai soal tipe isian kosong (fill_blank)
        $existingAnswers = Answer::select('id', 'question_id', 'selected_option_id', 'is_correct')
            ->where('quiz_attempt_id', $attemptId)
            ->whereIn('question_id', $questionsGroup->questions->pluck('id'))
            ->get()
            ->keyBy('question_id');

        // tidak ada fillblank
        // $existingAnswers = Answer::where('quiz_attempt_id', $attemptId)
        //     ->whereIn('question_id', $questionsGroup->questions->pluck('id'))
        //     ->pluck('selected_option_id', 'question_id')
        //     ->toArray();


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

    /**
     * Save answers via AJAX for a question group (optimized for bulk operations)
     */

    public function saveAnswerAjax(Request $request, $attemptId)
    {
        try {
            $request->validate([
                'answers' => 'required|array',
                'question_group_id' => 'required|integer',
                'section_id' => 'required|integer'
            ]);

            $attempt = QuizAttempt::select('user_id')->findOrFail($attemptId);

            // Verify user owns this attempt
            if ($attempt->user_id !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $answers = $request->input('answers');
            $questionGroupId = $request->input('question_group_id');

            // Begin single transaction for all answers in this group
            DB::beginTransaction();

            try {
                // Get questions with their types
                $questionIds = array_keys($answers);
                $questions = Question::whereIn('id', $questionIds)
                    ->where('question_group_id', $questionGroupId)
                    ->get()
                    ->keyBy('id');

                if ($questions->count() !== count($questionIds)) {
                    throw new \Exception('Invalid questions detected');
                }

                // Get existing answers
                $existingAnswers = Answer::where('quiz_attempt_id', $attemptId)
                    ->whereIn('question_id', $questionIds)
                    ->get()
                    ->keyBy('question_id');

                // Prepare bulk operations
                $answersToInsert = [];
                $currentTimestamp = now();

                foreach ($answers as $questionId => $answerValue) {
                    $question = $questions[$questionId];

                    if (isset($existingAnswers[$questionId])) {
                        $existingAnswer = $existingAnswers[$questionId];

                        if ($question->type === 'fill_blank') {
                            // For fill_blank, update text and check correctness
                            $isCorrect = $this->checkFillBlankCorrectness($question, $answerValue);
                            Answer::where('id', $existingAnswer->id)->update([
                                'selected_option_id' => null,
                                'fill_answer_text' => $answerValue,
                                'is_correct' => $isCorrect,
                                'updated_at' => $currentTimestamp
                            ]);
                        } else {
                            // For multiple choice/true_false, update option
                            $option = Option::find($answerValue);
                            Answer::where('id', $existingAnswer->id)->update([
                                'selected_option_id' => $answerValue,
                                'fill_answer_text' => null,
                                'is_correct' => $option->is_correct ?? false,
                                'updated_at' => $currentTimestamp
                            ]);
                        }
                    } else {
                        // Prepare new answer for bulk insert
                        if ($question->type === 'fill_blank') {
                            $isCorrect = $this->checkFillBlankCorrectness($question, $answerValue);
                            $answersToInsert[] = [
                                'quiz_attempt_id' => $attemptId,
                                'question_id' => $questionId,
                                'selected_option_id' => null,
                                'fill_answer_text' => $answerValue,
                                'is_correct' => $isCorrect,
                                'created_at' => $currentTimestamp,
                                'updated_at' => $currentTimestamp
                            ];
                        } else {
                            $option = Option::find($answerValue);
                            $answersToInsert[] = [
                                'quiz_attempt_id' => $attemptId,
                                'question_id' => $questionId,
                                'selected_option_id' => $answerValue,
                                'fill_answer_text' => null,
                                'is_correct' => $option->is_correct ?? false,
                                'created_at' => $currentTimestamp,
                                'updated_at' => $currentTimestamp
                            ];
                        }
                    }
                }

                // Bulk insert new answers
                if (!empty($answersToInsert)) {
                    Answer::insert($answersToInsert);
                }

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
     * handler untuk soal bertipe isian kosong (fill_blank)
     * @param Question $question
     * @param string $userAnswer
     * @return bool
     */
    private function checkFillBlankCorrectness($question, $userAnswer)
    {
        $correctOption = $question->options()->where('question_id', $question->id)->first();
        if ($correctOption) {
            return strtolower(trim($userAnswer)) === strtolower(trim($correctOption->option_text));
        }

        return false;
    }

    public function attemptSubmit($attemptId)
    {
        $attempt = QuizAttempt::select('user_id', 'quiz_id', 'completed_at')->findOrFail($attemptId);

        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        $totalQuestions = Question::whereHas('group.section', function ($query) use ($attempt) {
            $query->where('quiz_id', $attempt->quiz_id);
        })->count();

        $correctAnswers = Answer::where('quiz_attempt_id', $attemptId)->where('is_correct', 1)->count();

        $wrongAnswers = $totalQuestions - $correctAnswers;

        DB::table('quiz_attempts')
            ->where('id', $attemptId)
            ->update([
                'correct_count' => $correctAnswers,
                'wrong_count' => $wrongAnswers,
                'updated_at' => now(),
                'completed_at' => now()
            ]);

        return redirect()->route('user.attempt.result', $attempt->id);
    }

    /**
     * Update attempt progress
     */
    // private function updateAttemptProgress($attempt, $attemptId)
    // {
    //     // OPTIMASI: Single query untuk count total questions
    //     $totalQuestions = Question::whereHas('questionGroup.section', function($query) use ($attempt) {
    //         $query->where('quiz_id', $attempt->quiz_id);
    //     })->count();

    //     // OPTIMASI: Single query untuk count answered questions
    //     $correctAnswers = Answer::where('attempt_id', $attemptId)
    //     ->where('is_true', 1)
    //     ->count();        

    //     // OPTIMASI: Single update query
    //     DB::table('quiz_attempts')
    //         ->where('id', $attemptId)
    //         ->update([
    //             'correct_count' => $correctAnswers,
    //             'wrong_count' => $totalQuestions - $correctAnswers,
    //             'total_questions_count' => $totalQuestions,
    //             'last_activity_at' => now(),
    //             'updated_at' => now()
    //         ]);
    // }
}

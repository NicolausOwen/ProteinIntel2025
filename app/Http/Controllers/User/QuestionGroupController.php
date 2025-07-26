<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;


class QuestionGroupController extends Controller
{
    // questionGroupt controller
    public function showQuestionBLABLABLA($attemptId, $sectionId, $questionGropuId)
    {
        $attempt = QuizAttempt::with('quiz.sections.questions.options')->findOrFail($attemptId);

        // user credentials validation
        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        return view('filament/user/quiz/quizAttempt', compact());
    }
}

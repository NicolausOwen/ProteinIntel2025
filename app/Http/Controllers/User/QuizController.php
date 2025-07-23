<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz; // Assuming you have a Quizz model

class QuizController extends Controller
{
    public function index($quizId) 
    {
        return view('filament/user/quiz/selectedquiz', [
            'quiz' => Quiz::find($quizId)
        ]);
    }
    
    public function submit(Request $request, $quiz)
    {
        // Logic to handle quiz submission
        // Validate and process the submitted answers
        return redirect()->route('user.result.show', ['attempt' => $request->attempt_id]);
    }
}

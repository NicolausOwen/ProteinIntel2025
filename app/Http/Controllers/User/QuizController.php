<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizz; // Assuming you have a Quizz model

class QuizController extends Controller
{
    public function index($quizzId) 
    {
        return view('web/profiles/profile', [
            'profile' => Quizz::find($quizzId)
        ]);
    }
    
    public function submit(Request $request, $quiz)
    {
        // Logic to handle quiz submission
        // Validate and process the submitted answers
        return redirect()->route('user.result.show', ['attempt' => $request->attempt_id]);
    }
}

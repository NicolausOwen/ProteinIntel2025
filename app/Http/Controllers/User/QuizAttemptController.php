<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizAttemptController extends Controller
{
    public function start($quiz)
    {
        $userId = auth()->id();
        // create a new record for the quiz attempt

        // func createNEwRecordForQuizAttempt($userId, $quiz);

        return redirect()->route('user.attempt.start', ['attempt' => $quiz]);
    }

}

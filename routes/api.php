<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    QuizResultController,
    QuestionExplanationController,
    LeaderboardController
};

Route::get('/quiz-results/{attempt}', [QuizResultController::class, 'show']);
Route::get('/questions/{question}/explanation', [QuestionExplanationController::class, 'show']);
Route::get('/leaderboard', [LeaderboardController::class, 'index']);
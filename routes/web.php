<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\ResultController;
use App\Http\Controllers\User\QuizAttemptController;
use App\Models\QuizAttempt;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    // Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    // Route::get('/quizzes', [QuizController::class, 'index'])->name('user.quizzes'); // List all quizzes

    Route::get('/quizzes/{quiz}/start', [QuizController::class, 'index'])->name('user.quiz.index'); // spesific quizz
    Route::post('/quizzes/{quiz}/start', [QuizAttemptController::class, 'start'])->name('user.attempt.start'); // start a quiz 
    
    Route::get('/attempt/{attempt}/section', [QuizController::class, 'showSections'])->name('user.quiz.sections'); 
    Route::get('/attempt/{attempt}/section/{section}/page/{questionGroupId?}', [QuizAttemptController::class, 'showQuestion'])->name('user.attempt.questions'); // show a specific question in the quiz attempt
    // Route::post('/attempt/{attempt}/saveAnswer', [QuizAttemptController::class, 'saveAnswer'])->name('user.attempt.save.answer'); // submit answer for a question

    Route::post('/attempt/{attempt}/save-answer-ajax', [QuizAttemptController::class, 'saveAnswerAjax'])
        ->name('user.attempt.save.answer.ajax');
    Route::get('/attempt/{attempt}/stats', [QuizAttemptController::class, 'getAttemptStats'])
        ->name('user.attempt.stats');

    Route::post('/quizzes/{quiz}/finish', [QuizController::class, 'submit'])->name('user.quiz.submit');
    Route::get('/results/{attempt}', [ResultController::class, 'show'])->name('user.result.show');
});

require __DIR__ . '/auth.php';

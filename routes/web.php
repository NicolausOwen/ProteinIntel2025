<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\ResultController;
use App\Http\Controllers\User\QuizAttemptController;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    // Route::get('/quizzes', [QuizController::class, 'index'])->name('user.quizzes'); // List all quizzes

    Route::get('/quizzes/{quiz}/start', [QuizController::class, 'index'])->name('user.quiz.show'); // spesific quizz
    Route::post('/quizzes/{quiz}/start', [QuizAttemptController::class, 'start'])->name('user.quiz.start'); // start a quiz 
    
    Route::get('/attempt/{attempt}/section', [QuizAttemptController::class, 'showSections'])->name('user.attempt.show'); 
    Route::get('/attempt/{attempt}/section/{section}/question/{questionNumber?}', [QuizAttemptController::class, 'showQuestion'])->name('user.attempt.start'); // show a specific question in the quiz attempt

    Route::post('/quizzes/{quiz}/finish', [QuizController::class, 'submit'])->name('user.quiz.submit');
    Route::get('/results/{attempt}', [ResultController::class, 'show'])->name('user.result.show');
});

require __DIR__ . '/auth.php';

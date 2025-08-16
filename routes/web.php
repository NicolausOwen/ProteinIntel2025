<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\ResultController;
use App\Http\Controllers\User\QuizAttemptController;
use App\Models\QuizAttempt;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/take-a-quiz', function () {
    return view('quiz');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/dashboard', function () {
    return redirect()->route('filament.user.pages.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    // Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    // Route::get('/quizzes', [QuizController::class, 'index'])->name('user.quizzes'); 

    Route::get('/quizzes/{quiz}/start', [QuizController::class, 'index'])->name('user.quiz.index');
    Route::post('/quizzes/{quiz}/start', [QuizAttemptController::class, 'start'])->name('user.attempt.start');

    Route::get('/attempt/{attempt}/section', [QuizController::class, 'showSections'])->name('user.quiz.sections');
    Route::get('/attempt/{attempt}/section/{section}/page/{questionGroupId?}', [QuizAttemptController::class, 'showQuestion'])->name('user.attempt.questions');
    // Route::post('/attempt/{attempt}/saveAnswer', [QuizAttemptController::class, 'saveAnswer'])->name('user.attempt.save.answer'); // submit answer for a question

    Route::post('/attempt/{attempt}/save-answer-ajax', [QuizAttemptController::class, 'saveAnswerAjax'])
        ->name('user.attempt.save.answer.ajax');

    Route::post('/attempt/{attempt}/submit', [QuizAttemptController::class, 'attemptSubmit'])->name('user.attempt.submit');

    Route::get('/attempt/{attempt}/result', [ResultController::class, 'show'])->name('user.attempt.result');
    Route::get('/attempt/{attempt}/review', [ResultController::class, 'review'])->name('user.attempt.review');
});

require __DIR__ . '/auth.php';

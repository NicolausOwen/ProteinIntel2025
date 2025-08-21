<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckQuizAttemptStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\ResultController;
use App\Http\Controllers\User\QuizAttemptController;

// --- Public Routes ---
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/take-a-quiz', function () {
    return view('quiz');
})->name('take.quiz');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about.us');

// --- Authenticated User Routes ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- User Panel Routes ---
Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {

    // --- Quiz Routes ---
    Route::get('/quizzes/{quiz}/start', [QuizController::class, 'index'])->name('user.quiz.index');
    Route::post('/quizzes/{quiz}/start', [QuizAttemptController::class, 'start'])->name('user.attempt.start');

    // --- Quiz Attempt Routes ---
    Route::middleware(CheckQuizAttemptStatus::class)->group(function () {
        Route::get('/attempt/{attempt}/section', [QuizController::class, 'showSections'])->name('user.quiz.sections');
        Route::get('/attempt/{attempt}/section/{section}/page/{questionGroupId?}', [QuizAttemptController::class, 'showQuestion'])
            ->name('user.attempt.questions');
        Route::post('/attempt/{attempt}/save-answer-ajax', [QuizAttemptController::class, 'saveAnswerAjax'])
            ->name('user.attempt.save.answer.ajax');
        Route::post('/attempt/{attempt}/submit', [QuizAttemptController::class, 'attemptSubmit'])->name('user.attempt.submit');        
    });
    
    // --- Optional redirect to Filament dashboard (unique name) ---
    Route::get('/dashboard', function () {
        return redirect()->route('filament.user.pages.dashboard');
    })->name('user.dashboard'); // ✅ unik, tidak menimpa Filament
    
    // --- Quiz Result / Review ---
    Route::get('/attempt/{attempt}/result', [ResultController::class, 'show'])->name('user.attempt.result');
    Route::get('/attempt/{attempt}/review', [ResultController::class, 'review'])->name('user.attempt.review');

});

require __DIR__ . '/auth.php';

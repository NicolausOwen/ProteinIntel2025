<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
//     Route::get('/quizzes', [QuizController::class, 'index'])->name('user.quizzes');
//     Route::get('/quizzes/{quiz}/start', [QuizController::class, 'start'])->name('user.quiz.start');
//     Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('user.quiz.submit');
//     Route::get('/results/{attempt}', [ResultController::class, 'show'])->name('user.result.show');
// });

require __DIR__ . '/auth.php';

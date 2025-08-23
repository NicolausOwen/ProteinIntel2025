<?php

use App\Models\QuizAttempt;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    Log::info('Scanning Quiz Attempts....');

    $attempts = QuizAttempt::where('status', '!=', 'completed')->get();

    foreach ($attempts as $attempt) {
        if (now()->greaterThanOrEqualTo($attempt->end_at)) {
            app(\App\Services\QuizAttemptService::class)->completeAttempt($attempt);
            Log::info("QuizAttempt {$attempt->id} auto completed.");
        }
    }
})->everyThirtySeconds();


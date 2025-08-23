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
        $now = Carbon::now();
        $endAt = Carbon::parse($attempt->end_at);

        if ($now->greaterThanOrEqualTo($endAt)) {
            // waktu habis → set completed
            Log::info('Found!');
            $attempt->status = 'completed';
            $attempt->completed_at = $now;
            $attempt->save();

            Log::info("QuizAttempt ID {$attempt->id} otomatis di-set completed karena waktu habis.");
        }
    }
})->everyThirtySeconds();

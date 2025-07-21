<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\QuizAttempt;
use App\Observers\QuizAttemptObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        QuizAttempt::observe(QuizAttemptObserver::class);
    }
}

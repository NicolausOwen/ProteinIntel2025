<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class QuizAttemptHistory extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        $attempts = QuizAttempt::where('user_id', $user->id)->get();

        $totalScore = $attempts->sum('score');
        $averageScore = $attempts->count() ? $totalScore / $attempts->count() : 0;

        return [
            Stat::make('Total Attempts', $attempts->count()),
            Stat::make('Average Score', number_format($averageScore, 2)),
            Stat::make('Best Score', $attempts->max('score') ?? 0),
        ];
    }
}

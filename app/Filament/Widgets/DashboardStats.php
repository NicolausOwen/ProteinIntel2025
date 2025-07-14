<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Quiz;
use App\Models\QuizAttempt;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            stat::make('Total Users Terdaftar', User::count()),
            stat::make('Total Paket Yang Dibuat', Quiz::count()),
            stat::make('Sudah Mengerjakan', QuizAttempt::distinct('user_id')->count('user_id')),
        ];
    }
}

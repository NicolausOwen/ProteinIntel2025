<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class QuizScoreChart extends ChartWidget
{
    protected static ?string $heading = 'Quiz Performance Over Time';

    protected function getData(): array
    {
        $attempts = QuizAttempt::where('user_id', Auth::id())
            ->orderBy('completed_at')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Score',
                    'data' => $attempts->pluck('score'),
                ],
            ],
            'labels' => $attempts->pluck('completed_at')->map(function ($date) {
                return $date ? $date->format('d M') : 'Belum selesai';
            }),
        ];
    }

    protected function getType(): string
    {
        return 'line';   
    }
}

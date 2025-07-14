<?php

namespace App\Filament\Widgets;

use App\Models\QuizAttempt;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Collection;

class AttemptsChartWidget extends ChartWidget
{
    protected static ?string $heading = '📈 Aktivitas Pengerjaan 7 Hari Terakhir';
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 2;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        // Inisialisasi label tanggal 7 hari ke belakang
        $dates = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dates->put($date, 0);
        }

        // Ambil attempts dan grup berdasarkan tanggal
        $attempts = QuizAttempt::where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->get()
            ->groupBy(fn($attempt) => $attempt->created_at->format('Y-m-d'));

        // Hitung jumlah per tanggal
        foreach ($attempts as $date => $items) {
            if ($dates->has($date)) {
                $dates[$date] = $items->count();
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Attempts',
                    'data' => $dates->values(),
                    'borderColor' => '#3B82F6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $dates->keys(),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'min' => 0,
                    'max' => 50,
                    'ticks' => [
                        'stepSize' => 5,
                    ],
                ],
            ],
        ];
    }
}

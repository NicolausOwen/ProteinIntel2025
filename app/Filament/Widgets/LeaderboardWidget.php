<?php

namespace App\Filament\Widgets;

use App\Models\QuizAttempt;
use App\Models\User;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class LeaderboardWidget extends BaseWidget
{
    protected static ?string $heading = '🏆 Top 5 Skor Tertinggi';
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                QuizAttempt::query()
                    ->with(['user', 'quiz'])
                    ->orderByDesc('score')
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('quiz.title')
                    ->label('Quiz')
                    ->sortable(),

                TextColumn::make('score')
                    ->label('Skor'),

                TextColumn::make('section_stats')
                    ->label('Section Stats')
                    ->getStateUsing(function ($record) {
                        return $record->sectionStats
                            ->map(function ($stat) {
                                return $stat->section->name .
                                    ' (✔ ' . $stat->correct_answers .
                                    ' / ✖ ' . $stat->wrong_answers . ')';
                            })
                            ->join(', ');
                    })
                    ->toggleable()
                    ->wrap(), // biar kalau panjang bisa multi-line

                TextColumn::make('percentage')
                    ->label('Persentase')
                    ->formatStateUsing(fn($state) => $state . '%'),

                TextColumn::make('created_at')
                    ->label('Dikerjakan Pada')
                    ->dateTime('d M Y, H:i'),
            ]);
    }
}

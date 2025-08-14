<?php

namespace App\Filament\User\Widgets;

use App\Models\QuizAttempt;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;


class QuizAttemptTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                QuizAttempt::with('quiz')
                    ->where('user_id', Auth::id())
                    ->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('quiz.title')->label('Quiz Title'),
                Tables\Columns\TextColumn::make('started_at')->dateTime(),
                Tables\Columns\TextColumn::make('completed_at')->dateTime(),
                Tables\Columns\TextColumn::make('score'),
                Tables\Columns\TextColumn::make('correct_count'),
                Tables\Columns\TextColumn::make('wrong_count'),
                Tables\Columns\TextColumn::make('percentage')->formatStateUsing(fn($state) => $state . '%'),
            ]);
    }
}

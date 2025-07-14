<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\PlaceHolder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;



class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Questions';
    protected static ?string $modelLabel = 'Questions for Sections';
    protected static ?string $navigationGroup = 'Quizzes Controller';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->columns(2)
                    ->schema([

                        // Section 1 Tempat dan Tipe Soal
                        Section::make('Tempat dan Tipe Soal')
                            ->description('Input Section Soal dan Tipe Soal')
                            ->schema([
                                Select::make('section_id')
                                    ->label('Section (with Quiz)')
                                    ->options(function () {
                                        return \App\Models\Section::with('quiz')->get()->mapWithKeys(function ($section) {
                                            return [$section->id => '[' . $section->quiz->title . '] ' . $section->name];
                                        });
                                    })
                                    ->required(),


                                // TIPE PILIHAN SOAL
                                Radio::make('type')
                                    ->label('Question Type')
                                    ->options([
                                        'multiple_choice' => 'Multiple Choice',
                                        'true_false' => 'True / False',
                                        'structure' => 'Structure (Fill-In)',
                                    ])
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, \Filament\Forms\Set $set) {
                                        if ($state === 'true_false') {
                                            $set('options', [
                                                ['option_text' => 'True', 'is_correct' => false],
                                                ['option_text' => 'False', 'is_correct' => false],
                                            ]);
                                        } elseif ($state === 'structure') {
                                            $set('options', [
                                                ['option_text' => '', 'is_correct' => true],
                                            ]);
                                        } else {
                                            $set('options', []); // reset for multiple_choice
                                        }
                                    })
                                    ->required(),
                            ])
                            ->columnSpan(2),

                        Section::make('Tempat dan Tipe Soal')
                            ->schema([
                                // ISI SOAL
                                Textarea::make('question_text')
                                    ->label('Input Soal')
                                    ->rows(5)
                                    ->helperText('Masukkan Soal Yang Dibuat')
                                    ->placeholder('Soal Structure, Reading, Listening')
                                    ->required(),

                                // ALASAN BENARNYA
                                Textarea::make('explanation')
                                    ->label('Explanation (Optional)')
                                    ->rows(4)
                                    ->nullable()
                                    ->helperText('Alasan Kenapa Benarnya apa?'),

                            ])
                            ->columnSpan(2),

                        // Opsi Soal Untuk Structure
                        Placeholder::make('correct_answer_note')
                            ->content('Correct Answer will be matched directly to this input.')
                            ->visible(fn(callable $get) => $get('type') === 'structure')
                            ->columnSpanFull(),

                        // Opsi Soal Untuk Structure
                        FileUpload::make('audio_url')
                            ->label('Listening Audio')
                            ->disk('local') // simpan ke storage/app
                            ->directory('audio') // path: storage/app/audio
                            ->acceptedFileTypes(['audio/mpeg', 'audio/mp3', 'audio/wav'])
                            ->maxSize(5120)
                            ->visible(fn(callable $get) => $get('type') === 'true_false')
                            ->helperText('Upload file audio soal Listening (hanya untuk tipe soal True/False).'),

                        // Opsi Soal untuk Multiple dan True/False
                        Repeater::make('options')
                            ->label('Answer Options')
                            ->relationship()
                            ->schema([
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\TextInput::make('option_text')
                                        ->label('Option')
                                        ->required()
                                        ->helperText('Masukkan teks jawaban. Contoh: "A red apple", "False", dll.'),

                                    Forms\Components\Toggle::make('is_correct')
                                        ->label('Correct Answer')
                                        ->default(false)
                                        ->helperText('Tandai jika ini adalah jawaban yang benar. Untuk isian/structure, hanya satu isian.'),
                                ]),
                            ])
                            ->visible(fn(callable $get) => in_array($get('type'), ['multiple_choice', 'true_false', 'structure']))
                            ->default(fn(callable $get) => match ($get('type')) {
                                'multiple_choice' => array_fill(0, 5, ['option_text' => '', 'is_correct' => false]),
                                'true_false' => [
                                    ['option_text' => 'True', 'is_correct' => false],
                                    ['option_text' => 'False', 'is_correct' => false],
                                ],
                                'structure' => [
                                    ['option_text' => '', 'is_correct' => true],
                                ],
                                default => [],
                            })
                            ->minItems(fn(callable $get) => match ($get('type')) {
                                'multiple_choice' => 5,
                                'true_false' => 2,
                                'structure' => 1,
                                default => 0
                            })
                            ->maxItems(fn(callable $get) => match ($get('type')) {
                                'multiple_choice' => 5,
                                'true_false' => 2,
                                'structure' => 1,
                                default => 0
                            })
                            ->disableItemCreation(fn(callable $get) => in_array($get('type'), ['true_false', 'structure']))
                            ->disableItemDeletion(fn(callable $get) => in_array($get('type'), ['true_false', 'structure']))
                            ->columnSpanFull()
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question_text')
                    ->limit(60)
                    ->searchable(),
                TextColumn::make('section.name')
                    ->label('Section')
                    ->sortable(),
                TextColumn::make('type')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime(),
                // ViewColumn::make('audio_url')
                //     ->label('Audio')
                //     ->view('tables.columns.audio-player') // view blade untuk player
            ])
            ->filters([
                SelectFilter::make('quiz_id')
                    ->label('Quiz')
                    ->relationship('section.quiz', 'title')
                    ->preload()
                    ->placeholder('All Quizzes'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionGroupResource\Pages;
use App\Filament\Resources\QuestionGroupResource\RelationManagers;
use App\Models\QuestionGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionGroupResource extends Resource
{
    protected static ?string $model = QuestionGroup::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationLabel = 'Question Groups';
    protected static ?string $pluralModelLabel = 'Question Groups';
    protected static ?string $modelLabel = 'Question Group';
    protected static ?string $navigationGroup = 'Quizzes Controller';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('section_id')
                    ->relationship('section', 'name')
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->label('Group Title')
                    ->required(),

                Forms\Components\Textarea::make('shared_content')
                    ->label('Shared Text (Reading Passage)')
                    ->rows(5)
                    ->nullable(),

                Forms\Components\Select::make('type')
                    ->label('Group Type')
                    ->options([
                        'text' => 'Text',
                        'audio' => 'Audio',
                        'image' => 'Image',
                    ])
                    ->helperText('Jenis shared content yang digunakan untuk soal ini.')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('section.name')->label('Section'),
                Tables\Columns\TextColumn::make('questions_count')
                    ->counts('questions')
                    ->label('Soal Terkait'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Kelola Soal')
                    ->label('Manage Questions')
                    ->icon('heroicon-o-pencil-square')
                    ->url(fn(QuestionGroup $record) => route('filament.admin.resources.questions.index', ['group_id' => $record->id])),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListQuestionGroups::route('/'),
            'create' => Pages\CreateQuestionGroup::route('/create'),
            'edit' => Pages\EditQuestionGroup::route('/{record}/edit'),
        ];
    }
}

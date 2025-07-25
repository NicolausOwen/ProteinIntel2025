<?php

namespace App\Filament\Resources\QuestionGroupResource\Pages;

use App\Filament\Resources\QuestionGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuestionGroup extends EditRecord
{
    protected static string $resource = QuestionGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

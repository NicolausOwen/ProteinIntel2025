<?php

namespace App\Filament\Resources\QuestionGroupResource\Pages;

use App\Filament\Resources\QuestionGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuestionGroups extends ListRecords
{
    protected static string $resource = QuestionGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

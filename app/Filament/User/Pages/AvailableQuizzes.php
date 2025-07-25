<?php

namespace App\Filament\User\Pages;

use App\Models\Quiz;
use Filament\Pages\Page;

class AvailableQuizzes extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.available-quizzes';

    protected static ?string $title = 'Available Quizzes';

    public $quizzes;

        public function mount()
    {
        $this->quizzes = Quiz::all(); 
    }

}

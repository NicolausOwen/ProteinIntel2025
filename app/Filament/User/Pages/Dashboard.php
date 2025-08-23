<?php

namespace App\Filament\User\Pages;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = '/';
    protected static ?string $title = 'Dashboard';

    public function getTitle(): string
    {
        return '';
    }

    public function getView(): string
    {
        return 'filament.user.pages.dashboard'; // Blade custom
    }

}

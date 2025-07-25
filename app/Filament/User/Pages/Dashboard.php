<?php

namespace App\Filament\User\Pages;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;




class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.user.pages.dashboard';
    protected static ?string $title = 'Dashboard';

}

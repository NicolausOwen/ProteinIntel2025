<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.user.pages.dashboard';
    protected static ?string $title = 'Dashboard';
}

<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Profile extends Page
{
    protected static string $view = 'filament.user.pages.profile';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public function mount(): void
    {
        $this->user = Auth::user();
    }

    public function getViewData(): array
    {
        return [
            'user' => auth()->user(),
        ];
    }

}


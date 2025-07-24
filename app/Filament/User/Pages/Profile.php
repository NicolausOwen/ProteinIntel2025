<?php

namespace App\Filament\User\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;


class Profile extends Page
{
    protected static string $view = 'filament.user.pages.profile';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public ?User $user;

    public function mount(): void
    {
        $this -> user = Auth::user();
    }
    
}


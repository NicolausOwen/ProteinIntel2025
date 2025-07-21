<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class ProfileOverview extends Widget
{
    protected static string $view = 'filament.user.widgets.profile-overview';

    protected int | string | array $columnSpan = 'full';

    public function getUser()
    {
        return Auth::user();
    }
}

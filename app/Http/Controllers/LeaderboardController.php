<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        return QuizAttempt::select([
                'user_id',
                DB::raw('MAX(score) as top_score'),
                DB::raw('COUNT(*) as attempts')
            ])
            ->with('user:id,name')
            ->groupBy('user_id')
            ->orderByDesc('top_score')
            ->limit(10)
            ->get()
            ->map(function ($item, $index) {
                return [
                    'rank' => $index + 1,
                    'user' => $item->user->name,
                    'top_score' => $item->top_score,
                    'attempts' => $item->attempts
                ];
            });
    }
}
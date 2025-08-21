<?php

namespace App\Http\Middleware;

use App\Models\QuizAttempt;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Filament\Notifications\Notification;

class CheckQuizAttemptStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   

        $attemptid = $request->route('attempt');

        $qattempt = QuizAttempt::where('id', $attemptid)->where('user_id', Auth::id())->first();

        if(!$qattempt) {
            abort(403, 'Unauthorized');
        } 
        
        if ($qattempt->status == "completed" ){

            $notification =  Notification::make()
                            ->title('Anda sudah menyelesaikan quiz ini sebelumnya.')
                            ->danger() 
                            ->send();

            return redirect()->route('filament.user.pages.available-quizzes');
        }


        return $next($request);
    }
}

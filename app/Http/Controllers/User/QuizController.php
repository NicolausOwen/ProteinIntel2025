<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index($quizId) 
    {
        return view('filament/user/quiz/selectedquiz', [
            'quiz' => Quiz::select('id', 'title', 'description', 'duration_minutes')->find($quizId)
        ]);
    }
    
    public function submit(Request $request, $quiz)
    {
        // Logic to handle quiz submission
        // Validate and process the submitted answers
        return redirect()->route('user.result.show', ['attempt' => $request->attempt_id]);
    }
    
    // mencetak list section dari quiz yang diambil
    public function showSections($attemptId)
    {

        // yang dibutuhkan adalah id quiz dan id user <=> sama-sama berdsarkan attempt id
        // jadi solusinya ambil attemptnyas saja? -> boros resource, terlalu banyak kolom yang tidak diperlukan

        // bagaimana jika hanya mengambil id quiz dan user saja? kalau begitu darimana kita mendapatkan datanya?
        // ada 2 cara, 1 tetap ambil attempt id dan daripada ambil seluruh attempt, lebih baik ambil id quiznya saja

        // cara ke 2 adlaah kirim id quiz ke parameter function ini.

        // cara untuk mengambil user id = berarti attempt berisi id quiz dan user_id ---! mungkin ini adlaah cara terbaik

        $attempt = QuizAttempt::with('quiz')->findOrFail($attemptId); // ambil attempt berdasarkan ID beserta relasi quiz



        // user credentials validation
        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        $sections = $attempt->quiz->sections()
                                 ->select('id', 'name', 'order')
                                 ->get();

        if ($sections->isEmpty()) {
            return redirect()->route('user.result.show', ['attempt' => $attempt->id])
                             ->with('error', 'Tidak ada section dalam quiz ini.');
        }

        return view('filament/user/quiz/quizSection', compact('attempt', 'sections'));
    }
}

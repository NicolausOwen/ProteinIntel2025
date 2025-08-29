<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizAttemptSectionStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_attempt_id',
        'section_id',
        'total_questions',
        'correct_answers',
        'wrong_answers',
    ];

    public function quizAttempt()
    {
        return $this->belongsTo(QuizAttempt::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}

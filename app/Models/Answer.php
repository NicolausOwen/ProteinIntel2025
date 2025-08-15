<?php

namespace App\Models;

use App\Models\Question;
use App\Models\Option;
use App\Models\QuizAttempt;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_attempt_id',
        'question_id',
        'selected_option_id',
        'fill_answer_text',
        'is_correct'
    ];

    public function attempt()
    {
        return $this->belongsTo(QuizAttempt::class, 'quiz_attempt_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function selectedOption()
    {
        return $this->belongsTo(Option::class, 'selected_option_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    protected static function booted()
    {
        static::saving(function ($answer) {
            $selectedOption = Option::find($answer->selected_option_id);

            if ($selectedOption && $selectedOption->is_correct == 1) {
                $answer->is_correct = 1;
            } else {
                $answer->is_correct = 0;
            }
        });
    }

}
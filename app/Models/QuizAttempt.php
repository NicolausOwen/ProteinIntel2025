<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Answer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'started_at',
        'completed_at',
        'score',
        'correct_count',
        'wrong_count',
        'percentage'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    protected static function booted()
    {
        static::saved(function ($attempt) {
            Cache::forget("quiz_attempt_user_{$attempt->id}");
        });

        static::deleted(function ($attempt) {
            Cache::forget("quiz_attempt_user_{$attempt->id}");
        });
    }
}


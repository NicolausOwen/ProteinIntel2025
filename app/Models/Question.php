<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Answer;
use App\Models\Option;
use App\Models\QuestionGroup;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_group_id',
        'type',
        'question_text',
        'foto_url',
        'audio_url',
        'explanation'
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function group(): BelongsTo
    {
        return $this->belongsTo(QuestionGroup::class, 'question_group_id');
    }
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    protected static function booted()
    {
        static::saved(function ($question) {
            Cache::forget("question_group_full_{$question->question_group_id}");
        });

        static::deleted(function ($question) {
            Cache::forget("question_group_full_{$question->question_group_id}");
        });
    }
}


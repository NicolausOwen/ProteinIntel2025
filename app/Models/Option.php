<?php

namespace App\Models;

use App\Models\Question;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;


class Option extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'option_text', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    protected static function booted()
    {
        static::saved(function ($option) {
            $questionGroupId = Question::where('id', $option->question_id)->value('question_group_id');
            if ($questionGroupId) {
                Cache::forget("question_group_full_{$questionGroupId}");
            }
        });
        
        static::deleted(function ($option) {
            $questionGroupId = Question::where('id', $option->question_id)->value('question_group_id');
            if ($questionGroupId) {
                Cache::forget("question_group_full_{$questionGroupId}");
            }
        });
    }
}


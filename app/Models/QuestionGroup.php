<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class QuestionGroup extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'section_id',
        'type',
        'shared_content',
        'title',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    protected static function booted()
{
    static::saved(function ($questionGroup) {
        Cache::forget("question_group_full_{$questionGroup->id}");
        Cache::forget("section_group_ids_{$questionGroup->section_id}");
    });
    
    static::deleted(function ($questionGroup) {
        Cache::forget("question_group_full_{$questionGroup->id}");
        Cache::forget("section_group_ids_{$questionGroup->section_id}");
    });
}
}

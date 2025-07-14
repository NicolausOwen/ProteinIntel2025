<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Answer;
use App\Models\Option;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'type', 'question_text', 'audio_url', 'explanation'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}


<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Question;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'name', 'order'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function groups()
    {
        return $this->hasMany(QuestionGroup::class, 'section_id');
    }

}

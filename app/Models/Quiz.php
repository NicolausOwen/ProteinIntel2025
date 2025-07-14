<?php

namespace App\Models;

use App\Models\Section;
use App\Models\User;
use App\Models\QuizAttempt;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'duration_minutes', 'created_by'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}


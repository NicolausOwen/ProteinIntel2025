<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}

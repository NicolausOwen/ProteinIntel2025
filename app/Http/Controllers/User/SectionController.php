<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function show($sectionId)
    {
        $section = Section::with(['questionGroups.questions.options', 'quiz'])->findOrFail($sectionId);
        
        return view('section.questions', compact('section'));
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        return response()->json([
            'skills' => Skill::orderBy('name')->with('routines')->get(),
        ], 200);
    }

    public function show($skill)
    {
        $skill = Skill::where('slug', $skill)->with('routines')->get();

        return response()->json([
            'skill' => $skill,
        ], 200);
    }
}

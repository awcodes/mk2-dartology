<?php

namespace App\Http\Controllers;

use App\Models\Skill;

class SkillsController extends Controller
{
    public function index()
    {
        return view('skills', [
            'skills' => Skill::orderBy('name')->get(),
            'crumbs' => [['route' => 'skills.index', 'label' => 'All Skills']],
        ]);
    }

    public function show(Skill $skill)
    {
        if (! auth()->user()) {
            $results = [];
        } else {
            $results = auth()->user()->results()->where('routine_id', $routine->id)->latest()->take(10)->get();
        }

        return view('skill', [
            'skill' => $skill,
            'crumbs' => [
                ['route' => 'skills.index', 'label' => 'All Skills'],
                ['route' => 'skills.show', 'label' => $skill->name],
            ],
        ]);
    }
}

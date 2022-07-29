<?php

namespace App\Http\Controllers;

use App\Models\Routine;

class RoutinesController extends Controller
{
    public function index()
    {
        return view('routines', [
            'routines' => Routine::orderBy('name')->get(),
            'crumbs' => [['route' => 'routines.index', 'label' => 'All Routines']],
        ]);
    }

    public function random()
    {
        $routine = Routine::inRandomOrder()->limit(1)->first();
        $results = [];

        if (auth()->user()) {
            $results = auth()->user()->results()->where('routine_id', $routine->id)->latest()->take(10)->get();
        }

        return view('routine', [
            'routine' => $routine,
            'results' => $results,
        ]);
    }

    public function show(Routine $routine)
    {
        $results = [];

        if (auth()->user()) {
            $results = auth()->user()->results()->where('routine_id', $routine->id)->latest()->take(10)->get();
        }

        return view('routine', [
            'routine' => $routine,
            'results' => $results,
        ]);
    }
}

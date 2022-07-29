<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Routine;

class RoutineController extends Controller
{
    public function index()
    {
        return response()->json([
            'routines' => Routine::orderBy('name')->with('categories')->get(),
        ], 200);
    }

    public function random()
    {
        if (! auth()->user()) {
            $results = [];
        } else {
            $results = auth()->user()->results()->where('routine_id', $routine->id)->latest()->take(10)->get();
        }

        $routine = Routine::inRandomOrder()->limit(1)->first();

        return response()->json([
            'routine' => $routine,
            'results' => $results,
        ], 200);
    }

    public function show(Routine $routine)
    {
        if (! auth()->user()) {
            $results = [];
        } else {
            $results = auth()->user()->results()->where('routine_id', $routine->id)->latest()->take(10)->get();
        }

        return response()->json([
            'routine' => $routine,
            'results' => $results,
        ], 200);
    }
}

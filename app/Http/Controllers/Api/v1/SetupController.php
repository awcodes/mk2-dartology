<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Setup;

class SetupController extends Controller
{
    public function index()
    {
        return response()->json([
            'setups' => Setup::orderBy('score', 'desc')->get(),
        ], 200);
    }

    public function show($setup)
    {
        $setup = Setup::where('score', $setup)->get();

        return response()->json([
            'setup' => $setup,
        ], 200);
    }
}

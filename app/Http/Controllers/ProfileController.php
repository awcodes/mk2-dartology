<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $results = Result::where('user_id', $user->id)->with('routine')->latest()->take(10)->get();

        return view('profile', [
            'user' => $user,
            'results' => $results,
        ]);
    }

    public function edit(User $user)
    {
        abort_unless(auth()->user()->id === $user->id, 401);

        return view('profile-edit', [
            'user' => $user,
        ]);
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = \App\Models\User::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'routine_id' => rand(1, 22),
            'result' => rand(0, 300),
            'info' => rand(0, 1) == 1 ? ['settings' => ['skill' => 'hard']] : null,
        ];
    }
}

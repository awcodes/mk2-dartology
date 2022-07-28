<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'name' => 'Checkouts',
                'slug' => 'checkouts',
            ],
            [
                'name' => 'Doubles',
                'slug' => 'doubles',
            ],
            [
                'name' => 'Fun',
                'slug' => 'fun',
            ],
            [
                'name' => 'Targeting',
                'slug' => 'targeting',
            ],
            [
                'name' => 'Triples',
                'slug' => 'triples',
            ],
        ];

        foreach ($skills as $skill) {
            \App\Models\Skill::create([
                'name' => $skill['name'],
                'slug' => $skill['slug'],
            ]);
        }
    }
}

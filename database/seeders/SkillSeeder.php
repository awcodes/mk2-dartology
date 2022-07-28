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
        $skills = json_decode(file_get_contents(database_path('/seeders/data/skills.json')));

        foreach ($skills as $skill) {
            \App\Models\Skill::create([
                'name' => $skill->name,
                'slug' => $skill->slug,
            ]);
        }
    }
}

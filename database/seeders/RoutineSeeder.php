<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routines = json_decode(file_get_contents(database_path('/seeders/data/routines.json')));
        foreach ($routines as $routine) {
            $r = \App\Models\Routine::create([
                'slug' => $routine->slug,
                'name' => $routine->name,
                'targets' => $routine->targets,
                'goal' => $routine->goal,
                'instructions' => $routine->instructions,
            ]);

            foreach ($routine->categories as $cat) {
                $c = Skill::where('name', $cat)->first();
                $r->skills()->attach($c);
            }
        }
    }
}

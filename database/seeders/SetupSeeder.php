<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scores = json_decode(file_get_contents(database_path('/seeders/data/setups.json')));
        foreach ($scores as $out) {
            \App\Models\Setup::create([
                'score' => $out->score,
                'details' => $out->details,
            ]);
        }
    }
}

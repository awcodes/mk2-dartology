<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outs = json_decode(file_get_contents(database_path('/seeders/data/outs.json')));
        foreach ($outs as $out) {
            \App\Models\Checkout::create([
                'out' => $out->score,
                'primary' => $out->a1 != '' ? rtrim($out->a1.', '.$out->a2.', '.$out->a3, ', ') : '',
                'secondary' => $out->b1 != '' ? rtrim($out->b1.', '.$out->b2.', '.$out->b3, ', ') : '',
                'tertiary' => $out->c1 != '' ? rtrim($out->c1.', '.$out->c2.', '.$out->c3, ', ') : '',
                'details' => $out->details,
            ]);
        }
    }
}

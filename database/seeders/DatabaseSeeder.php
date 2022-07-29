<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('shield:generate');

        Role::create(['name' => 'member'])->givePermissionTo('page_MyProfile');

        \App\Models\User::factory()->create([
            'name' => 'Adam Weston',
            'email' => 'awcodes1@gmail.com',
        ])->assignRole('super_admin');

        \App\Models\User::factory(10)->create()->each(fn ($member) => $member->assignRole('member'));
        \App\Models\User::factory(5)->banned()->create()->each(fn ($member) => $member->assignRole('member'));

        $this->call(SkillSeeder::class);
        $this->call(RoutineSeeder::class);
    }
}

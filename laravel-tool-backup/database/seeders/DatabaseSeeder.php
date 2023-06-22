<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
        [
            SettingSeeder::Class,
            UserSeeder::Class,
            NewsSeeder::Class,
            CategoryNewsSeeder::Class,
            PageSeeder::Class,
            ContactSeeder::Class,
        ]
        );
        // User::factory(10)->create();
    }
}

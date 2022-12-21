<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingsSeeder::class,
            ContactsSeeder::class,
            SupportsSeeder::class,
            RoomsSeeder::class,
            UserSeeder::class,
            PageSeeder::class,
            HomeCategorySeeder::class,
            HomeQuestionSeeder::class
        ]);
    }
}

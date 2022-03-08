<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            SedderPage::class,
            SedderPermission::class,
            SedderServices::class,
            SedderProjects::class,
            SedderSettings::class,
            SedderUser::class,
        ]);
    }
}

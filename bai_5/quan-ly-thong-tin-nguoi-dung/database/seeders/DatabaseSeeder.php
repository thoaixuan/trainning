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
        $this->call([
            SedderPage::class,
            SedderServices::class,
            SedderUser::class,
            SedderProjects::class,
            SedderPermission::class,
            SeederRoom::class,
            SeederRole::class,
            SeederPermissionRole::class,
            SeederRoleUser::class,
        ]);
    }
}

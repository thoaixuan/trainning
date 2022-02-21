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
        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);

        $this->call(PermissionRoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(RoleUserSeeder::class);
        $this->call(ServiceSeeder::class);

        $this->call(ProjectSeeder::class);


    }
}

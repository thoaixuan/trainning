<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'per_name' => 'Admin',
                'permissions' => ''
            ],
            [
                'per_name' => 'Quản lý',
                'permissions' => 'phongban_view,phongban_update,phongban_insert,phongban_delete'
            ],
            [
                'per_name' => 'Nhân viên',
                'permissions' => 'phongban_view,phongban_update,phongban_insert,phongban_delete'
            ]
        ]);
    }
}

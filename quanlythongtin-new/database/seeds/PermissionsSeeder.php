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
                'permissions' => 'dashboard_view,phongban_view,phongban_insert,phongban_update,phongban_delete,user_view,user_insert,user_update,user_delete,permission_view,permission_insert,permission_update,permission_delete'
            ],
            [
                'per_name' => 'Quản lý',
                'permissions' => 'dashboard_view,user_view,user_update,user_insert,user_delete'
            ],
            [
                'per_name' => 'Nhân viên',
                'permissions' => 'dashboard_view,user_view,user_update,user_insert,user_delete'
            ]
        ]);
    }
}

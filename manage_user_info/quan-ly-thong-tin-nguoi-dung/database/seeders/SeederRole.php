<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=array('user-list','user-add','user-edit','user-delete','room-list','room-add','room-edit','room-delete','role-list','role-add','role-edit','role-delete');
        $staff=array('user-list','user-add','user-edit','user-delete');
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'description' => 'admin',
                'roles_module'=>implode (",",$admin),
            ], 
            [
                'name' => 'staff',
                'description' => 'staff',
                'roles_module'=>implode (",",$staff),
            ], 
        ]);
    }
}

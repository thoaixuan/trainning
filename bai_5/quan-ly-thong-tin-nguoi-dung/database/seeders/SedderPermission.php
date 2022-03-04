<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedderPermission extends Seeder
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
                'name' => 'Kế toán',
                'description' => 'Làm việc công ty',
            ],
            [
                'name' => 'Dựa án',
                'description' => 'Quản lý các nhân viên',
            ],  
        ]);
    }
}

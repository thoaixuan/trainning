<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->insert([
            [
                'position_name' => 'Quản lý',
            ],
            [
                'position_name' => 'Nhân viên',
            ]
        ]);
    }
}

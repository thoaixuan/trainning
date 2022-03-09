<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phongban')->insert([
            [
                'phongban_name' => 'Ban quản lý',
                'phongban_description' => 'Ban quản lý description'
            ],
            [
                'phongban_name' => 'Ban sản xuất',
                'phongban_description' => 'Ban sản xuất description'
            ]
        ]);
    }
}

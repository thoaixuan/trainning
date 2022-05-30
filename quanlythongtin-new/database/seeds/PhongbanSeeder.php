<?php

use Illuminate\Database\Seeder;

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
                'phongban_name' => 'Ban giám đốc',
                'phongban_description' => 'Ban giám đốc theo sát, báo cáo hoạt động doanh nghiệp'
            ],
            [
                'phongban_name' => 'Ban quản lý',
                'phongban_description' => 'Ban quản lý định hướng chiến lược, nghiên cứu phát triển dự án'
            ],
            [
                'phongban_name' => 'Ban sản xuất',
                'phongban_description' => 'Ban sản xuất'
            ]
        ]);
    }
}

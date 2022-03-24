<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SedderUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'full_name' => 'admin',
                'date' => '2000/03/17',
                'date_start' => '2022/02/11',
                'gender'=>0,
                'room_id' => 1,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'cong ty ing',
                'phone_number' => '0921100517',
                'permissions' => 1,
                'description'=>"Chưa có dữ liệu",
                'cover'=>'1646617999_7.jpg',
                'cover_after'=>'1646617999_7.jpg',
                'is_admin'=>1,
                'permission_id'=>1,
            ], 
            [
                'full_name' => 'user',
                'date' => '2000/03/17',
                'date_start' => '2022/02/11',
                'gender'=>0,
                'room_id' => 1,
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'cong ty ing',
                'phone_number' => '0921100517',
                'permissions' => 1,
                'description'=>"Chưa có dữ liệu",
                'cover'=>'1646617999_7.jpg',
                'cover_after'=>'1646617999_7.jpg',
                'is_admin'=>1,
                'permission_id'=>2
            ], 
        ]);
    }   
}

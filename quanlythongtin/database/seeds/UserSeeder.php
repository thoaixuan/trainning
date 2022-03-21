<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'admin',
                'date_of_birth' => '1999-01-01',
                'date_start' => '2022-02-02',
                'gender'=>0,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '0921100517',
                'description'=>"Chưa có dữ liệu",
                'img_before'=>'default.jpg',
                'img_after'=>'default.jpg',
                'status'=>0,
                'id_permissions'=> 1,
                'id_phongban' => 1
            ], 
            [
                'name' => 'user',
                'date_of_birth' => '2000-01-01',
                'date_start' => '2022-02-02',
                'gender'=>0,
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '0921100517',
                'description'=>"Chưa có dữ liệu",
                'img_before'=>'default.jpg',
                'img_after'=>'default.jpg',
                'status'=>0,
                'id_permissions'=> 2,
                'id_phongban' => 1
            ], 
        ]);
    }
}

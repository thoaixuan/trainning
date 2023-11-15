<?php

namespace Database\Seeders;

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
        \DB::table('users')->insert([
            [
                'fullname' => 'admin',
                'gender'=>0,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'cong ty ing',
                'phone_number' => '0921100517',
                'type' => 'AdminSystem',
                'permission_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'description' => ''
            ], 
            [
                'fullname' => 'user',
                'gender'=>0,
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'cong ty ing',
                'phone_number' => '0921100517',
                'type' => 'Admin',
                'permission_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'description' => ''
            ], 
        ]);
    }
}

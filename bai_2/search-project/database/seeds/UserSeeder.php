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
                'email' => 'admin@gmail.com',
                'phone'=>'0921100517',
                'password' => bcrypt('Dothanhson@1703'),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'is_admin'=>1,
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'phone'=>'123456789',
                'password' => bcrypt('Dothanhson@1703'),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'is_admin'=>0,

            ], 
            [
                'name' => 'user',
                'email' => 'user2@gmail.com',
                'phone'=>'123456782',
                'password' => bcrypt('Dothanhson@1703'),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'is_admin'=>0,

            ], 
        ]);
        
    }
}

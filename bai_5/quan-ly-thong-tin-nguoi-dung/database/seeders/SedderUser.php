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
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'cong ty ing',
                'phone_number' => '0921100517',
                'note' => 'nothing',
                'keyword' => 'ADMIN',
                'permissions' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'cover'=>'1646295620_7.jpg',
                'cover_after'=>'1646295620_7.jpg',
                'email_verified_at' => now(),
            ], 
        ]);
    }   
}

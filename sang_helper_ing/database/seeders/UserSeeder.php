<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
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
                    'name'=>'amdin',
                    'email'=>'coderthanhson@gmail.com',
                    'password' => bcrypt('123456'),
                    'type'=>'AdminSystem',
                    'code'=>'123456'
            ], 
        ]);
    }
}

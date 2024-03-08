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
                    'name'=>'admin',
                    'email'=>'admin@gmail.com',
                    'password' => bcrypt('123456'),
                    'phone'=>'0345565557',
                    'status'=>'1',
                    'permission'=>'1',
                    'department'=>'1',
                    'sex'=>'male',
                    'birthdate'=>'10/12/2002'
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contacts')->insert([
            [
                'name' => 'Trung tâm trợ giúp',
                'phone'=>"0921100517",
                'email'=>"client@gmail.com",
                'link'=>"http://google.com",
                'content'=>"Tôi muốn biết địa chỉ liên hệ công ty bạn",
            ], 
        ]);
    }
}

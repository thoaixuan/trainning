<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                    'contact_name'=>'Gửi liên hệ',
                    'contact_content'=>"Chua co noi dung",
                    'contact_phone'=>'0921100511',
                    'contact_email'=>'coderthanhson@gmail.com',
            ], 
            [
                'contact_name'=>'Gửi liên hệ',
                'contact_content'=>"Chua co noi dung",
                'contact_phone'=>'0921100512',
                'contact_email'=>'coderthanhson@gmail.com',
            ], 
        ]);
    }
}

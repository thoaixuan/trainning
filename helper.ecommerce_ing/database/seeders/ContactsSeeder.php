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
                    'contact_name'=>'Gửi hỗ trợ',
                    'contact_content'=>"Chua co noi dung",
                    'contact_phone'=>'0921100517',
                    'contact_email'=>'coderthanhson@gmail.com',
                    'rooms_id'=>1,
            ], 
            [
                'contact_name'=>'Gửi hỗ trợ',
                'contact_content'=>"Chua co noi dung",
                'contact_phone'=>'0921100517',
                'contact_email'=>'coderthanhson@gmail.com',
                'rooms_id'=>2,
            ], 
        ]);
    }
}

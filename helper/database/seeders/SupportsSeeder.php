<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SupportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supports')->insert([
            [
                    'support_name'=>'Gửi hỗ trợ',
                    'support_content'=>"Chua co noi dung",
                    'support_phone'=>'0921100511',
                    'support_email'=>'coderthanhson@gmail.com',
                    'rooms_id'=>1,
            ], 
            [
                'support_name'=>'Gửi hỗ trợ',
                'support_content'=>"Chua co noi dung",
                'support_phone'=>'0921100512',
                'support_email'=>'coderthanhson@gmail.com',
                'rooms_id'=>2,
            ], 
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedderSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'mail_driver' => 'smtp',
                'mail_host' => 'smtp.gmail.com',
                'mail_port' => '587',
                'mail_from_address' => 's1357299@gmail.com',
                'mail_from_name' => 'Sáng Dev',
                'mail_encryption' => 'tls',
                'mail_username' => 's1357299@gmail.com',
                'mail_password' => 'untstjclvahltaqr',
                'mail_receive' => 'nguyenngocsang.dev@gmail.com',
            ], 
        ]);
    }
}

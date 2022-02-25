<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'user_id' => 1,
                'service_name' => 'Nghe nhạc',
                'service_description'=>'Được cài đặt nhạc chờ, và một số chức năng tự phát',
            ],
        ]);
    }
}

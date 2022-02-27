<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'id' => 1,
                'name'=>"Trung tâm trợ giúp" ,
                'key'=>"TRUNG_TAM_TRO_GIUP",
                'slug'=>"trung-tam-tro-giup",
                'type_open'=>0,
                'status'=>0,
                'content'=>"Chưa có thông tin"
            ],
            [
                'id' => 2,
                'name'=>"An toàn mua bán" ,
                'key'=>"AN_TOAN_MUA_BAN",
                'slug'=>"an-toan-mua-ban",
                'type_open'=>0,
                'status'=>0,
                'content'=>"Chưa có thông tin"
            ],
            [
                'id' => 3,
                'name'=>"Quy định cần biết" ,
                'key'=>"QUY_DINH_CAN_BIET",
                'slug'=>"quy-dinh-can-biet",
                'type_open'=>0,
                'status'=>0,
                'content'=>"Chưa có thông tin"
            ],
        ]);
    }
}
